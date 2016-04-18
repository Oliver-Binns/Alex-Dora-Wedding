<?php
	include 'phpUI/autoloader.php';
	use phpHTML\UICore\UIDiv;
	use phpHTML\UICore\UIHeading;
	use phpHTML\UICore\UIInput\UIDatePicker;
	use phpHTML\UICore\UIInput\UIDropdown;
	use phpHTML\UICore\UIInput\UITextBox;
    use phpHTML\UICore\UIInput\UITextInput;
    use phpHTML\UICore\UIPage\UINav;
	use phpHTML\UICore\UILink;
	use phpHTML\JSCore\JSObject;
	use phpHTML\UICore\UIParagraph;
	use phpHTML\UICore\UISection;
	use phpHTML\UICore\UISpan;

?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="styles/styles.css?v=1.01">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="noindex">
		<title>Alex & Dora</title>
	</head>
	<body>
		<?php
			echo new UINav('', [
				new UILink('Home', '#home'),
				new UILink('Our Story', '#our-story'),
				new UILink('The Wedding Day', '#the-day'),
				new UILink('Travel','#travel'),
				new UILink('Recommendations', '#recommendations')
			], [], [], UINav::FIXED_TOP);

			echo new UISection([new UIHeading(1, 'Alex & Dora')], 'background');

			echo new UIDiv([
				new UILink('','','','','home'),
				new UISection([], 'section0'),
				new UILink('','','','','our-story'),
				new UISection([
					new UIDiv([
						new UIHeading(1, 'Our Story'),
						new UIParagraph('It all started back in the summer of 2012 when we were on tour with the European Union Youth Orchestra, which draws some of the best young musicians from across the EU. We both became friends, and of course, our friendship became official on Facebook a few days later.<br><br>The following summer, Dora was about to tour with the orchestra again, but she stopped off in London to find accommodation for her postgraduate studies which she was about to start that September. Still as friends, and rather unromantically, we met for a coffee at Victoria Station and it was from then on that a long string of very long messages and phone calls between us started. Later that summer Alex decided to visit Amsterdam for Dora&rsquo;s final stop on the orchestral tour. We had been in Amsterdam on tour the previous year buy Alex hadn&rsquo;t had chance to explore properly so it seemed like the perfect excuse for him to go back! We met for a romantic dinner in the heart of Amsterdam and it was from then on that our relationship blossomed. The following week Dora moved to London and we&rsquo;ve both been inseperable ever since.<br><br>Fast forward to August 2015- it was a beautiful summer evening in Makrinitsa on the Pelion Mountain in Greece, and Dora and Alex were celebrating two years together surrounded by Dora&rsquo;s close family and a few friends, when all of a sudden Alex proposed and without hesitation Dora said &lsquo;YES&rsquo;! We are very excited for the wedding and we hope you can join us to celebrate this special occasion.')
					], 'container')
				], 'our-story'),
				new UILink('','','','','the-day'),
				new UISection([], 'the-day'),
				new UILink('','','','','travel'),
				new UISection([
						    new UIDiv([
                                new UIDiv([
		                                new UILink(new UISpan([], ['glyphicon', 'fa', 'fa-plane']),'','switchTravel("plane");'),
		                                new UILink(new UISpan([], ['glyphicon', 'fa', 'fa-ship']),'','switchTravel("ship");'),
		                                new UILink(new UISpan([], ['glyphicon', 'fa', 'fa-subway']),'','switchTravel("train");'),
		                                new UILink(new UISpan([], ['glyphicon', 'fa', 'fa-taxi']),'','switchTravel("taxi");'),
		                                new UILink(new UISpan([], ['glyphicon', 'fa', 'fa-bus']),'','switchTravel("coach");'),
		                                new UILink(new UISpan([], ['glyphicon', 'fa', 'fa-car']), '', 'switchTravel("car");')
                                ], 'icons'),
							new UIDiv(
									[
										new UIHeading(2, 'Travel by Plane'),
										'Volos (Nea Anchilalos) - 25 km'
									],
									['travel_option', 'travel_plane', 'row']
							),
							new UIDiv(
									[
										new UIHeading(2, 'Travel by Sea'),
										'Volos is the third largest port in Greece after Pireaus and Thessaloniki. Regular ferries run between Volos and Skiathos, Skopelos, Alonnisos, Glossa and Mantoudi.'
									],
									['travel_option', 'travel_ship', 'row', 'do_not_show']
							),
							new UIDiv(
									[
										new UIHeading(2, 'Travel by Train'),
										'Volos is home to a wonderful Bavarian style railway station which is the final stop on the branch line between Volos and Larissa. Trains run on this line every hour or two throughout the day from early morning to late evening. At Larissa you can change for the Green mainline and regular services to Athens (c. 5 hours) and Thessaloniki (c. 3 hours). A daily international rail service runs between Thessaloniki and Sofia in Bulgaria, Belgrade in Serbia and Skopje in Macedonia. For more details and train times visit http://www.trainose.gr/en/'
									],
									['travel_option', 'travel_train', 'row', 'do_not_show']
							),
							new UIDiv(
									[
										new UIHeading(2, 'Travel by Taxi'),
										'Prebooked taxis can be hired during non peak times from Athens airport to Volos at a price of ',
										'<div data-price="65" class="currency"></div>',
										' per person in a shared taxi or ',
										'<div data-price="260" class="currency"></div>',
										' for a private taxi. It may be possible to share a taxi with other guests so do get in touch if you would like to travel to Volos by taxi.'
									],
									['travel_option', 'travel_taxi', 'row', 'do_not_show']
							),
							new UIDiv(
									[
										new UIHeading(2, 'Travel by Coach'),
										'Coaches in Greece are clean, air-conditioned and equipped with WiFi. You can take a coach to Volos from Athens, Thessaloniki and several other large cities across the country. Please visit http://www.ktelvolou.gr to plan your journey.'
									],
									['travel_option', 'travel_coach', 'row', 'do_not_show']
							),
                            new UIDiv([
                                new UIDiv([
	                                new UIHeading(2, 'Travel by Car'),
                                    'Volos is located <span title="327 km">202 miles</span> from Athens and <span title="208 km">129 miles</span> from Thessaloniki. The E75 national motorway passes close by and the city centre can be reached by taking the exit onto the E92 motorway. The motorways are well signposted, but please note there are a number of toll stations so keep plenty of loose change!',
                                ], 'col-xs-12'),
	                            //Hire a Car
                                new UIDiv([
	                                new UIHeading(3, 'Hire a Car'),
	                                new UIDiv(new UIDropdown([[], ['value' => 'ATH', 'text' => 'Athens Airport'], ['value' => 'SKG', 'text' => 'Thessaloniki Airport'], ['value' => 'VOL', 'text' => 'Volos Airport']], '', 'airportToHire', 'getCarHirePrices()'), 'col-xs-4'),
	                                new UIDiv(new UITextBox('2016-06-04', 'arrivalForHire'), 'col-xs-4'),
	                                new UIDiv(new UITextBox('2016-06-08', 'departureForHire'), 'col-xs-4'),
	                                new UIDiv([], 'car-hire-results')
                                ], 'col-xs-12'),
	                            //Get Directions
                                new UIDiv([
	                                new UIHeading(3, 'Get Directions'),
                                    new UITextBox('', '', 'Enter a location..', '', false, 'form-control', 'car-input')
                                ], 'col-xs-12')
                            ], ['travel_option', 'travel_car', 'row', 'do_not_show']),
						], 'container')
				], 'travel'),
				new UILink('','','','','recommendations'),
				new UISection([], 'recommendations')
			], 'body-sections');

			echo new JSObject('',JSObject::libraryLink('jquery', '2.2.3'));
            echo new JSObject('','bootstrap/dist/js/bootstrap.min.js');
            echo new JSObject('','scripts/scripts.js');
            echo new JSObject('','https://maps.googleapis.com/maps/api/js?key=AIzaSyBtPi4zADmslpF6tUoBb3iuspEmBDxDHI0&libraries=places');
		?>
	</body>
</html>
