(function( $ ) {
    'use strict';
    $(function() {

        var bootstrap = 3,
            trigger = 'blur',
            exclude = ':hidden, #quantity',
            selectors = $(':input').not(exclude);

        /*
         Form Validate
         */
        $.fn.formValidate = function() {

            var $form = $(this),
                $inputs = $form.find(selectors);

            /* On Submit */
            $form.onSubmit($inputs);
            /* Set input state */
            $inputs.defaultState().onInput();
        };

        /*
        On Form Submit
         */
        $.fn.onSubmit = function($inputs){

            var submit = true,
                state;

            $(this)
                .on('submit', function(){

                    $inputs.each(function(){
                        state = $(this).isValid();
                        $(this).fieldState(state);
                        if(!state){
                            submit = false;
                        }
                    });

                    // If there was an error, scroll back to the top of form.
                    if(!submit){
                        $('html, body').animate({
                            scrollTop:$(this).offset().top
                        }, 100);
                    }

                    return submit;

                });
        };

        /*
        On input/blur events
         */
        $.fn.onInput = function(){
            return $(this).on(trigger, function(){
                var $input = $(this);
                setTimeout(function(){
                   if($(selectors).is(':focus')){
                       $input.fieldState($input.isValid());
                   } else {
                       $input.fieldState('clear');
                   }
                },0);
            }).on("focus", function() {
                $(this).fieldState("clear")
            });
        };

        /*
        Validate all fields before submit
         */
        $.fn.isValid = function(){

            var $input = $(this),
                state = true,
                inputValue = $input.val(),
                inputType = $input.attr('type'),
                validateType = $input.attr('data-validate');

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
        };

        /*
         Update the state of the field.
         */
        $.fn.fieldState = function(state){

            var $this = $(this),
                $parent = $this.closest('.form-group');

            switch(state) {
                case 'clear' :
                    $this.add($parent).attr('class', function (i, c) {
                        return c.replace(/(^|\s)(form-control-|has-)\S+/g, '');
                    });
                    break;
                case true :
                    $parent.addClass('has-' + bootstrapClass(true)).removeClass(' has-' + bootstrapClass(false));
                    $this.addClass('form-control-' + bootstrapClass(true)).removeClass('form-control-' + bootstrapClass(false));
                    break;
                case false :
                    $parent.addClass('has-' + bootstrapClass(false)).removeClass('has-' + bootstrapClass(true));
                    $this.addClass('form-control-' + bootstrapClass(false)).removeClass('has-' + bootstrapClass(true));
                    break;
            }
            return $this;
        };

        /*
        Set the default state of fields
         */
        $.fn.defaultState = function(){

            var value;

            $(this).each(function(){
                value = $(this).val();
                if(value !== null && value.length > 0){
                    $(this).fieldState(true);
                }
            });

            return $(this);
        };

        /*
        Is field optional / Return Bool
         */
        $.fn.isOptional = function($this){
            if(typeof $this !== 'undefined'){
                var placeholder = $this.attr('placeholder');
                if((typeof placeholder !== 'undefined' && placeholder.toLowerCase() === 'optional') || $this.is('[data-optional]')) {
                    return true;
                }
            }
            return false;
        };

        /*
        Meet minimum length rule
         */
        $.fn.isMin = function(value){
            var min = $(this).attr('data-validate-min');
            return (!(min > 0 && $.trim(value).length < min));
        };

        /*
        Meet maximum length rule
         */
        $.fn.isMax = function(value){
            var max = $(this).attr('data-validate-max');
            return (!(max > 0 && $.trim(value).length > max));
        };

        /*
         Validate CC Number / Luhn
         */
        $.fn.validateCreditCard = function(value) {

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
        };

        /*
        Validate Email Address
         */
        $.fn.validateEmail = function(email){
            return emailValidate(email);
        };

        /*
         Validate CCV
         */
        $.fn.validateCVV = function(cvv){
            return (cvv.length === 3 || cvv.length === 4);
        };

        // Helper Functions

        /*
        Validate email address
         */
        function emailValidate(email){
            var regex = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/igm;
            return !!(regex.test(email));
        }
    
        /*
        Bootstrap class based on version
         */
        function bootstrapClass(state) {
            return 3 === bootstrap ? state ? "success" : "error" : state ? "success" : "danger"
        }


        });
})( jQuery );