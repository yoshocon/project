
<style>
	
	#select td font:hover
	{
	font-size:12px;
	cursor:pointer;
	font-weight:bold;
	position:relative;
	top:1px;
	left:1px;
	}
	
</style>

<script type='text/javascript'>
	$(document).ready(function(){
		var calss = $()
		var value = $()
		
		$("#change").change(function(){
			$("#select").empty();
			switch($("#change").val())
			{
				case "---":
				$("#select").append("")
				break;
				
				case "編號":
				$("#select").append("<input type='text'  />")
				break;
				
				case "教室":
				$("#select").append("<select id='room'><option value='401'>401</option><option value='402'>402</option><option value='601'>601</option><option value='602'>602</option><option value='603'>603</option><option value='604'>604</option><option value='605'>605</option><option value='1001'>1001</option><option value='1002'>1002</option><option value='1003'>1003</option><option value='1004'>1004</option><option value='1101'>1101</option><option value='1102'>1102</option><option value='1103'>1103</option><option value='1104'>1104</option><option value='1105'>1105</option></select>")
				break;
				
				case "課程名稱":
				$("#select").append("<input type='text'  />")
				break;
				
				case "上課班級":
				$("#select").append("<input type='text'  />")
				break;
			}
			
		});
		
		$("#sub").click(function(){
			$.get("select_lesson.php?=" + ,function(data){
				$("#output").html(data);
			});
		});
		
	})
</script>
<div style="color:black;">
	<b style='font-size:36px;'>課程查詢</b>
	<hr/>
	<table style='font-size:20px;'>
		<tr>
			<td>查詢課程:</td>
			<td>
				<select id="change">
					<option value="">---</option>
					<option value="編號">編號</option>
					<option value="教室">教室</option>
					<option value="課程名稱">課程名稱</option>
					<option value="上課班級">上課班級</option>
				</select>
			</td>
			<td>&nbsp;&nbsp;</td>
			<td>
				<div id="select">
					
				</div>
			</td>
			<td>&nbsp;&nbsp;</td>
			<td><input type="button" value="查詢" id="sub" /></td>
		</tr>
	</table>
	
	
	
	
	
	<br>
	
	<div id="output" align='center' >
		<table border="1" cellpadding="10">
			<tr>
				<td colspan='5' align='center'><b style='font-size:36px;'>課程表</b></td>
			</tr>
			<tr style='font-size:20px;'>
				<th>編號</th>
				<th>教室</th>
				<th>課程名稱</th>
				<th>上課班級</th>
				<th>備註</th>
			</tr>
			<?php
				include("set.php");
				$query = mysql_query("select * from `1021001`");
				while($row = mysql_fetch_array($query))
				{
					echo "<tr style='font-size:20px;'>";
					echo "<td>" . $row[0] . "</td>";
					echo "<td>" . $row[1] . "</td>";
					echo "<td>" . $row[2] . "</td>";
					echo "<td>" . $row[3] . "</td>";
					echo "<td>" . $row[4] . "</td>";
					echo "</tr>";
				}
			?>
		</table>
	</div>									
</div>								