<?php
	use phpHTML\JSCore\JSObject;
	
	echo new JSObject('',JSObject::libraryLink('jquery', '2.2.3'));
	echo new JSObject('','bootstrap/dist/js/bootstrap.min.js');
	echo new JSObject('','https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js');
	echo new JSObject('','//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js');
	echo new JSObject('','scripts/scripts.js?v=1.01');
	echo new JSObject('','https://maps.googleapis.com/maps/api/js?key=AIzaSyBtPi4zADmslpF6tUoBb3iuspEmBDxDHI0&libraries=places');