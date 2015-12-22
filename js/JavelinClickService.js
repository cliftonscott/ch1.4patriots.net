/**
 * Inspect click events on each page and send relevant
 * clicks to Google Analytics as events.
 *
 * @constructor
 */
var JavelinClickService = function JavelinClickService(clickGoals, visitorId) {

	/**
	 * ---------------------------------------------------------
	 * Events
	 * ---------------------------------------------------------
	 */

	/**
	 * For each click goal, create an event to send an event to GA
	 * for each click for the goal's selector.
	 *
	 * The event call to GA includes the relevant goal ID as the "label" value
	 * and the visitor ID as the "value" value.
	 *
	 * See: https://developers.google.com/analytics/devguides/collection/analyticsjs/events
	 */
	if (clickGoals != null && clickGoals.length > 0) {
		//console.log('Javelin: Click Goals >');
		//console.log(clickGoals);
		for (var i = 0; i < clickGoals.length; i++) {
			var selector = clickGoals[i].selector;
			var goalId = clickGoals[i].goalId;

			$(selector).click(function(){
				//console.log('Javelin: Send Click Event > Goal ID: ' + goalId + ' Visitor ID: ' + visitorId);
				ga('send', 'event', 'javelin-test', goalId, visitorId, 1);
			});
		}
	}
};