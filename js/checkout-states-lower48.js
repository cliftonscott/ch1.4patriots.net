//Routines do deal w/ country changes
var states = new Array();
//US States
states["US"] = new Array('', 'Alabama','Arizona','Arkansas','California','Colorado','Connecticut','Delaware','Florida','Georgia','Idaho','Illinois','Indiana','Iowa','Kansas','Kentucky','Louisiana','Maine','Maryland','Massachusetts','Michigan','Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada','New Hampshire','New Jersey','New Mexico','New York','North Carolina','North Dakota','Ohio','Oklahoma','Oregon','Pennsylvania','Rhode Island','South Carolina','South Dakota','Tennessee','Texas','Utah','Vermont','Virginia','Washington','Washington DC','West Virginia','Wisconsin','Wyoming');


//FUNCTIONS
function changeCountry(section) {
	if(section == "billing") {
		setBillingStates();
	} else {
		setShippingStates();
	}
}
function setBillingStates() {
	cntrySel = document.getElementById('billing-country');
	if ((cntrySel.options[cntrySel.selectedIndex].value) == "CA") {
		selectField = document.getElementById('billing-state');
		selectField.options.length = 0;
		newList = states["CA"];
		for (i=0; i < newList.length; i++) {
			selectField.options[selectField.length] = new Option(newList[i], newList[i]);
		}
	} else {
		selectField = document.getElementById('billing-state');
		selectField.options.length = 0;
		newList = states["US"];
		for (i=0; i < newList.length; i++) {
			selectField.options[selectField.length] = new Option(newList[i], newList[i]);
		}
	}
}
function setShippingStates() {
	cntrySel = document.getElementById('shipping-country');
	if ((cntrySel.options[cntrySel.selectedIndex].value) == "CA") {
		selectField = document.getElementById('shipping-state');
		selectField.options.length = 0;
		newList = states["CA"];
		for (i=0; i < newList.length; i++) {
			selectField.options[selectField.length] = new Option(newList[i], newList[i]);
		}
	} else {
		selectField = document.getElementById('shipping-state');
		selectField.options.length = 0;
		newList = states["US"];
		for (i=0; i < newList.length; i++) {
			selectField.options[selectField.length] = new Option(newList[i], newList[i]);
		}
	}
}