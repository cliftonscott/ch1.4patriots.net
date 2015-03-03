/*

Hello Goodbye - jQuery Plugin
by http://www.4patriots.com
*/
;(function ($) {
    "use strict";


    // Create helloGoodbye default variables
 
    var pluginName = 'helloGoodbye',
        leaveStack = [],
        mouseY = 0,
        mouseSpeedY = 0,
        defaults = {
            // Classes
            stepClass: 'step',
            closeClass: 'close',
            hideClass: 'hide',
            nextClass: 'next',
            prevClass: 'prev',
            name: 'helloGoodbye',
            expirationDays: 1,
            alwaysVisible: false,
            cycle: false,
            auto: false,
            onPageExit: false,

            // Default box showing function
            showFunction: function () {},

            // Default box hidding function
            hideFunction: function () {},

            // Default box hiding function (on page load)
            hideStartFunction: function () {},

            // Default box showing function (on page load)
            showStartFunction: function () {},

            // Default show step function
            showStepFunction: function () {},

            // Default hide step function
            hideStepFunction: function () {}
        };


    // Global window leave event
    $(document).mousemove(function (e) {
        // Calculate mouse speed
        mouseSpeedY = e.clientY - mouseY;
        mouseY = e.clientY;
    });

    $(window).mouseout(function () {
        if (mouseSpeedY < 0 && mouseY < -mouseSpeedY * 1.5) {
            for (var i = leaveStack.length - 1; i >= 0; i--) {
                leaveStack[i].init();
            }
        }
        mouseSpeedY = 0;
        mouseY = 0;
    });


    // Cookie functions
  
    function setCookie(name, cookieValue, days) {
        // Create cokkie expiration date
        var newDate = new Date(),
            expires;

        newDate.setTime(newDate.getTime() + (days * 86400000));

        // Create expiration string
        expires = "expires=" + newDate.toUTCString();

        // Set cookie
        document.cookie = name + "=" + cookieValue + "; " + expires + '; path=/';
    }

    function getCookie(name) {
        // Create cookie name
        var ca, i, j, c, reg;
        name = name + "=";

        // Part cookie
        ca = document.cookie.split(';');

        // Create regexp
        reg = new RegExp("^" + name);

        // Loop cookie parts
        for (i = 0, j = ca.length; i < j; i++) {
            // Get part
            c = ca[i];

            // Remove whitespaces
            c = c.replace(/^\s*/, '');

            // Check if name is in string
            if (reg.test(c)) return c.substring(name.length, c.length);
        }
        return "";
    }

    function removeCookie(name) {
        setCookie(name, '', -1);
    }


    // Create helloGoodbye class

    function PluginClass(element, options) {
        var _ = this;

        // Combine options with defaults
        _.options = $.extend({}, defaults, options);

        // Create main elements variables
        _.$element = $(element);
        _.element = element;
        _.$steps = _.$element.find('.' + _.options.stepClass);
        _.$close = _.$element.find('.' + _.options.closeClass);
        _.close = _.$close[0];
        _.$hide = _.$element.find('.' + _.options.hideClass);
        _.hide = _.$hide[0];
        _.$next = _.$element.find('.' + _.options.nextClass);
        _.next = _.$next[0];
        _.$prev = _.$element.find('.' + _.options.prevClass);
        _.prev = _.$prev[0];

        // Variables
        _.steps = [];
        _.actualStep = 0;
        _.visible = false;
        _.visits = 0;
        _.cycle = 0;

        // Get all steps
        _.$steps.each(function () {
            // Add to steps list
            _.steps.push(new StepClass(this, _, _.options));
        });

        // Functions to showing and hidding steps
        function hideAllSteps() {
            for (var i = _.steps.length - 1; i >= 0; i--) {
                _.steps[i].hide();
            }
        }

        _.show = function () {
            _.$element.addClass('visible');
            _.visible = true;
            _.options.showFunction(_);
        };

        _.hide = function () {
            _.$element.removeClass('visible');
            _.visible = false;
            hideAllSteps();
            _.options.hideFunction(_);
        };

        _.showStart = function () {
            _.$element.addClass('visible');
            _.visible = true;
            _.options.showStartFunction(_);
        };

        _.hideStart = function () {
            _.$element.removeClass('visible');
            _.visible = false;
            hideAllSteps();
            _.options.hideStartFunction(_);
        };

        _.showNum = function (num) {
            if (_.steps.length > 0) {
                _.steps[_.actualStep].hide();
                _.actualStep = num;

                if (_.actualStep > _.steps.length - 1) _.actualStep = 0;
                if (_.actualStep < 0) _.actualStep = _.steps.length - 1;

                _.steps[_.actualStep].show();
            }
        };

        _.showNext = function () {
            _.showNum(_.actualStep + 1);
        };

        _.showPrev = function () {
            _.showNum(_.actualStep - 1);
        };

        _.close = function () {
            // Set cookie
            setCookie(_.options.name, 'closed', _.options.expirationDays);

            // Reset cycles
            removeCookie(_.options.name + '_cycle');

            // Hide step
            _.hide();
        };

        // Init element
        if (_.options.onPageExit) {
            leaveStack.push(_);
        } else {
            _.init();
        }
    }

    // helloGoodbye class init function
    PluginClass.prototype.init = function () {
        var _ = this,
            cookieValue = getCookie(_.options.name),
            cookieCycle = getCookie(_.options.name + '_cycle'),
            cookieCounter = getCookie(_.options.name + '_counter');

        // If cycle is enabled
        if (_.options.cycle) {
            if (cookieCycle.length > 0) {
                // Get cycles num
                cookieCycle = parseInt(cookieCycle) + 1;
                if (cookieCycle < _.options.cycle) {
                    // Set next cycle num
                    setCookie(_.options.name + '_cycle', cookieCycle.toString(), _.options.expirationDays);
                } else {
                    // Reset cycles and show
                    cookieCycle = 0;
                    setCookie(_.options.name + '_cycle', '0', _.options.expirationDays);
                    removeCookie(_.options.name);
                    cookieValue = '';
                }
            } else {
                cookieCycle = 0;
                setCookie(_.options.name + '_cycle', '0', _.options.expirationDays);
            }
        } else {
            cookieCycle = 0;
        }

        _.cycle = cookieCycle;

        // Count visits
        if (cookieCounter.length > 0) {
            // Get cycles num
            cookieCounter = parseInt(cookieCounter) + 1;
            setCookie(_.options.name + '_counter', cookieCounter.toString(), _.options.expirationDays);

        } else {
            cookieCounter = 0;
            setCookie(_.options.name + '_counter', '0', _.options.expirationDays);
        }

        _.visits = cookieCounter;

        // Close element and disable showing it on next visit
        _.$close.click(function () {
            _.close();
        });

        // Hide element and DONT disable showing it on next visit
        _.$hide.click(function () {
            _.hide();
        });

        // Show next/prev step on .prev/.next element click
        _.$next.click(function () {
            // Show next step
            _.showNext();
        });
        _.$prev.click(function () {
            // Show next step
            _.showPrev();
        });

        // Check if it's user first visit
        if (cookieValue !== 'closed' || _.options.alwaysVisible) {
            _.showStart();
            _.showNum(_.actualStep);

            if (_.options.auto) {
                // Set Closed cookie if auto option is enabled
                setCookie(_.options.name, 'closed', _.options.expirationDays);
            }
        }
        // If user isn't first time on page
        else {
            _.hideStart();
        }
    };


    // Single step class

    function StepClass(element, parent, options) {
        var _ = this;

        // Create main element variables
        _.options = options;
        _.parent = parent;
        _.$element = $(element);
        _.element = element;

        // Function to show / hide
        _.show = function () {
            _.options.showStepFunction(_);
            _.$element.addClass('visible');
        };

        _.hide = function () {
            _.options.hideStepFunction(_);
            _.$element.removeClass('visible');
        };
    }

 
    // Create helloGoodbye jQuery function

    $.fn[pluginName] = function (options, prop) {
        // Basic functions
        var functions = {
            "show": function (plugObject) {
                if (prop !== 0 && !prop) prop = plugObject.actualStep;
                if (!plugObject.visible) plugObject.show();
                plugObject.showNum(prop);
            },
            "hide": function (plugObject) {
                if (plugObject.visible) plugObject.hide();
            },
            "close": function (plugObject) {
                plugObject.close();
            },
            "reset": function (plugObject) {
                removeCookie(plugObject.options.name);
                removeCookie(plugObject.options.name + '_cycle');
                removeCookie(plugObject.options.name + '_counter');
                plugObject.visits = 0;
                plugObject.cycle = 0;
            },
            "visits": function (plugObject) {
                return plugObject.visits;
            },
            "cycle": function (plugObject) {
                return plugObject.cycle;
            }
        };

        // Setup getters
        if (options === "visits" || options === "cycle") {
            return functions[options](this[0]['_' + pluginName]);
        }

        // Process every element
        return this.each(function () {
            var plugObject = this['_' + pluginName];
            if (functions[options]) {
                if (!plugObject) {
                    throw new Error("You can't use \"" + options + "\" before helloGoodbye initialization.");
                }
                functions[options](plugObject);
            } else if (!plugObject) {
                this['_' + pluginName] = new PluginClass(this, options);
            }
        });
    };
})(jQuery);