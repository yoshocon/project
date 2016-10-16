
<style>
	
	th
	{
	font-size:18px;
	}
	
	font:hover
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
		
		$('font').mouseenter(function(event){
			$('#mouseon').empty();
			$('#mouseon').append("課程:" + $(this).html())
		})
		$('font').click(function(){
			$('#information').empty();
			$.get("lesson_information.php?lesson=" + $(this).html(),function(data){
				$('#information').html(data)
			})
		})
	})
</script>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style='margin:0px;'>
	<b style='font-size:36px;'>課程-滑鼠指向課名查看詳細資訊</b>
	<pre style='width:650px;height:40px;'><div id='mouseon'></div></pre>
	
	
	<div class=table-responsive>
		<table  class="table table-striped" >
			<tr>
				<th>英文</th>
				<th>國文</th>
				<th>公民</th>
				<th>歷史</th>
			</tr>
			<tr>
				<td class="col-md-1"><font title='點擊更多資訊'>多益證照班A</font></td>
				<td class="col-md-1"><font title='點擊更多資訊'>作文班</font></td>
				<td class="col-md-1"><font title='點擊更多資訊'>民主憲政與法治</font></td>
				<td class="col-md-1"><font title='點擊更多資訊'>台灣史</font></td>
			</tr>
			<tr>
				<td><font title='點擊更多資訊'>多益證照班B</font></td>
				<td><font title='點擊更多資訊'>書法班</font></td>
				<td><font title='點擊更多資訊'>課名</font></td>
				<td><font title='點擊更多資訊'>課名</font></td>
			</tr>
			<tr>
				<td><font title='點擊更多資訊'>課名</font></td>
				<td><font title='點擊更多資訊'>課名</font></td>
				<td><font title='點擊更多資訊'>課名</font></td>
				<td><font title='點擊更多資訊'>課名</font></td>
			</tr>
			<tr>
				<td><font title='點擊更多資訊'>課名</font></td>
				<td><font title='點擊更多資訊'>課名</font></td>
				<td><font title='點擊更多資訊'>課名</font></td>
				<td><font title='點擊更多資訊'>課名</font></td>
			</tr>
			<tr>
				<td><font title='點擊更多資訊'>課名</font></td>
				<td><font title='點擊更多資訊'>課名</font></td>
				<td><font title='點擊更多資訊'>課名</font></td>
				<td><font title='點擊更多資訊'>課名</font></td>
			</tr>
			<tr>                         
				<td><font title='點擊更多資訊'>課名</font></td>
				<td><font title='點擊更多資訊'>課名</font></td>
				<td><font title='點擊更多資訊'>課名</font></td>
				<td><font title='點擊更多資訊'>課名</font></td>
			</tr>
		</table>
	</div>
	<pre style='width:650px;'>課程資訊</pre>
	<div id='information' class='well well-lg' style='width:650px;height:500px;'>
		12
	</div>
</div>
