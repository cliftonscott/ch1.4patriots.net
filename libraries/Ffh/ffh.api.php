<?php
/*
	Food for Health International
	
	System Requirements
	
		PHP 5+ (Ideally 5.3+)
	
	Required PHP Extensions:
	
		libxml		(Required for:  SimpleXML)
		libcurl		(Required for:  cURL functions)


	Last Updated:  1/30/2015	
*/




/*
	The Order and Item classes are simple objects to help structure and organize order data before sending it to the API.	
*/
class FFHOrder {


	public $order_id			= ''; // Vendor Order ID - The Order ID from the external Vendor/Store.  IE:  The Order ID from your system.
	
	// Customer Information and Shipping Address
	public $firstname			= '';
	public $lastname			= '';
	public $address1			= '';
	public $address2			= '';
	public $city				= '';
	public $state				= ''; // 2 Letter Code
	public $postalcode			= '';
	public $country				= ''; // 2 Letter Code
	
	public $email				= '';
	public $phone				= '';
	
	public $ship_date			= ''; // For scheduling future ship dates.  IE:  Ship this order in 2 weeks.  Defaults to today.  Format:  mm/dd/yyyy

	public $items				= array(); // Array of Item class.


	function __construct() {
		
		$this->ship_date = date('m/d/Y');
		
	} // END:  __construct


	// Adds and Item to the Items array.
	public function addItem( FFHItem $item ) {
	
		$this->items[ $item->sku ] = $item;
	
	}


} // END:  Order object




/*
	Subclass used by FFHOrder to represent the products associated with an order.
*/
class FFHItem {


	public $sku					= '';
	public $quantity			= '';
	public $description			= '';


	function __construct( $sku=NULL, $qty=NULL, $desc=NULL ) {
		
		if ( isset($sku) ) {
			$this->sku = $sku;
		}
		
		if ( isset($qty) ) {
			$this->quantity = $qty;
		}
		
		if ( isset($desc) ) {
			$this->description = $desc;
		}
		
	} // END:  __construct()


} // END:  Item object




/*
	The FFHApi object handles all the communication with the Food for Health ROSS API.
	
	Uses PHP Curl for communication.  Custom Order and Item objects are required for passing in Order data.
*/
class FFHApi {


	const API_MODE_PILOT			= 'PILOT'; // Pilot Test Area.
	const API_MODE_PRODUCTION		= 'PROD'; // The live Production System.   Orders here ship and bill.

	// ROSS Communication
	private $apiMode				= NULL;
	private $apiUrl					= NULL;
	private $apiKey					= NULL;
	private $apiUser				= NULL;
	
	// Error Responses
	private $lastError				= NULL;
	private $lastErrorCode			= NULL;
	private $lastErrorSeverity		= NULL;
	private $lastErrorMessage		= NULL;



	function __construct( $key=NULL, $user=NULL, $mode=NULL ) {
		
		if ( isset($key) ) {
			$this->setApiKey( $key );
		}
		
		if ( isset($user) ) {
			$this->setApiUser( $user );
		}
		
		if ( isset($mode) ) {
			$this->setApiMode( $mode );
		}
		
	} // END:  __construct



	// ---===   ROSS API Call Manager   ===---

