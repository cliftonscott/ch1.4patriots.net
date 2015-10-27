/**
 * A service to load and render views via AJAX.
 *
 * @constructor
 */
var ViewService = function ViewService(callback) {

	var that = this;

	/**
	 * The collection of elements used by this service.
	 *
	 * @type {{}}
	 */
	var elements = {};

	/**
	 * The callback to run after all standard views
	 * have been loaded and rendered on the page.
	 *
	 * See done()
	 */
	var renderCallback = callback;

	/**
	 * The number of standard views on the current page.
	 *
	 * @type {number}
	 */
	var viewCount = 0;

	/**
	 * The number of rendered standard views on the current page.
	 *
	 * @type {number}
	 */
	var renderCount = 0;

	/**
	 * ---------------------------------------------------------
	 * Private methods
	 * ---------------------------------------------------------
	 */

	/**
	 * Load the required collection of elements for this service.
	 */
	var refreshElements = function() {
		elements = {
			'views': $('.view'),
			'unveilViews': $('.view-unveil')
		}
	};

	/**
	 * Load all standard views on the current page
	 * via AJAX requests.
	 *
	 * Call done() when all views have been rendered.
	 */
	var loadViews = function() {
		console.log('loading views');
		elements.views.each(function() {
			var element = $(this);
			var name = getViewName($(this));
			viewCount++;

			$.ajax({
				method: "GET",
				url: 'views/' + name + '.phtml',
				cache: true,
				headers: {
					'Pragma': 'public, max-age=14400, must-revalidate',
					'Cache-Control': 'public, max-age=14400, must-revalidate'
				}
			})
				.done(function(data) {
					element.html(data).animate({ opacity: 1 }, 200);
					removeGives(element);
				})
				.always(function() { renderCount++; checkForRenderCompletion();  });
		});

		console.log('view count >');
		console.log(viewCount);
		if (viewCount === 0) {
			renderCallback();
		}


		elements.unveilViews.each(function(){
			var view = $(this);
			$(this).unveilView(1000, function() { that.load(view); });
		});
	};

	/**
	 * Help loadViews() watch for AJAX view render completion.
	 */
	var checkForRenderCompletion = function() {
		if (renderCount == viewCount) {
			console.log('render callback');
			renderCallback();
		}
	};

	/**
	 * Return the name of the provided view element
	 * by examining its ID.
	 *
	 * Ex: "view-header" returns "header".
	 *
	 * @param element
	 * @returns {string|void|XML}
	 */
	var getViewName = function(element) {
		return element.attr('id').replace('view-', '');
	};

	var removeGives = function(element) {
		console.log('remove gives element >');
		console.log(element);
		var classes = element.attr('class').split(" ").filter(function(c) {
			return c.lastIndexOf('view-give', 0) !== 0;
		});
		element.attr('class', $.trim(classes.join(" ")));
	};

	/**
	 * ---------------------------------------------------------
	 * Private methods
	 * ---------------------------------------------------------
	 */

	/**
	 * Allow the client to establish a callback for when all
	 * standard views on the current page have been rendered.
	 *
	 * @param callback
	 */
	that.done = function done(callback) {
		renderCallback = callback;
	};

	/**
	 * Manually load a view.
	 *
	 * @param element
	 * @param callback
	 */
	that.load = function load(element, callback) {
		var name = getViewName(element);

		$.ajax({
			method: "GET",
			url: 'views/' + name + '.phtml',
			cache: true,
			headers: {
				'Pragma': 'public, max-age=14400, must-revalidate',
				'Cache-Control': 'public, max-age=14400, must-revalidate'
			}
		})
			.done(function(data) {
				removeGives(element);
				element.html(data).animate({ opacity: 1 }, 200);
				if (callback) callback(name);
			});
	};

	/**
	 * ---------------------------------------------------------
	 * Events
	 * ---------------------------------------------------------
	 */

	/**
	 * ---------------------------------------------------------
	 * Initialize
	 * ---------------------------------------------------------
	 */
	refreshElements();
	loadViews();
};