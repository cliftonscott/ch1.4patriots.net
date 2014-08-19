$(function(){
		
	//rounded corners fix
	if(!Modernizr.borderradius){
		//add_corners('.button');
	}
	
	//text placeholder fix
	if(!Modernizr.input.placeholder){
		$('[placeholder]').focus(function() {
			var input = $(this);
			if (input.val() == input.attr('placeholder')) {
				input.val('');
				input.removeClass('placeholder');
			}
		}).blur(function() {
			var input = $(this);
			if (input.val() == '' || input.val() == input.attr('placeholder')) {
				input.addClass('placeholder');
				input.val(input.attr('placeholder'));
			}
			}).blur();
				$('[placeholder]').parents('form').submit(function() {
				$(this).find('[placeholder]').each(function() {
				var input = $(this);
				if (input.val() == input.attr('placeholder')) {
					input.val('');
				}
			})
		});
	}
	
	// Float class
	$('#content img').addClass(
    function(){
        var floated = $(this).css('float');
        return floated ? 'img-' + floated : '';
    });
	
	//lightbox
	$('.lightbox').colorbox({
		'opacity' 	: 0.65,
		'current' 	: '{current} of {total}',
		'next'		: '->',
		'previous'	: '<-',
		'close'		: 'X',
		'loop'		: true,
		'initialWidth' 	: 50,
		'initialHeight' : 50,
		//'transition'	: 'fade',
		'initialWidth'	: 200,
		'initialHeight'	: 100,
		'maxWidth'		: '95%',
		'maxHeight'		: '95%'
	});
	

});