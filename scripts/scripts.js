/* Smooth scrolling to anchor points */
var currency = [];
$(function(){
	//Gets the current currency values.
	$.ajax({
		url: 'https://api.fixer.io/latest'
	}).done(function(data){
		currency = data.rates;
		$(".currency").each(function(index) {
			var pounds = '£' + (this.innerHTML * currency.GBP).toFixed(2);
			this.title = pounds;
		});
		$('.currency').append('€');

	});
});

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
//https://api.sandbox.amadeus.com/v1.2/cars/search-airport?apikey=ZcEbYv1YD3fcNTOH9mEUmFTQAkUxph19&location=VOL&pick_up=2016-06-04&drop_off=2016-06-08&lang=EN&currency=EUR