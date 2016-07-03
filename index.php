<?php
	include 'phpUI/autoloader.php';
	use phpHTML\UICore\UIDiv;
	use phpHTML\UICore\UIHeading;
	use phpHTML\UICore\UIImage;
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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.min.css">
		<link rel="stylesheet" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css">
		<link rel="stylesheet" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css">
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="styles/styles.css?v=1.01">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="noindex">
		<title>Alex & Dora</title>
	</head>
	<body>
		<?php
			// Set up recommendations section-
			$recommendations_div = [
					new UIDiv([
							new UILink(new UISpan([], ['glyphicon', 'fa', 'fa-picture-o'], 'attractions'),'#recommendations','switchPane(this);'),
							new UILink(new UISpan([], ['glyphicon', 'fa', 'fa-bed'], 'hotels'),'#recommendations','switchPane(this);'),
							new UILink(new UISpan([], ['glyphicon', 'fa', 'fa-cutlery'], 'restaurants'),'#recommendations','switchPane(this);'),
							new UILink(new UISpan([], ['glyphicon', 'fa', 'fa-glass'], 'bars'),'#recommendations','switchPane(this);'),
							new UILink(new UISpan([], ['glyphicon', 'fa', 'fa-sun-o'], 'beaches'),'#recommendations','switchPane(this);')
					], 'icons')
			];

			$arr = [
					'Attractions' => [
						'Pelion Train' => (object)[
							'image' => 'attractions/pellion_train.jpg',
							'website' => 'http://www.trainose.gr/en/tourism-culture/train-and-recreation/the-pelion-train/'
						],
						'Open Air Cinema' => (object)[
							'image' => 'attractions/open_air.jpg',
							'website' => 'http://exoraistiki.gr/',
							'location' => 'https://goo.gl/maps/CRHcZ9FGSoH2'
						],
						'Archaelogical Museum' => (object)[
							'image' => 'attractions/archaeology.jpg',
							'website' => 'http://odysseus.culture.gr/h/1/eh151.jsp?obj_id=3271',
							'location' => 'https://goo.gl/maps/2AvnuCqs8wH2'
						],
						'Meteora' => (object)[
							'image' => 'attractions/meteora.jpg',
							'website' => 'https://www.visitmeteora.travel/',
							'location' => 'https://goo.gl/maps/wmsowztHhc32'
						]
					],
					'Hotels' => [
						'Archontika Karamarlis' => (object)[
							'image' => 'hotels/archontika_karamarlis.jpg',
							'website' => 'http://www.archontikakaramarlis.gr',
							'location' => 'https://goo.gl/maps/xiqKJbFJqvM2'
						],
						'Park Hotel' => (object)[
							'image' => 'hotels/park_hotel.jpg',
							'website' => 'http://amhotels.gr/parkhotel_en.html',
							'location' => 'https://goo.gl/maps/x7G7z5qAqXQ2'
						],
						'Xenia Hotel' => (object)[
							'image' => 'hotels/xenia_hotel.jpg',
							'website' => 'http://www.domotel.gr/hotel/4/Xenia-Volos',
							'location' => 'https://goo.gl/maps/ZimNLNVHHSQ2'
						]
					],
					'Restaurants' => [
						'Ouzeri Iolkos' => (object)[
							'image' => 'restaurants/ouzeri_iolkos.jpg'
						],
						'Kottes' => (object)[]
					],
					'Bars' => [
						'E&Lambda;&Lambda;H’s Chocolaterie' => (object)[
							'image' => 'bars/chocolaterie.jpg',
							'website' => 'https://www.facebook.com/%CE%95%CE%9B%CE%9B%CE%97s-Chocolaterie-Viennoise-335577223300599/'
						],
						'H&auml;agen Dazs' => (object)[
							'image' => 'bars/haagen_dazs.jpg',
							'website' => 'https://www.facebook.com/Haagen-Dazs-Volou-404229046427443',
							'location' => 'https://goo.gl/maps/wLR8UU2utit'
						],
						'Dwdorean Ice Cream' => (object)[

						]
					],
					'Beaches' => [
						'Agios Ioannis' => (object)[
							'image' => 'beaches/agios_ioannis.jpg',
							'location' => 'https://goo.gl/maps/a7jtjWu6gHT2'
						],
						'Mylopotamos' => (object)[
							'image' => 'beaches/mylopotamos.jpg',
							'location' => 'https://goo.gl/maps/YWJPewr9Dtt'
						],
						'Papa Nero' => (object)[
							'image' => 'beaches/papa_nero.jpg',
							'location' => 'https://goo.gl/maps/MQ5HBaRqHJN2'
						],
						'Horefto' => (object)[
							'image' => 'beaches/horefto.jpg',
							'location' => 'https://goo.gl/maps/SW5RznsSzTL2'
						],
						'Fakistra' => (object)[
							'image' => 'beaches/fakistra.jpg',
							'location' => ''
						],
						'Damouchari' => (object)[
							'image' => 'beaches/damouchari.jpg',
							'location' => 'https://goo.gl/maps/wkME28RmAh12'
						],
						'Mourtia' => (object)[
							'image' => 'beaches/mourtia.jpg',
							'location' => 'https://goo.gl/maps/NhHZmvTQ7pN2'
						],
						'Katigiorgis' => (object)[
							'image' => 'beaches/katigiorgis.jpg',
							'location' => 'https://goo.gl/maps/pudTgdJiPin'
						],
						'Platanias' => (object)[
							'image' => 'beaches/platanias.jpg',
							'location' => 'https://goo.gl/maps/219NuMJzKF72'
						],
						'Potistika' => (object)[
							'image' => 'beaches/potistika.jpg',
							'location' => 'https://goo.gl/maps/BdYWX6UnBKy'
						],
					]
			];
			foreach($arr as $group => $recommendation){
				$classes = ['recommendations_option', 'recommendations_' . strtolower($group), 'row'];
				if($group !== 'Attractions'){
					array_push($classes, 'do_not_show');
				}

				$slider = new UIDiv([], 'slick-slider');
				foreach($recommendation as $name => $data){
					$div = new UIDiv([
						new UIImage(isset($data->image)?'img/recommendations/'.$data->image:''),
						new UIHeading(3, $name)
					], 'recommendation');

					$locations_links = new UIDiv([], 'locations-links');
					if(isset($data->website)){
						$locations_links->addContent(new UILink(new UISpan([], ['glyphicon', 'fa', 'fa-mouse-pointer', 'website-link']), $data->website, '', '_blank'));
					}
					if(isset($data->location)){
						$locations_links->addContent(new UILink(new UISpan([], ['glyphicon', 'fa', 'fa-map-marker', 'maps-link']), $data->location, '', '_blank'));
					}
					$div->addContent($locations_links);

					$slider->addContent(new UIDiv([$div]));
				}

				$div = new UIDiv(
						[
								new UIHeading(2, $group),
								$slider
						],
						$classes
				);
				array_push($recommendations_div, $div);
			}


			echo new UINav('', [
				new UILink('Home', '#home'),
				new UILink('Our Story', '#our-story'),
				new UILink('The Wedding Day', '#the-day'),
				new UILink('Travel','#travel'),
				new UILink('Recommendations', '#recommendations'),
				new UILink('RSVP', '#rsvp')
			], [], [], UINav::FIXED_TOP);

			echo new UISection(
					[
							new UIHeading(1, 'Alex & Dora'),
							new UIHeading(4, '27<sup>th</sup> July 2017')
					],
					'background',
					'background1'
			);
			echo new UISection([], 'background', 'background2');

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
				new UISection([
					new UIDiv([
						new UIHeading(1, 'The Big Day'),
						new UIHeading(2, 'The Wedding'),
						new UIHeading(4, 'Ceremony'),
						new UIHeading(4, 'Photos'),
						new UIHeading(2, 'Reception'),
						new UIHeading(4, 'Welcome Drinks'),
						new UIHeading(4, 'Speeches'),
						new UIHeading(4, 'First Dance'),
						new UIHeading(4, 'Cake'),
						new UIHeading(4, 'Disco')
					], 'container')
				], 'the-day'),
				new UILink('','','','','travel'),
				new UISection([
						    new UIDiv([
                                new UIDiv([
		                                new UILink(new UISpan([], ['glyphicon', 'fa', 'fa-plane'], 'plane'),'#travel','switchPane(this);'),
		                                new UILink(new UISpan([], ['glyphicon', 'fa', 'fa-ship'], 'ship'),'#travel','switchPane(this);'),
		                                new UILink(new UISpan([], ['glyphicon', 'fa', 'fa-subway'], 'train'),'#travel','switchPane(this);'),
		                                new UILink(new UISpan([], ['glyphicon', 'fa', 'fa-taxi'], 'taxi'),'#travel','switchPane(this);'),
		                                new UILink(new UISpan([], ['glyphicon', 'fa', 'fa-bus'], 'coach'),'#travel','switchPane(this);'),
		                                new UILink(new UISpan([], ['glyphicon', 'fa', 'fa-car'], 'car'), '#travel','switchPane(this);')
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
	                                new UIDiv(new UITextBox('22-06-2017', 'arrivalForHire', 'Select xArrival Date'), ['col-xs-4','date-input']),
	                                new UIDiv(new UITextBox('29-06-2017', 'departureForHire', 'Select Departure Date'), ['col-xs-4','date-input']),
	                                new UIDiv([], 'car-hire-results')
                                ], 'row'),
	                            //Get Directions
                                new UIDiv([
	                                new UIDiv([
	                                    new UIHeading(3, 'Get Directions'),
                                        new UITextBox('', '', 'Enter a location..', '', false, 'form-control', 'car-input')
	                                ], 'col-xs-12')
                                ], 'row')
                            ], ['travel_option', 'travel_car', 'row', 'do_not_show']),
						], 'container')
				], 'travel'),
				new UILink('','','','','recommendations'),
				new UISection([
					new UIDiv($recommendations_div, 'container')
				], 'recommendations'),
				new UILink('','','','','rsvp'),
				new UISection([
					new UIDiv([
						new UIDiv(new UIDiv([new UIHeading(1, 'RSVP Now')], 'col-xs-12'), 'row'),
						new UIDiv(
						[
							new UIDiv([new UITextBox('', 'Name', 'Your Name')], 'col-xs-6'),
							new UIDiv([new UITextBox()], 'col-xs-6')
						],
							'row')
					], 'container')
				], 'rsvp')
			], 'body-sections');

			echo new JSObject('',JSObject::libraryLink('jquery', '2.2.3'));
            echo new JSObject('','bootstrap/dist/js/bootstrap.min.js');
            echo new JSObject('','https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js');
            echo new JSObject('','//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js');
            echo new JSObject('','scripts/scripts.js');
            echo new JSObject('','https://maps.googleapis.com/maps/api/js?key=AIzaSyBtPi4zADmslpF6tUoBb3iuspEmBDxDHI0&libraries=places');
		?>
	</body>
</html>
