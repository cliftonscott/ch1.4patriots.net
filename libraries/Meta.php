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
	
	const PAGE_TITLE = "Food4Patriots - Pre-Packaged Kits of 25-Year Storage Survival Food";
	const PAGE_DESCRIPTION = "Food4Patriots offers pre-packaged kits of high-quality survival food rated to last for 25 years, packed in secure, lightweight, waterproof storage totes. Food4Patriots meals are non-GMO, take less than 15 minutes to prepare and taste delicious.";
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
			case "/checkout/index.php":
				$title = self::PAGE_TITLE . " | Checkout";
				break;
			case "/checkout/thankyou.php":
				$title = self::PAGE_TITLE . " | Thank You";
				break;
			case "/contact.php":
				$title = self::PAGE_TITLE . " | Contact Us";
				break;
			case "/disclaimer.php":
				$title = self::PAGE_TITLE . " | Disclaimer";
				break;
			case "/faq.php":
				$title = self::PAGE_TITLE . " | Frequently Asked Questions";
				break;
			case "/newsroom.php":
				$title = self::PAGE_TITLE . " | Newsroom";
				break;
			case "/privacy.php":
				$title = self::PAGE_TITLE . " | Privacy Policy";
				break;
			case "/returns.php":
				$title = self::PAGE_TITLE . " | Returns";
				break;
			case "/support.php":
				$title = self::PAGE_TITLE . " | General Support";
				break;
			case "/support-technical.php":
				$title = self::PAGE_TITLE . " | Technical Support";
				break;
			case "/terms.php":
				$title = self::PAGE_TITLE . " | Terms & Conditions";
				break;
			case "/testimonials.php":
				$title = self::PAGE_TITLE . " | Testimonials";
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
			case "/example.php":
				$description = "A new page description.";
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

 
 
