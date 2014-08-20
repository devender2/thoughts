
(function($){

$(document).ready(function(){
	console.log('working')
	$('.navOpen').click(function(){
		$('main, nav').addClass('shift');
		$('.mask').show();
	});

	$('.mask, .closeNav').click(function(e){
		e.preventDefault;
		$('.mask').hide();
		$('nav, main').removeClass('shift');
	})

})

})(jQuery)

