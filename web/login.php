<?php
	// include('set.php');

?>
<!doctype html>
<html>
	<head>
		<meta charset='utf-8' />
		<meta name='viewport' content='height=device-height' />
		<link rel='stylesheet' type='text/css' href='css/css.css'>
		<link rel='stylesheet' type='text/css' href='css/bootstrap.css'>
		<script src="js/jquery.js"></script>
		<script src='js/bootstrap.min.js'></script>

		<title>福智基金會</title>
		<style>
			body{
			font:80% "Microsoft JhengHei",sans-serif;
			background-color:#4F709F;
			height:600px;
			width:1200px;
			}

			#log_title:hover{
			position:relative;
			top:1px;
			left:1px;
			font-size:26px;
			}



			@media screen and (min-width:1301px)
			{
			#rightbody{
			margin:20px;
			margin-right:50px;
			width:400px;
			height:500px;
			font-size:15px;
			float:right;
			}

			#slideshow{
			margin:20px;
			margin-left:50px;
			width:800px;
			height:500px;
			float:left;
			}
			}

			@media screen and (max-width:1300px)
			{
			#rightbody{
			margin:20px;
			margin-right:50px;
			width:400px;
			height:500px;
			font-size:15px;
			float:right;
			}

			#slideshow{
			margin:20px;
			margin-left:50px;
			width:720px;
			height:500px;
			float:left;
			}
			}
		</style>
		<script type='text/javascript'>
			$(document).ready(function(){

				$.get('check.php',function(data){
					$('.check_img').html(data)
				})

				$('.reload').click(function(){
					$.get('check.php',function(data){
						$('.check_img').html(data)
					})
				});

				$('#registered').click(function(){	//註冊按鈕
					$('#bounce_registered').modal('show');
				});

				$('#myTab a:first').tab('show');// 學員 使用者切換

				$('#myTab a').click(function (e) {
					e.preventDefault();		//讓超連結失效
					$(this).tab('show');
				})

				$('#check_registered').click(function(){	//註冊視窗
					if(this.checked)
					{
						$('#next').removeAttr('disabled');
						}else{
						$('#next').attr('disabled','false');
					}
				});

				$('#next').click(function(){		//註冊視窗 下一步
					$('#registered').attr('class','btn btn-success');
					$('#login').attr('class','btn btn-primary');

					$('#rightbody').empty();
					$.get('registered.php',function(data){
						$('#rightbody').html(data);

					});
					$('#bounce_registered').modal('hide');
				});

				$('#login').click(function(){
					location.href = 'login.php'
				});
			});
		</script>
	</head>
	<body>
		<div class="well well-lg" style='height:80px;width:1360px;margin-top:0px;margin:0px;' >    <!--  上標題   -->
			<div id='log_title' style='float:left;'>		<!-- 左半邊  -->
				<table>
					<tr>
						<td><img src='img/open-book.png' /></td>
						<td><b style='cursor:pointer;font-size:24px;color:#4F709F;' title='關於基金會'>福智基金會</b></td>
					</tr>
				</table>
			</div>


			<div style='float:right;margin-right:30px;' >			<!--  右半邊 -->
				<input type='button' class='btn btn-success' value='登入' id='login' />&nbsp;&nbsp;&nbsp;
				<input type='button' class='btn btn-primary' value='註冊' id='registered' />

			</div>
		</div>

		<!--  主畫面 -->
		<table cellpadding='3'>
			<tr>
				<td>
					<div id='slideshow' class='well well-lg' align='center' style='background-color:#D4D4D4;'>		<!--  主畫面左半邊 幻燈片 -->


						<div id="myCarousel" class="carousel slide" style='height:460px;'>
							<!-- 轮播（Carousel）指标 -->
							<ol class="carousel-indicators">
								<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
								<li data-target="#myCarousel" data-slide-to="1"></li>
								<li data-target="#myCarousel" data-slide-to="2"></li>
							</ol>
							<!-- 轮播（Carousel）项目 -->
							<div class="carousel-inner" >
								<div class="item active">
									<pre style='font-weight:bold;'>You must study hard!</pre>
									<br>
									<img width='50%' src="img/slide1.png" alt="First slide">
								</div>
								<div class="item">
									<pre style='font-weight:bold;'>Improve efficiency.</pre>
									<br>
									<img width='50%' src="img/slide2.png" alt="Second slide">
								</div>
								<div class="item">
									<pre style='font-weight:bold'>Or ... join us 福智基金會. You will Success!</pre>
									<br>
									<img width='50%' src="img/slide3.png" alt="Third slide">
								</div>
							</div>
							<!-- 轮播（Carousel）导航 -->
							<a class="carousel-control left" href="#myCarousel"
							data-slide="prev">&lsaquo;</a>
							<a class="carousel-control right" href="#myCarousel"
							data-slide="next">&rsaquo;</a>
						</div>

					</div>
				</td>
				<td>

					<div id='rightbody' class='well well-lg' align='center'>		<!--  主畫面右半邊 登入  -->

						<ul class="nav nav-tabs" id="myTab">
							<li class="active"><a href='#user'>使用者登入</a></li>
							<li><a href="#admin">管理員登入</a></li>
						</ul>
						<?php

							if(!isset($_SESSION['error']))
							{
								$_SESSION['error'] = 0;
							}

							if(!isset($_SESSION['error_check']))
							{
								$_SESSION['error_check'] = 0;
							}

							if($_SESSION['error_check'] == '1')
							{
								echo "<script>alert('驗證碼有誤')</script>";
								$_SESSION['error_check'] = 0;
							}

							if($_SESSION['error'] == '1')
							{
								echo "<script>alert('帳號密碼有誤')</script>";
								$_SESSION['error'] = 0;
							}
						?>
						<div class="tab-content">
							<!-- 使用者登入 -->
							<div class="tab-pane active" id="user">
								<br>
								<form action='loading.php?condition=login' method='post'>
									<table >
										<tr>
											<td align='center'><img class='img-circle'  src='img/user.png'></td>
											<input type='hidden' name='identity' value='user' />
										</tr>
										<tr>
											<td>&nbsp;</td>
										</tr>
										<tr>
											<td><b>帳號</b></td>
										</tr>
										<tr>

											<td><input type='text' class="form-control" placeholder='請輸入帳號' name='account' required /></td>
										</tr>
										<tr>
											<td><b>密碼</b></td>
										</tr>

										<tr>
											<td><input type='password' class="form-control" placeholder='請輸入密碼' name='psd' required /></td>
										</tr>
										<tr>
											<td>
												<b>驗證碼</b>
												<br>
												<div class='check_img' style='float:left;'></div>
												&nbsp;&nbsp;
												<img src='img/reload.png' style='cursor:pointer;' class='reload' title='重新產生'/>
											</td>
										</tr>
										<tr>
											<td>
												&nbsp;
											</td>
										</tr>
										<tr>
											<td><a id='registered' style='cursor:pointer;font-size:12px;float:right;'>還沒有帳號</a></td>
										</tr>

										<tr>
											<td>
												<input type='submit' value='登入' style='width:250px;' class='btn btn-primary' />
											</td>
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
							<!-- 管理者登入 -->
							<div class="tab-pane" id="admin">
								<br>
								<form action='loading.php?condition=login' method='post'>
									<table>
										<tr>
											<td align='center'><img class='img-circle'  src='img/admin.png'></td>
											<input type='hidden' name='identity' value='admin'>
										</tr>
										<tr>
											<td>&nbsp;</td>
										</tr>
										<tr>
											<td><b>帳號</b></td>
										</tr>
										<tr>

											<td><input type='text' class="form-control" placeholder='請輸入帳號' name='account' required /></td>
										</tr>
										<tr>
											<td><b>密碼</b></td>
										</tr>
										<tr>
											<td><input type='password' class="form-control" placeholder='請輸入密碼' name='psd' required /></td>
										</tr>
										<tr>
											<td>
												<b>驗證碼</b>
												<br>
												<div class='check_img' style='float:left;'></div>
												&nbsp;&nbsp;
												<img src='img/reload.png' style='cursor:pointer;' class='reload' title='重新產生'/>
											</td>
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


					</div>
				</td>
			</tr>
		</table>





		<!--  彈跳視窗 註冊 -->
		<div class="modal fade" id="bounce_registered" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">  <!--    -->
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title" id="myModalLabel">
							註冊同意條款
						</h4>
					</div>
					<div class="modal-body" align='left' style='height:450px;overflow-y:scroll;'>
						<p style='font-size:18px;'>一、說明與同意條款</p>
						<p style='font-size:15px;'>
							1.	當會員完成網站（以下稱「本網站」）之會員註冊手續或開始使用本網站服務時，即表示已閱讀並同意接受本網站服務條款之所有內容。
						</p>
						<p style='font-size:15px;'>
							2.	有權於任何時間修改或變更本服務條款內容，修改後將公布本網站上，不再個別通知會員，建議會員隨時注意該等修改或變更。會員於任何修改或變更後繼續使用本網站服務時，視為會員已瞭解並同意接受該等修改或變更。
						</p>
						<p style='font-size:15px;'>
							3.	若不同意上述的條款修訂或更新，或不接受本服務條款的任一約定，會員應立即停止使用本網站服務。會員同意使用本網站服務所生權利義務，得以電子文件為作表示方式。
						</p>
						<p style='font-size:18px;'>二、會員註冊</p>
						<p style='font-size:15px;'>
							會員同意下列事項：
						</p>
						<p style='font-size:15px;'>
							1.	依本網站註冊流程之提示，提供會員本人之正確、最新的資料，且不得以第三人之名義註冊為會員。每位會員僅能註冊登錄一個帳號，不可重覆註冊登錄。
						</p>
						<p style='font-size:15px;'>
							2.          隨時更新會員個人資料，以確保其正確性，獲取本網站之最佳服務。
						</p>
						<p style='font-size:15px;'>
							3.          若會員提供任何錯誤或不實的資料、或未按指示提供資料、或欠缺必要之資料、或有重覆註冊帳號等，福智基金會有權不經事先通知，逕行暫停或終止會員的帳號，並拒絕會員使用本網站服務。
						</p>

						<p style='font-size:18px;'>三、福智基金會個人資料保護聲明</p>
						<p style='font-size:15px;'>
							關於會員的註冊以及其他活動參與或交易所取得之個人資料，依福智基金會「個人資料保護聲明」及個人資料保護法受到保護與規範。
						</p>

						<p style='font-size:18px;'>四、會員帳號及密碼</p>

						<p style='font-size:15px;'>
							1.          在註冊本網站為會員時，將設定一個特定帳號與密碼，作為進入本網站之身份，維持帳號與密碼之安全是會員的責任。任何依照規定方法輸入會員帳號及密碼與登入資料一致時，無論是否由本人親自輸入，均視為會員本人所使用，利用該帳號及密碼所進行的一切行為，會員本人應負完全責任。
						</p>
						<p style='font-size:15px;'>
							2.          會員使用注意事項：
						</p>
						<p style='font-size:15px;'>
							2.1會員的帳號或密碼遭到盜用或有任何安全問題發生時，會員將立即通知福智基金會。
						</p>
						<p style='font-size:15px;'>
							2.2每次使用完本服務後均會登出帳戶，若是與他人共享電腦或使用公共電腦，離開時亦請關閉瀏覽器視窗。
						</p>
						<p style='font-size:15px;'>
							2.3會員帳號、密碼與權益均僅供會員個人使用及享有，不得轉借、轉讓或與他人合用。
						</p>
						<p style='font-size:15px;'>
							2.4帳號及密碼遭盜用、不當使用或其他福智基金會無法辯識是否為本人親自使用之情況時，福智基金會對此所致之損害，概不負責。
						</p>
						<p style='font-size:15px;'>
							2.5福智基金會若知悉會員之帳號、密碼確係遭他人冒用時，將立即暫停該帳號之使用(含該帳號所生交易之處理)。
						</p>

						<p style='font-size:18px;'>五、會員使用的義務</p>
						<p style='font-size:15px;'>
							會員同意絕不為任何非法目的或以任何非法方式使用本網站服務，並承諾遵守中華民國相關法規及一切使用網際網路之國際慣例。會員若為中華民國以外之使用者，並同意遵守所屬國家或地域之法令。會員同意並保證不得利用本網站服務從事侵害他人權益或違法之行為，包括下列事項，但不限於：
						</p>
						<p style='font-size:15px;'>
							1.          公布或傳送任何不實、誹謗、侮辱、不雅、猥褻、具威脅性、攻擊性、違反公共秩序或善良風俗或其他任何不法之文字、圖片或任何形式的檔案資料。
						</p>
						<p style='font-size:15px;'>
							2.          刊載、傳輸、發送垃圾郵件、違法或未經福智基金會許可之訊息及廣告等；侵害毀損福智基金會或他人名譽、隱私權、營業機密、智慧財產權（商標權、著作權、專利權）及其他權利。
						</p>
						<p style='font-size:15px;'>
							3.          違反依法律或契約所應負之保密義務。
						</p>
						<p style='font-size:15px;'>
							4.          冒用他人名義使用本網站服務。
						</p>
						<p style='font-size:15px;'>
							5.          傳輸或散布電腦病毒、後門程式或影響本網站或其他使用者電腦之正常運作者。
						</p>
						<p style='font-size:15px;'>
							6.          從事未經福智基金會事前授權之商業行為。
						</p>
						<p style='font-size:15px;'>
							7.          其他不符本網站服務所提供的使用目的之行為，或福智基金會有正當理由認為不適當之行為。
						</p>

						<p style='font-size:18px;'>六、交易行為</p>

						<p style='font-size:15px;'>
							1.          會員使用本網站進行交易時，應依據福智基金會所提供之確認商品數量及價格機制進行。
						</p>
						<p style='font-size:15px;'>
							2.          會員同意使用本網站訂購商品時，於福智基金會確認出貨前，福智基金會仍保有不接受訂單或取消出貨之權利。
						</p>
						<p style='font-size:15px;'>
							3.          會員若於使用本網站訂購商品後，若任意退換貨、取消訂單、或有任何福智基金會認為不適當而造成福智基金會作業上之困擾或損害之行為，福智基金會將可視情況採取拒絕交易或永久取消會員資格處理。
						</p>
						<p style='font-size:15px;'>
							若會員訂購之商品若屬於以下情形：
						</p>
						<p style='font-size:15px;'>
							A.    預購類商品。
						</p>
						<p style='font-size:15px;'>
							B.      商品頁顯示無庫存。
						</p>
						<p style='font-size:15px;'>
							C.     須向供應商調貨。
						</p>
						<p style='font-size:15px;'>
							D.    轉由廠商出貨。
							</p><p style='font-size:15px;'>
							以上狀況，因商品交易特性之故，若商品短缺或供應商因故無法順利供貨，導致訂單無法成立時，福智基金會將以最適方式告知，若訂單已成立者，並得取消訂單，並退回已支付之款項。
						</p>
						<p style='font-size:15px;'>
							4.          會員使用本服務進行交易時，得依照消費者保護法之規定行使權利。
						</p>

						<p style='font-size:18px;'>七、本網站服務內容之變更與電子報及E-DM發送</p>
						<p style='font-size:15px;'>
							1.          會員同意福智基金會所提供本網站服務之範圍，福智基金會得視業務需要及實際情形，增減、變更或終止相關服務的項目或內容，且無需個別通知會員。
						</p>
						<p style='font-size:15px;'>
							2.          會員同意福智基金會得不定期發送電子報或商品訊息(E-DM)至會員所登錄的電子信箱帳號。當會員收到訊息後表示拒絕接受行銷時，福智基金會將停止繼續發送行銷訊息。
						</p>

						<p style='font-size:18px;'>八、服務之停止、中斷</p>

						<p style='font-size:15px;'>
							福智基金會將依一般合理之技術及方式，維持系統及服務之正常運作。但於以下各項情況時，福智基金會有權可以停止、中斷提供本網站服務：
						</p>
						<p style='font-size:15px;'>
							1.          福智基金會網站電子通信設備進行必要之保養及施工時。
						</p>
						<p style='font-size:15px;'>
							2.          突發性之電子通信設備故障時。
						</p>
						<p style='font-size:15px;'>
							3.          福智基金會網站申請之電子通信服務被停止，無法提供服務時。
						</p>
						<p style='font-size:15px;'>
							4.          因天災等不可抗力之因素或其他不可歸責於福智基金會致使本網站無法提供服務時。
						</p>

						<p style='font-size:18px;'>九、會員對福智基金會之授權</p>

						<p style='font-size:15px;'>
							1.      對於會員透過本網站上載、傳送、輸入或提供之資料，會員同意福智基金會網站得於合理之範圍內蒐集、處理、保存、傳遞及使用該等資料，以提供使用者其他資訊或服務、或作為會員統計資料、或進行相關行為之調查研究，或為任何之合法使用。
						</p>
						<p style='font-size:15px;'>
							2.      若會員無合法權利得授權他人使用、修改、重製、公開播送、改作、散布、發行、公開發表某資料，並將前述權利轉授權第三人，請勿擅自將該資料上載、傳送、輸入或提供至福智基金會。
						</p>
						<p style='font-size:15px;'>
							3.      任何資料一經會員上載、傳送、輸入或提供至福智基金會時，視為會員已允許福智基金會無條件使用、修改、重製、公開播送、改作、散布、發行、公開發表該等資料，並得將前述權利轉授權他人，會員對此絕無異議。會員並應保證福智基金會使用、修改、重製、公開播送、改作、散布、發行、公開發表、轉授權該等資料，不致侵害任何第三人之智慧財產權，否則應對福智基金會負損害賠償責任（包括但不限於訴訟費用及律師費用等）。
						</p>
						<p style='font-size:15px;'>
							4.      因使用福智基金會所提供之網路交易或活動，可能須透過宅配或貨運業者始能完成貨品(或贈品等)之配送或取回。對此，會員同意並授權福智基金會得視該次網路交易或活動之需求及目的，將由會員所提供且為配送所必要之個人資料(如收件人姓名、配送地址、連絡電話等)，提供予宅配或貨運業者，以利完成該次貨品(或贈品等)之配送、取回。
						</p>

						<p style='font-size:18px;'>	十、拒絕或終止會員的使用</p>

						<p style='font-size:15px;'>
							會員同意福智基金會得基於維護交易安全之考量，因任何理由，包含但不限於缺乏使用，或違反本服務條款的明文規定及精神，終止會員的密碼、帳號（或其任何部分）或本服務之使用，並將本網路服務內任何「會員內容」加以移除並刪除，亦得於已依會員所留存之電子郵件通知之情形下，隨時終止本網站服務或任何部分。此外，會員同意若本網站服務之使用被終止，福智基金會對會員或任何第三人均不承擔責任。
						</p>

						<p style='font-size:18px;'>	十一、責任限制與排除</p>
						<p style='font-size:15px;'>
							1.          福智基金會所提供之各項功能，均依該功能當時之現況提供使用，對於其效能、速度、完整性、可靠性、安全性、正確性等，皆不負擔任何明示或默示之擔保責任。
						</p>
						<p style='font-size:15px;'>
							2.          福智基金會竭力維護本網站服務之網頁、伺服器、網域等所傳送的電子郵件或其內容不含有電腦病毒等有害物；但無法保證郵件、檔案或資料之傳輸儲存均正確無誤不會斷線和出錯等，因各該郵件、檔案或資料傳送或儲存失敗、遺失或錯誤等所致之損害，福智基金會不負賠償責任。
						</p>

						<p style='font-size:18px;'>	十二、智慧財產權的保護</p>

						<p style='font-size:15px;'>
							1.          福智基金會所使用之軟體或程式、網站上所有內容，包括但不限於著作、圖片、檔案、資訊、資料、網站架構、網站畫面的安排、網頁設計，均為福智基金會或其他權利人依法擁有其智慧財產權，包括但不限於商標權、專利權、著作權、營業秘密與專有技術等。任何人不得逕自使用、修改、重製、公開播送、改作、散布、發行、公開發表、進行還原工程、解編或反向組譯。若會員欲引用或轉載前述軟體、程式或網站內容，必須依法取得福智基金會或其他權利人的事前書面同意。
						</p>
						<p style='font-size:15px;'>
							2.          在尊重他人智慧財產權之原則下，會員同意在使用福智基金會之網站時，不作侵害他人智慧財產權之行為。
						</p>
						<p style='font-size:15px;'>
							3.          若會員有涉及侵權之情事，福智基金會可暫停全部或部份之服務，或逕自以取消會員帳號之方式處理，如有損害，並得請求因此所生之損害賠償。
						</p>
						<p style='font-size:15px;'>
							4.          若有發現智慧財產權遭侵害之情事，請將所遭侵權之情形及聯絡方式，並附具真實陳述及擁有合法智慧財產權之聲明，以電子郵件(E-mail)寄送至：XXXXXX@gmail.com方式聯絡福智基金會。
						</p>

						<p style='font-size:18px;'>	十三、管轄法院</p>
						<p style='font-size:15px;'>
							本約定書之解釋與適用，以及與本約定書有關的爭議，均應依照中華民國法律予以處理，除法律另有規定者外，雙方並同意以台灣士林地方法院為第一審管理法庭。
						</p>
						<br>
						<br>
						<br>
						<br>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style='font-size:18px;cursor:pointer;'><input type='checkbox' id='check_registered' />&nbsp;我已詳細閱讀並同意以上會員約定及條款</label>

					</div>
					<div class="modal-footer" >
						<button id="next" class="btn btn-primary" disabled='true'   >下一步</button>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
