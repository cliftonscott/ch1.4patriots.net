<script>
function patriotTrack(what) {

	googleProductName = "<?php echo str_replace(" ", "-", $productDataObj->metaTitle);?>";
	googleValue = 0;
	googleBoolean = false;
	googleGoalAction = googleProductName;
	switch(what) {
		case 'click-to-accept':
			vwoGoal = 208;
			googleGoalLabel = googleProductName + "-(Buy)";
			googleGoalValue = "click-to-accept";
			break;
		case 'no-thanks-link':
			vwoGoal = 209;
			googleGoalLabel = googleProductName + "-(Decline)";
			googleGoalValue = "no-thanks-link";
			break;
	}
	_gaq.push(['_trackEvent', googleGoalAction, googleGoalLabel, googleGoalValue, googleValue, googleBoolean]);
	window._vis_opt_queue = window._vis_opt_queue || [];
	//window._vis_opt_queue.push(function() {_vis_opt_goal_conversion(vwoGoal);});
}
</script>