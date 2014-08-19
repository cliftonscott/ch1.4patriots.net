//Routines do deal w/ country changes
var states = new Array();
//US States
states["US"] = new Array('', 'Alabama','Alaska','Arizona','Arkansas','California','Colorado','Connecticut','Delaware','Florida','Georgia','Hawaii','Idaho','Illinois','Indiana','Iowa','Kansas','Kentucky','Louisiana','Maine','Maryland','Massachusetts','Michigan','Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada','New Hampshire','New Jersey','New Mexico','New York','North Carolina','North Dakota','Ohio','Oklahoma','Oregon','Pennsylvania','Rhode Island','South Carolina','South Dakota','Tennessee','Texas','Utah','Vermont','Virginia','Washington','Washington DC','West Virginia','Wisconsin','Wyoming');
//CA States
states["CA"] = new Array('', 'Alberta','British Columbia','Labrador','Manitoba','New Brunswick','Newfoundland','Northwest Territory','Nova Scotia','Nunavut','Ontario','Price Edward Island','Quebec','Saskatchewan','Yukon');
//UK States
states["GB"] = new Array('', 'Avon','Bedfordshire','Berkshire','Buckinghamnshire','Cambridgeshire','Cheshire','Cleveland','Cornwall','Cumbria','Derbyshire','Devon','Dorset','Durham','East Riding','East Sussex','East Yorkshire','Essex','Gloucestershire','Greater London','Greater Manchester','Hampshire','Hereford','Hertfordshire','Humberside','Huntingdonshire','Isle of Man','Isle of Wight','Kent','Lancashire','Leicestershire','Lincolnshire','Merseyside','Middlesex','Norfolk','Northamptonshire','Northumberland','Nottinghamshire','Oxfordshire','Rutland','Shropshire','Somerset','South Yorkshire','Staffordshire','Suffolk','Surrey','Sussex','Tyne and Wear','Warwickshire','Westmorland','West Midlands','Wiltshire','Worcestershire','West Sussex','West Yorkshire');
//AU States
states["AU"] = new Array('', 'Australian Antarctic Territory','Australian Capital Territory','Northern Territory','New South Wales','Queensland','South Australia','Tasmania','Victoria','Western Australia');
//NZ
states["NZ"] = new Array('', 'Auckland','Bay of Plenty','Christchurch','Dunedin','Gisborne','Hamilton Urban Area','Hutt City','Invercargill','Manukau','Napier-Hastings Urban Area','Nelson','New Plymouth','North Shore','Palmerston North','Porirua','Rotorua','Tauranga','Waitakere','Whangarei','Wellington');

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
	if ((cntrySel.options[cntrySel.selectedIndex].value) == "US") {
		selectField = document.getElementById('billing-state');
		selectField.options.length = 0;
		newList = states["US"];
		for (i=0; i < newList.length; i++) {
			selectField.options[selectField.length] = new Option(newList[i], newList[i]);
		}
	} else if ((cntrySel.options[cntrySel.selectedIndex].value) == "CA") {
		selectField = document.getElementById('billing-state');
		selectField.options.length = 0;
		newList = states["CA"];
		for (i=0; i < newList.length; i++) {
			selectField.options[selectField.length] = new Option(newList[i], newList[i]);
		}		
	} else if ((cntrySel.options[cntrySel.selectedIndex].value) == "GB") {
		selectField = document.getElementById('billing-state');
		selectField.options.length = 0;
		newList = states["GB"];
		for (i=0; i < newList.length; i++) {
			selectField.options[selectField.length] = new Option(newList[i], newList[i]);
		}		
	} else if ((cntrySel.options[cntrySel.selectedIndex].value) == "AU") {
		selectField = document.getElementById('billing-state');
		selectField.options.length = 0;
		newList = states["AU"];
		for (i=0; i < newList.length; i++) {
			selectField.options[selectField.length] = new Option(newList[i], newList[i]);
		}		
	} else if ((cntrySel.options[cntrySel.selectedIndex].value) == "NZ") {
		selectField = document.getElementById('billing-state');
		selectField.options.length = 0;
		newList = states["NZ"];
		for (i=0; i < newList.length; i++) {
			selectField.options[selectField.length] = new Option(newList[i], newList[i]);
		}		
	} else {
		selectField = document.getElementById('billing-state');
		selectField.style.visibility = "hidden";
		selectField.style.display = "none";
		otherBillingState = document.getElementById('other-billing-state');
		otherBillingState.style.visibility = "visible";
		otherBillingState.style.display = "block";
	}
}
function setShippingStates() {
	cntrySel = document.getElementById('shipping-country');
	if ((cntrySel.options[cntrySel.selectedIndex].value) == "US") {
		selectField = document.getElementById('shipping-state');
		selectField.options.length = 0;
		newList = states["US"];
		for (i=0; i < newList.length; i++) {
			selectField.options[selectField.length] = new Option(newList[i], newList[i]);
		}
	} else if ((cntrySel.options[cntrySel.selectedIndex].value) == "CA") {
		selectField = document.getElementById('shipping-state');
		selectField.options.length = 0;
		newList = states["CA"];
		for (i=0; i < newList.length; i++) {
			selectField.options[selectField.length] = new Option(newList[i], newList[i]);
		}		
	} else if ((cntrySel.options[cntrySel.selectedIndex].value) == "GB") {
		selectField = document.getElementById('shipping-state');
		selectField.options.length = 0;
		newList = states["GB"];
		for (i=0; i < newList.length; i++) {
			selectField.options[selectField.length] = new Option(newList[i], newList[i]);
		}		
	} else if ((cntrySel.options[cntrySel.selectedIndex].value) == "AU") {
		selectField = document.getElementById('shipping-state');
		selectField.options.length = 0;
		newList = states["AU"];
		for (i=0; i < newList.length; i++) {
			selectField.options[selectField.length] = new Option(newList[i], newList[i]);
		}		
	} else if ((cntrySel.options[cntrySel.selectedIndex].value) == "NZ") {
		selectField = document.getElementById('shipping-state');
		selectField.options.length = 0;
		newList = states["NZ"];
		for (i=0; i < newList.length; i++) {
			selectField.options[selectField.length] = new Option(newList[i], newList[i]);
		}
	} else {
		selectField = document.getElementById('shipping-state');
		selectField.style.visibility = "hidden";
		selectField.style.display = "none";
		otherShippingState = document.getElementById('other-shipping-state');
		otherShippingState.style.visibility = "visible";
		otherShippingState.style.display = "block";
	}
}