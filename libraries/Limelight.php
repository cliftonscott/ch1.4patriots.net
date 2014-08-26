<?php
/**
 * Order Processing utilities
 * 
 * 
 * @author Brian Gibbins
 * @copyright 2014
 * @see http://en.wikipedia.org/wiki/PHPDoc
 */
class Limelight {
	
	static $appMessagesAry = array();
	static $appErrorsAry = array();
	
	const USERNAME = "secure.powerpatriotgenerator.com";
	const PASSWORD = "8aK4Kxm3fQWSHB";
	const URL = "https://www.securecart1.com/admin/transact.php";
	const LOOKUP_URL = "https://www.securecart1.com/admin/membership.php";
	
	public function __construct() {
		
	}
	
	function postSale($saleDataObj, $productDataObj, $customerDataObj, $analyticsObj) {
		
		$postSale = new stdClass();
		
		//TODO error check that these values are objects
		//TODO be sure and add custom pricing
		
		$limelightParams = array(
			'username' => self::USERNAME,
			'password' => self::PASSWORD,
			'method' => 'NewOrder',
			'tranType' => 'Sale',

			'ipAddress' => self::getIpAddress(),
			
			'AFID' => $analyticsObj->affiliateId,
			'click_id' => $analyticsObj->clickId,
			'product_qty_' . $productDataObj->productId => $saleDataObj->quantity,
			//'SID' => $_SESSION['subid'],
			//'C1' => $_SESSION['sspdata'],
			//'C2' => $_SESSION['subid2'],
			'C3' => $productDataObj->netRevenueEach,
			'OPT' => $analyticsObj->serverId,
			
			'productId' => $productDataObj->productId,
			'campaignId' => $productDataObj->campaignId,
			
			'email' => $customerDataObj->email,
			'firstName' => $customerDataObj->firstName,
			'lastName' => $customerDataObj->lastName,
			
			'creditCardType' => $customerDataObj->creditCardType,
			'creditCardNumber' => $customerDataObj->creditCardNumber,
			'expirationDate' => $customerDataObj->expirationDate,
			'CVV' => $customerDataObj->cvv,
			
			'billingAddress1' => $customerDataObj->billingAddress1,
			'billingCity' => $customerDataObj->billingCity,
			'billingState' => $customerDataObj->billingState,
			'billingZip' => $customerDataObj->billingZip,
			'billingCountry' => $customerDataObj->billingCountry,

			'shippingAddress1' => $customerDataObj->shippingAddress1,
			'shippingCity' => $customerDataObj->shippingCity,
			'shippingState' => $customerDataObj->shippingState,
			'shippingZip' => $customerDataObj->shippingZip,
			'shippingCountry' => $customerDataObj->shippingCountry,

		);

		$limelightParams["shippingId"] = self::getShippingId($productDataObj, $customerDataObj);
		
		//override phone because we don't require it on the front end
		if(!empty($customerDataObj->phone)) {
			$limelightParams["phone"] = $customerDataObj->phone;
		} else {
			$limelightParams["phone"] = "1111111111";
		}

		//SID for LL
		//TODO use better equality checking here as we should be more confident in our values

		if($analyticsObj->subId == '' && $analyticsObj->affSub2 != ''){
			$limelightParams['SID'] = $analyticsObj->affSub2;
		} else{
			$limelightParams['SID'] = $analyticsObj->subId;
		}
				
		//doCurl call
		$configObj = new stdClass();
		$configObj->url = self::URL;
		$configObj->fields = $limelightParams;
		
		include_once("Curl.php");
		$curl = new Curl();
		
		$postResults = $curl->doCurl($configObj);
		$resultsString = urldecode($postResults->results);
		$postSale->serverResponse = $resultsString;
		parse_str($resultsString, $resultsArray);
		
		$postSale->responseCode = intval($resultsArray["responseCode"]);
		//check results string
		
		if(intval($resultsArray["responseCode"]) !== 100) {
			$postSale->success = FALSE;
			$postSale->errorMessage = $resultsArray["errorMessage"];
			$postSale->declineReason = $resultsArray["declineReason"];
		} else {
			$postSale->success = TRUE;
			$postSale->customerId = $resultsArray["customerId"];
			$postSale->orderId = $resultsArray["orderId"];
			
			if($productDataObj->isBonus !== TRUE) {

				$_SESSION["orders"][] = $productDataObj->metaTitle . " - Ref. #" . $resultsArray["orderId"];
				$_SESSION['vwoRevenue'] = $_SESSION['vwoRevenue'] + $productDataObj->netRevenueEach;

				//create specific session array for google posting w/ecommerce on next page
				$_SESSION["googleTransaction"]["customerId"] = $resultsArray['customerId'];
				$_SESSION["googleTransaction"]["orderTotal"] = $resultsArray['orderTotal'];
				$_SESSION["googleTransaction"]["orderId"] = $resultsArray['orderId'];
				$_SESSION["googleTransaction"]["tax"] = $resultsArray['orderSalesTaxAmount'];
				$_SESSION["googleTransaction"]["orderQty"] = $saleDataObj->quantity;
				$_SESSION["googleTransaction"]["product"] = $productDataObj->googleProductName;
				$_SESSION["googleTransaction"]["price"] = $productDataObj->price;
				$_SESSION["googleTransaction"]["orderSku"] = $productDataObj->googleProductSKU;
				$_SESSION["googleTransaction"]["orderCategory"] = $productDataObj->googleProductCategory;

			}
			

		}


		return $postSale;
		
	}

