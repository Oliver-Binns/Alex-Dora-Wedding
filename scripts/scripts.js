/* Smooth scrolling to anchor points */
var currency = [];
$(function(){
	//Gets the current currency values.
	$.ajax({
		url: 'https://api.fixer.io/latest'
	}).done(function(data){
		currency = data.rates;
		addCurrencies();
	});
});

function addCurrencies(){
	$(".currency").each(function(index) {
		var price = this.getAttribute('data-price');
		this.title = '£' + (price * currency.GBP).toFixed(2);
		this.innerHTML = '€' + price;
	});
}

$(function() {
    $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                window.history.replaceState(null, "Alex & Dora", location.origin + '/' + this.hash);
                return false;
            }
        }
    });
});

//Set up Maps-
$(function(){
    var input = /** @type {!HTMLInputElement} */(
        document.getElementById('car-input'));
    var autocomplete = new google.maps.places.Autocomplete(input);
});

function switchTravel(travelType){
	var typeDiv = $('.travel_'+travelType);
	if(typeDiv.hasClass('do_not_show')){
		$('.travel_option').animate({
			opacity:0
		}, 500, function(){
			$('.travel_option').addClass('do_not_show');
			$('.travel_option').css('opacity', 1);
			typeDiv.css('opacity', 0);
			typeDiv.removeClass('do_not_show');
			typeDiv.animate({
				opacity:1
			}, 500);
		}.bind(typeDiv));
	}
}

//Car Hire URL.
function getCarHirePrices(){
	var airport = $('[name=airportToHire]').val();
	var pickUp = $('[name=arrivalForHire]').val();
	var dropOff = $('[name=departureForHire]').val();

	$.ajax({
		url: 'https://api.sandbox.amadeus.com/v1.2/cars/search-airport?apikey=ZcEbYv1YD3fcNTOH9mEUmFTQAkUxph19&location=' + airport + '&pick_up='+ pickUp +'&drop_off=' + dropOff + '&lang=EN&currency=EUR'
	}).done(function(data){
		var results = data.results;
		console.log(results);
		$('.car-hire-results').html('');
		for(var i = 0; i < results.length; i++){
			var name = results[i].provider.company_name;

			var cars = results[i].cars;
			var min = cars[0].estimated_total.amount;
			var max = 0;
			for(var j = 0; j < cars.length; j++){
				min = Math.min(cars[i].estimated_total.amount, min);
				max = Math.max(cars[i].estimated_total.amount, max);
			}
			var priceText = '';
			if(min == max){
				priceText = 'Priced at ' + getCurrencyDiv(min) + '.';
			}else{
				priceText = 'Prices from ' + getCurrencyDiv(min) + ' to ' + getCurrencyDiv(max) + '.';
			}
			$('.car-hire-results').append('<h4>'+name+'</h4>' + priceText);
		}
		addCurrencies();
	});
}

function getCurrencyDiv(cost){
	return '<div data-price="'+cost+'" class="currency"></div>'
}