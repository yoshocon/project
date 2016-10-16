<?php
	include('../set.php');
	
	//判斷管理者
	$identity = @$_GET['identity'];
	$code = @$_GET['code'];
	
	
	if($code != $_SESSION['admin_hash_code']){
		echo "<meta http-equiv=refresh content=0;url=../loading.php?condition=logout>";
	}
	
	$account = @$_GET['account'];
	
	$query = mysql_query("select * from `account` where `account` = '$account'");
	$row = mysql_fetch_array($query);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8' />
		<title><?php echo "使用者 ".$account." 修改資料"; ?></title>
		<script>
			function check()
			{
				if(confirm("您確定要修改這些資料嘛?"))
				{
					return true;
				}else
				{
					return false;
				}
			}
		</script>
	</head>
	<body>
		<h3 style='float:left;'><?php echo "使用者 ".$account." 修改資料"; ?></h3>
		
		<table  style='float:right;'>
			<tr>
				<td><b style='float:right;'>管理者:<?php echo $_SESSION['account']; ?></b></td>
			</tr>
			<tr>
				<td><a style='float:right;' href = "<?php echo "user_data.php?identity=" . $identity . "&code=" . $code; ?>">回上一頁</a></td>
			</tr>
		</table>
		<br>
		<br>
		<br>
		<hr>
		<form action="user_modify2.php?account=<?= $account?>&identity=<?= $identity?>&code=<?= $code?>" method='post' name='form' onsubmit='return check(form)'>
			<table border='1' cellpadding='5'>
				<tr>
					<td>編號</td>
					<td>
						<?php echo "<input type='text' name='' value='". $row[0] . "' disabled />"?>
					</td>
				</tr>
				<tr>
					<td>姓名</td>
					<td><?php echo "<input type='text' name='name' value='". $row[1] . "' required />"?></td>
				</tr>
				<tr>
					<td>性別</td>
					<td><?php echo "<input type='text' name='sex' value='". $row[2] . "' required />"?></td>
				</tr>
				<tr>
					<td>帳號</td>
					<td><?php echo "<input type='text' name='account' value='". $row[3] . "' disabled />"?></td>
				</tr>
				<tr>
					<td>密碼</td>
					<td><?php echo "<input type='text' name='psd' value='". $row[4] . "' required />"?></td>
				</tr>
				<tr>
					<td>生日</td>
					<td><?php echo "<input type='text' name='birthday' value='". $row[5] . "' required />"?></td>
				</tr>
				<tr>
					<td>信箱</td>
					<td><?php echo "<input type='text' name='mail' value='". $row[6] . "' required />"?></td>
				</tr>
				<tr>
					<td>電話</td>
					<td><?php echo "<input type='text' name='tel' value='". $row[7] . "' required />"?></td>
				</tr>
				<tr>
					<td>註冊時間</td>
					<td><?php echo "<input type='text' name='' value='". $row[8] . "' disabled />"?></td>
				</tr>
				<tr>
					<td>最後修改時間</td>
					<td><?php echo "<input type='text' name='' value='". $row[9] . "' disabled />"?></td>
				</tr>
				<tr>
					<td>備註</td>
					<td><?php echo "<textarea cols='40' rows='8' name='note' >" . $row[10] . "</textarea>"?></td>
				</tr>
				<tr>
					<td align='center' colspan='2'>
						<input type='submit' value='提交' />
						<input type='reset' value='重新更改' />
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>				