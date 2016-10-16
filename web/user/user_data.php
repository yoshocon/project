<?php
	include('../set.php');
	
	//判斷管理者
	$identity = @$_GET['identity'];
	$code = @$_GET['code'];
	
	if($identity != 'admin' || $code != $_SESSION['admin_hash_code']){
		echo "<meta http-equiv=refresh content=0;url=../loading.php?condition=logout>";
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8' />
		<title>使用者資料</title>
		<script src='../js/jquery.js'></script>
		<script type='text/javascript'>
			$(document).ready(function(){
				$('#select_time').hide();
				$('#select_sex').hide();
				
				$('#select').click(function(){
					var like='';
					switch($('#select_class').val())
					{
						
						//查詢性別
						case 'sex':
						if(document.getElementsByName('sex')[0].checked)
						{
							var select_condition = document.getElementsByName('sex')[0].value;
						}else if(document.getElementsByName('sex')[1].checked)
						{
							var select_condition = document.getElementsByName('sex')[1].value;
						}else
						{
							var select_condition = '%';
							var like = 'like';
						}
						break;
						//查詢生日
						case 'birthday':
						if($('#select_time').val() == '')
						{
							var select_condition = '%';
							var like = 'like';
						}else
						{
							var select_condition = $('#select_time').val();
						}
						
						break;
						//查詢註冊時間
						case 'time':
						var select_condition = $('#select_time').val() + '%';
						var like = 'like';
						break;
						//查詢其他選項
						default:
						
						if(document.getElementById('check_like').checked)
						{
							var select_condition = '%' + $('#select_condition').val() + '%';
							var like = 'like';
						}else
						{
							var select_condition = $('#select_condition').val();
						}
					}
					
					var select_class = $('#select_class').val();
					
					$.get("select_user_data.php?condition=" + select_condition + "&class=" + select_class + "&like=" + like + "&identity=<?= $identity?>&code=<?= $code?>",function(data){
						$('#select_output').html(data);
					});
				});
				
				$('#select_class').change(function(){	
					
					switch($(this).val())
					{
						case 'sex':
						$('#select_sex').show();
						$('#other_like').hide();
						$('#select_time').hide();
						$('#select_condition').hide();
						break;
						
						case 'birthday':
						$('#select_time').show();
						$('#other_like').hide();
						$('#select_condition').hide();
						$('#select_sex').hide();
						break;
						
						case 'time':
						$('#select_time').show();
						$('#other_like').hide();
						$('#select_condition').hide();
						$('#select_sex').hide();
						break;
						
						default:
						$('#select_condition').show();
						$('#other_like').show();	
						$('#select_time').hide();
						$('#select_sex').hide();
						
					}
					
				});
			});
			
			function check_delete()
			{
				if(confirm("您確定要刪除這位使用者嘛?"))
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
		
		<table  style='float:left;'>
			<tr>
				<td>
					<details style='cursor:pointer;position:'>
						
						<summary><b>【查詢模式】</b></summary>
						
					</details>
				</td>
				<td>查詢使用者:&nbsp;</td>
				<td>
					<select id='select_class'>
						<option value='no'>編號</option>
						<option value='name'>姓名</option>
						<option value='sex'>性別</option>
						<option value='account'>帳號</option>
						<option value='psd'>密碼</option>
						<option value='birthday'>生日</option>
						<option value='mail'>信箱</option>
						<option value='tel'>電話</option>
						<option value='time'>註冊時間</option>
					</select>
				</td>
				<td>&nbsp;&nbsp;</td>
				<td><label id='other_like' style='cursor:pointer;'><input type='checkbox' value='like' id='check_like'  />近似值</label></td>
				<td><div id='select_sex'><input type='radio' value='男' name='sex' />男<input type='radio' value='女' name='sex' />女</div></td>
				<td><input type='date' id='select_time' style='width:150px;' /></td>
				<td><input type='search' id='select_condition' style='width:150px;' autofocus /></td>
				<td>&nbsp;<input type='button' id='select' value='查詢'  /></td>
			</tr>
		</table>
		
		
		
		<table  style='float:right;'>
			<tr>
				<td><b style='float:right;'>管理者:<?php echo $_SESSION['account']; ?></b></td>
			</tr>
			<tr>
				<td><a style='float:right;' href = "<?php echo "../index.php?identity=" . $identity . "&code=" . $code; ?>">回首頁</a></td>
			</tr>
		</table>
		
		<br>
		<br>
		<br>
		<hr>
		<div id='select_output'>
			<?php
				$query = mysql_query("select * from `account`");
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
					echo "<td>" . "<a href='user_record.php?account=" . $row[3] . "&identity=" . $identity . "&code=" . $code . "'>查詢</a>" . "</td>";
					echo "<td>" . "<a href='user_modify.php?account=" . $row[3] . "&identity=" . $identity . "&code=" . $code . "'>修改</a>" . "</td>";
					echo "<td>" . "<a onclick='return check_delete()' href='user_delete.php?account=" . $row[3] . "&identity=" . $identity . "&code=" . $code . "'>刪除</a>" . "</td>";
					echo "</tr>";
				}
				
				echo "</table>";
			?>
		</div>
	</body>
</html>										