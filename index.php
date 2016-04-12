<?php
	include 'phpUI/autoloader.php';
	use phpHTML\UICore\UIDiv;
	use phpHTML\UICore\UIGlyphicon;
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
				new UILink('Our Story'),
				new UILink('The Wedding Day'),
				new UILink('Travel','#travel'),
				new UILink('Recommendations')
			], [], [], UINav::FIXED_TOP);

			echo new UISection(['<h1>Alex & Dora</h1>'], 'background');

			echo new UIDiv([
				new UISection([], 'section0'),
				'<a name="travel">',
				new UISection([
					new UIDiv([
						new UIDiv([new UISpan([], ['glyphicon', 'fa', 'fa-plane']),new UISpan([], ['glyphicon', 'fa', 'fa-ship']),new UISpan([], ['glyphicon', 'fa', 'fa-subway']),new UISpan([], ['glyphicon', 'fa', 'fa-taxi']),new UISpan([], ['glyphicon', 'fa', 'fa-bus'])], 'icons')
					], 'container')
				], 'section1'),
				'</a>'
			], 'body-sections');

			echo new JSObject('',JSObject::libraryLink('jquery', '2.2.3'));
        		echo new JSObject('','bootstrap/dist/js/bootstrap.min.js');
		?>
	</body>
</html>
