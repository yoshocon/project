<?php
	include('../set.php');
	
	
	//判斷管理者
	$identity = @$_GET['identity'];
	$code = @$_GET['code'];
	
	
	if($code != $_SESSION['admin_hash_code']){
		echo "<meta http-equiv=refresh content=0;url=../loading.php?condition=logout>";
	}
	
	$account = @$_GET['account'];
	echo "成功刪除 " . $account . " 使用者";
	mysql_query("delete from `account` where `account` = '$account'");
	echo "<meta http-equiv=refresh content=2;url=user_data.php?identity=" . $identity . "&code=" . $code . ">";
	

?>