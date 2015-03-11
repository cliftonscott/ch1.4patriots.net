$(document).ready(function() {

	$("#billing-form").validate({
		rules: {
			"email": {
				required: true,
				email: true
			},
			"firstName": {
				required: true
			},
			"lastName": {
				required: true
			},
			"billing-address": {
				required: true
			},
			"billing-city": {
				required: true
			},
			"billing-country": {
				required: true
			},
			"billing-state": {
				required: true
			},
			"billing-zip": {
				required: true,
				minlength: 5,
				maxlength: 7
			},
			"card-cvv2": {
				required: true
			},
			"creditCardNumber": {
				required: true
			},
			"billadd": {
				required: true
			},
			"check1": {
				required: false
			},
			"name": {
				required: true
			}
		},
		messages: { 
			"email": "",
			"firstName": null,
			"lastName": "",
			"billing-address": "",
			"billing-city": "",
			"billing-country": "",
			"billing-state": "",
			"billing-zip": "",
			"card-cvv2": "",
			"creditCardNumber": "",
			"billadd": "",
			check1: "<img src='/checkout/assets/warning-check.gif' style='position:absolute;left:-140px;top:-20px;' alt='You must agree to the terms to continue' title='You must agree to the terms to continue'>",
			"state": ""
		}
	});
});