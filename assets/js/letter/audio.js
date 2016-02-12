function playAudio(what) {
	document.getElementById(what+"AudioSrc").play();
}
function stopAudio(what) {
	document.getElementById(what+"AudioSrc").pause();
	document.getElementById(what+"AudioControl").src = "/assets/images/misc/speaker_off.gif";
}
function toggleAudio(what) {
	if(document.getElementById(what+"AudioSrc").paused) {
		document.getElementById(what+"AudioSrc").play();
		document.getElementById(what+"AudioControl").src = "/assets/images/misc/speaker_on.gif";
	} else {
		document.getElementById(what+"AudioSrc").pause();
		document.getElementById(what+"AudioControl").src = "/assets/images/misc/speaker_off.gif";
	}
}