//this is the same detection method used in the video pages, but extracted into a function
//that returns boolean true if none of the conditions were met
function isMobile() {
	if ((navigator.userAgent.indexOf('iPhone') != -1) || 
		(navigator.userAgent.indexOf('iPod') != -1) || 
		(navigator.userAgent.indexOf('iPad') != -1) || 
		(screen.width <= 699)) {
		return true;
	} else {
		return false;
	}
}


/* fancier method to try in the future
 * 
 * $( document ).ready(function() {      
    var isMobile = window.matchMedia("only screen and (max-width: 760px)");

    if (isMobile.matches) {
        //Conditional script here
    }
});
 * 
 * 
 */
