<?php
/**
 * Meta template helper
 * @see https://wiki4patriots.atlassian.net/wiki/display/DEV/Template+Helpers
 * 
 * 
 * @author Brian Gibbins
 * @copyright 2014
 * @see http://en.wikipedia.org/wiki/PHPDoc
 * @version 2014.07
 */
class Meta {
	
	static $applicationMessages = array();
	static $applicationErrors = array();
	
	const PAGE_TITLE = "Food4Patriots";
	const PAGE_DESCRIPTION = "Food4Patriots is delicious, nutritious survival food that is easy to prepare and has a shelf life of 25 years.";
	const PAGE_KEYWORDS = "";
	const PAGE_ROBOTS = "index, follow";

	public function __construct() {
		
		$meta = new stdClass();
		
		$currentUrl = $this->getCurrentUrl();
		$this->url = $currentUrl;
		
		$this->title = $this->getTitle($this->url);
		$this->description = $this->getDescription($this->url);
		
		$this->robots = $this->getRobots($this->url);
		$this->keywords = $this->getKeywords($this->url);

		
		return $meta;
		
	}
	
	function getTitle($url) {
		
		switch ($url) {
			case "/index.php":
				$title = self::PAGE_TITLE . " – 25-Year Storage Survival Food Kits";
				break;
			case "/returns.php":
				$title = self::PAGE_TITLE . " Returns – How to Return Your Order";
				break;
			case "/checkout/index.php":
			case "/checkout/index-a.php":
			case "/checkout/order.php":
			case "/checkout/oto/f4p-1year-kit.php":
			case "/checkout/oto/f4p-1year-kit-a.php":
			case "/checkout/oto/f4p-1year-kit-payments.php":
			case "/checkout/oto/f4p-3month-kit-discount.php":
			case "/checkout/oto/f4p-4week-kit-discount-a.php":
			case "/checkout/oto/f4p-4week-kit-discount-b.php":
			case "/checkout/oto/f4p-choose-3m-4w-kit.php":
			case "/checkout/oto/f4p-choose-3m-4w-kit-discount.php":
				$title = self::PAGE_TITLE . " Purchase – Buy High Quality Survival Food";
				break;
			case "/contact.php":
				$title = self::PAGE_TITLE . " Contact – Orders and Customer Service";
				break;
			case "/faq.php":
				$title = self::PAGE_TITLE . " FAQs – Answers to most asked questions";
				break;
			case "/testimonials.php":
				$title = self::PAGE_TITLE . " Testimonials – Hear From Happy Customers";
				break;
			case "/newsroom.php":
				$title = self::PAGE_TITLE . " Newsroom – Latest Survival Food News ";
				break;
			case "/privacy.php":
				$title = self::PAGE_TITLE . " Privacy Policy ";
				break;
			case "/terms.php":
				$title = self::PAGE_TITLE . " Terms & Conditions";
				break;
			case "/disclaimer.php":
				$title = self::PAGE_TITLE . " Disclaimer – Legal Information";
				break;
			case "/checkout/thankyou.php":
				$title = self::PAGE_TITLE . " Thank You";
				break;
												
			default:
				$title = self::PAGE_TITLE;
				break;
		}
		
		$results = "\n<title>" . $title . "</title>";
		
		return $results;
		
	}
	
