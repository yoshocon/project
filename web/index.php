<?php
	// include('set.php');
	$identity = @$_GET['identity'];
	$code = @$_GET['code'];

	if($identity != 'user' && $identity != 'admin')
	{
		header('Location:loading.php');
	}

	if($identity == 'admin'){
		if($code =='' || $code != $_SESSION['admin_hash_code'])
		{
			header('Location:loading.php');
		}
	}
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>福智基金會</title>
		<meta name="description" content="Multi-Level Push Menu: Off-screen navigation with multiple levels" />
		<meta name="keywords" content="multi-level, menu, navigation, off-canvas, off-screen, mobile, levels, nested, transform" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/icons.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>


		<script src="js/jquery.js"></script>			<!--  jquery -->
		<script src='js/bootstrap.min.js'></script>		<!--  bootstrap -->

		<script src="js/classie.js"></script>
		<script src="js/mlpushmenu.js"></script>
		<style>
			body{
			font:100% "Microsoft JhengHei",sans-serif;

			}
			ul li
			{
			list-style-type:none;
			}
			#classroom ul li font:hover
			{
			color:red;
			background-color:rgba(255,255,255,0.95);
			border-radius:10px;
			cursor:pointer;
			font-weight:bold;
			position:relative;
			top:1px;
			left:1px;
			}
			#backstage ul li font:hover
			{
			color:red;
			background-color:rgba(255,255,255,0.95);
			border-radius:10px;
			cursor:pointer;
			font-weight:bold;
			position:relative;
			top:1px;
			left:1px;
			}
			#user ul li font:hover
			{
			color:red;
			background-color:rgba(255,255,255,0.95);
			border-radius:10px;
			cursor:pointer;
			font-weight:bold;
			position:relative;
			top:1px;
			left:1px;
			}
			.index:hover{cursor:pointer;font-weight:bold;position:relative;top:1px;left:1px;}

			#mainbody{
			height:580px;
			width:1300px;
			margin:20px;
			overflow:auto;
			background-color:#A3A3FF;
			border-radius:10px;
			}
		</style>
		<script>
			$(document).ready(function(){
				var identity = $('#admin_check').val();
				var code = $('#admin_code').val();

				$.get("bullution.php",function(data){
					$('#mainbody').html(data);
				});

				$("#classroom_ul").hide();
				$("#backstage_ul").hide();
				$("#user_ul").hide();

				//課程查詢
				$('#lesson').click(function(){
					$.get('lesson.php',function(data){
						$('#mainbody').html(data);
					});
					$('#admin').click()
				});

				//細節查詢
				$('#lesson_detail').click(function(){
					$.get('detail.php',function(data){
						$('#mainbody').html(data);
					});
					$('#admin').click()
				});
				//功能一
				$('#func1').click(function(){
					$.get('func1.php',function(data){
						$('#mainbody').html(data);
					});
				});
				//功能二
				$('#func2').click(function(){
					$.get('func2.php',function(data){
						$("#mainbody").html(data);
					});
				});
				//教室調動 (右邊選單)
				$("#classroom").mouseenter(function(){
					$("#classroom_ul").slideDown()
					$("backstage_ul").hide()
					$("user_ul").hide()
					//$("#user").attr('style','background-color:rgba(255,255,255,0.95);font-weight:bold;color:black;')
				})
				$("#classroom_ul").mouseleave(function(){
					$("#classroom_ul").hide()
				})
				$("#classroom").mouseleave(function(){
					$("#classroom_ul").hide()
				})
				//後台系統 (右邊選單)
				$("#backstage").mouseenter(function(){
					$("#backstage_ul").slideDown()
					$("classroom_ul").hide()
					$("user_ul").hide()
					//$("#user").attr('style','background-color:rgba(255,255,255,0.95);font-weight:bold;color:black;')
				})
				$("#backstage_ul").mouseleave(function(){
					$("#backstage_ul").hide()
				})

				$("#backstage").mouseleave(function(){
					$("#backstage_ul").hide()
				})
				//使用者資訊  (右邊選單)
				$("#user").mouseenter(function(){
					$("#user_ul").slideDown()
					$("backstage_ul").hide()
					$("classroom_ul").hide()
					//$("#user").attr('style','background-color:rgba(255,255,255,0.95);font-weight:bold;color:black;')
				})
				$("#user_ul").mouseleave(function(){
					$("#user_ul").hide()
				})
				$("#user").mouseleave(function(){
					$("#user_ul").hide()
				})


				//使用者資料
				$('#user_data').click(function(){
					window.open("user/user_data.php?identity=" + identity + "&code=" + code ,'_self');
				});
				//SQL
				$('#user_sql').click(function(){
					window.open("user/user_sql.php?identity=" + identity + "&code=" + code , '_self');
				});
				//SQL TRACK
				$('#user_sql_track').click(function(){
					window.open("user/user_sql_track.php?identity=" + identity + "&code=" + code ,"_self");
				});
				//回首頁
				$('#index').click(function(){

					if(identity == 'user')
					{
						//window.open("index.php?identity=" + identity , '_self');
						$.get("bullution.php",function(data){
							$("#mainbody").html(data);
						});
					}else if(identity == 'admin')
					{
						//window.open("index.php?identity=" + identity + "&code=" + code , '_self');
						$.get("bullution.php",function(data){
							$("#mainbody").html(data);
						});
					}
				})


			});

			//登出
			function logout()
			{
				if(confirm('您確定要登出嘛?'))
				{
					location.href = 'loading.php?condition=logout';
				}

			}
		</script>
	</head>
	<body>
		<input type='hidden' id='admin_check' value='<?= $identity?>'>
		<input type='hidden' id='admin_code' value='<?= $code?>'>

		<div class="container">
			<!-- Push Wrapper -->
			<div class="mp-pusher" id="mp-pusher">

				<!-- mp-menu -->
				<nav id="mp-menu" class="mp-menu">
					<div class="mp-level">
						<h2 class="icon icon-study">福智基金會</h2>
						<ul>
							<li class="icon icon-arrow-left">
								<a class="icon icon-search" href="#">課程查詢</a>
								<div class="mp-level">
									<h2 class="icon icon-search">課程查詢</h2>
									<a class="mp-back" href="#">返回</a>
									<ul>
										<li>
											<a id="lesson">課程查詢</a>
										</li>

										<li>
											<a href="#" id="lesson_detail">細節查詢</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="icon icon-arrow-left">
								<a class="icon icon-news" href="#">其他資訊</a>
								<div class="mp-level">
									<h2 class="icon icon-news">其他資訊</h2>
									<a class="mp-back" href="#">返回</a>
									<ul>
										<li><a href="#">填寫意見</a></li>
										<li><a href="#">聯絡我們</a></li>

									</ul>
								</div>
							</li>
						</ul>

					</div>
				</nav>
				<!-- /mp-menu -->

				<div class="scroller"><!-- this is for emulating position fixed of the nav -->
					<div class="scroller-inner">
						<!-- Top Navigation -->
						<div class="codrops-top clearfix">
							<table style='float:left;' >
								<tr>
									<td align="center" valign="center"><img class="index" style="vertical-align:middle;" src='img/open-book.png' width="70%" /></td>
									<td><font class="index" id="index">福智基金會&nbsp;</font></td>

									<td><a href="#" id="trigger" >開啟清單</a>&nbsp;</td>
									<td><font id='admin' style="-webkit-user-select:none;cursor:default;">歡迎 <?php echo $_SESSION['account'];?> 使用者</td>
									</tr>
								</table>


								<table cellpadding="" style='float:right;'>
									<tr>
										<td><font style="-webkit-user-select:none;cursor:default;">身分：<?php echo $identity;?></font>&nbsp;</td>
										<td id="classroom">
											<a class="codrops-icon codrops-icon-drop" style="-webkit-user-select:none;cursor:default;" ><span>教室調動</span></a>
											<ul id="classroom_ul" style="background-color:rgba(255,255,255,0.95);color:black;position:absolute;white-space:nowrap;margin-top:0px;">
												<li style="float:left;"><font id="func1">功能一&nbsp;&nbsp;</font></li>
												<li style="float:left;"><b>|</b><font id="func2">&nbsp;&nbsp;功能二&nbsp;&nbsp;</font></li>
												<li style="float:left;"><b>|</b><font>&nbsp;&nbsp;功能三&nbsp;&nbsp;</font></li>
												<li style="float:left;"><font>&nbsp;&nbsp;</font></li>

											</ul>
										</td>
										<td id="backstage">
											<a class="codrops-icon codrops-icon-drop" style="-webkit-user-select:none;cursor:default;" ><span>後台系統</span></a>
											<ul id="backstage_ul" style="background-color:rgba(255,255,255,0.95);color:black;position:absolute;white-space:nowrap;margin-top:0px;">

												<li style="float:left;"><font id="user_data">使用者資料&nbsp;&nbsp;</font></li>
												<li style="float:left;"><b>|</b><font id="user_sql">&nbsp;&nbsp;SQL模式&nbsp;&nbsp;</font></li>
												<li style="float:left;"><font id="user_sql_track">SQL track&nbsp;&nbsp;</font></li>
											</ul>
										</td>
										<td id="user">
											<a class="codrops-icon codrops-icon-drop"  style="-webkit-user-select:none;cursor:default;"><span>使用者資訊</span></a>
											<ul id="user_ul" style="background-color:rgba(255,255,255,0.95);color:black;position:absolute;white-space:nowrap;margin-top:0px;">
												<li style="float:left;"><font>使用者資料&nbsp;&nbsp;</font></li>
												<li style="float:left;"><font>設定&nbsp;&nbsp;</font></li>
												<li style="float:left;"><b>|</b><font onclick='logout()'>&nbsp;&nbsp;登出&nbsp;&nbsp;</font></li>

											</ul>
										</td>


									</tr>
									</table>

							</div>

							<div id="mainbody" style='color:black'> <!-- 主頁 -->

							</div>

						</div><!-- /scroller-inner -->
					</div><!-- /scroller -->

				</div><!-- /pusher -->
			</div><!-- /container -->

			<script>
				new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ), {
					type : 'cover'
				} );
			</script>
		</body>
	</html>
