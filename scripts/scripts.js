/* Smooth scrolling to anchor points */
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