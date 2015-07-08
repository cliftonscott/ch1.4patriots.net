<?php

/**
 * ------------------------------------------------
 * Contact Form Route
 * ------------------------------------------------
 *
 * This file is required in order to receive
 * AJAX requests from the ContactFormService.
 *
 * See	/js/ContactFormService.js
 * 		/libraries/ContactForm.php
 * 		/content/contact.html
 *
 * ------------------------------------------------
 */

include_once 'ContactForm.php';
$contactForm = new ContactForm();

if ($contactForm->hasPost()) {
	$contactForm->handle();
}

