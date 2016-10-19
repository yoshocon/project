

<?php
	include("../set.php");
	
	//判斷管理者
	$identity = @$_GET['identity'];
	$code = @$_GET['code'];
	
	
	if($identity != 'admin' || $code != $_SESSION['admin_hash_code']){
		echo "<meta http-equiv=refresh content=0;url=../loading.php?condition=logout>";
	}
	
	//篩選條件
	$condition = @$_GET['condition'];
	$class = @$_GET['class'];
	$like = @$_GET['like'];
	
	if($like != '')
	{
		echo "<p>SQL語法:select * from `account` where `" . $class . "` " . $like . " '" . $condition ."'</p>";
		$query = mysql_query("select * from `account` where `" . $class . "` " . $like . " '" . $condition . "'");
	}else
	{
		echo "<p>SQL語法:select * from `account` where `" . $class . "`='" . $condition ."'</p>";
		$query = mysql_query("select * from `account` where `" . $class . "`='" . $condition . "'");	
	}
	
	
	echo "<table border='1'>";
	echo "<tr>";
	echo "<td align='center' colspan='13'><b style='font-size:18px;'>使用者資料</b></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<th>編號</th>";
	echo "<th>姓名</th>";
	echo "<th>性別</th>";
	echo "<th>帳號</th>";
	echo "<th>密碼</th>";
	echo "<th>生日</th>";
	echo "<th>信箱</th>";
	echo "<th>電話</th>";
	echo "<th>註冊時間</th>";
	echo "<th>最後修改時間</th>";
	echo "<th>使用者紀錄</th>";
	echo "<th>修改</th>";
	echo "<th>刪除</th>";
	echo "</tr>";
	
	while($row=mysql_fetch_array($query)){
		echo "<tr>";
		echo "<td>" . $row[0] . "</td>";
		echo "<td>" . $row[1] . "</td>";
		echo "<td>" . $row[2] . "</td>";
		echo "<td>" . $row[3] . "</td>";
		echo "<td>" . $row[4] . "</td>";
		echo "<td>" . $row[5] . "</td>";
		echo "<td>" . $row[6] . "</td>";
		echo "<td>" . $row[7] . "</td>";
		echo "<td>" . $row[8] . "</td>";
		echo "<td>" . $row[9] . "</td>";
		echo "<td>" . "<a href='user_record.php?account=" . $row[3] . "&identity=" . $identity . "&code=" . $code . "'>查詢</a>" . "</td>";
		echo "<td>" . "<a href='user_modify.php?account=" . $row[3] . "&identity=" . $identity . "&code=" . $code . "'>修改</a>" . "</td>";
		echo "<td>" . "<a onclick='return check_delete()' href='user_delete.php?account=" . $row[3] . "&identity=" . $identity . "&code=" . $code . "'>刪除</a>" . "</td>";
		echo "</tr>";
	}
	
	echo "</table>";
?>		