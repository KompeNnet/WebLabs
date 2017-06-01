<?php	
	if ( !$_POST['g-recaptcha-response'] )
		exit('Captcha!');
	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$key = '6LeLUyIUAAAAAG2cINgCVhT4_GL9HhCWXbeBZS7j';
	$query = $url.'?secret='.$key.'&response='.$_POST['g-recaptcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR'];

	if (($_POST['myMail'] != NULL) && ($_POST['subject'] != NULL) && ($_POST['text'] != NULL))
	{
		mail($_POST['mail'], $_POST['subject'], $_POST['text'], 'From: ' . $_POST['myMail']);
	    echo"<strong>Success!</strong>";
	}
	else	 
	{
		exit('Really empty?');
	}
?>