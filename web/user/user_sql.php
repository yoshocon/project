<?php
	include('../set.php');
	
	//判斷管理者
	$identity = @$_GET['identity'];
	$code = @$_GET['code'];
	
	if($code != $_SESSION['admin_hash_code']){
		echo "<meta http-equiv=refresh content=0;url=../loading.php?condition=logout>";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8' />
		<title>SQL模式</title>
		<script src='../js/jquery.js'></script>
		<style>
			body{
			font:90% "Microsoft JhengHei",sans-serif;
			}	
		</style>
		
		<script>
			$(document).ready(function(){
				//插入語法
				$('#sql_insert').click(function(){
					$('#content').val($('#sql_content').val());
				});
				$('#sql_content').dblclick(function(){
					$(this).val('');
				});
				
				//清空
				$('#sql_empty').click(function(){
					$('#content').val('');
				});
				
				//sql執行
				$('#sql_run').click(function(){
					var content = $('#content').val();
					$.get("user_sql_output.php?content=" + content,function(data){
						$('#sql_output').html(data);
					});
				});
			});
		</script>
	</head>
	<body>
		<b>【SQL模式】</b>
		
		<table style='float:right;'>
			<tr>
				<td><b>管理者:<?php echo $_SESSION['account']; ?></b></td>
			</tr>
			<tr>
				<td><a href="<?php echo "../index.php?identity=" . $identity . "&code=" . $code; ?>">回首頁</a></td>
			</tr>
		</table>
		<pre>*支援CRUD</pre>
		
		<hr>
		
		
		
		<table border='1' cellpadding='5'>
			<tr>
				<td>
					<p>
					    常用語法:
						<input type='search' id='sql_content' list='sql_list'  />
						<datalist id='sql_list'>
							<option label='查詢' value='select * from `` where' />
							<option label='新增資料表' value='create table ``()'/>
							<option label='刪除資料表' value='drop table ``'/>
							<option label='清空資料表內容' value='truncate table ``'/>
							<option label='插入' value='insert into ``() values ()' />
							<option label='更新' value='update `` set where'/>
							<option label='刪除' value='delete from `` where'/>
							<option label='修改資料表內容' value='alter table `` change ``' />
						</datalist>
						<input type='button' value='插入' id='sql_insert' />
						<input type='button' value='清空' id='sql_empty' />
					</p> 
				</td>
				<td rowspan='3'>
					<div id='sql_output' style='width:800px;'>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<textarea id='content' style='background-color:#D4D4D4;border:1px black solid;' cols='50' rows='8' ></textarea>
				</td>
			</tr>
			<tr>
				<td><input type='button' id='sql_run' value='執行' /></td>
			</tr>
			
		</table>
		<hr>
		<p>SQL語法:select * from Information_Schema.COLUMNS where table_schema = 'st'</p>
		
		<?php
			$query = mysql_query("select * from Information_Schema.COLUMNS where table_schema = 'st'");
			
			echo "<table border='1'>";
			echo "<tr>
			<th>TABLE_CATALOG</th>
			<th>TABLE_SCHEMA</th>
			<th>TABLE_NAME</th>
			<th>COLUMN_NAME</th>
			<th>ORDINAL_POSITION</th>
			<th>COLUMN_DEFAULT</th>
			<th>IS_NULLABLE</th>
			<th>DATA_TYPE</th>
			<th>CHARACTER_MAXIMUM_LENGTH</th>
			<th>CHARACTER_OCTET_LENGTH</th>
			<th>NUMERIC_PRECISION</th>
			<th>NUMERIC_SCALE</th>
			<th>DATETIME_PRECISION</th>
			<th>CHARACTER_SET_NAME</th>
			<th>COLLATION_NAME</th>
			<th>COLUMN_TYPE</th>
			<th>COLUMN_KEY</th>
			<th>EXTRA</th>
			<th>PRIVILEGES</th>
			<th>COLUMN_COMMENT</th>			
			</tr>";
			while($row=mysql_fetch_array($query))
			{
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
				echo "<td>" . $row[10] . "</td>";
				echo "<td>" . $row[11] . "</td>";
				echo "<td>" . $row[12] . "</td>";
				echo "<td>" . $row[13] . "</td>";
				echo "<td>" . $row[14] . "</td>";
				echo "<td>" . $row[15] . "</td>";
				echo "<td>" . $row[16] . "</td>";
				echo "<td>" . $row[17] . "</td>";
				echo "<td>" . $row[18] . "</td>";
				echo "<td>" . $row[19] . "</td>";
				echo "</tr>";
			}
			echo "</table>"
		?>
	</body>
</html>				