	// Takes XML and makes a POST call.
	// Throws exceptions if there are server errors.
	// Returns false if we got an error message from ROSS in reply to our request.
	public function call( $xml ) {
		
		set_time_limit(0);
		
		// An API key is required.
		if ( !isset($this->apiKey) ) {
			throw new Exception('FFH API ERROR:  API Key Not Set');
		}
		
		// An API User is required.
		if ( !isset($this->apiUser) ) {
			throw new Exception('FFH API ERROR:  API User Not Set');
		}

		// An API URL is required.  Built off Mode.
		if ( !isset($this->apiUrl) ) {
			throw new Exception('FFH API ERROR:  API URL Not Set');
		}
		
		$this->clearErrors(); // Clear any previous errors.


		$curl = curl_init( $this->getApiUrl() );
	
		curl_setopt( $curl, CURLOPT_POSTFIELDS, $xml );
		curl_setopt( $curl, CURLOPT_RETURNTRANSFER, TRUE );
		curl_setopt( $curl, CURLOPT_POST, TRUE );
		curl_setopt( $curl, CURLOPT_HTTPHEADER, 
			array(
				'Content-Type: application/json',
				'Content-Length: ' . strlen($xml)
			)
		);

		$response = curl_exec($curl);

		// Throw an exception for CURL errors.
		if ( $response === false ) {
			
			$info = curl_getinfo( $curl );
			curl_close( $curl );
			
			throw new Exception( 'Communications Error During API Call.  Details: ' . print_r($info, TRUE) );
			
		}

		curl_close( $curl );
	
		
		// Dump the response into SimpleXML
		$ross = new SimpleXMLElement( $response );
		
		// Setup the XML namespace for XPath.
		$ross->registerXPathNamespace('r', 'http://rossinc.com/webservices/');
		
		// Check for Error responses/messages from ROSS.
		$error_check = $ross->xpath("//r:table[@name='FFH_RS_SYS_MESSAGES']/r:data/r:row");
		
		
		/*
			There are 2 paths here.  
			
			Both Errors and Create Successes can come back in a FFH_RS_SYS_MESSAGES.
			Creates will have a RS_MESSAGE_SEVERITY of 0.
		*/
		if ( $error_check ) {
				
				$error_object = $error_check[0];
				//$this->debug($error_object);
			
				$severity = (int) $error_object->RS_MESSAGE_SEVERITY;
				if ( $severity > 0 ) { // We have a legit error.
					
					//$this->debug('Error Check:  Actual Error -  Severity: '.$severity);
					
					$error_code			= (string) $error_object->RS_MESSAGE_NUMBER;
					$error_severity		= (string) $error_object->RS_MESSAGE_SEVERITY;
					$error_message		= (string) $error_object->RS_MESSAGE_TEXT;
			
					$this->setLastErrorCode( $error_code );
					$this->setLastErrorSeverity( $error_severity );
					$this->setLastErrorMessage( $error_message );
			
					$this->setLastError( "[$error_code] ($error_severity) $error_message" );
					
					return false;
					
				}
				else { // We have a create, send back the OrderID.
					
					$order_id = (string) $error_object->ORDER_NUMBER; // ROSS Order ID
					return $order_id;
					
				}
	
		} // END:  if $error_check
		else {
			
			return $ross->ExecuteXMLResult->method->tables;
			
		} // END:  else $error_check

	} // END:  call()



	// ---=== Order Creation ===---

	public function createOrder( FFHOrder $order ) {
		
		$xml = $this->createOrderXML( $order );
		//$this->debug($xml);
		
		$response = $this->call( $xml );
		//$this->debug( $response );
		
		return $response;

	} // END:  createOrder()


	// Builds the XML string for createOrder();
	public function createOrderXML( FFHOrder $order ) {
		
		$cnt = 1;
		$rows = '';
		
		foreach ( $order->items as $item ) {
			
			$rows .= '
							<row number="' . $cnt . '">
								<ORDER_ID>' . $order->order_id . '</ORDER_ID>
								<SHIPPING_FIRST_NAME>' . $order->firstname . '</SHIPPING_FIRST_NAME>
								<SHIPPING_LAST_NAME>' . $order->lastname . '</SHIPPING_LAST_NAME>
								<SHIPPING_ADDRESS_1>' . $order->address1 . '</SHIPPING_ADDRESS_1>
								<SHIPPING_ADDRESS_2>' . $order->address2 . '</SHIPPING_ADDRESS_2>
								<SHIPPING_CITY>' . $order->city . '</SHIPPING_CITY>
								<SHIPPING_STATE>' . $order->state . '</SHIPPING_STATE>
								<SHIPPING_POSTAL_CODE>' . $order->postalcode . '</SHIPPING_POSTAL_CODE>
								<SHIPPING_COUNTRY>' . $order->country . '</SHIPPING_COUNTRY>
								<SHIPPING_EMAIL>' . $order->email . '</SHIPPING_EMAIL>
								<SHIPPING_PHONE>' . $order->phone . '</SHIPPING_PHONE>
								<REQUIRED_DATE>' . $order->ship_date . '</REQUIRED_DATE>
								<PART_CODE>' . $item->sku . '</PART_CODE>
								<ORDER_LINE_QUANTITY>' . $item->quantity . '</ORDER_LINE_QUANTITY>
								<DETAIL_DESCRIPTION>' . $item->description . '</DETAIL_DESCRIPTION>
							</row>
			';
			
			$cnt++;
			
		} // END:  foreach Item
		
		
		$xml = '
		<?xml version="1.0" encoding="UTF-8" standalone="no"?>
		<methodXML>
			<method name="RSI_FFHWS_ORDER_CREATE">
				<database>DEFAULT</database>
				<parameters>
					<parameter>
						<name>ERROR_OCCURRED</name>
						<value>0</value>
					</parameter>
					<parameter>
						<name>XML_TAGS</name>
						<value>1</value>
					</parameter>
				</parameters>
				<tables>
					<table name="RS_FFHWS_ORDER_CONTROL">
						<metadata />
						<data>
							<row number="1">
								<API_ID>' . $this->apiKey . '</API_ID>
								<API_USERNAME>' . $this->apiUser . '</API_USERNAME>
							</row>
						</data>
					</table>
					<table name="RS_FFHWS_ORDER_LINES">
						<metadata />
						<data>
							' . $rows . '
	
						</data>
					</table>
				</tables>
			</method>
		</methodXML>
		';
		
		return $xml;
		
	} // END:  createOrderXML()



