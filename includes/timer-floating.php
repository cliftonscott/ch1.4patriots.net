<script>
var sec = 0;	// set the seconds - set back to 40
var min = <?php echo $template["floatingTimer"];?>	// set from within the template

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

floatingMenu.add('floatingTimer', {
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
</script>