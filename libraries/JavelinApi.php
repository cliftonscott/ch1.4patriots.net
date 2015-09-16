<?php

include_once "Curl.php";

/**
 * A dedicated library class for retrieving and
 * working with Javelin data for the current visitor
 * and page view.
 *
 * The singleton pattern is used to ensure
 * that the class is instantiated only once per request
 * and therefore that only one API call is made per request.
 *
 * @version 1.1.0
 *
 * Class JavelinApi
 */
class JavelinApi {

	/**
	 * The HTTP GET key for specifying variation previewing.
	 */
	const PREVIEW_VARIATION_KEY = "jv";

	/**
	 * The HTTP GET key for specifying test previewing.
	 */
	const PREVIEW_TEST_KEY = "jt";

	/**
	 * The name of the web property that should communicate
	 * with the Javelin API.
	 *
	 * @var string
	 */
	static $webPropertyName = "F4P";

	/**
	 * The environment-specific API URLs to post
	 * requests to.
	 *
	 * @var array
	 */
	static $urls = array(
		'dev' 			=> 'http://brad01.4patriots.net/api/javelin/variation',
		'stage' 		=> 'http://stage.dash.4patriots.net/api/javelin/variation',
		'production' 	=> 'http://dashboard.4patriots.com/api/javelin/variation'
	);

	/**
	 * The environment-specific API tokens to
	 * include in all requests.
	 *
	 * @var array
	 */
	static $apiTokens = array(
		'dev' 			=> 'zTwf7rCxSkFLGf7X',
		'stage' 		=> 'S2tEScyt4tWRxhAf',
		'production' 	=> '6PRsVdNQFffJckVY'
	);

	/**
	 * The singleton instance of this library.
	 *
	 * @var JavelinApi
	 */
	private static $instance;

	/**
	 * The variations the current visitor is
	 * participating in.
	 *
	 * @var array|null
	 */
	private $variations;

	/**
	 * The Google Analytics-related data
	 * provided by the Javelin API.
	 *
	 * @var
	 */
	private $analytics;

	/**
	 * The click goals present on this page
	 * as reported by the Javelin API.
	 *
	 * @var stdClass|null
	 */
	private $clickGoals;

	/**
	 * Returns the singleton instance of this class.
	 *
	 * @return JavelinApi The singleton instance
	 */
	public static function getInstance()
	{
		if (null === static::$instance) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	/**
	 * Return whether the current visitor is
	 * actively participating in the provided variation.
	 *
	 * Example strings: "9-redheadline"
	 * 					"11-control"
	 *
	 * Example use:
	 * if (JV::in("1-control")) { echo "Participating in Control"; }
	 *
	 * @param $string
	 * @return bool
	 */
	public static function in($string)
	{
		// Load the singleton if required.
		$instance = self::getInstance();

		// Return true if the provided string is
		// included in the current visitor's variations.
		if (is_array($instance->getVariations()) &&
			in_array($string, $instance->getVariations())) {
			return true;
		}

		// Otherwise, return false.
		return false;
	}

	/**
	 * Get an array of the full variation strings
	 * that can be provided to a GA Data Layer push
	 * as custom dimension values.
	 *
	 * @return string|null
	 */
	public static function getGoogleAnalyticsData()
	{
		// Load the singleton if required.
		$instance = self::getInstance();

		// Attempt to decode the JSON data from the Javelin API.
		$data = $instance->getAnalytics();

		// Iterate over each variation the current visitor
		// is participating in, building a JS code string that
		// can be printed into the GA data layer push call.
		$dimension = 1;
		$string = "";
		foreach ($data as $variation) {
			$string .= "'jv$dimension': '$variation',";
			$dimension++;
		}

		// Return the constructed JS code string.
		return $string;
	}

	/**
	 * Initialize Javelin for this page request
	 * by handling previewing and API requests.
	 *
	 * (Non-public to enforce singleton instantiation.)
	 */
	private function __construct() {
		if ($this->decideIfPreview()) {
			$this->enablePreview();
		} else {
			$this->send();
		}
	}

	/**
	 * Get the variations collection that
	 * the visitor is participating in.
	 *
	 * @return array|null
	 */
	public function getVariations()
	{
		return $this->variations;
	}

	/**
	 * Get the Google Analytics-related data
	 * provided by the Javelin API.
	 *
	 * @return mixed
	 */
	public function getAnalytics()
	{
		return $this->analytics;
	}

	/**
	 * Get the click goals present on this page
	 * as reported by the Javelin API.
	 *
	 * @return null|stdClass
	 */
	public function getClickGoals()
	{
		return $this->clickGoals;
	}

	/**
	 * Send and handle a request to the Javelin API.
	 *
	 * The request is multi-functional, providing the current page view data
	 * to Javelin in order to track any possible conversions while also
	 * returning a possible variation that this visitor should participate in
	 * in the scope of this specific page view.
	 */
	private function send() {

		// Build our request data.
		$parameters = array (
			"sessionId" 		=> session_id(),
			"requestUri"		=> $_SERVER["REQUEST_URI"],
			"website"			=> self::$webPropertyName,
			"environment"		=> getenv("APP_ENV"),
			"apiToken" 			=> self::$apiTokens[getenv("APP_ENV")]
		);

		// Initialize and configure the Curl request.
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => self::$urls[getenv("APP_ENV")],
			CURLOPT_POST => 1,
			CURLOPT_CONNECTTIMEOUT => 2,
			CURLOPT_TIMEOUT => 3,
			CURLOPT_POSTFIELDS => $parameters
		));

