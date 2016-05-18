(function( $ ) {
    'use strict';
    $(function() {

        $.fn.extend({

            formValidate: function (options) {

                var defaults = {
                    bootstrap: 3,
                    trigger: 'blur',
                    exclude: ':hidden, #quantity',
                    selectors: $(':input')
                };

                options = $.extend(defaults, options);

                var $form = $(this),
                    $inputs = $form.find(options.selectors.not(options.exclude));

                /* On Submit */
                $form.onSubmit($inputs, options);
                /* Set input state */
                $inputs.defaultState(options).onInput(options);
            },

            /*
             On Form Submit
             */
            onSubmit :  function($inputs, options){

                var submit = true,
                    state;

                $(this)
                    .on('submit', function(){

                        $inputs.each(function(){
                            state = $(this).isValid();
                            $(this).fieldState(state, options);
                            if(!state){
                                submit = false;
                            }
                        });

                        $(this).validateExpiry(options);

                        // If there was an error, scroll back to the top of form.
                        if(!submit){
                            $('html, body').animate({
                                scrollTop:$(this).offset().top
                            }, 100);
                        }

                        return submit;

                    });
            },

            /*
             On input/blur events
             */
            onInput : function(options){
                return $(this).on(options.trigger, function(){
                    var $input = $(this);
                    setTimeout(function(){
                        if($(options.selectors).is(':focus')){
                            $input.fieldState($input.isValid(), options);
                        } else {
                            $input.fieldState('clear', options);
                        }
                    },0);
                }).on("focus", function() {
                    $(this).fieldState("clear")
                });
            },

            /*
             Validate all fields before submit
             */
            isValid : function(){

                var $input = $(this),
                    state = true,
                    inputValue = $input.val(),
                    inputType = $input.attr('type'),
                    validateType = $input.data('validate');

                if ($.trim(inputValue).length == 0) {
                    state = $input.isOptional($input);
                } else if (!$input.isMin(inputValue) || !$input.isMax(inputValue)) {
                    state = false;
                } else if (typeof inputType != 'undefined' && inputType === 'email') {
                    state = $input.validateEmail(inputValue);
                } else if (validateType === 'creditCardNumber') {
                    state = $input.validateCreditCard(inputValue);
                } else if(validateType === 'card-cvv2') {
                    state = $input.validateCVV(inputValue);
                }
                return state;
            },

            /*
             Update the state of the field.
             */
            fieldState : function(state, options){

                var $this = $(this),
                    $parent = $this.closest('.form-group');

                switch(state) {
                    case 'clear' :
                        $this.add($parent).attr('class', function (i, c) {
                            return c.replace(/(^|\s)(form-control-|has-)\S+/g, '');
                        });
                        break;
                    case true :
                        $parent.addClass('has-' + bootstrapClass(true, options)).removeClass(' has-' + bootstrapClass(false, options));
                        $this.addClass('form-control-' + bootstrapClass(true, options)).removeClass('form-control-' + bootstrapClass(false, options));
                        break;
                    case false :
                        $parent.addClass('has-' + bootstrapClass(false, options)).removeClass('has-' + bootstrapClass(true, options));
                        $this.addClass('form-control-' + bootstrapClass(false, options)).removeClass('has-' + bootstrapClass(true, options));
                        break;
                }
                return $this;
            },

            /*
             Set the default state of fields
             */
            defaultState : function(options){

                var value;

                $(this).each(function(){
                    value = $(this).val();
                    if(value !== null && value.length > 0){
                        $(this).fieldState(true, options);
                    }
                });

                return $(this);
            },

            /*
             Is field optional / Return Bool
             */
            isOptional : function($this){
                if(typeof $this !== 'undefined'){
                    var placeholder = $this.attr('placeholder');
                    if((typeof placeholder !== 'undefined' && placeholder.toLowerCase() === 'optional') || $this.is('[data-optional]')) {
                        return true;
                    }
                }
                return false;
            },

            /*
             Meet minimum length rule
             */
            isMin : function(value){
                var min = $(this).data('validate-min');
                return (!(min > 0 && $.trim(value).length < min));
            },

            /*
             Meet maximum length rule
             */
            isMax : function(value){
                var max = $(this).data('validate-max');
                return (!(max > 0 && $.trim(value).length > max));
            },

            /*
             Validate CC Number / Luhn
             */
            validateCreditCard : function(value) {

                var arr = [0, 2, 4, 6, 8, 1, 3, 5, 7, 9],
                    len = value.length,
                    bit = 1,
                    sum = 0,
                    val;
                if(len >= 12) {
                    while (len) {
                        val = parseInt(value.charAt(--len), 10);
                        sum += (bit ^= 1) ? arr[val] : val;
                    }
                }

                return sum && sum % 10 === 0;
            },

            /*
             Validate Email Address
             */
            validateEmail : function(email){
                var regex = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/igm;
                return !!(regex.test(email));
            },

            /*
             Validate CCV
             */
            validateCVV : function(cvv){
                return (cvv.length === 3 || cvv.length === 4);
            },

            validateExpiry : function(options){
                var date = Date.now(),
                    $year = $('#card_expires_on_year'),
                    year = '20'+$year.val(),
                    $month = $('#card_expires_on_month'),
                    month = $month.val(),
                    expiry = Date.parse(year+'-'+month+'-01');

                if(expiry < date){
                    $($year).add($month).fieldState(false, options);
                }
            }

        });

        // Helper Functions

        /*
        Bootstrap class based on version
         */
        function bootstrapClass(state, options) {
            return 3 === options.bootstrap ? state ? "success" : "error" : state ? "success" : "danger"
        }

    });

})( jQuery );