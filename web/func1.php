
<script>
	$(document).ready(function(){
		var total = 987;	//總學生人數
		var A_num = 159;	//A館學生上課人數
		var B_num = 325;	//B館學生上課人數
		var C_num = 295;	//C館學生上課人數
		var other_num = 208;			//其他學員  208
		
		var A_a1 = 32;
		var A_a2 = 48;
		var A_a3 = 79;
		
		$('#func1_select').click(function(){		//查詢
			$('.house').empty();
			$('.house').append($('#sel_house').val());
			
			if($('#sel_house').val() == "A館")
			{
				
				$('#a').attr('style',"width:" + (A_num/total*100) + "%");
				$('#a_percentage').empty();
				$('#a_percentage').append("<em>百分比:" + (A_num/total*100).toFixed(1) + "%</em>");
				$('#progress_a').empty();
				$('#progress_a').append("&nbsp;" + A_num + "&nbsp;/&nbsp;" + total);
				
				$('#a1').attr('style',"width:" + (A_a1/A_num*100) + "%");
				$('#a1_percentage').empty();
				if((A_a1/A_num*100) < 50)
				{
					$('#a1_percentage').append("<em style='color:red;font-weight:bold;'>百分比:" + (A_a1/A_num*100).toFixed(1) + "%</em>");
				}else
				{
					$('#a1_percentage').append("<em>百分比:" + (A_a1/A_num*100).toFixed(1) + "%</em>");
				}
				
				$('#progress_a1').empty();
				$('#progress_a1').append("&nbsp;" + A_a1 + "&nbsp;/&nbsp;" + A_num);
				
				$('#a2').attr('style',"width:" + (A_a2/A_num*100) + "%");
				$('#a2_percentage').empty();
				if((A_a2/A_num*100) < 50)
				{
					$('#a2_percentage').append("<em style='color:red;font-weight:bold;'>百分比:" + (A_a2/A_num*100).toFixed(1) + "%</em>");
				}else
				{
					$('#a2_percentage').append("<em>百分比:" + (A_a2/A_num*100).toFixed(1) + "%</em>");
				}
				$('#progress_a2').empty();
				$('#progress_a2').append("&nbsp;" + A_a2 + "&nbsp;/&nbsp;" + A_num);
				
				$('#a3').attr('style',"width:" + (A_a3/A_num*100) + "%");
				$('#a3_percentage').empty();
				if((A_a3/A_num*100) < 50)
				{
					$('#a3_percentage').append("<em style='color:red;font-weight:bold;'>百分比:" + (A_a3/A_num*100).toFixed(1) + "%</em>");
				}else
				{
					$('#a3_percentage').append("<em>百分比:" + (A_a3/A_num*100).toFixed(1) + "%</em>");
				}
				
				$('#progress_a3').empty();
				$('#progress_a3').append("&nbsp;" + A_a3 + "&nbsp;/&nbsp;" + A_num);
				
				//如果各樓層使用率未超過50%
				if((A_a1/A_num*100) < 50 || (A_a2/A_num*100) < 50 || (A_a3/A_num*100) < 50)
				{
					$('#condition').empty();
					$('#condition').append("狀況:<b style='color:red;'>未平均分配教室資源(各樓層使用率未超過50%)。</b>&nbsp;&nbsp;&nbsp;");
					$('#condition').append("調整方式:<select>" +
					"<option value='單一教室整合'>單一教室整合</option>" +
					"<option value='同層樓層整合'>同層樓層整合</option>" +
					"</select>");
					
				}
			}
		});
		
		var doughnutData = [
		{
			value: A_num,
			color:"#F7464A",
			highlight: "#FF5A5E",
			label: "A館學生上課人數"
		},
		{
			value: B_num,
			color: "#46BFBD",
			highlight: "#5AD3D1",
			label: "B館學生上課人數"
		},
		{
			value: C_num,
			color: "#FDB45C",
			highlight: "#FFC870",
			label: "C館學生上課人數"
		},
		{
			value: other_num,
			color: "#A1A1A1",
			highlight: "#ABABAB",
			label: "其他未上課學員"
		}
		]
		
		var ctx = document.getElementById("chart-area").getContext("2d");
		var myDoughnut = new Chart(ctx).Doughnut(doughnutData, {
			responsive : true,
			animationEasing: "easeOutQuart",
		});
	});
	
	
	
