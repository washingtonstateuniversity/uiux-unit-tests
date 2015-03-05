(function($){
	$(function(){
		$('a:not([href*="uxtest.wp.wsu.edu/thanks"]),input[type="submit"],button').on('click',function(e){
			e.preventDefault();
		});
	});
})(jQuery);