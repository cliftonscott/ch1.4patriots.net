<?php
/**
 * State and Territory utilities
 * 
 * 
 * @author Brian Gibbins
 * @copyright 2014
 * @see http://en.wikipedia.org/wiki/PHPDoc
 */
class State {
	
	static $appMessagesAry = array();
	static $appErrorsAry = array();
	
	//TODO set static array or generate one instead of using big switch statements
	//TODO this was copy/pasted from previous functionality
	
	public function __construct() {
		
		//TODO initialize the state array
		
	}
	
	function getStateNameByAbbreviation($abbreviation) {
		
		//TODO use a static array of states and search for it instead
		//TODO reverse the array to get a reverse lookup
		//TODO fix the freakin' formatting
		  switch (strtoupper($abbreviation)) {
		    case "AL":
		        $state = 'Alabama';
		        break;
		    case "AK":
		        $state = 'Alaska';
		        break;
		    case "AZ":
		        $state = 'Arizona';
		        break;
		    case "AR":
		        $state = 'Arkansas';
		        break;
		    case "CA":
		        $state = 'California';
		        break;
		    case "CO":
		        $state = 'Colorado';
		        break;
		    case "CT":
		        $state = 'Connecticut';
		        break;
		    case "DE":
		        $state = 'Delaware';
		        break;
		    case "DC":
		        $state = 'DC';
		        break;
		    case "FL":
		        $state = 'Florida';
		        break;
		    case "GA":
		        $state = 'Georgia';
		        break;
		    case "HI":
		        $state = 'Hawaii';
		        break;
		    case "ID":
		        $state = 'Idaho';
		        break;
		    case "IL":
		        $state = 'Illinois';
		        break;
		    case "IN":
		        $state = 'Indiana';
		        break;
		    case "IA":
		        $state = 'Iowa';
		        break;
		    case "KS":
		        $state = 'Kansas';
		        break;
		    case "KY":
		        $state = 'Kentucky';
		        break;
		    case "LA":
		        $state = 'Louisiana';
		        break;
		    case "ME":
		        $state = 'Maine';
		        break;
		    case "MD":
		        $state = 'Maryland';
		        break;
		    case "MA":
		        $state = 'Massachusetts';
		        break;
		    case "MI":
		        $state = 'Michigan';
		        break;
		    case "MN":
		        $state = 'Minnesota';
		        break;
		    case "MS":
		        $state = 'Mississippi';
		        break;
		    case "MO":
		        $state = 'Missouri';
		        break;
		    case "MT":
		        $state = 'Montana';
		        break;
		    case "NE":
		        $state = 'Nebraska';
		        break;
		    case "NV":
		        $state = 'Nevada';
		        break;
		    case "NH":
		        $state = 'New Hampshire';
		        break;
		    case "NJ":
		        $state = 'New Jersey';
		        break;
		    case "NM":
		        $state = 'New Mexico';
		        break;
		    case "NY":
		        $state = 'New York';
		        break;
		    case "NC":
		        $state = 'North Carolina';
		        break;
		    case "ND":
		        $state = 'North Dakota';
		        break;
		    case "OH":
		        $state = 'Ohio';
		        break;
		    case "OK":
		        $state = 'Oklahoma';
		        break;
		    case "OR":
		        $state = 'Oregon';
		        break;
		    case "PA":
		        $state = 'Pennsylvania';
		        break;
		    case "RI":
		        $state = 'Rhode Island';
		        break;
		    case "SC":
		        $state = 'South Carolina';
		        break;
		    case "SD":
		        $state = 'South Dakota';
		        break;
		    case "TN":
		        $state = 'Tennessee';
		        break;
		    case "TX":
		        $state = 'Texas';
		        break;
		    case "UT":
		        $state = 'Utah';
		        break;
		    case "VT":
		        $state = 'Vermont';
		        break;
		    case "VA":
		        $state = 'Virginia';
		        break;
		    case "WA":
		        $state = 'Washington';
		        break;
		    case "WV":
		        $state = 'West Virginia';
		        break;
		    case "WI":
		        $state = 'Wisconsin';
		        break;
		    case "WY":
		        $state = 'Wyoming';
		        break;
		    case "AS":
		        $state = 'American Samoa';
		        break;
		    case "GU":
		        $state = 'Guam';
		        break;
		    case "MP":
		        $state = 'Northern Mariana Islands';
		        break;
		    case "PR":
		        $state = 'Puerto Rico';
		        break;
		    case "VI":
		        $state = 'Virgin Islands';
		        break;
		
		    case "AB":
		        $state = 'Alberta';
		        break;
		    case "BC":
		        $state = 'British Columbia';
		        break;
		    case "MB":
		        $state = 'Manitoba';
		        break;
		    case "NB":
		        $state = 'New Brunswick';
		        break;
		    case "NL":
		        $state = 'Newfoundland and Labrador';
		        break;
		    case "NT":
		        $state = 'Northwest Territories';
		        break;
		    case "NS":
		        $state = 'Nova Scotia';
		        break;
		    case "NU":
		        $state = 'Nunavut';
		        break;
		    case "ON":
		        $state = 'Ontario';
		        break;
		    case "PE":
		        $state = 'Prince Edward Island';
		        break;
		    case "QC":
		        $state = 'Quebec';
		        break;
		    case "SK":
		        $state = 'Saskatchewan';
		        break;
		    case "YT":
		        $state = 'Yukon';
		        break;
		    
		  default:
		        $state = "Unrecognized Abbreviation";
		        break;
		}		
		  
		  return $state;

	}
	
