$(document).ready(function(){
	var speed = 500,
		headingheight = $('.heading').outerHeight(true);
	$('.pageTop a').click(function(e){
		e.preventDefault();
	

		$('html, body').animate({
			scrollTop : $('#login').offset().top - headingheight
		}, speed);
		var index = $(this).attr('value');
		setTimeout(function(){
			$('.roundnavigation').find('.loginImg a').eq(index).addClass('active')
			.parent().siblings().find('a').removeClass('active');
		}, speed-400);
		
	});
	$(window).scroll(function(){
		var distance = $(this).scrollTop();
		if(distance >= 500) {
			$('.pageTop').addClass('active');
		} else {
			$('.pageTop').removeClass('active');
		}
		if(distance >= headingheight) {
			$('.header').addClass('active');
		} else {
			$('.header').removeClass('active');
		}
	});
	$('.excerpt').each(function(){
		var visibleText = $(this).text().substring(0, 200);
		 $(this).html(visibleText + '<span> ...</span>');
	})
});