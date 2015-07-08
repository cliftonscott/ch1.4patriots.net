/**
 * ------------------------------------------------
 * Contact Form Service
 * ------------------------------------------------
 *
 * This module is required in order to receive
 * AJAX requests from the ContactFormService.
 *
 * See	/libraries/ContactForm.php
 * 		/contact-post.php
 * 		/content/contact.html
 *
 * ------------------------------------------------
 */

var ContactFormService = function ContactFormService(window) {
	var that = this;

	/**
	 * ---------------------------------------------------------
	 * Configuration
	 * ---------------------------------------------------------
	 */

	/**
	 * The route to the contact processing page.
	 *
	 * @type {string}
	 */
	var route = "/contact-post.php";

	/**
	 * The collection of jQuery elements that
	 * this service touches.
	 *
	 * Populated by refreshElements().
	 *
	 * @type {{}}
	 */
	var elements = {};

	/**
	 * Refresh elements and their events.
	 *
	 * Also initializes all used elements.
	 *
	 * Should be called whenever the elements collection is edited.
	 */
	var refreshElements = function() {
		elements = {
			form: $('#contact-form'),
			submitButton: $('#contact-submit'),
			successMessage: $('.contact-message-success'),
			errorMessage: $('.contact-message-error'),
			name: $('#contact-name'),
			email: $('#contact-email'),
			message: $('#contact-message')
		};
		loadEvents();
	};

	/**
	 * Prepare and send an AJAX request to the contact
	 * processing route.
	 *
	 * Call displaySuccess() or displayError() after completion
	 * depending on server JSON response.
	 */
	var sendRequest = function() {

		// Validate a completed reCAPTCHA right away.
		if (!confirmCaptcha()) {
			displayError("Please complete the CAPTCHA.");
			return false;
		}

		// Extract the AJAX parameters from the input elements.
		var parameters = {
			"contact-name": elements.name.val(),
			"contact-email": elements.email.val(),
			"contact-message": elements.message.val()
		};

		// Send a POST AJAX request to the server.
		$.post(route, parameters)
			.done(function(data){

				// Handle cases in which the server did not return
				// a valid JSON response. This should never happen.
				if (!data) {
					displayError("An error occurred. Please try again later.");
					return false;
				}

				// Display the success message returned in the JSON response.
				if (data.success) {
					displaySuccess(data.successMessage);
					resetForm();
				}

				// Display the error message returned in the JSON response.
				else {
					displayError(data.errorMessage);
				}
			}
		);
	};

	/**
	 * Display a success message by un-hiding
	 * the relevant element and populating its HTML.
	 *
	 * @param message
	 */
	var displaySuccess = function(message) {
		elements.successMessage.css('display', 'block');
		elements.errorMessage.css('display', 'none');
		elements.successMessage.html(message);
	};

	/**
	 * Display an error message by un-hiding
	 * the relevant element and populating its HTML.
	 *
	 * @param message
	 */
	var displayError = function(message) {
		elements.errorMessage.css('display', 'block');
		elements.successMessage.css('display', 'none');
		elements.errorMessage.html(message);
	};

	/**
	 * Return true if the Captcha has been completed
	 * or false if it hasn't.
	 *
	 * @returns {boolean}
	 */
	var confirmCaptcha = function() {
		if (grecaptcha.getResponse()) {
			return true;
		}
		return false;
	};

	/**
	 * Reset all form fields by emptying their values.
	 */
	var resetForm = function() {
		elements.name.val("");
		elements.email.val("");
		elements.message.val("");
		grecaptcha.reset();
	};

	/**
	 * ---------------------------------------------------------
	 * Events
	 * ---------------------------------------------------------
	 */

	/**
	 * Load all events for this service.
	 */
	var loadEvents = function () {

		elements.submitButton.click(function(e){
			sendRequest();
			e.preventDefault();
		});
	};

	// Initialize the elements required by this service.
	refreshElements();
};