	function getAbbreviationByStateName($state) {
		
		//TODO use a static array of states and search for it instead
		//TODO reverse the array to get a reverse lookup
		//TODO fix the freakin' formatting
				
		switch (ucwords($state)) {
			case "Alabama":
			    $abbreviation = 'AL';
			    break;
			case "Alaska":
			    $abbreviation = 'AK';
			    break;
			case "Arizona":
			    $abbreviation = 'AZ';
			    break;
			case "Arkansas":
			    $abbreviation = 'AR';
			    break;
			case "California":
			    $abbreviation = 'CA';
			    break;
			case "Colorado":
			    $abbreviation = 'CO';
			    break;
			case "Connecticut":
			    $abbreviation = 'CT';
			    break;
			case "Delaware":
			    $abbreviation = 'DE';
			    break;
			case "Washington DC":
			    $abbreviation = 'DC';
			    break;
			case "Florida":
			    $abbreviation = 'FL';
			    break;
			case "Georgia":
			    $abbreviation = 'GA';
			    break;
			case "Hawaii":
			    $abbreviation = 'HI';
			    break;
			case "Idaho":
			    $abbreviation = 'ID';
			    break;
			case "Illinois":
			    $abbreviation = 'IL';
			    break;
			case "Indiana":
			    $abbreviation = 'IN';
			    break;
			case "Iowa":
			    $abbreviation = 'IA';
			    break;
			case "Kansas":
			    $abbreviation = 'KS';
			    break;
			case "Kentucky":
			    $abbreviation = 'KY';
			    break;
			case "Louisiana":
			    $abbreviation = 'LA';
			    break;
			case "Maine":
			    $abbreviation = 'ME';
			    break;
			case "Maryland":
			    $abbreviation = 'MD';
			    break;
			case "Massachusetts":
			    $abbreviation = 'MA';
			    break;
			case "Michigan":
			    $abbreviation = 'MI';
			    break;
			case "Minnesota":
			    $abbreviation = 'MN';
			    break;
			case "Mississippi":
			    $abbreviation = 'MS';
			    break;
			case "Missouri":
			    $abbreviation = 'MO';
			    break;
			case "Montana":
			    $abbreviation = 'MT';
			    break;
			case "Nebraska":
			    $abbreviation = 'NE';
			    break;
			case "Nevada":
			    $abbreviation = 'NV';
			    break;
			case "New Hampshire":
			    $abbreviation = 'NH';
			    break;
			case "New Jersey":
			    $abbreviation = 'NJ';
			    break;
			case "New Mexico":
			    $abbreviation = 'NM';
			    break;
			case "New York":
			    $abbreviation = 'NY';
			    break;
			case "North Carolina":
			    $abbreviation = 'NC';
			    break;
			case "North Dakota":
			    $abbreviation = 'ND';
			    break;
			case "Ohio":
			    $abbreviation = 'OH';
			    break;
			case "Oklahoma":
			    $abbreviation = 'OK';
			    break;
			case "Oregon":
			    $abbreviation = 'OR';
			    break;
			case "Pennsylvania":
			    $abbreviation = 'PA';
			    break;
			case "Rhode Island":
			    $abbreviation = 'RI';
			    break;
			case "South Carolina":
			    $abbreviation = 'SC';
			    break;
			case "South Dakota":
			    $abbreviation = 'SD';
			    break;
			case "Tennessee":
			    $abbreviation = 'TN';
			    break;
			case "Texas":
			    $abbreviation = 'TX';
			    break;
			case "Utah":
			    $abbreviation = 'UT';
			    break;
			case "Vermont":
			    $abbreviation = 'VT';
			    break;
			case "Virginia":
			    $abbreviation = 'VA';
			    break;
			case "Washington":
			    $abbreviation = 'WA';
			    break;
			case "West Virginia":
			    $abbreviation = 'WV';
			    break;
			case "Wisconsin":
			    $abbreviation = 'WI';
			    break;
			case "Wyoming":
			    $abbreviation = 'WY';
			    break;
			case "American Samoa":
			    $abbreviation = 'AS';
			    break;
			case "Guam":
			    $abbreviation = 'GU';
			    break;
			case "Northern Mariana Islands":
			    $abbreviation = 'MP';
			    break;
			case "Puerto Rico":
			    $abbreviation = 'PR';
			    break;
			case "Virgin Islands":
			    $abbreviation = 'VI';
			    break;
			
			case "Alberta":
			    $abbreviation = 'AB';
			    break;
			case "British Columbia":
			    $abbreviation = 'BC';
			    break;
			case "Manitoba":
			    $abbreviation = 'MB';
			    break;
			case "New Brunswick":
			    $abbreviation = 'NB';
			    break;
			case "Labrador":
				$abbreviation = 'NL';
				break;
			case "Newfoundland":
				$abbreviation = 'NL';
				break;
			case "Northwest Territories":
			    $abbreviation = 'NT';
			    break;
			case "Nova Scotia":
			    $abbreviation = 'NS';
			    break;
			case "Nunavut":
			    $abbreviation = 'NU';
			    break;
			case "Ontario":
			    $abbreviation = 'ON';
			    break;
			case "Prince Edward Island":
			    $abbreviation = 'PE';
			    break;
			case "Quebec":
			    $abbreviation = 'QC';
			    break;
			case "Saskatchewan":
			    $abbreviation = 'SK';
			    break;
			case "Yukon":
			    $abbreviation = 'YT';
			        break;
	
			default:
				$abbreviation = "??";
			break;
		}		  
		return $abbreviation;

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
