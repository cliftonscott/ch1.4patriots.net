function playAudio(what) {
	document.getElementById(what+"AudioSrc").play();
}
function stopAudio(what) {
	document.getElementById(what+"AudioSrc").pause();
	if (what === 'frankCheckout'){
		document.getElementById("frankCheckoutAudioControl").src = "/assets/images/misc/speaker_off_white.gif";
	}else{
		document.getElementById("GBCheckoutAudioControl").src = "/media/images/checkout-v2/gb-button.png";
	}
}
function toggleAudio(what) {
	if(document.getElementById(what+"AudioSrc").paused) {
		document.getElementById(what+"AudioSrc").play();
		if (what === 'frankCheckout'){
			document.getElementById("frankCheckoutAudioControl").src = "/assets/images/misc/speaker_on_white.gif";
		}else{
			document.getElementById("GBCheckoutAudioControl").src = "/media/images/checkout-v2/gb-button-animation.gif";
		}


	} else {
		document.getElementById(what+"AudioSrc").pause();
		if (what === 'frankCheckout'){
			document.getElementById("frankCheckoutAudioControl").src = "/assets/images/misc/speaker_off_white.gif";
		}else{
			document.getElementById("GBCheckoutAudioControl").src = "/media/images/checkout-v2/gb-button.png";
		}
	}
}


function endAudio(what) {
	document.getElementById("frankCheckoutAudioControl").src = "/assets/images/misc/speaker_off_white.gif";
	document.getElementById("GBCheckoutAudioControl").src = "/media/images/checkout-v2/gb-button.png";
}
