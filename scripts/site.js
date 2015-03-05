(function($){
	$(function(){
		$('a:not([href*="uxtest.wp.wsu.edu/thanks"]),input[type="submit"],button').on('click',function(e){
			if(!$(this).is('main ul.spine-share a')){
				e.preventDefault();
			}
		});
	});
})(jQuery);




