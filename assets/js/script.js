$(function(){
	var recipe = $('.top-heading');
	var btmInfo = $('.bottom-info');
	btmInfo.hide();

	recipe.on('click', function(){
		if($(this).next('div').css('display') === 'block'){
			$(this).next('div').fadeOut();
		}
		else{
			btmInfo.hide();
			$(this).next('div').fadeIn();
			var recipe_id = $(this).next().find('i').text();
			console.log(recipe_id);

		}
	});

	var goBack = function(){
		javascript:window.history.go(-1);
	};

});