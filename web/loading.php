<?php
	include('set.php');
	$condition = @$_GET['condition'];	//狀態 登入 or 登出
	$identity = @$_POST['identity'];	//判斷身分  user為使用者,admin為管理者
	$account = @$_POST['account'];		//帳號
	$psd = @$_POST['psd'];			//密碼
	$check = @$_POST['check'];		//驗證碼
	
	//////////////////////////////
	/*
		echo "狀態:" . $condition;
		echo "<br>";
		echo "身分:" . $identity;
		echo "<br>";
		echo "帳號:" . $account;
		echo "<br>";
		echo "密碼:" . $psd;
		echo "<br>";
		echo "驗證碼:" . $check;
		echo "<br>";
	*/
	///////////////////////////////
	
	/////////////////////
	
	
	
	
	if($condition == 'login')
	{
		if(@$_POST['check'] != $_SESSION['check'])		//驗證碼判斷
		{
			$_SESSION['error_check'] = 1;
			header('Location:login.php');
		}else
		{
			if($identity == 'user' && $condition == 'login')		//使用者帳號密碼判斷
			{	
				//user資料庫查詢
				$query = mysql_query("select * from `account` where `psd`='$psd'");
				$row = mysql_fetch_array($query);
				
				if($account == 'user1' && $psd == '12345')
				{	
					$_SESSION['account'] = $account;
					header('Location:index.php?identity=' . $identity);
				}else if($account == $row[3] && $psd == $row[4])
				{
					$log_time = date("Y-m-d H:i:s",mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y")));
					mysql_query("insert into `user_log`(`name`,`account`,`psd`,`log_time`) value('$row[1]','$row[3]','$row[4]','$log_time')");
					$_SESSION['account'] = $account;
					header('Location:index.php?identity=' . $identity);
				}else
				{
					$_SESSION['error'] = 1;
					echo "<meta http-equiv=Refresh content=1;url=login.php>";
				}
			}else if($identity == 'admin' && $condition == 'login')		//管理者帳號密碼判斷
			{
				//管理者資料庫查詢
				if($account == 'admin1' && $psd == '12345')
				{
					$admin_hash_code = mt_rand(0,9) . mt_rand(0,9) . mt_rand(0,9) . mt_rand(0,9) . mt_rand(0,9) . mt_rand(0,9) . mt_rand(0,9) . mt_rand(0,9);
					$_SESSION['admin_hash_code'] = $admin_hash_code;
					$_SESSION['account'] = $account;
					header('Location:index.php?identity=' . $identity . '&code=' . $admin_hash_code);
				}else
				{
					header('Location:login.php?error=admin帳號密碼錯誤');
				}
			}
		}
	}
	
	else		//登入失敗或非法登入
	{
		$_SESSION['account'] = '';
		$_SESSION['admin_hash_code'] = '';
		echo "<meta http-equiv=Refresh content=1;url=login.php>";
		echo "<script>alert('登出成功...跳轉中請稍等')</script>";
		//header("Location:login.php");
	}
	
?>				
<!DOCTYPE>
<html>
	<head></head>
	<body style='background-color:#4F709F;'></body>
</html>