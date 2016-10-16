<?php 
	include('set.php');
	$name = @$_POST['name'];		//姓名
	$gender = @$_POST['gender'];		//性別
	$account = @$_POST['account'];		//帳號
	$psd = @$_POST['psd'];				//密碼	
	$birthday = @$_POST['birthday'];		//生日
	$mail = @$_POST['mail'];			//信箱
	$tel = @$_POST['tel'];				//電話
	$datetime = date("Y-m-d H:i:s",mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y')));		//時間
	
	
	if($name!='' && $gender!='' && $account!='' && $psd!='' && $birthday!='' && $mail!='' && $tel!='')
	{
		mysql_query("insert into `account`(`no`,`name`,`sex`,`account`,`psd`,`birthday`,`mail`,`tel`,`time`) value(null,'$name','$gender','$account','$psd','$birthday','$mail','$tel','$datetime')");
		
		echo "<meta http-equiv=REFRESH CONTENT=1;url=login.php>";
		echo "<br>註冊成功，幾秒後跳轉";
		
	}else
	{
		echo "<br>註冊失敗";
	}
	//echo "<br>註冊成功<br><a href='login.php'>回登入畫面</a>";
?>