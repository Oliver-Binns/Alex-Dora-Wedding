<?php
	require_once 'PHPMailer/PHPMailerAutoload.php';
	
	$mail = new PHPMailer();
	require_once "../smtp_conf.php";
	$mail->isSMTP();
	$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465;
	$mail->Username = $username;
	$mail->Password = $password;
	$mail->SetFrom($username, "Oliver Binns");
	$mail->Subject = "Wedding RSVP";
	
	$content = $_POST['name'].' rsvped as ';
	if($_POST['status'] == "Sorry, I can't make it."){
		$content.= '<b>not attending</b>.';
	}else{
		$content.= '<b>attending</b>.';
	}
	$content.= '<br><br>' . $_POST['comments'];
	
	$mail->Body = $content;
	$mail->AddAddress("alexbinns@aol.com");
	$mail->AddAddress('chatzigeorgioudorothea@gmail.com');
	$mail->addCC('mail@oliverbinns.co.uk');
	$mail->isHTML(true);
	if($mail->Send()) {
		echo "success";
	} else {
		echo "failure";
	}