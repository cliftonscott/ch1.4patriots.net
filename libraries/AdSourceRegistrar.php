<?php

/**
 * Handles ad source visitor tracking by checking
 * each page request URL for ad source partner tokens,
 * persisting the tokens to the session as needed,
 * and accepting requests for active tokens by other libraries.
 *
 * This class belongs in Analytics and should always be instantiated with
 * it on every page request.
 *
 * Class AdSourceRegistrar
 */
class AdSourceRegistrar {

	/**
	 * The string to use as the session key when persisting active tokens.
	 */
	const SESSION_KEY = "adSourceTokens";

	/**
	 * Instantiate this library class.
	 */
	public function __construct() {
		$this->initializeSessionData();
		$this->registerUrl();
	}

	/**
	 * Return all active tokens in a literal array.
	 * Structure: [adSourceId] => [tokenValue]
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
	 * Can be passed an Ad Source ID and/or a Token Value to check for.
	 *
	 * @param null $adSourceId
	 * @param null $tokenValue
	 */
	public function forgetActiveToken($adSourceId = null, $tokenValue = null) {
		$activeTokens = $_SESSION[self::SESSION_KEY];
		foreach ($activeTokens as $activeAdSourceId => $activeTokenValue) {
			if ($adSourceId == $activeAdSourceId || $tokenValue == $activeTokenValue) {
				unset($_SESSION[self::SESSION_KEY][$adSourceId]);
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
		foreach ($tokens as $adSource => $tokenValue) {
			$this->registerToken($adSource, $tokenValue);
		}
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
	 * @param $adSource
	 * @param $tokenValue
	 */
	private function registerToken($adSource, $tokenValue) {
		$_SESSION[self::SESSION_KEY][$adSource] = $tokenValue;
	}

	/**
	 * Inspect the parameters of the active page request URL
	 * for any active tokens and returns any matches.
	 *
	 * @return array
	 */
	private function inspectUrlForTokens() {
		$matchingTokens = array();
		foreach (AdSource::$TokenIds as $id => $tokens) {
			foreach ($tokens as $token) {
				if (isset($_GET[$token]) && $_GET[$token]) {;
					$matchingTokens[$id] = $_GET[$token];
				}
			}
		}
		return $matchingTokens;
	}
}

/**
 * Enumerates all supported Ad Sources and their configurations.
 *
 * Should always be used when referring to Ad Sources.
 * Example use: if ($id == AdSource::DIVISION_D)
 *
 * Class AdSource
 */
class AdSource {
	const DIVISION_D	= 4;	// Required to match 4Patriots API service IDs.
	const AD_SUPPLY		= 5;
	const SITE_SCOUT	= 6;

	static $List = array(
		self::DIVISION_D,
		self::AD_SUPPLY,
		self::SITE_SCOUT
	);

	static $TokenIds = array(
		self::DIVISION_D		=> array("zedo", "aff_sub4"),
		self::AD_SUPPLY			=> array("aff_sub4"),
		self::SITE_SCOUT		=> array("k", "aff_sub5")
	);
}