	// ---===   Getters / Setters   ===---


	// The URL to use to connect to the ROSS server.
	public function getApiUrl( ) {
		
		return $this->apiUrl;
		
	}
	public function  setApiUrl( $url ) {
		
		$this->apiUrl = $url;
		
	}


	// The API Key to use when making ROSS calls.   Specific to a given customer.
	public function  setApiKey( $key ) {
		$this->apiKey = $key;
	}


	// The API User to use when making ROSS calls.  Specific for a user for a given customer.
	public function  setApiUser( $user ) {
		$this->apiUser = $user;
	}


	// Switch between Production and Test Servers
	public function setApiMode( $mode ) {
		
		if ( $mode == self::API_MODE_PRODUCTION ) {
			$this->apiMode = $mode;
			$url = "http://api.ffhtech.com:8092/?Environment=$mode&Function=FFH_ORDERS_WS";
		}
		else { // Default to the PILOT site.
			$this->apiMode = self::API_MODE_PILOT;
			$url = "http://api.ffhtech.com:8092/?Environment=PILOT&Function=FFH_ORDERS_WS";
		}
		
		$this->setApiUrl( $url );
		
	} // END:  setApiMode();


	// API Error Data - LastError - Is a complete error message with the error code and message in one string.
	public function getLastError( ) {
		
		return $this->lastError;
		
	}
	public function setLastError( $error ) {
		
		$this->lastError = $error;
		
	}
	
	
	// API Error Data - LastErrorCode - Is just the error number piece from an error message.
	public function getLastErrorCode( ) {
		
		return $this->lastErrorCode;
		
	}
	public function setLastErrorCode( $error_code ) {
		
		$this->lastErrorCode = $error_code;
		
	}
	
	
	// API Error Data - LastErrorSeverity - Is just the error severity piece from an error message.
	public function getLastErrorSeverity( ) {
		
		return $this->lastErrorSeverity;
		
	}
	public function setLastErrorSeverity( $error_severity ) {
		
		$this->lastErrorSeverity = $error_severity;
		
	}
	
	
	// API Error Data - LastErrorMessage - Is just the error message piece from an error message.
	public function getLastErrorMessage( ) {
		
		return $this->lastErrorMessage;
		
	}
	public function setLastErrorMessage( $error_message ) {
		
		$this->lastErrorMessage = $error_message;
		
	}


	public function clearErrors( ) {
		
		$this->setLastError( NULL );
		
		$this->setLastErrorCode( NULL );
		$this->setLastErrorSeverity( NULL );
		$this->setLastErrorMessage( NULL );
		
	}


	public function debug( $data ) {
		echo '<pre>';
		print_r( $data );
		echo '</pre>';
	}


} // END:  FFHApi object


?>