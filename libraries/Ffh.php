<?php
/**
 * Order Processing utilities
 * 
 * 
 * @author Brian Gibbins
 * @copyright 2014
 * @see http://en.wikipedia.org/wiki/PHPDoc
 */
class Ffh {
	
	static $appMessagesAry = array();
	static $appErrorsAry = array();

	static $quantity = null;
	static $orderId = null;

	const USERNAME = "";
	const PASSWORD = "";
	
	public function __construct() {
		
	}
	
	function postSale($productDataObj, $customerDataObj) {

		$postSale = new stdClass();

		if(self::$quantity < 1) {
			$postSale->success = false;
			$postSale->ffhError = "Quantity not set.";
			return $postSale;
		} else {
			$quantity = self::$quantity;
		}

		include_once("Ffh/ffh.api.php");


		$order = new FFHOrder();

		// The Order ID from your system.
		$order->order_id		= self::$orderId;

		// Shipping information for the Customer.
		$order->firstname		= $customerDataObj->firstName;
		$order->lastname		= $customerDataObj->lastName;
		$order->address1		= $customerDataObj->shippingAddress1;
		$order->address2		= '';
		$order->city			= $customerDataObj->shippingCity;
		$order->state			= $customerDataObj->shippingState; // 2 Letter Code
		$order->postalcode		= $customerDataObj->shippingZip;
		$order->country			= $customerDataObj->shippingCountry; // 2 Letter Code

		$order->email			= $customerDataObj->email;

		if(!empty($customerDataObj->phone)) {
			$order->phone			= $customerDataObj->phone; // Numbers only.  Remove other characters before submitting.  Length 10.
		} else {
			$order->phone			= '11111111111'; // Numbers only.  Remove other characters before submitting.  Length 10.
		}

		//$order->ship_date		= '2/21/2015'; // Not Required.  For scheduling shipping at a future date.  If not provided, defaults to today.

		// Add a Product to the Order.
		//$order->addItem( new FFHItem( '50170054', '1', '4Patriots Foldable Solar Panel 24V 100w' ) ); // SKU, Quantity, Description
		$order->addItem( new FFHItem( $productDataObj->productId, $quantity, '' ) );

		/*
			Parameters for API access.

			API Key:
				Your API Key.  (Provided by FFH)

			API Username:
				Your API User.  (Provided by FFH)

			API Mode:
				FFHApi::API_MODE_PILOT			- The test / development enviroment.
				FFHApi::API_MODE_PRODUCTION		- The LIVE Production system.  Orders here WILL ship to customers and incure charges.

		*/

		if(getenv("APP_ENV") !== "production") {
			//DEV API
			$apiMode = FFHApi::API_MODE_PILOT;
		} else {
			//PROD API
			$apiMode = FFHApi::API_MODE_PRODUCTION;
		}

		$api = new FFHApi( '!4PATRIOT_256910!', '4PADMIN', $apiMode );



		/*
			This will send the order to FFH.

			It returns FALSE if there is an error.  Call $api->getLastError() to get error details.
			On success, it will return the ROSS Order ID.
		*/

		$result = $api->createOrder( $order );

		// handle the results
		if ( $result === FALSE ) {
			$postSale->success = false;
			$postSale->ffhError = $api->getLastError();
		} else {
			$postSale->success = true;
			$postSale->ffhOrderNumber = $result;
		}

		return $postSale;
		
	}

	function setQuantity($quantity) {
		self::$quantity = $quantity;
	}
	function setOrderId($orderId) {
		self::$orderId = $orderId;
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
