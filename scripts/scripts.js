/* Smooth scrolling to anchor points */
var currency = [];
$(function(){
	//Add Date pickers for date objects
	$('.date-input').datepicker({
		format: 'dd-mm-yyyy'
	});
	//Gets the current currency values.
	$.ajax({
		url: 'https://api.fixer.io/latest'
	}).done(function(data){
		currency = data.rates;
		addCurrencies();
	});

	$(window).scroll(function() {
		if(window.pageYOffset < window.innerHeight){
			$('#background2').css('display', 'none');
			$('.homepage-container').css('display', 'block');
		}else{
			$('#background2').css('display', 'block');
			$('.homepage-container').css('display', 'none');
		}
	});
	setupSlick();
	startCountdown();
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
    var input = /** @type {!HTMLInputElement} */(document.getElementById('car-input'));
    var autocomplete = new google.maps.places.Autocomplete(input);

	autocomplete.addListener('place_changed', function() {
		var place = autocomplete.getPlace();

		var components = place.address_components;
		var country = '';
		components.forEach(function(item, index){
			if(item.types.indexOf('country') != -1){
				country = item.short_name;
			}
		});

		var location = place.geometry.location;
		$.ajax({
			url: '../amadeus/makeCall.php?latitude=' + location.lat() + '&longitude' + location.lng() + '&country=' + country
		}).done(function(data){
			console.log(data);
			//todo- do something relevant with data
		});
	});
});

function switchPane(icon){
	var section = icon.parentElement.parentElement.parentElement;
	var section_name = section.classList[0];
	var pane_name = icon.childNodes[0].id;

	var typeDiv = $('.'+section_name+'_'+pane_name);
	if(typeDiv.hasClass('do_not_show')){
		var panes = $('.' + section_name + '_option');
		panes.stop(true, true);
		typeDiv.stop(true, true);
		panes.animate({
			opacity:0
		}, 500, function(){
			panes.addClass('do_not_show');
			panes.css('opacity', 1);
			typeDiv.css('opacity', 0);
			typeDiv.removeClass('do_not_show');
			$('.slick-slider').slick('setPosition');
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

	console.log('../amadeus/makeCall.php?transport=car_hire&airport=' + airport + '&pickUp=' + pickUp + '&dropOff=' + dropOff);

	$.ajax({
		url: '../amadeus/makeCall.php?transport=car_hire&airport=' + airport + '&pickUp=' + pickUp + '&dropOff=' + dropOff
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

function setupSlick(){
	$('.slick-slider').slick({
		dots: false,
		infinite: true,
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 720,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});
}

function startCountdown(){
	var wedding_date = new Date('Thu Jul 27 2017 19:00:00 GMT+0300 (EEST)'); //TODO add timezone :)

	var updateTimer = function(){
		var now = new Date();
		var t = wedding_date - now;
		var seconds = Math.floor((t/1000) % 60);
		var minutes = Math.floor((t/1000/60) % 60 );
		var hours = Math.floor( (t/(1000*60*60)) % 24 );
		var days = Math.floor( t/(1000*60*60*24) );

		var text = 'Only ';
		//Calculate the number of days..
		text += days;
		text += ' days, ';
		//Hours
		text += hours;
		text += ' hours, ';
		//Minutes
		text += minutes;
		text += ' minutes and ';
		//Seconds
		text += seconds;
		text += ' seconds ';
		text += 'until the big day!';
		$('.countdown div').html('<span>' + text + '</span>');
	};

	setInterval(updateTimer, 1000);
	updateTimer();

}

function sendRSVP(button){
	var reason = button.innerText;
	var container = $(button).parent().parent().parent();
	var name = container.find("input[name='name']").val();
	var comments = container.find("input[name='comments']").val();

	if(name != ""){
		$.post(
			"send-email.php",
			{
				name: name,
				comments: comments,
				status: reason
			}, function(data){ console.log(data); });
	}
}