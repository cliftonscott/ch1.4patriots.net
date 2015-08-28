function playAudio(what) {
	document.getElementById(what+"AudioSrc").play();
}
function stopAudio(what) {
	document.getElementById(what+"AudioSrc").pause();
	document.getElementById(what+"AudioControl").src = "/media/images/checkout-v2/gb-button.png";
}
function toggleAudio(what) {
	if(document.getElementById(what+"AudioSrc").paused) {
		document.getElementById(what+"AudioSrc").play();
		document.getElementById(what+"AudioControl").src = "/media/images/checkout-v2/gb-button-animation.gif";
	} else {
		document.getElementById(what+"AudioSrc").pause();
		document.getElementById(what+"AudioControl").src = "/media/images/checkout-v2/gb-button.png";
	}
}