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
		<?php require_once 'styles.php' ?>
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
							'website' => 'http://www.trainose.gr/en/tourism-culture/train-and-recreation/the-pelion-train/',
							'location' => 'https://goo.gl/maps/891ZQx59BdK2'
						],
						'Agios Nikolaos Cathedral' => (object)[
							'image' => 'attractions/cathedral.jpg',
							'website' => 'http://www.ag-nikolaos.itgo.com/',
							'location' => 'https://goo.gl/maps/VmGJbGbQVi52'
						],
						'Brickworks Museum' => (object)[
							'image' => 'attractions/rooftile-museum.jpg',
							'website' => 'http://www.piop.gr/en/diktuo-mouseiwn/Mouseio-Plinthokeramopoieias-Tsalapata/to-mouseio.aspx',
							'location' => 'https://goo.gl/maps/iBsPqppo2Pw'
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
						'Pelion Gastronomy' => (object)[
							'image' => 'attractions/gastronomy.jpg',
							'website' => 'http://www.peliongastronomy.gr/',
							'location' => 'https://goo.gl/maps/9JbETHxwF5U2'
						],
						'Pelion Mountain' => (object)[
							'image' => 'attractions/mountain.jpg',
							'website' => 'http://www.discoverpelio.com/',
							'location' => 'https://goo.gl/maps/wAtaeK6mwx92',
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
						'Six Keys' => (object)[
							'image' => 'hotels/6keys.jpg',
							'website' => 'http://www.sixkeys.gr',
							'location' => 'https://goo.gl/maps/jR6jWuDoSSR2'
						],
						'Xenia Palace' => (object)[
							'image' => 'hotels/xenia_hotel.jpg',
							'website' => 'http://www.domotel.gr/hotel/4/Xenia-Volos',
							'location' => 'https://goo.gl/maps/ZimNLNVHHSQ2'
						],
						'Melanthi Mansion' => (object)[
							'website' => 'http://www.melanthi.gr',
							'location' => 'https://goo.gl/maps/kNpzepr5C432',
							'image' => 'hotels/melanthi.jpg'
						],
						'Valeni Boutique Hotel' => (object)[
							'website' => 'http://www.valeni.gr',
							'location' => 'https://goo.gl/maps/ceyTCm5nUGr',
							'image' => 'hotels/valeni.jpg'
						],
						'Portaria Hotel' => (object)[
							'website' => 'http://www.portariahotel.gr',
							'image' => 'hotels/portaria.jpg',
							'location' => 'https://goo.gl/maps/H6xxtEPdRBs'
						],
						'Kritsa Hotel' => (object)[
							'website' => 'http://www.hotel-kritsa.gr',
							'location' => 'https://goo.gl/maps/9JbETHxwF5U2',
							'image' => 'hotels/kritsa.jpg'
						]
					],
					'Restaurants' => [
						'Tsipouradiko Iolkos' => (object)[
							'image' => 'restaurants/ouzeri_iolkos.jpg',
							'website' => 'http://ouzeri-iolkos.gr/iolkos/',
							'location' => 'https://goo.gl/maps/bTZwJd23hVx'
						],
						'Six Keys' => (object)[
							'image' => 'bars/6keys.jpg',
							'website' => 'http://www.sixkeys.gr',
							'location' => 'https://goo.gl/maps/jR6jWuDoSSR2'
						],
						'Plagios' => (object)[
							'image' => 'restaurants/plagios.jpg',
							'website' => 'https://www.facebook.com/pages/Plagios/188661704504240',
							'location' => 'https://goo.gl/maps/zszgxbJTgfN2'
						],
						'Tsipouradiko Papadis' => (object)[
							'image' => 'restaurants/papadis.jpg',
							'website' => 'http://www.papadis.gr',
							'location' => 'https://goo.gl/maps/Vm3ZkkZGjzR2'
						],
						'Ortansies' => (object)[
							'image' => 'restaurants/ortansies.jpg',
							'location' => 'https://goo.gl/maps/QEe4dtdFCFD2',
							'website' => 'http://www.ortansies.com/'
						],
						'Kritsa Gastronomy' => (object)[
							'website' => 'http://www.peliongastronomy.gr/',
							'image' => 'restaurants/kritsa.jpg',
							'location' => 'https://goo.gl/maps/9JbETHxwF5U2'
						]
						//'Bokos' => (object)[]
					],
					'Bars' => [
						'Elli’s Chocolaterie' => (object)[
							'image' => 'bars/chocolaterie.jpg',
							'website' => 'https://www.facebook.com/%CE%95%CE%9B%CE%9B%CE%97s-Chocolaterie-Viennoise-335577223300599/'
						],
						'H&auml;agen Dazs' => (object)[
							'image' => 'bars/haagen_dazs.jpg',
							'website' => 'https://www.facebook.com/Haagen-Dazs-Volou-404229046427443',
							'location' => 'https://goo.gl/maps/wLR8UU2utit'
						],
						'Dodoni Ice Cream' => (object)[
							'image' => 'bars/dodoni.jpg',
							'website' => 'http://www.dodoni.com.gr/index.php/en/',
							'location' => 'https://goo.gl/maps/MYS88wVuzQ42'
						],
						'Six Keys' => (object)[
							'image' => 'bars/6keys.jpg',
							'website' => 'http://www.sixkeys.gr',
							'location' => 'https://goo.gl/maps/jR6jWuDoSSR2'
						],
						'Amaryllis Cafe' => (object)[
							'image' => 'bars/amaryllis.jpg',
							'location' => 'https://goo.gl/maps/FhN7SD7G1yq',
							'website' => 'https://www.facebook.com/pages/Amaryllis-Cafe-Bistrot/217681478428163'
						],
						'Park Hotel Roof Bar' => (object)[
							'image' => 'bars/roofbar.jpg',
							'website' => 'http://amhotels.gr/parkhotel_en.html',
							'location' => 'https://goo.gl/maps/x7G7z5qAqXQ2'
						]
						//'Rivera Bar' => (object)[]
					],
					'Beaches' => [
						'Agios Ioannis' => (object)[
							'image' => 'beaches/agios_ioannis.jpg',
							'location' => 'https://goo.gl/maps/a7jtjWu6gHT2'
						],
						'Milopotamos' => (object)[
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
						'Mourtias' => (object)[
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
				//new UILink('Travel','#travel'),
				new UILink('Recommendations', '#recommendations'),
				new UILink('RSVP', '#rsvp')
			], [], [], UINav::FIXED_TOP);

			//echo
			echo new UISection([], 'background', 'background2');

			echo new UIDiv([
				new UILink('','','','','home'),
					new UISection(
						[
								new UIDiv([
										new UIDiv([
												new UIDiv([
														new UIDiv([new UIDiv()], ['height2', 'width2', 'image0', 'image']),
														new UIDiv([new UIDiv()], ['height2', 'width2', 'image1', 'image']),
														new UIDiv([new UIDiv()], ['height3', 'width1', 'countdown', 'image']),
														new UIDiv([new UIDiv()], ['height3', 'width1', 'image2', 'image']),
														new UIDiv([
																new UIHeading(1, 'Alex & Dora')
														], ['height1', 'width3']),
														new UIDiv([new UIDiv()], ['height2', 'width2', 'image3', 'image']),
														new UIDiv([new UIDiv()], ['height2', 'width2', 'image4', 'image']),
												], 'homepage-content')
										], ['homepage-view', 'container'])
								], 'homepage-container')
						]
				),
				new UILink('','','','','our-story'),
				new UISection([
					new UIDiv([
						new UIHeading(1, 'Our Story'),
						new UIParagraph('Dora and Alexander first met in the beautiful northern Italian Alps whilst on tour with the European Union Youth Orchestra in the summer of 2012. They quickly became friends but as Dora was studying at the Oberlin College Conservatory in America and Alexander was studying at the Royal Academy in London they didn’t meet again until the following summer.<br><br>In the summer of 2013, Dora again touring with the orchestra in Europe and on her way, stopped off in London to organise accommodation for the September as she was starting her postgraduate studies at the Guildhall in London.  On a beautiful summer’s day,  Alexander and Dora met for coffee and spent the day talking and getting to know each other better.<br><br>Later that summer Alex decided to surprise Dora and travelled to Amsterdam where the orchestra had its final concert of the tour.  They met for a romantic dinner in the heart of the city and during a moonlit walk along the canals they became a couple.<br><br>In August 2015, on a beautiful summer evening in Makrinitsa on the Pelion Mountain in Greece, surrounded by Dora’s family and a few of their friends, Alex proposed marriage and without hesitation Dora said yes.<br><br>Dora and Alexander have been together over three years now, their love for each other grows daily and they are really looking forward to celebrating their wedding with you in the same little village of Makrinitsa where they became engaged.')
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
						new UIHeading(4, 'Dinner'),
						new UIHeading(4, 'Cutting of the Cake'),
						new UIHeading(4, 'Speeches'),
						new UIHeading(4, 'First Dance'),
						new UIHeading(4, 'Party'),
						new UIHeading(4, 'Carriages')
					], 'container')
				], 'the-day'),
				/*new UILink('','','','','travel'),
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
				/*new UISection([
					new UIDiv([
						new UIHeading(1, 'Travel Planner'),
						new UIDiv([
							new UIDiv([
								(new UITextBox('', '', 'Enter a location..', '', false, 'form-control', 'car-input'))->withLabel('Travelling From')
							], 'col-xs-12'),
						], 'row'),
						new UIDiv([
								new UIDiv([
										(new UITextBox('22-06-2017', '', 'Arrival', '', false, ['form-control','date-input']))->withLabel('Date of Arrival')
								], 'col-xs-4'),
								new UIDiv([
										(new UITextBox('29-06-2017', '', 'Departure', '', false, ['form-control','date-input']))->withLabel('Date of Departure')
								], ['col-xs-4']),
								new UIDiv([
										(new UIDropdown([
												['text' => 'No'],
												['text' => 'Yes']
										], 'No'))->withLabel('Car Hire Needed')
								], 'col-xs-4')
						], 'row'),
						new UIDiv([
							new UIDiv([
									(new UITextBox('1', '', 'No. Adults'))->withLabel('Number of Adults')
							], 'col-xs-4'),
							new UIDiv([
									(new UITextBox('0', '', 'No. Children'))->withLabel('Number of Children')
							], 'col-xs-4'),
							new UIDiv([
									/*(new UIDropdown([
											['text' => 'No'],
											['text' => 'Yes']
									], 'No'))->withLabel('Car Hire Needed')
							], 'col-xs-4')
						], 'row')
					],'container')
				], 'travel'),*/
				new UILink('','','','','recommendations'),
				new UISection([
					new UIDiv($recommendations_div, 'container')
				], 'recommendations'),
				new UILink('','','','','rsvp'),
				new UISection([
					new UIDiv([
						new UIDiv(new UIDiv([new UIHeading(1, 'RSVP')], 'col-xs-12'), 'row'),
						new UIDiv(
						[
							new UIDiv([new UITextBox('', 'Name', 'Your Name')], 'col-xs-6'),
							new UIDiv([new UITextBox()], 'col-xs-6')
						],
							'row')
					], 'container')
				], 'rsvp')
			], 'body-sections');
			require_once 'scripts.php';
		?>
	</body>
</html>
