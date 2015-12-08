<?php
/**
 * Order Processing utilities
 *
 *
 * @author Brian Gibbins
 * @copyright 2014
 * @see http://en.wikipedia.org/wiki/PHPDoc
 *
 * @version 1.1.0
 */
class Customer {

	static $appMessagesAry = array();
	static $appErrorsAry = array();

	public function __construct() {

	}

	/**
	 * Establish and persist customer data by
	 * examining the POST data of the current request.
	 *
	 * The data array is written to $_SESSION["customerDataArray"].
	 *
	 * @return bool True if session data updated, false if no POST data found
	 */
	function setCustomerFromPost() {

		// Require that customer data is provided by the
		// POST data before working with it.
		if (! $this->isCustomerPostProvided()) {
			return false;
		}

		include_once("State.php");
		include_once("Tax.php");

		$customerDataArray = array(

			'firstName' => $_POST['firstName'],
			'lastName' => $_POST['lastName'],
			'email' => $_POST['email'],
			'phone' => $_POST['phone'],

			'billingAddress1' => $_POST['billing-address'],
			'billingCity' => $_POST['billing-city'],
			'billingStateName' => $_POST['billing-state'],
			'billingState' => State::getAbbreviationByStateName($_POST['billing-state']),
			//TODO check zipcode length
			'billingZip' => $_POST['billing-zip'],
			'billingCountry' => strtoupper($_POST['billing-country']),

			//TODO handle credit card formatting
			'creditCardType' => $this->getCardTypeByNumber($_POST["creditCardNumber"]),
			'creditCardNumber' => $_POST["creditCardNumber"],

			//TODO move expiration checking to customer from limelight
			'expirationDate' => $_POST['card_expires_on_month'] . $_POST['card_expires_on_year'],
			'cvv' => $_POST['card-cvv2'],
		);

		//set isTest variable property
		$customerDataArray["isTest"] = $this->isTest($customerDataArray);

		//determine tax rate
		$customerDataArray["taxRate"] = Tax::getTaxByStateAbbreviation($customerDataArray["billingState"]);

		//set shipping address based on selection in post
		if(intval($_POST["sameas"]) === 1) {
			$shippingAddress = array (
				'shippingAddress1' => $_POST['shipping-address'],
				'shippingCity' => $_POST['shipping-city'],
				'shippingStateName' => $_POST['shipping-state'],
				'shippingState' => State::getAbbreviationByStateName($_POST['shipping-state']),
				//TODO check zipcode length
				'shippingZip' => $_POST['shipping-zip'],
				'shippingCountry' => $_POST['shipping-country'],
			);
		} else {
			$shippingAddress = array (
				'shippingAddress1' => $_POST['billing-address'],
				'shippingCity' => $_POST['billing-city'],
				'shippingStateName' => $_POST['billing-state'],
				'shippingState' => State::getAbbreviationByStateName($_POST['billing-state']),
				'shippingZip' => $_POST['billing-zip'],
				'shippingCountry' => $_POST['billing-country'],
			);
		}
		$customerDataArray = array_merge($customerDataArray, $shippingAddress);

		//check for POBs & set boolean values
		$customerDataArray["isBillingPOB"] = self::isPOB($customerDataArray["billingAddress1"]);
		$customerDataArray["isShippingPOB"] = self::isPOB($customerDataArray["shippingAddress1"]);


		if(!empty($_POST['other-billing-state'])) {
			$customerDataArray["billingStateName"] = $_POST['other-billing-state'];
		}

		if(!empty($_POST['other-shipping-state'])) {
			$customerDataArray["shippingStateName"] = $_POST['other-shipping-state'];
		}

		$_SESSION["customerDataArray"] = $customerDataArray;
		return true;
	}

	/**
	 * Examine the POST data of the current request
	 * and return whether it provides customer data.
	 *
	 * @see setCustomerFromPost()
	 *
	 * @return bool
	 */
	public function isCustomerPostProvided()
	{
		// Require an email to be provided in POST data.
		if (! isset($_POST["email"]) || empty($_POST["email"])) {
			return false;
		}

		// Require a last name to be provided in POST data.
		if (! isset($_POST["lastName"]) || empty($_POST["lastName"])) {
			return false;
		}

		// Return that POST data is provided if above checks passed.
		return true;
	}

	function getStoredCustomer() {
		$customerDataObj = new stdClass();
		if($_SESSION["customerDataArray"]) {
			$storedCustomer = $_SESSION["customerDataArray"];
			foreach($storedCustomer as $k => $v) {
				$customerDataObj->$k = $v;
			}
			return $customerDataObj;
		} else {
			return FALSE;
		}


	}

	function havePurchased($productId) {
		if(in_array($productId, $_SESSION["purchasedIds"])) {
			return true;
		} else {
			return false;
		}
	}

	function getCardTypeByNumber($cardNumber) {

		$firstDigit = intval(substr($cardNumber,0,1));
		switch($firstDigit) {
			case 3:
				$cardType = 'amex';
				break;
			case 5:
				$cardType = 'master';
				break;
			case 6:
				$cardType = 'discover';
				break;
			default:
				$cardType = 'visa';
				break;
		}
		return $cardType;
	}

	function isPOB($address) {

		$poRegex = "/^\s*((P(OST)?.?\s*(O(FF(ICE)?)?)?.?\s+(B(IN|OX))?)|B(IN|OX))/i";
		$isPOB = preg_match($poRegex, $address);
		if($isPOB === 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function isLower48() {
		$customerData = self::getStoredCustomer();
		if($customerData->shippingCountry !== "US") {
			return false;
		} else {
			if($customerData->billingState == "AK" || $customerData->billingState == "HI") {
				return false;
			} else {
				return true;
			}
		}
	}

	/**
	 * Examine the provided customer data array
	 * and return whether this customer should
	 * be considered a test order or not.
	 *
	 * @param $data
	 * @return bool
	 */
	private function isTest($data)
	{
		// Require a last name of exactly "test", not case sensitive.
		if (strtolower($data["lastName"]) !== "test") {
			return false;
		}

		// Require "@test.com" or "@4patriots.com" somewhere in the email address.
		if (stripos($data["email"], "@test.com") === false &&
			stripos($data["email"], "@4patriots.com") === false) {
			return false;
		}

		// Return true that the order is a test if the above checks passed.
		return true;
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
