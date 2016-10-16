<?php 
	include('../set.php');
	
	$identity = @$_GET['identity'];
	$code = @$_GET['code'];
	
	if($code != $_SESSION['admin_hash_code']){
		echo "<meta http-equiv=refresh content=0;url=../loading.php?condition=logout>";
	}
	
	$account = @$_GET['account'];
	echo $account ."<br>";
	
	$name = @$_POST['name'];
	$sex = @$_POST['sex'];
	$psd = @$_POST['psd'];
	$birthday = @$_POST['birthday'];
	$mail = @$_POST['mail'];
	$tel = @$_POST['tel'];
	$last_modify_time = date("Y-m-d H:i:s");
	$note = @$_POST['note'];
	
	
	echo $name . "<br>";
	echo $sex . "<br>";
	echo $psd . "<br>";
	echo $birthday . "<br>";
	echo $mail . "<br>";
	echo $tel . "<br>";
	echo $last_modify_time . "<br>";
	echo $note . "<br>";
	
	
	mysql_query("update `account` set `name` = '$name',`sex` = '$sex',`psd` = '$psd',`birthday` = '$birthday',`mail` = '$mail',`tel` = '$tel' , `last_modify_time` = '$last_modify_time',`note` = '$note' where `account` = '$account'");
	
	//echo "<meta http-equiv=refresh content=2;url=user_data.php?identity=" . $identity . "&code=" . $code . ">";
	header("Location:user_data.php?identity=" . $identity . "&code=" . $code );
?>