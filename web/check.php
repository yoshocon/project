<?php
	include('set.php');
	$check1 = mt_rand(0,9);
	$check2 = mt_rand(0,9);
	$check3 = mt_rand(0,9);
	$check4 = mt_rand(0,9);
	
	$check = $check1 . $check2 . $check3 . $check4;
	
	$_SESSION['check'] = $check;
	
	echo "<img src='img/num/0" . $check1 . ".png' value='" . $check1 . "' />";
	echo "<img src='img/num/0" . $check2 . ".png' value='" . $check2 . "' />";
	echo "<img src='img/num/0" . $check3 . ".png' value='" . $check3 . "' />";
	echo "<img src='img/num/0" . $check4 . ".png' value='" . $check4 . "' />";
	echo "&nbsp;&nbsp;&nbsp;";
	echo "<input type='text' style='width:80px;' name='check' required />";
?>
