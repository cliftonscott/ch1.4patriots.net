<?php

/**
 * Handles ad source visitor tracking by checking
 * each page request URL for conversion partner tokens,
 * persisting the tokens to the session as needed,
 * and accepting requests for active tokens by other libraries.
 *
 * This class belongs in Analytics and should always be instantiated with
 * it on every page request.
 *
 * Class ConversionRegistrar
 */
class ConversionRegistrar {

	/**
	 * The string to use as the session key when persisting active tokens.
	 */
	const SESSION_KEY = "conversionTokens";

	/**
	 * Instantiate this library class.
	 */
	public function __construct() {
		$this->initializeSessionData();
		$this->registerUrl();
	}

	/**
	 * Return all active tokens in a literal array.
	 * Structure: [conversionSourceId] => [tokenValue]
	 *
	 * Always returns an array, but the array may be empty.
	 *
	 * @return array
	 */
	public function requestActiveTokens() {
		return $_SESSION[self::SESSION_KEY];
	}

	/**
	 * Forget an active token if it exists.
	 * Can be passed an conversion source ID and/or a token value to check for.
	 *
	 * @param null $conversionSourceId
	 * @param null $tokenValue
	 */
	public function forgetActiveToken($conversionSourceId = null, $tokenValue = null) {
		$activeTokens = $_SESSION[self::SESSION_KEY];
		foreach ($activeTokens as $activeConversionSourceId => $activeTokenValue) {
			if ($conversionSourceId == $activeConversionSourceId || $tokenValue == $activeTokenValue) {
				unset($_SESSION[self::SESSION_KEY][$conversionSourceId]);
			}
		}
	}

	/**
	 * Forget all current active tokens.
	 */
	public function forgetAllActiveTokens() {
		unset($_SESSION[self::SESSION_KEY]);
	}

	/**
	 * Register any tokens in the current page request URL
	 * by examining each query property for matching partner token IDs.
	 */
	private function registerUrl() {
		$tokens = $this->inspectUrlForTokens();
		foreach ($tokens as $conversionSource => $tokenValue) {
			$this->registerToken($conversionSource, $tokenValue);
		}
		$this->handleHasOffersConcatenation();
	}

	/**
	 * Safely initialize our active tokens
	 * session data as a literal array so that
	 * key-value pairs can be added or inspected at any time.
	 */
	private function initializeSessionData() {
		if (!isset($_SESSION[self::SESSION_KEY])) {
			$_SESSION[self::SESSION_KEY] = array();
		}
	}

	/**
	 * Register a token as active in the session.
	 *
	 * @param $conversionSource
	 * @param $tokenValue
	 */
	private function registerToken($conversionSource, $tokenValue) {
		$_SESSION[self::SESSION_KEY][$conversionSource] = $tokenValue;
	}

	/**
	 * Inspect the parameters of the active page request URL
	 * for any active tokens and returns any matches.
	 *
	 * @return array
	 */
	private function inspectUrlForTokens() {
		$matchingTokens = array();
		foreach (ConversionSource::$TokenIds as $id => $tokens) {
			foreach ($tokens as $token) {
				if (isset($_GET[$token]) && $_GET[$token]) {;
					$matchingTokens[$id] = $_GET[$token];
				}
			}
		}
		return $matchingTokens;
	}

	/**
	 * Handle the concatenation of the offer ID and click ID into a single
	 * conversion token value by inspecting and manipulating the session data directly.
	 */
	private function handleHasOffersConcatenation()
	{
		if (isset($_SESSION[self::SESSION_KEY][ConversionSource::HAS_OFFERS]) === false) {
			return;
		}

		$value = $_SESSION[self::SESSION_KEY][ConversionSource::HAS_OFFERS];

		if (stripos($value, ":::") === false && isset($_GET["offer_id"])) {
			$_SESSION[self::SESSION_KEY][ConversionSource::HAS_OFFERS] = $_GET["offer_id"] . ":::" . $value;
		}
	}
}

/**
 * Enumerates all supported conversion sources and their configurations.
 *
 * Should always be used when referring to conversion sources.
 * Example use: if ($id == ConversionSource::DIVISION_D)
 *
 * Class ConversionSource
 */
class ConversionSource {
	const CPV			= 2; // Required to match 4Patriots API service IDs.
	const HAS_OFFERS	= 3;
	const DIVISION_D	= 4;
	const AD_SUPPLY		= 5;
	const SITE_SCOUT	= 6;
	const THRIVE		= 13;

	static $List = array(
		self::CPV,
		self::HAS_OFFERS,
		self::DIVISION_D,
		self::AD_SUPPLY,
		self::SITE_SCOUT,
		self::THRIVE
	);

	static $TokenIds = array(
		self::CPV				=> array("subid", "aff_sub2"),
		self::HAS_OFFERS		=> array("click_id"),
		self::DIVISION_D		=> array("zedo", "aff_sub4"),
		self::AD_SUPPLY			=> array("aff_sub4"),
		self::SITE_SCOUT		=> array("k", "aff_sub5"),
		self::THRIVE			=> array("trv")
	);
}