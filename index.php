<?php
	include 'phpUI/autoloader.php';
	use phpHTML\UICore\UIDiv;
	use phpHTML\UICore\UIPage\UINav;
	use phpHTML\UICore\UILink;
	use phpHTML\JSCore\JSObject;
	use phpHTML\UICore\UISection;
	use phpHTML\UICore\UISpan;

?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="styles/styles.css">
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

			echo new UISection(['<h1>Alex & Dora</h1>'], 'background');

			echo new UIDiv([
				new UILink('','','','','home'),
				new UISection([], 'section0'),
				new UILink('','','','','our-story'),
				new UISection([
					new UIDiv(['It all started back in the summer of 2012 when we were on tour with the European Union Youth Orchestra, which draws some of the best young musicians from across the EU. We both became friends, and of course, our friendship became official on Facebook a few days later.<br><br>The following summer, Dora was about to tour with the orchestra again, but she stopped off in London to find accommodation for her postgraduate studies which she was about to start that September. Still as friends, and rather unromantically, we met for a coffee at Victoria Station and it was from then on that a long string of very long messages and phone calls between us started. Later that summer Alex decided to visit Amsterdam for Dora&rsquo;s final stop on the orchestral tour. We had been in Amsterdam on tour the previous year buy Alex hadn&rsquo;t had chance to explore properly so it seemed like the perfect excuse for him to go back! We met for a romantic dinner in the heart of Amsterdam and it was from then on that our relationship blossomed. The following week Dora moved to London and we&rsquo;ve both been inseperable ever since.<br><br>Fast forward to August 2015- it was a beautiful summer evening in Makrinitsa on the Pelion Mountain in Greece, and Dora and Alex were celebrating two years together surrounded by Dora&rsquo;s close family and a few friends, when all of a sudden Alex proposed and without hesitation Dora said &lsquo;YES&rsquo;! We are very excited for the wedding and we hope you can join us to celebrate this special occasion.'], 'container')
				], 'our-story'),
				new UILink('','','','','the-day'),
				new UISection([], 'the-day'),
				new UILink('','','','','travel'),
				new UISection([
						new UIDiv([
								new UIDiv([new UISpan([], ['glyphicon', 'fa', 'fa-plane']),new UISpan([], ['glyphicon', 'fa', 'fa-ship']),new UISpan([], ['glyphicon', 'fa', 'fa-subway']),new UISpan([], ['glyphicon', 'fa', 'fa-taxi']),new UISpan([], ['glyphicon', 'fa', 'fa-bus'])], 'icons')
						], 'container')
				], 'travel'),
				new UILink('','','','','recommendations'),
				new UISection([], 'recommendations')
			], 'body-sections');

			echo new JSObject('',JSObject::libraryLink('jquery', '2.2.3'));
        		echo new JSObject('','bootstrap/dist/js/bootstrap.min.js');
		?>
	</body>
</html>
