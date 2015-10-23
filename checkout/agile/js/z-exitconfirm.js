var sec = 40;	// set the seconds - set back to 40
var min = 15;	// set the minutes - set back to 15

function countDown() {
	sec--;
	if (sec == -01) {
		sec = 59;
		min = min - 1;
	} else {
		min = min;
	}
	if (sec<=9) {
		sec = "0" + sec;
	}

	time = (min<=9 ? "0" + min : min) + ":" + sec;

	if (document.getElementById) {
		document.getElementById('theTime').innerHTML = time;
	}

	SD=window.setTimeout("countDown();", 1000);
	
	if (min == '00' && sec == '00') {
		sec = "00";
		window.clearTimeout(SD);
		exitconfirm();
	}
}

window.onload = countDown;

function exitconfirm() {
	$('#csrModal').modal('show');
}

function exitconfirmtrue() {
	var exitConfirmation = true;
	window.location ="https://secure.food4patriots.com/checkout/altfree/";
}

floatingMenu.add('floatdiv', {
	// Represents distance from left or right browser window  
	// border depending upon property used. Only one should be  
	// specified.  
	targetLeft: 5,  
	//targetRight: 10,  

	// Represents distance from top or bottom browser window  
	// border depending upon property used. Only one should be  
	// specified.  
	//targetTop: 10,  
	targetBottom: 5,  

	// Uncomment one of those if you need centering on  
	// X- or Y- axis.  
	// centerX: true,  
	// centerY: true,  

	// Remove this one if you don't want snap effect  
	snap: true  
	});
