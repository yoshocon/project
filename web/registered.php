<script>
	$(document).ready(function(){
		$('td').attr('valign','center');
		$('.success').hide();
		$('.fail').hide();
		
		$('#name').change(function(){
			if($('#name').val()!=""){$('#name_success').show(); $('#name_fail').hide();}
			else{$('#name_success').hide(); $('#name_fail').show();}
		});
		
		$('.gender').click(function(){
			$('#gender_success').show();
		});
		
		$('#account').change(function(){
			if(($('#account').val()).length > 4 && ($('#account')).length < 13){$('#account_success').show(); $('#account_fail').hide();}
			else{$('#account_success').hide(); $('#account_fail').show();}
		});
		
		$('#psd').change(function(){
			if(($('#psd').val()).length > 4 && ($('#psd')).length < 13){$('#psd_success').show(); $('#psd_fail').hide();}
			else{$('#psd_success').hide(); $('#psd_fail').show();}
		});
		
		$('#birthday').change(function(){
			if($('#birthday').val()!=""){$('#birthday_success').show(); $('#birthday_fail').hide();}
			else{$('#birthday_success').hide(); $('#birthday_fail').show();}
		});
		
		$('#mail').change(function(){
			if($('#mail').val()!=""){$('#mail_success').show(); $('#mail_fail').hide();}
			else{$('#mail_success').hide(); $('#mail_fail').show();}
		});
		
		$('#tel').change(function(){
			if($('#tel').val()!=""){$('#tel_success').show(); $('#tel_fail').hide();}
			else{$('#tel_success').hide(); $('#tel_fail').show();}
		});
		
		$('#reset').click(function(){
			$('#name_success').hide();
			$('#name_fail').hide();
			$('#gender_success').hide();
			$('#gender_fail').hide();
			$('#account_success').hide();
			$('#account_fail').hide();
			$('#psd_success').hide();
			$('#psd_fail').hide();
			$('#birthday_success').hide();
			$('#birthday_fail').hide();
			$('#mail_success').hide();
			$('#mail_fail').hide();
			$('#tel_success').hide();
			$('#tel_fail').hide();
			
		});
	});
	
	function check(e)
	{
		if(confirm("資料是否填寫正確?"))
		{
			return true;
		}else
		{
			return false;
		}
		
	}
</script>

<div>	
	<pre style='font-size:15px;font-weight:bold;'>學員註冊</pre>
	<form action='registered_identify.php' method='post' name='form' onsubmit='return check(form)'>
		<table cellpadding='5' class='table table-hover'>
			<tr class='active'>
				<td><img src='img/success.png' class='success' id='name_success' /><img src='img/fail.png' class='fail' id='name_fail' /></td>
				<td>中文姓名</td>
				<td><input type='text' class="form-control" id='name' name='name' autofocus='true'  required  /></td>
			</tr>
			<tr class='active'>
				<td><img src='img/success.png' class='success' id='gender_success' /><img src='img/fail.png' class='fail' id='gender_fail' /></td>
				<td>性別</td>
				<td>
					<input type='radio' style='height:15px;width:15px;cursor:pointer;' class='gender' name='gender' value='男'  required  />&nbsp;&nbsp;<img src='img/male.png' /> &nbsp;&nbsp;&nbsp;
					<input type='radio' style='height:15px;width:15px;cursor:pointer;' class='gender' name='gender' value='女'  required  />&nbsp;&nbsp;<img src='img/female.png' /> 
				</td>
			</tr>
			<tr class='active'>
				<td><img src='img/success.png' class='success' id='account_success' /><img src='img/fail.png' class='fail' id='account_fail' /></td>
				<td>帳號</td>
				<td><input type='text' class="form-control" id='account' name='account' maxlength='12' placeholder='請輸入5-12數字或英文' required  /></td>
			</tr>
			<tr class='active'>
				<td><img src='img/success.png' class='success' id='psd_success' /><img src='img/fail.png' class='fail' id='psd_fail' /></td>
				<td>密碼</td>
				<td><input type='password' class="form-control" id='psd' name='psd' maxlength='12' placeholder='請輸入5-12數字或英文'  required  /></td>
			</tr>
			<tr class='active'>
				<td><img src='img/success.png' class='success' id='birthday_success' /><img src='img/fail.png' class='fail' id='birthday_fail' /></td>
				<td>生日</td>
				<td><input type='date' class="form-control" id='birthday' name='birthday'  required  /></td>
			</tr>
			<tr class='active'>
				<td><img src='img/success.png' class='success' id='mail_success' /><img src='img/fail.png' class='fail' id='mail_fail' /></td>
				<td>信箱</td>
				<td><input type='mail' class="form-control" id='mail' name='mail'  required  /></td>
			</tr>
			<tr class='active'>
				<td><img src='img/success.png' class='success' id='tel_success' /><img src='img/fail.png' class='fail' id='tel_fail' /></td>
				<td>電話</td>
				<td><input type='tel' class="form-control" id='tel' name='tel'  required  /></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>
					<input type='submit' value='提交' />
					&nbsp;&nbsp;
					<input type='reset' id='reset' value='重新填寫' />
				</td>
			</tr>
		</table>
		<hr>
		
		
	</form>
</div>