function playAudio(e){document.getElementById(e+"AudioSrc").play()}function stopAudio(e){document.getElementById(e+"AudioSrc").pause(),document.getElementById(e+"AudioControl").src="/assets/images/misc/speaker_off.gif"}function toggleAudio(e){document.getElementById(e+"AudioSrc").paused?(document.getElementById(e+"AudioSrc").play(),document.getElementById(e+"AudioControl").src="/assets/images/misc/speaker_on.gif"):(document.getElementById(e+"AudioSrc").pause(),document.getElementById(e+"AudioControl").src="/assets/images/misc/speaker_off.gif")}