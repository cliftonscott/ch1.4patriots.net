var Validation = function () {

	return {

		//Validation
		initValidation: function () {
			$("#sky-form1").validate({
				// Rules for form validation
				rules:
				{
					"required":
					{
						required: true
					},
					"billing-zip":
					{
						required: true,
						rangelength: [5, 7]
					},
					"firstName":
					{
						required: true
					},
					"lastName":
					{
						required: true
					},
					"billing-address":
					{
						required: true
					},
					"billing-city":
					{
						required: true
					},
					"billing-country":
					{
						required: true
					},
					"billing-state":
					{
						required: true
					},
					"email":
					{
						required: true,
						email: true
					},
					"creditCardNumber":
					{
						required: true,
						rangelength: [12, 16]
					},
					"card-cvv2":
					{
						required: true,
						rangelength: [3, 4]
					},


					"shipping-address": {
						required: true
					},
					"shipping-city": {
						required: true
					},
					"shipping-state": {
						required: true
					},
					"shipping-country": {
						required: true
					},
					"shipping-zip": {
						required: true
					}


				},
				// Do not change code below
				errorPlacement: function(error, element)
				{
					error.insertAfter(element.parent());
				}
			});
			

		}

	};
}();