</script>
///假設總學生人數987人，A館159人上課(樓層一32人，樓層二48人，樓層三79人)，B館325人上課，C館295人上課
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style='margin:0px;'>
	<b style='font-size:36px;'>功能一</b>
	<br><br>
	<span style='font-size:16px;'>選擇館別上課情況:</span>
	<select style='font-size:14px;' id='sel_house'>
		<option value='A館'>A館</option>
		<option value='B館'>B館</option>
		<option value='C館'>C館</option>
	</select>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<input type='button' value='查詢' id='func1_select' /> 
	<hr>
	
	
	<div id='output'>
		<pre id='condition'>狀況:</pre>
		<table cellpadding='5' border='1'>
			<tr>
				<td colspan='2'>
					<div style='width:1200px;height:180px;font-size:15px;'>
						
						<div class="box" style='width:350px;float:left;cursor:pointer;'>
							<canvas id="chart-area" class="zone"></canvas>
						</div>
						<p><b>總學員人數:</b>987人</p>
						<p><b>A館學生上課人數:</b>159人</p>
						<p><b>B館學生上課人數:</b>325人</p>
						<p><b>C館學生上課人數:</b>295人</p>
						<p><b>其他未上課學員:</b>208人</p>
					</div>
				</td>
				
			</tr>
			<tr>
				<td>
					<span class='house'></span>上課人數/總學生人數&nbsp;&nbsp;&nbsp;<span style='background-color:#FFFF00;' id='a_percentage'></span>    <!--  館別  -->
					<br>
					<div  class="progress" style="background-color:#D4D4D4;border-radius:10px;width:500px;">
						<div class="progress-bar progress-bar-success" role="progressbar" id='a'  style="width:0%">
							<span id="progress_a">&nbsp;/</span>
						</div>
					</div>
				</td>	
				<td>
					樓層一上課人數/<span class='house'></span>學生人數&nbsp;&nbsp;&nbsp;<span style='background-color:#FFFF00;' id='a1_percentage'></span>   <!-- 樓層1 -->
					<br>
					<div  class="progress" style="background-color:#D4D4D4;border-radius:10px;width:500px;">
						<div class="progress-bar" role="progressbar" id='a1'  style="width:0%">
							<span id="progress_a1">&nbsp;/</span>
						</div>
					</div>
				</td>	
			</tr>
			<tr>
				<td>
					
					樓層二上課人數/<span class='house'></span>學生人數&nbsp;&nbsp;&nbsp;<span style='background-color:#FFFF00;' id='a2_percentage'></span>   <!-- 樓層2 -->
					<br>
					<div  class="progress" style="background-color:#D4D4D4;border-radius:10px;width:500px;">
						<div class="progress-bar" role="progressbar" id='a2' style="width:0%">
							<span id="progress_a2">&nbsp;/</span>
						</div>
					</div>
				</td>
				<td>
					樓層三上課人數/<span class='house'></span>學生人數&nbsp;&nbsp;&nbsp;<span style='background-color:#FFFF00;' id='a3_percentage'></span>   <!-- 樓層3 -->
					<br>
					<div  class="progress" style="background-color:#D4D4D4;border-radius:10px;width:500px;">
						<div class="progress-bar" role="progressbar" id='a3'  style="width:0%">
							<span id="progress_a3">&nbsp;/</span>
						</div>
					</div>
				</td>
			</tr>
		</table>
		
		
		
		
		
		
	
	</div>
	
	<canvas id='mychart' width='400' height='400'></canvas>
	</div>																	