$(function(){
	var recipe = $('.top-heading');
	var btmInfo = $('.bottom-info');
	btmInfo.hide();

	recipe.on('click', function(){
		if($(this).next('div').css('display') === 'block'){
			$(this).next('div').fadeOut();
		}
		else{
			$(this).next('div').fadeIn();
		}
	});

});