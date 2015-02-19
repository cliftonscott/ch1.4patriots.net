<?php
/*
	Food for Health International
	
	
	Simple order submission example.
	
	
	System Requirements
	
		PHP 5+ (Ideally 5.3+)
	
	Required PHP Extensions:
	
		libxml		(Required for:  SimpleXML)
		libcurl		(Required for:  cURL functions)


	Last Updated:  1/30/2015
*/


	
	// This library contains all the order data structure definitions and handles the API communications.
	require('./ffh.api.php');



	echo '<h1>ROSS API Example</h1>';



	// Example:  Setting up the Order object.

	$order = new FFHOrder();

		// The Order ID from your system.
		$order->order_id		= date('U');
		
		// Shipping information for the Customer.
		$order->firstname		= 'Brian';
		$order->lastname		= 'Gibbins';
		$order->address1		= '1253 Trinity Blvd.';
		$order->address2		= 'Box 457';
		$order->city			= 'Denver';
		$order->state			= 'CO'; // 2 Letter Code
		$order->postalcode		= '80205';
		$order->country			= 'US'; // 2 Letter Code

		$order->email			= 'neo@gmail.com';
		$order->phone			= '4112444885'; // Numbers only.  Remove other characters before submitting.  Length 10.
		
		$order->ship_date		= '2/21/2015'; // Not Required.  For scheduling shipping at a future date.  If not provided, defaults to today.

		// Add a Product to the Order.
		$order->addItem( new FFHItem( '50170053', '1', '4Patriots Foldable Solar Panel 24V 100w' ) ); // SKU, Quantity, Description
		$order->addItem( new FFHItem( '50170054', '1', '4Patriots HM cable 30A Anderson 25ft.' ) );


			// Dump Out the Example Order Object
			
			echo '<div>&nbsp;</div>';
			echo '<h3>Order Object</h3>';
			echo '<hr>';
			
			echo '<pre>';
			print_r( $order );
			echo '</pre>';



	/*
		Parameters for API access.
		
		API Key:
			Your API Key.  (Provided by FFH)
		
		API Username:
			Your API User.  (Provided by FFH)
		
		API Mode:
			FFHApi::API_MODE_PILOT			- The test / development enviroment.
			FFHApi::API_MODE_PRODUCTION		- The LIVE Production system.  Orders here WILL ship to customers and incure charges.
			
	*/

	$api = new FFHApi( '!4PATRIOT_256910!', 'BEN.JOHNSON', FFHApi::API_MODE_PILOT );



	/*
		This will send the order to FFH.
		
		It returns FALSE if there is an error.  Call $api->getLastError() to get error details.
		On success, it will return the ROSS Order ID.
	*/

	$result = $api->createOrder( $order );


		// Display the Results
		if ( $result === FALSE ) {
			
			echo '<div>&nbsp;</div>';
			echo '<h3>Results</h3>';
			echo '<hr>';
			
			echo '<div>';
			echo 'We received an error from the API.  Error: ';
			echo $api->getLastError();
			echo '</div>';
			
		}
		else {
			
			echo '<div>&nbsp;</div>';
			echo '<h3>Results</h3>';
			echo '<hr>';
			
			echo '<div>';
			echo 'New Created:  ' . $result;
			echo '</div>';
			
		}


?>