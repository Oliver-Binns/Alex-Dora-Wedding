<?php
	include 'phpUI/autoloader.php';
	use phpHTML\UICore\UIPage\UINav;
	use phpHTML\UICore\UILink;
	use phpHTML\JSCore\JSObject;
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
				new UILink('Travel'),
				new UILink('Recommendations')
			]) ?>				
		
		<?php 
			echo new JSObject('',JSObject::libraryLink('jquery', '2.2.3'));
        		echo new JSObject('','bootstrap/dist/js/bootstrap.min.js');
		?>
	</body>
</html>
