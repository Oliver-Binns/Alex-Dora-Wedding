<?php
	include 'phpUI/autoloader.php';
	use phpHTML\UICore\UIDiv;
	use phpHTML\UICore\UIGlyphicon;
	use phpHTML\UICore\UIPage\UINav;
	use phpHTML\UICore\UILink;
	use phpHTML\JSCore\JSObject;
	use phpHTML\UICore\UISection;

?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="styles/styles.css">
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
						new UIDiv([new UIGlyphicon(UIGlyphicon::PLANE), new UIGlyphicon(UIGlyphicon::ROAD), new UIGlyphicon(UIGlyphicon::PRINT_), new UIGlyphicon(UIGlyphicon::CAMERA)], 'icons')
					], 'container')
				], 'section1'),
				'</a>'
			], 'body-sections');

			echo new JSObject('',JSObject::libraryLink('jquery', '2.2.3'));
        		echo new JSObject('','bootstrap/dist/js/bootstrap.min.js');
		?>
	</body>
</html>