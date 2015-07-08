<?php

/**
 * A dedicated class for handling AJAX POST requests
 * for submitted contact forms.
 *
 * A JSON-structured is built and sent as a HTTP response
 * message on both success and error in order to facilitate
 * front-end AJAX processing.
 *
 * Class ContactForm
 */
class ContactForm {

	/**
	 * The contact name provided by the request.
	 *
	 * @var string
	 */
	private $name;

	/**
	 * The contact email provided by the request.
	 *
	 * @var string
	 */
	private $email;

	/**
	 * The contact message provided by the request.
	 *
	 * @var string
	 */
	private $message;

	/**
	 * The email addresses that should receive contact messages
	 * via email from the server.
	 *
	 * @var string
	 */
	private $recipients = "help@food4patriots.com";

	/**
	 * The contact that sent emails should display
	 * the sender as.
	 *
	 * @var string
	 */
	private $from = "help@food4patriots.com";

	/**
	 * The subject to populate emails containing new
	 * contact messages with.
	 *
	 * @var string
	 */
	private $subject = "A New Contact Message From food4patriots.com";

	/**
	 * The default front-facing success message to
	 * include in the JSON response.
	 *
	 * @var string
	 */
	private $successMessage = "Thanks for dropping us a line! We shall be in touch.";

	/**
	 * Handle a contact form request and return
	 * a HTTP response containing JSON data.
	 */
	public function handle()
	{
		$this->name = $_POST["contact-name"];
		$this->email = $_POST["contact-email"];
		$this->message = $_POST["contact-message"];

		$this->sanitize();

		if ($errorMessage = $this->validate()) {
			return $this->reportError($errorMessage);
		}
		else {
			$this->sendEmail();
			return $this->reportSuccess();
		}
	}

	/**
	 * Check if the request resembles a valid
	 * contact form POST request.
	 *
	 * @return bool
	 */
	public function hasPost()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			return true;
		}
		return false;
	}

	/**
	 * Sanitize the provided contact form data.
	 */
	private function sanitize()
	{
		$this->name =  filter_var($this->name, FILTER_SANITIZE_STRING);
		$this->email =  filter_var($this->email, FILTER_SANITIZE_EMAIL);
		$this->message =  filter_var($this->message, FILTER_SANITIZE_STRING);
	}

	/**
	 * Validate the provided contact form data.
	 *
	 * On error, a front-facing error message will be returned.
	 * On success, null will be returned.
	 *
	 * @return null|string
	 */
	private function validate()
	{
		if (strlen($this->name) < 1) {
			return "Please provide your name";
		}
		if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
			return "Please provide a valid email address";
		}
		if (strlen($this->message) < 1) {
			return "Please provide a message";
		}
		return null;
	}

	/**
	 * Send an email on behalf of the contact form message.
	 */
	private function sendEmail()
	{
		$to      	= $this->recipients;
		$subject 	= $this->subject;
		$headers 	= 'From: ' . $this->from . "\r\n" .
						'Reply-To: ' . $this->from . "\r\n" .
						'Content-type: text/html; charset=UTF-8' . "\r\n" .
						'X-Mailer: PHP/' . phpversion();

		$message =  "Name: " . $this->name . "<br />";
		$message .= "Email: " . $this->email . "<br />";
		$message .= "Message: " . $this->message . "<br />";

		mail($to, $subject, $message, $headers);
	}

	/**
	 * Report an error by sending a JSON response.
	 *
	 * @param $errorMessage
	 */
	private function reportError($errorMessage)
	{
		header('Content-Type: application/json');
		echo json_encode(array(
			"success"			=> false,
			"errorMessage"		=> $errorMessage,
			"successMessage"	=> null
		));
	}

	/**
	 * Report a successful request by sending a JSON response.
	 */
	private function reportSuccess()
	{
		header('Content-Type: application/json');
		echo json_encode(array(
			"success"			=> true,
			"errorMessage"		=> null,
			"successMessage"	=> $this->successMessage
		));
	}
}