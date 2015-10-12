function playAudio(what) {
	document.getElementById(what+"AudioSrc").play();
}
function stopAudio(what) {
	document.getElementById(what+"AudioSrc").pause();
	document.getElementById("GBCheckoutAudioControl").src = "/media/images/checkout-v2/gb-button.png";
	document.getElementById("frankCheckoutAudioControl").src = "/assets/images/misc/speaker_off_white.gif";
}
function toggleAudio(what) {
	if(document.getElementById(what+"AudioSrc").paused) {
		document.getElementById(what+"AudioSrc").play();
		document.getElementById("GBCheckoutAudioControl").src = "/media/images/checkout-v2/gb-button-animation.gif";
		document.getElementById("frankCheckoutAudioControl").src = "/assets/images/misc/speaker_on_white.gif";
	} else {
		document.getElementById(what+"AudioSrc").pause();
		document.getElementById("GBCheckoutAudioControl").src = "/media/images/checkout-v2/gb-button.png";
		document.getElementById("frankCheckoutAudioControl").src = "/assets/images/misc/speaker_off_white.gif";
	}
}