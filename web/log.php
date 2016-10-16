<ul class="nav nav-tabs" id="myTab"> 
					<li class="active"><a href='#student'>學員登入</a></li> 
					<li><a href="#admin">管理員登入</a></li> 
				</ul> 
				<div class="tab-content"> 
					<div class="tab-pane active" id="student">
						<br>
						<form action='loading.php' method='post'>
							<table>
								<tr>
									<td align='center'><img class='img-circle'  src='img/student.png'></td>
									<input type='hidden' name='identity' value='student' />
								</tr>
								<tr>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>帳號</td>
								</tr>
								<tr>
									
									<td><input type='text' class="form-control" placeholder='請輸入帳號' name='account' /></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>密碼</td>
								</tr>
								<tr>
									<td><input type='password' class="form-control" placeholder='請輸入密碼' name='psd' /></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td><a id='registered' style='cursor:pointer;font-size:12px;float:right;'>還沒有帳號</a></td>
								</tr>
								
								<tr>
									<td><input type='submit' value='登入' style='width:250px;' class='btn btn-primary' /></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td><input type='button' value='忘記密碼' style='width:250px;' class='btn btn-info' /></td>
								</tr>
							</table>
						</form>
						
					</div> 
					<div class="tab-pane" id="admin">
						<br>
						<form action='loading.php' method='post'>
							<table>
								<tr>
									<td align='center'><img class='img-circle'  src='img/admin.png'></td>
									<input type='hidden' name='identity' value='admin'>
								</tr>
								<tr>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>帳號</td>
								</tr>
								<tr>
									
									<td><input type='text' class="form-control" placeholder='請輸入帳號' /></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>密碼</td>
								</tr>
								<tr>
									<td><input type='password' class="form-control" placeholder='請輸入密碼' /></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td><a id='registered' style='cursor:pointer;font-size:12px;float:right;'>還沒有帳號</a></td>
								</tr>
								
								<tr>
									<td><input type='submit' value='登入' style='width:250px;' class='btn btn-primary' /></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td><input type='button' value='忘記密碼' style='width:250px;' class='btn btn-info' /></td>
								</tr>
							</table>
						</form>
					</div> 
				</div> 