	function getDescription($url) {
		
		switch ($url) {
			case "/returns.php":
				$description = "Enjoy hassle-free returns with Food4Patriots. Your purchase is fully protected by a 100% money-back return policy.";
				break;
			case "/checkout/index.php":
			case "/checkout/index-a.php":
			case "/checkout/order.php":
			case "/checkout/oto/f4p-1year-kit.php":
			case "/checkout/oto/f4p-1year-kit-a.php":
			case "/checkout/oto/f4p-1year-kit-payments.php":
			case "/checkout/oto/f4p-3month-kit-discount.php":
			case "/checkout/oto/f4p-4week-kit-discount-a.php":
			case "/checkout/oto/f4p-4week-kit-discount-b.php":
			case "/checkout/oto/f4p-choose-3m-4w-kit.php":
			case "/checkout/oto/f4p-choose-3m-4w-kit-discount.php":
				$description = "Get your pre-packaged survival food kits now before they’re gone. Secure your own emergency food stockpile today!";
				break;
			case "/contact.php":
				$description = "Have a question for us? Contact Food4Patriots now for friendly, prompt service regarding our tasty survival food.";
				break;
			case "/faq.php":
				$description = "See answers to the questions we regularly get from loyal Food4Patriots customers about our survival food kits.";
				break;
			case "/testimonials.php":
				$description = "Listen to real, unedited reviews of satisfied people who have purchased survival food from Food4Patriots.";
				break;
			case "/newsroom.php":
				$description = "Get the latest news about Food4Patriots high-quality survival food and information about emergency preparedness.";
				break;
			case "/privacy.php":
				$description = "Learn how we collect and use your information on this website. By using this site, you agree to its terms of use.";
				break;
			case "/terms.php":
				$description = "Intellectual property rights, disclaimers, and other legal policies of Food4Patriots, its brand, and website.";
				break;
			case "/disclaimer.php":
				$description = "Understand the full disclaimers you agree to herein by using the Food4Patriots website.";
				break;

			default:
				$description = self::PAGE_DESCRIPTION;
				break;
		}
		
		$results = "\n<meta name='description' content='" . $description . "'>";
		
		return $results;
	}
	
	function getKeywords($url) {
		
		switch ($url) {
			case "/example.php":
				$keywords = "A new page keywords group.";
				break;
			default:
				$keywords = self::PAGE_KEYWORDS;
				break;
		}
		
		$results = "\n<meta name='keywords' content='" . $keywords . "'>";
		
		return $results;
	}
	
	function getRobots($url) {
		
		switch ($url) {
			case "/example.php":
				$robots = "A new page robot command.";
				break;
			default:
				$robots = self::PAGE_ROBOTS;
				break;
		}
		
		$results = "\n<meta name='robots' content='" . $robots . "'>";
		
		return $results;
	}
	

	function setUrl($url) {
		
		$results = new stdClass();
		
		if(gettype($url) === "string") {
			if($this->url = $url) {
				$this->setMessage("Successfully set meta->url.");
				//TODO error trap this better
				$this->title = $this->getTitle($url);
				$this->description = $this->getDescription($url);
				$results->success = true;
			} else {
				$this->setError("Unable to manually set meta->url.");
				$results->success = false;
			}
		} else {
			$this->setError("Unable to manually set meta->url because the value was not a string.");
			$results->success = false;
		}
		
	}
	
	function setTitle($title) {
		
		$results = new stdClass();
		
		if(gettype($title) === "string") {
			$title = "<title>" . $title . "</title>\n";
			if($this->title = $title) {
				$this->setMessage("Successfully set meta->title.");
				$results->success = true;
			} else {
				$this->setError("Unable to manually set meta->title.");
				$results->success = false;
			}
		} else {
			$this->setError("Unable to manually set meta->title because the value was not a string.");
			$results->success = false;
		}
		
	}
	
	function setDescription($description) {
		
		$results = new stdClass();
		
		if(gettype($description) === "string") {
			$description = "<meta name='description' content='" . $description . "'>\n";
			if($this->$description = $description) {
				$this->setMessage("Successfully set meta->description.");
				$results->success = true;
			} else {
				$this->setError("Unable to manually set meta->description.");
				$results->success = false;
			}
		} else {
			$this->setError("Unable to manually set meta->description because the value was not a string.");
			$results->success = false;
		}
	}
	
	function getCurrentUrl() {
		
		if($currentUrl = $_SERVER["SCRIPT_NAME"]) {
			return $currentUrl;
		} else {
			return false;
		}
		
	}
	
//TODO additional error checking
//ERROR AND MESSAGE HANDLING
	function setMessage($msg) {
		$message = array("timestamp" => microtime(true), "message" => $msg);
		$this->appMessagesAry[] = $message;
	}
	function getMessages() {
		return self::$appMessagesAry;
	}
	function setError($err) {
		$error = array("timestamp" => microtime(true), "error" => $err);
		$this->appErrorsAry[] = $error;
	}
	function getErrors() {
		return self::$appErrorsAry;
	}
	
}//end of class

/*
 * 
 */

 
 
