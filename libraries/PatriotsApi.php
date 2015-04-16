<?php

/**
 * Order Processing utilities
 *
 *
 * @author Brad Forbes
 * @copyright 2015
 * @see http://en.wikipedia.org/wiki/PHPDoc
 */
class PatriotsApi {

	static $appMessagesAry = array();
	static $appErrorsAry = array();

	static $orderId = null;
	static $customerId = null;

	const USERNAME = "";
	const PASSWORD = "";
	static $URLS = array(
		'dev' 			=> 'http://dev.api.4patriots.net/post',
		'stage' 		=> 'http://stage.api.4patriots.net/post',
		'production' 	=> 'https://api.4patriots.com/post'
	);
	static $APITokens = array(
		'dev' 			=> 'zTwf7rCxSkFLGf7X',
		'stage' 		=> 'S2tEScyt4tWRxhAf',
		'production' 	=> '6PRsVdNQFffJckVY'
	);

	public function __construct() {

	}

	function postSale($saleDataObj, $productDataObj, $customerDataObj) {

		$analytics = new Analytics();

		$postSale = new stdClass();
		$environment = $this->determineEnvironment();

		$params = array (
			"orderId" => self::$orderId,
			"customerId" => self::$customerId,
			"firstName" => $customerDataObj->firstName,
			"lastName" => $customerDataObj->lastName,
			"email" => $customerDataObj->email,
			"phone" => $customerDataObj->phone,
			"shippingAddress1" => $customerDataObj->shippingAddress1,
			"shippingCity" => $customerDataObj->shippingCity,
			"shippingState" => $customerDataObj->shippingState,
			"shippingCountry" => $customerDataObj->shippingCountry,
			"shippingZip" => $customerDataObj->shippingZip,
			"billingAddress1" => $customerDataObj->billingAddress1,
			"billingCity" => $customerDataObj->billingCity,
			"billingState" => $customerDataObj->billingState,
			"billingCountry" => $customerDataObj->billingCountry,
			"billingZip" => $customerDataObj->billingZip,
			"productId" => $productDataObj->productId,
			"mpsProductId" => $productDataObj->mpsId,
			"quantity" => $saleDataObj->quantity,
			"revenue" => $productDataObj->netRevenueEach * $saleDataObj->quantity,
			"shippingId" => $this->determineShippingId($customerDataObj, $productDataObj),
			"receivedBy" => "F4P", // TODO: UPDATE WHEN CROSSPORTING
			"adSourceTokens" => json_encode($analytics->getAdSourceRegistrar()->requestActiveTokens()),
			"apiToken" => self::$APITokens[$environment]
		);

		var_dump($params);

		// Forget the ad source tokens.
		// Ad source tracking should only include initial conversions and exclude OTOs.
		$analytics->getAdSourceRegistrar()->forgetAllActiveTokens();

		$queryString = http_build_query($params);

		//doCurl call
		$configObj = new stdClass();
		$configObj->url = self::$URLS[$environment] . "?" . $queryString;
		$configObj->fields = $params;

		include_once("Curl.php");
		$curl = new Curl();

		$postResults = $curl->doCurl($configObj);

		$resultsString = urldecode($postResults->results);
		$postSale->serverResponse = $resultsString;

		if($postResults->success === TRUE) {
			$postSale->success = TRUE;
		} else {
			$postSale->success = FALSE;
		}

		return $postSale;
	}

	function setOrderId($orderId) {
		self::$orderId = $orderId;
	}

	function setCustomerId($customerId) {
		self::$customerId = $customerId;
	}

	private function determineEnvironment() {
		$host = $_SERVER['HTTP_HOST'];
		if (strpos($host, 'dev.') === 0) {
			return 'dev';
		}
		else if (strpos($host, 'stage.') === 0) {
			return 'stage';
		}
		else {
			return 'production';
		}
	}

	private function determineShippingId($customerDataObj, $productDataObj) {
		if ($customerDataObj->billingCountry && ($customerDataObj->billingCountry == "CA" || $customerDataObj->billingCountry == "Canada")) {
			return $productDataObj->shippingIdInternational;
		} else {
			return $productDataObj->shippingIdDomestic;
		}
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
