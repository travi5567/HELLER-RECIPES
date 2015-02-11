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


	function getStocks(stocks){
		return  stocks.map(function(stock){
			return stock.price;
		});
	}

	var symbols = getStocks([
		{ symbol: 'xfx', price: 240.22, volume: '23432' },
		{ symbol: 'fvd', price: 124.21, volume: '53343' },
		{ symbol: 'tra', price: 43.54, volume: '35455' },
		{ symbol: 'erc', price: 32.65, volume: '64554' }
	]);

	console.log(JSON.stringify(symbols));
	
	var colorArray = ['red','green','blue','purple','orange'];
	var myFish = ['angel', 'clown', 'mandarin', 'surgeon'];

	console.log(colorArray);
	console.log(myFish);

	myFish = myFish.splice(2, 0, 'drum');
	console.log(myFish);

	colorArray = colorArray.splice(1,1,'pink');
	console.log(colorArray);


});