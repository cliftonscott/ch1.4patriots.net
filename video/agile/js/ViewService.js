/**
 * A service to manage view data, retrieve partial view content,
 * load it into the page to refresh data via AJAX.
 *
 * @constructor
 */
var ViewService = function ViewService() {

	var that = this;
	var elements = {};

	var renderCallback = function() {};

	var viewCount = 0;
	var renderCount = 0;

	/**
	 * ---------------------------------------------------------
	 * Private methods
	 * ---------------------------------------------------------
	 */
	var refreshElements = function() {
		elements = {
			'views': $('.view')
		}
	};

	var loadViews = function() {
		elements.views.each(function() {
			var element = $(this);
			var name = getViewName($(this));
			viewCount++;
			$.get('views/' + name + '.phtml', function(data) {
				element.html(data).animate({ opacity: 1 }, 200);
			})
				.always(function() { renderCount++; checkForRenderCompletion();  });
		});
	};

	var checkForRenderCompletion = function() {
		if (renderCount == viewCount) {
			console.log('render callback');
			renderCallback();
		}
	};

	var getViewName = function(element) {
		return element.attr('id').replace('view-', '');
	};

	/**
	 * ---------------------------------------------------------
	 * Private methods
	 * ---------------------------------------------------------
	 */
	that.done = function done(callback) {
		renderCallback = callback;
	};

	/**
	 * ---------------------------------------------------------
	 * Initialize
	 * ---------------------------------------------------------
	 */
	refreshElements();
	loadViews();
};