<?php
	header('Content-Type: text/html; charset=utf8');	//中文亂碼
	$mailto = 's904442000@gmail.com';
	$mailtitle = @$_POST['mailtitle'];
	$mailtext = @$_POST['mailtext'];
	$mailfrom = 'From:dana@msYY.hinet.net'."\r\n";
	
	mail($mailto,$mailtitle,$mailtext,$mailfrom);
?>