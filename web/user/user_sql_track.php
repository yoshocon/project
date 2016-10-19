<?php
	include('../set.php');
	
	//判斷管理者
	$identity = @$_GET['identity'];
	$code = @$_GET['code'];
	
	if($code != $_SESSION['admin_hash_code']){
		echo "<meta http-equiv=refresh content=0;url=../loading.php?condition=logout>";
	}
	
	$query = mysql_query("select * from `track`");
	
	echo "<table border='1'>";
	echo "<tr>";
	echo "<th>#</th>";
	echo "<th>使用者</th>";
	echo "<th>執行動作</th>";
	echo "<th>sql語法</th>";
	echo "<th>時間</th>";
	echo "</tr>";
	
	while($row = mysql_fetch_array($query))
	{
			
		
	}
	
	
?>