	function getShippingId($productDataObj, $customerDataObj) {
		
		switch($customerDataObj->billingCountry) {
			case "US":
				$shippingId = $productDataObj->shippingIdDomestic;
				break;
			default:
				$shippingId = $productDataObj->shippingIdInternational;
				break;
		}
		
		return $shippingId;
		
	}
	
	function getIpAddress() {
		
		if (isset($_SERVER["REMOTE_ADDR"])) { 
			$ipAddress = $_SERVER["REMOTE_ADDR"]; 
			
		} else if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) { 
			$ipAddress = $_SERVER["HTTP_X_FORWARDED_FOR"]; 
			
		} else if (isset($_SERVER["HTTP_CLIENT_IP"])) { 
			$ipAddress = $_SERVER["HTTP_CLIENT_IP"]; 
			
		} else {
			$ipAddress = '127.0.0.1';
		}
		
		return $ipAddress;	
	}

	function getCustomerByEmail($email) {
		
		//make sure there are not spaces at the beginning or end
		$email = trim($email);
		
		//make sure this isn't submitted blank
		if(empty($email)) {
			return false;
		}		
		
		//urldecode		
		$email = urldecode($email);
		
		//remove wildcard characters from search
		$email = str_replace("%", "", $email);
		
		$customerDataObj = new stdClass();
		
		$fromDate = date('m/d/Y', strtotime("-2 year"));
		$toDate = date('m/d/Y');
		$criteria = "";
		$campaignId = "";
		
		$lookupParms = array(
			'username' => self::USERNAME,
			'password' => self::PASSWORD,
			'method' => 'order_find',
			'start_date' => $fromDate,
			'end_date' => $toDate,
			'search_type' => 'all',
			'criteria' => "email=" . $email,
			'campaign_id' => "all",
			'return_type' => 'order_view'
		);
		
		//doCurl call
		$configObj = new stdClass();
		$configObj->url = self::LOOKUP_URL;
		$configObj->fields = $lookupParms;
		include_once("State.php");
		include_once("Curl.php");
		$curl = new Curl();
		
		$postResults = $curl->doCurl($configObj);
		
		parse_str($postResults->results, $order_response_string_as_array);
		
		$json_orders = json_decode(stripslashes($order_response_string_as_array['data']), true);
		krsort($json_orders);
		$order_id = key($json_orders);
		
		$customerDataObj->firstName = $json_orders[$order_id]["first_name"];
		$customerDataObj->lastName = $json_orders[$order_id]["last_name"];
		$customerDataObj->email = $email;
		
		$customerDataObj->billingAddress1 = $json_orders[$order_id]["billing_street_address"];
		$customerDataObj->billingCity = $json_orders[$order_id]["billing_city"];
		$customerDataObj->billingCountry = $json_orders[$order_id]["billing_country"];
		$customerDataObj->billingState = $json_orders[$order_id]["billing_state"];
		$customerDataObj->billingStateName = State::getStateNameByAbbreviation($json_orders[$order_id]["billing_state"]);
		$customerDataObj->billingZip = $json_orders[$order_id]["billing_postcode"];
		
		$customerDataObj->shippingAddress1 = $json_orders[$order_id]["shipping_street_address"];
		$customerDataObj->shippingCity = $json_orders[$order_id]["shipping_city"];
		$customerDataObj->shippingState = $json_orders[$order_id]["shipping_state"];
		$customerDataObj->shippingStateName = State::getStateNameByAbbreviation($json_orders[$order_id]["shipping_state"]);
		$customerDataObj->shippingZip = $json_orders[$order_id]["shipping_postcode"];
		$customerDataObj->shippingCountry = $json_orders[$order_id]["shipping_country"];
		
		$customerDataObj->ccLast4 = $json_orders[$order_id]["cc_number"];
		
		$customerDataObj->previousOrderId = $order_id;

		return $customerDataObj;
		
	}
	
		
//ERROR AND MESSAGE HANDLING
	function setMessage($msg) {
		$message = array("timestamp" => microtime(), "message" => $msg);
		self::$appMessagesAry[] = $message;
	}
	function getMessages() {
		return self::$appMessagesAry;
	}
	function setError($err) {
		$error = array("timestamp" => microtime(), "error" => $err);
		self::$appErrorsAry[] = $error;
	}
	function getErrors() {
		return self::$appErrorsAry;
	}

}//end of class
