<?php
/**
 * Order Processing utilities
 * 
 * 
 * @author Brian Gibbins
 * @copyright 2014
 * @see http://en.wikipedia.org/wiki/PHPDoc
 */
class Customer {
	
	static $appMessagesAry = array();
	static $appErrorsAry = array();
	
	public function __construct() {
		
	}
	
	function setCustomerFromPost() {
		
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
		
		if(!empty($_POST['other-billing-state'])) {
			$customerDataArray["billingStateName"] = $_POST['other-billing-state'];
		}
		
		if(!empty($_POST['other-shipping-state'])) {
			$customerDataArray["shippingStateName"] = $_POST['other-shipping-state'];
		}
		
		$_SESSION["customerDataArray"] = $customerDataArray;
		
		//TODO return w/ dataset
		
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
