<?php


class AssetManager {

	const JS_PRODUCTION_FILE = "scripts";

	private $cssBaseUrl;

	private $jsBaseUrl;

	private $page;

	private $production;

	private $version = "v1-6";

	private $css = "";

	private $js = "";
	
	public function __construct($page)
	{
		$this->page = $page;
		$this->production = $this->resolveEnvironment();
		$this->resolveBaseUrls();
		$this->serveCSS();
		$this->serveJS();
	}

	public function css()
	{
		echo $this->css;
	}

	public function js()
	{
		echo $this->js;
	}

	public function serveCSS()
	{
		if ($this->isProduction()) {
			$this->serveStylesheet("styles-" . $this->page);

		} else {
			foreach (scandir($this->cssBaseUrl) as $file) {
				if (stripos($file, ".css") !== false) {
					$this->serveStylesheet($file);
				}
			}
			$this->serveStylesheet("pages/styles-" . $this->page);
		}

		return $this->css;
	}

	public function serveJS()
	{
		if ($this->isProduction()) {
			$this->serveScript(self::JS_PRODUCTION_FILE);

		} else {
			foreach (scandir($this->jsBaseUrl) as $file) {
				if (stripos($file, ".js") !== false) {
					$this->serveScript($file);
				}
			}
		}

		return $this->js;
	}

	/**
	 * Return whether the application is running in its
	 * production environment.
	 *
	 * @return bool
	 */
	private function isProduction()
	{
		return $this->production;
	}

	/**
	 * Serve a CSS stylesheet by returning the printed head declaration.
	 *
	 * @param $filename
	 * @return string
	 */
	private function serveStylesheet($filename)
	{
		$filename = $this->addExtension($filename, ".css");
		$this->css .= '<link rel="stylesheet" href="' . $this->cssBaseUrl . $filename . '" />';
	}

	/**
	 * Serve a JS script by returning the printed head declaration.
	 *
	 * @param $filename
	 * @return string
	 */
	private function serveScript($filename)
	{
		$filename = $this->addExtension($filename, ".js");
		$this->js .= '<script type="text/javascript" src="' . $this->jsBaseUrl . $filename . '"></script>';
	}

	/**
	 * Read and organize all existing script files and return
	 * the file names as a multi-dimensional array.
	 *
	 * @return array
	 */
	private function getExistingScripts()
	{
		// Read the contents of our public/js directory.
		$contents = scandir('js');

		// Initialize an array to contain the filenames of different
		// types of scripts housed in the directory.
		$scripts = array();

		// Iterate over each filename or directory to handle individually.
		foreach ($contents as $content) {

			// Skip all non-JS files (or any directories)
			if ($this->getExtension($content) !== ".js") {
				continue;
			}

			// Ignore the production JS file.
			if ($content === self::JS_PRODUCTION_FILE . ".js") {
				continue;
			}

			// Add the script as a service if it contains the "Service" in its filename.
			if (strpos($content, "Service") !== false) {
				$scripts["services"][] = $content;
			}

			// Otherwise, add the script as a package.
			else {
				$scripts["packages"][] = $content;
			}
		}

		return $scripts;
	}

	/**
	 * Get the extension of the provided filename.
	 */
	private function getExtension($filename)
	{
		$parts = explode('.', $filename);
		$partCount = count($parts);
		return "." . $parts[$partCount - 1];
	}

	/**
	 * Ensure that the provided filename ends in the provided extension,
	 * and add it if it does not.
	 *
	 * @param $filename
	 * @param $extension
	 * @return string
	 */
	private function addExtension($filename, $extension)
	{
		// Add a period to the beginning of the extension
		// if it is missing.
		if (substr($extension, 0, 1) !== ".") {
			$extension = "." . $extension;
		}

		// Calculate the string lengths to help comparison below.
		$filenameLength = strlen($filename);
		$extensionLength = strlen($extension);

		// Check if the filename already ends in the provided extension.
		if ($this->getExtension($filename) !== $extension) {

			// Add the extension to the filename if it isn't already there.
			$filename .= $extension;
		}

		// Return the filename.
		return $filename;
	}

	private function resolveEnvironment()
	{
		if (getenv('APP_ENV') === 'production' || getenv('APP_ENV') === 'stage' || isset($_GET["fakeProd"])) {
			return true;
		}
		return false;
	}

	private function resolveBaseUrls()
	{
		$base = "";
//		$base .= $this->page;
//		$base .= "/agile/";

		if ($this->isProduction()) {
			$this->cssBaseUrl = $base . "../../assets/css/prod/";
			$this->jsBaseUrl = $base . "js/prod/";
		} else {
			$this->cssBaseUrl = $base . "../../assets/css/agile/";
			$this->jsBaseUrl = $base . "js/";
		}
	}
}