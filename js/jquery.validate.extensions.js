jQuery.validator.addMethod("phoneUS", function(phone_number, element) {
    phone_number = phone_number.replace(/\s+/g, ""); 
	return this.optional(element) || phone_number.length > 9 &&
		phone_number.match(/^(1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
}, "Please specify a valid phone number");

jQuery.validator.addMethod("postalcode", function(postalcode, element) {
	return this.optional(element) || postalcode.match(/^\d{5}(-\d{4})?$/);
}, "Please specify a valid US zip code");

jQuery.validator.addMethod("fullName", function(full_name, element) {
	return this.optional(element) || full_name.match(/^([a-zA-Z'-]+\s+){1,4}[a-zA-z'-]+$/);
}, "Please specify First and Last Name");