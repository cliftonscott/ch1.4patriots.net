/*

This is used for upsell forms that require taxes to be shown
ex: http://dev.sf4p.4patriots.net/checkout/oto/f4p-choose-3m-4w-kit.php

It handles shipping as well as taxes, hiding the entire rows if not applicable

This function allows a developer to set the stateTax based on a productId
passed to the function and the current values set in on the form in a series
of named fields that end with _ProductId for each of the productIds on the page

There are a number of To Dos that should be completed to make this multi form
handler better.

See the inline notes

*/
function setStateTax(productId) {

	//TODO skip this whole thing if the country isn't US, will need to return "" to the calling function

	taxState = document.getElementById('taxState_' + productId).value;
	quantity = document.getElementById('quantity_' + productId).value;

	formSubTotal = document.getElementById('subTotal_' + productId);
	formTaxAmount = document.getElementById('taxAmount_' + productId);
	formTotalAmount = document.getElementById('totalAmount_' + productId);
	formTaxRow = document.getElementById('taxRow_' + productId);
	formShippingAmount = document.getElementById('shippingAmount_' + productId);
	formShippingRow = document.getElementById('shippingRow_' + productId);

	//get product data
	//TODO get product data from Product.php via ajax
	//TODO FFP-232 - refactor set-state-tax-multi-pid.js to pull data from Product.php
	//TODO remove the on-form-page JSON product descriptions when above is completed
	jsProductSrc = document.getElementById('productData[' + productId + ']');
	jsProductData = jsProductSrc.value;
	jsProductData = jsProductData.replace(/'/g,"\"");
	jsProductObj = JSON.parse(jsProductData);

	shippingPerItem = parseFloat(jsProductObj.shipping);
	shippingCost = parseFloat(shippingPerItem * quantity);
	formShippingAmount.innerHTML = "$" + shippingCost.toFixed(2);

	//hide shipping if shipping is free
	if(shippingPerItem > 0) {
		formShippingRow.setAttribute("style", "display:block;visibility:visible;");
	} else {
		formShippingRow.setAttribute("style", "display:none;visibility:hidden;");
	}

	if(jsProductObj.price < jsProductObj.originalPrice) {
		originalPrice = jsProductObj.originalPrice;
		originalPriceText = "<span style='text-decoration: line-through;font-weight: normal; color: #000000;'>$" + originalPrice + "</span> ";
		formTotalAmount.setAttribute("style", "font-weight:bold;color:red;");
	} else {
		originalPriceText = "";
	}


	productPrice = parseFloat(jsProductObj.price);
	productSubTotal = productPrice * quantity;

	//TODO get state tax rates from Tax.php library via ajax
	//TODO FFP-233 - refactor set-state-tax-multi-pid.js to get state taxes from Tax.php
	switch(taxState) {
		case "tennessee":
			stateTax = (productSubTotal + shippingCost) * .0925;
			formTaxAmount.innerHTML = "$" + stateTax.toFixed(2) + " <span style='font-size: .75em;'>TN (9.25%)</span>";
			formSubTotal.innerHTML = originalPriceText + "$" + productSubTotal.toFixed(2);
			formTotalAmount.innerHTML = originalPriceText + "$" + (productSubTotal + stateTax + shippingCost).toFixed(2);
			formTaxRow.setAttribute("style", "display:block;visibility:visible;");
			break;
		case "arizona":
			stateTax = productSubTotal * .0810;
			formTaxAmount.innerHTML = "$" + stateTax.toFixed(2) + " <span style='font-size: .75em;'>AZ (8.10%)";
			formSubTotal.innerHTML = originalPriceText + "$" + productSubTotal.toFixed(2);
			formTotalAmount.innerHTML = originalPriceText + "$" + (productSubTotal + stateTax + shippingCost).toFixed(2);
			formTaxRow.setAttribute("style", "display:block;visibility:visible;");
			break;
		default:
			formTaxAmount.innerHTML = "$0.00";
			formSubTotal.innerHTML = originalPriceText + "$" + productSubTotal.toFixed(2);
			formTotalAmount.innerHTML = originalPriceText + "$" + (productSubTotal + shippingCost).toFixed(2);
			formTaxRow.setAttribute("style", "display:none;visibility:hidden;");
			break;
	}

}