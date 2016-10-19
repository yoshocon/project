<?php
	include('../set.php');
	$content = @$_GET['content'];
	
	echo "SQL語法:" . $content;
	mysql_query($content);
	
	echo "<br>";
	$msg = mysql_affected_rows();
	echo "執行結果:".$msg;
	echo "<br>";
	echo "錯誤訊息:<font style='color:red;'>" . mysql_error() . "</font>";
?>