		// Execute and close the Curl request.
		$resp = curl_exec($curl);
		curl_close($curl);

		// Decode the JSON response.
		$json = json_decode($resp, true);

		// Set our Javelin constants by examining the response data.
		if (is_array($json) && isset($json["success"]) && $json["success"] == "1") {
			$this->variations = $this->readCollectionData($json["variation"]);
			$this->analytics = $this->readCollectionData($json["ga"]);
			$this->clickGoals = json_encode($json["clickGoals"]);
		}
	}

	/**
	 * Attempt to read a collection data string provided
	 * by the Javelin API.
	 *
	 * Multiple cases are supported as the API data format
	 * migrates from CSV to JSON.
	 *
	 * @param $string
	 * @return array|mixed|null
	 */
	private function readCollectionData($string)
	{
		// Handle null or empty string cases.
		if (!$string || $string == "null") {
			return null;
		}

		// Attempt to read the data as JSON first.
		if ($json = json_decode($string, true)) {
			return $json;
		}

		// Attempt to read the data as CSV.
		if (stripos($string, ",") !== false) {
			return explode(",", $string);
		}

		// Wrap the string in an array order to allow
		// single-value CSV strings that may not have a comma
		// but still be valid single-entry data collections.
		return array($string);
	}

	/**
	 * Examine the HTTP GET data and determine if
	 * this request should be considered a preview.
	 *
	 * @return bool
	 */
	private function decideIfPreview()
	{
		if (isset($_GET[self::PREVIEW_VARIATION_KEY]) ||
			isset($_GET[self::PREVIEW_TEST_KEY])) {
			return true;
		}

		return false;
	}

	/**
	 * Enable the current page to be previewed as the
	 * provided variation and/or test, if specified in the URI.
	 */
	private function enablePreview()
	{
		if (isset($_GET[self::PREVIEW_VARIATION_KEY])) {
			$this->variations = array($_GET[self::PREVIEW_VARIATION_KEY]);
		}

		$this->analytics = null;
		$this->clickGoals = null;
	}
}

/**
 * A shorthand class to support static functions
 * for working with current Javelin participation data
 * for the current visitor.
 *
 * @version 1.1.0
 *
 * Class JV
 */
class JV {

	/**
	 * @see JavelinApi::getInstance()
	 *
	 * @return JavelinApi
	 */
	static function load()
	{
		return JavelinApi::getInstance();
	}

	/**
	 * @see JavelinApi::in()
	 *
	 * @param $string
	 * @return bool
	 */
	static function in($string)
	{
		return JavelinApi::in($string);
	}

	/**
	 * @see JavelinApi::getGoogleAnalyticsData()
	 *
	 * @return string|null
	 */
	static function getGoogleAnalyticsData()
	{
		return JavelinApi::getGoogleAnalyticsData();
	}
}
