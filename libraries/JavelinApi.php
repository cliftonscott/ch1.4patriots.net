<?php

include_once "Curl.php";
include_once "MobileDetect.php";

/**
 * A dedicated library class for retrieving and
 * working with Javelin data for the current visitor
 * and page view.
 *
 * The singleton pattern is used to ensure
 * that the class is instantiated only once per request
 * and therefore that only one API call is made per request.
 *
 * @version 1.4.1
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
	static $webPropertyName;

	/**
	 * The session key where the array collection of
	 * stored Javelin data is placed.
	 *
	 * @var string
	 */
	static $sessionKey = "Javelin";

	/**
	 * The loaded dependency used to determine the
	 * device and browser information of the visitor.
	 *
	 * @var Mobile_Detect
	 */
	private $mobileDetect;

	/**
	 * The environment-specific API URLs to post
	 * requests to.
	 *
	 * @var array
	 */
	static $urls = array(
		'dev' 			=> 'http://bf.dash01.4patriots.net/api/javelin/variation',
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
	 * The unique ID for the current visitor
	 * as reported by the Javelin API.
	 *
	 * @var int|null
	 */
	private $visitorId;

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
	 * The array of page URLs provided by the Javelin API
	 * when requested that should require a fresh API call.
	 *
	 * @var array|null
	 */
	private $whiteList;

	/**
	 * Whether the current visitor is previewing
	 * a variation at the moment.
	 *
	 * @var bool
	 */
	private $isPreview;

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
	 * Get a comma-separated flat list of the variation
	 * titles that the current visitor is participating in.
	 *
	 * Example: "W4P-PRE-35:V1,W4P-PRE-36:Control"
	 *
	 * @return string|null
	 */
	public static function getParticipationList()
	{
		// Load the singleton if required.
		$instance = self::getInstance();

		// Attempt to decode the JSON data from the Javelin API.
		$data = $instance->getAnalytics();

		// Return empty content if no participation data is available for
		// the current visitor.
		if (! is_array($data)) {
			return "";
		}

		// Return a comma-separated list of the variation names
		// the current visitor is participatiing in.
		return implode(",", $data);
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

		// Return empty content if no GA data is available for
		// the current visitor.
		if (! is_array($data)) {
			return "";
		}

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
	 * Get a string of JS that can be printed directly
	 * into the HTML document to load the click goal service.
	 *
	 * @return string
	 */
	public static function establishClickGoalService()
	{
		// Load the singleton if required.
		$instance = self::getInstance();

		// Do not establish JS if no click goals are active.
		if (! $instance->clickGoals) {
			return "";
		}

		// Concatenate a string of JS while inserting the required
		// parameter data. Look away.
		$string = "<script src='/js/JavelinClickService.js'></script>";
		$string .= "<script>";
		$string .= 'var javelinClickService = new JavelinClickService(' . $instance->getClickGoals() . ', ' . $instance->getVisitorId() . ')';
		$string .= "</script>";

		// Return the JS to be printed.
		return $string;
	}

	/**
	 * Initialize Javelin for this page request
	 * by handling previewing and API requests.
	 *
	 * (Non-public to enforce singleton instantiation.)
	 */
	private function __construct() {

		// Establish the name of the current web property.
		self::$webPropertyName = getenv("APP_NAME");

		// Load library dependencies.
		$this->mobileDetect = new Mobile_Detect();

		// Handle preview-splitting immediately.
		if ($this->decideIfPreview()) {
			$this->enablePreview();
		} else {

			// Load any persisted Javelin state.
			$this->loadSession();

			// Enforce any loaded white list.
			if ($this->enforceWhiteList()) {
				return;
			}

			// Only send an API request if the user
			// is not previewing a variation and the
			// white list is not being enforced.
			$this->send();
		}
	}

	/**
	 * Get the unique ID of the current visitor.
	 *
	 * @return array|null
	 */
	public function getVisitorId()
	{
		return $this->visitorId;
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
			"device"			=> $this->resolveDevice(),
			"browser"			=> $this->resolveBrowser(),
			"website"			=> self::$webPropertyName,
			"environment"		=> getenv("APP_ENV"),
			"apiToken" 			=> self::$apiTokens[getenv("APP_ENV")]
		);

		// Request a white list be provided if one has not
		// been loaded yet.
		if (!isset($this->whitelist) || ! $this->whiteList) {
			$parameters["provideWhiteList"] = true;
		}

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
			$this->visitorId = $json["visitorId"];
			$this->variations = $this->readCollectionData($json["variation"]);
			$this->analytics = $this->readCollectionData($json["ga"]);
			$this->clickGoals = $json["clickGoals"];
			$this->whiteList = json_decode($json["whiteList"]);
			$this->isPreview = false;
			$this->saveSession();
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

		if ($this->examineSessionForPreview()) {
			return true;
		}

		return false;
	}

	/**
	 * Examine the current session data and determine
	 * if this request can be considered a preview.
	 *
	 * @return bool
	 */
	private function examineSessionForPreview()
	{
		if (! isset($_SESSION[self::$sessionKey])) {
			return false;
		}

		if (! isset($_SESSION[self::$sessionKey]["isPreview"])) {
			return false;
		}

		return $_SESSION[self::$sessionKey]["isPreview"];
	}

	/**
	 * Enable the current page to be previewed as the
	 * provided variation and/or test, if specified in the URI.
	 */
	private function enablePreview()
	{
		// Load the current session data to bring in
		// the persisted preview variations if available.
		$this->loadSession();

		// Override the session preview variations if
		// they are provided in the GET data.
		if (isset($_GET[self::PREVIEW_VARIATION_KEY])) {
			$this->variations = array($_GET[self::PREVIEW_VARIATION_KEY]);
		}

		$this->analytics = null;
		$this->clickGoals = null;
		$this->whiteList = null;
		$this->isPreview = true;

		$this->saveSession();
	}

	/**
	 * Determine as accurately as possible the browser
	 * name and version of the user.
	 *
	 * We intentionally avoid PHP's get_browser() for memory
	 * and configuration concerns.
	 *
	 * Code adapted from http://php.net/manual/en/function.get-browser.php#101125
	 *
	 * @return string
	 */
	private function resolveBrowser()
	{
		// Bring in the user data agent.
		$userAgent = $_SERVER['HTTP_USER_AGENT'];
		$name = null;

		// Determine the vendor name by examining the
		// user agent data directly.
		if (preg_match('/MSIE/i', $userAgent) && !preg_match('/Opera/i', $userAgent)) {
			$name = "MSIE";
		} elseif (preg_match('/Trident/i', $userAgent) && !preg_match('/Opera/i', $userAgent)) {
			$name = "MSIE";
		} elseif (preg_match('/Firefox/i', $userAgent)) {
			$name = "Firefox";
		} elseif (preg_match('/Chrome/i', $userAgent)) {
			$name = "Chrome";
		} elseif (preg_match('/Safari/i', $userAgent)) {
			$name = "Safari";
		} elseif (preg_match('/Opera/i', $userAgent)) {
			$name = "Opera";
		} elseif (preg_match('/Netscape/i', $userAgent)) {
			$name = "Netscape";
		} elseif (preg_match('/Opera Mini/i', $userAgent)) {
			$name = "Opera_Mini";
		} elseif (preg_match('/Silk/i', $userAgent)) {
			$name = "Amazon_Silk";
		} elseif (preg_match('/BlackBerry/i', $userAgent)) {
			$name = "BlackBerry";
		}

		// Evaluate for matches of the declared version
		// in the user agent data.
		$known = array('Version', $name, 'other');
		$pattern = '#(?<browser>' . join('|', $known) .
			')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
		if (!preg_match_all($pattern, $userAgent, $matches)) {
		}

		// Decide the version by examining the matches from above.
		$i = count($matches['browser']);
		if ($i != 1) {
			if (strripos($userAgent, "Version") < strripos($userAgent, $name)) {
				$version = $matches['version'][0];
			} else {
				$version = $matches['version'][1];
			}
		} else {
			$version = $matches['version'][0];
		}

		// Handle cases in which the version of the browser
		// could not be resolved.
		if ($version == null || $version == "") {
			$version = "Unknown";
		}

		return $name . "::" . $version;
	}

	/**
	 * Resolve and return the device information for
	 * the current visitor.
	 *
	 * Examples:
	 * 		"mobile::iPhone"
	 * 		"tablet::Kindle"
	 * 		"desktop::Desktop"
	 *
	 * @return string
	 */
	private function resolveDevice()
	{
		$type = $this->resolveDeviceType();
		$os = $this->resolveDeviceOperatingSystem($type);
		$name = $this->resolveDeviceName($type);
		return $type . "::" . $os . "::" . $name;
	}

	/**
	 * Resolve and return the type of device for
	 * the current visitor.
	 *
	 * @return string
	 */
	private function resolveDeviceType()
	{
		// Note: MobileDetect library considers tablets as "mobile",
		// so in this context we must make sure to check for tablet first.
		if ($this->mobileDetect->isTablet()) {
			return "tablet";
		}
		if ($this->mobileDetect->isMobile()) {
			return "mobile";
		}
		return "desktop";
	}

	/**
	 * Resolve and return the operating system of the device
	 * for the current visitor.
	 *
	 * Desktop operating systems are not supported at this time
	 * and will always return "Desktop".
	 *
	 * @param $deviceType
	 * @return int|string
	 */
	private function resolveDeviceOperatingSystem($deviceType)
	{
		if ($deviceType === "desktop") {
			return "Desktop";
		}

		foreach ($this->mobileDetect->getOperatingSystems() as $name => $rule) {
			if ($this->mobileDetect->match($rule)) {
				return $name;
			}
		}

		return "Unknown";
	}

	/**
	 * Resolve and return the name of the device for
	 * the current visitor.
	 *
	 * @param $deviceType
	 * @return int|string
	 */
	private function resolveDeviceName($deviceType)
	{
		if ($deviceType === 'desktop') {
			return 'Desktop';
		}

		$deviceRules = array(
			'mobile'		=> $this->mobileDetect->getPhoneDevices(),
			'tablet'		=> $this->mobileDetect->getTabletDevices()
		);

		foreach ($deviceRules[$deviceType] as $name => $rule) {
			if ($this->mobileDetect->match($rule)) {
				return $name;
			}
		}

		return "Unknown";
	}

	/**
	 * Save the current state of Javelin for the current visitor
	 * in the session data.
	 */
	private function saveSession()
	{
		$_SESSION[self::$sessionKey] = array(
			"visitorId"			=> $this->visitorId,
			"variations"		=> json_encode($this->variations),
			"analytics"			=> json_encode($this->analytics),
			"whiteList"			=> json_encode($this->whiteList),
			"isPreview"			=> $this->isPreview
		);
	}

	/**
	 * Load the persisted state of Javelin for the current visitor
	 * from the session data.
	 *
	 * @return bool
	 */
	private function loadSession()
	{
		if (! isset($_SESSION[self::$sessionKey])) {
			return false;
		}

		$data = $_SESSION[self::$sessionKey];

		$this->visitorId = $data["visitorId"];
		$this->variations = json_decode($data["variations"], true);
		$this->analytics = json_decode($data["analytics"], true);
		$this->whiteList = json_decode(stripslashes(stripslashes($data["whiteList"])), true);
		$this->isPreview = $data["isPreview"];

		return true;
	}

	/**
	 * Enforce the persisted white list if available.
	 *
	 * @return bool True to enforce, false to not enforce
	 */
	private function enforceWhiteList()
	{
		if (! $this->whiteList ||
			! is_array($this->whiteList)) {
			return false;
		}

		$uri = $_SERVER["REQUEST_URI"];
		foreach ($this->whiteList as $whiteListed) {
			if (stripos($uri, $whiteListed) !== false) {
				return false;
			}
		}

		return true;
	}
}

/**
 * A shorthand class to support static functions
 * for working with current Javelin participation data
 * for the current visitor.
 *
 * @version 1.4.1
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
	 * @see JavelinApi::getParticipationList()
	 *
	 * @return string|null
	 */
	static function getParticipationList()
	{
		return JavelinApi::getParticipationList();
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

	/**
	 * @see JavelinApi::establishClickGoalService()
	 *
	 * @return string|null
	 */
	static function establishClickGoalService()
	{
		echo JavelinApi::establishClickGoalService();
	}
}
