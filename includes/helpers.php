<?php

/**
 * Return a native URI path with a controlled, injected query string
 * for the provided native path.
 *
 * @param $path The URL path to write for. Can include query string parameters.
 * @param array|null $extra Optional literal array to append to query string.
 * @return string The full URI path
 */
function url($path, $extra = null) {

	// Extract any query string data appended to
	// the provided URL path.
	$start = stripos($path, '?');
	if ($start !== false) {
		parse_str(substr($path, $start + 1), $query);
		$path = substr($path, 0, $start);
	} else {
		$query = array();
	}

	// Append Analytics query data to the query string
	// if available.
	$analytics = Analytics::$queryData;
	if ($analytics) {
		$query = array_merge($analytics, $query);
	}

	// Append extra query data to the query string
	// if provided to the helper.
	if ($extra) {
		$query = array_merge($extra, $query);
	}

	// Return the native URI path.
	return $path . '?' . http_build_query($query);
}