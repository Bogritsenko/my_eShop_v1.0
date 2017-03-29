<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <title>Тра-ля-ля - магазин не для всех.</title>
    <link rel="shortcut icon" href="view/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="view/pg.css" type="text/css">
    <script src="script/jquery-1.6.3.min.js"type="text/javascript"></script>
    <script src="script/jquery-ui-1.8.16.custom.min.js"type="text/javascript"></script>
    <script src="script/add.js" type="text/javascript"></script> 
</head>
<body background="view/img/background.gif">
    <form name="orderform" method="POST">
        <div id="content">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
				<tbody>
					<tr>
						<td background="view/img/background-left-shadow.jpg"><img src="view/img/spacer.gif" width="60" height="22"></td>
						<td bgcolor="#999999"><img src="view/img/spacer.gif" width="1" height="22"></td>
						<td width="100%" bgcolor="#ffffff" valign="top">
<!-- Menu / Tout Table -->
						<table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffffff">
<!-- Header / Menu -->
							<tbody>
<!-- OK -->						<tr>
									<td width="20"><img src="view/img/spacer.gif" width="20" height="1"></td>
									<td><img src="view/img/header-shop.gif" width="225" height="115" style="width: 225px; height: 115px;" alt="Тра-ля-ля E-Shop"></td>
									<td align="right">
										<a href="index.php"><img src="view/img/menu-shop-on.gif" width="57" height="67" border="0" alt="Главная"></a>
										<img src="view/img/menu-sep.gif" width="9" height="67">
										<a href="index.php?c=basket"><img src="view/img/menu-elist.gif" width="57" height="67" id="PopHost" name="PopHost" border="0" alt="Корзина"></a>
										<img src="view/img/menu-sep.gif" width="9" height="67">
										<a href="index.php?c=service"><img src="view/img/menu-service.gif" width="57" height="67" border="0" alt="Сервис"></a>
									</td>
									<td width="20"><img src="view/img/spacer.gif" width="20" height="1"></td>
<!-- OK -->						</tr>
								<tr>
									<td colspan="4" background="view/img/general-sep.gif"><img src="view/img/spacer.gif" width="1" height="1"></td>
								</tr>
<!-- Spacer -->
								<tr>
									<td colspan="4"><img src="view/img/spacer.gif" width="1" height="5"></td>
								</tr>	
							</tbody>
						</table>
<!-- End Menu / Tout Table -->
<!-- ON THIS PAGE / ABOUT -->
                    
<!-- End on this page / about -->
<!-- PANIC 1982 - SECTION header -->
						<img src="view/img/spacer.gif" width="1" height="5"><br>
<!-- OK -->         	<a name="1982" id="1982">
							<table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffffff">
								<tbody>
									<tr>
										<td background="view/img/sec-noby-top.gif"><img src="view/img/spacer.gif" width="4" height="1"></td>
									</tr>
									<tr>
										<td colspan="4" bgcolor="#16A9FF" style="background-color: #2baaff;  background-repeat: no-repeat; background-position: right;">        
			<!-- Tout Content -->
											<img src="view/img/tout-left.gif" width="268" height="56">        
			<!-- Tout Line -->
										</td>
									</tr>
									<tr>
										<td background="view/img/sec-noby-top.gif"><img src="view/img/spacer.gif" width="4" height="1"></td>
									</tr>
								</tbody>
							</table>
<!-- OK -->         	</a>
<!-- Product Rows -->                      
<!-- PANIC - SECTION header -->
						<img src="view/img/spacer.gif" width="1" height="10"><br>
						<a name="panic" id="panic">
							<table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffffff">
								<tbody>
									<tr>
										<td background="view/img/sec-sep-gray.gif">
											<img src="view/img/spacer.gif" width="1" height="1">
										</td>
									</tr>
									<tr>
				<!-- OK -->				<td colspan="4" bgcolor="#FAFAFA" style="background-color: #FAFAFA">
            				<!-- Tout Content -->
                                            <? if (isset($form)){?>
                                            <?=$form?>
                                            <? }?>
											
				<!-- OK -->		     	</td>
									</tr>
	<!-- Tout Line -->
		<!-- OK -->					<tr>
										<td background="view/img/sec-sep-gray.gif"><img src="view/img/spacer.gif" width="1" height="1"></td>
		<!-- OK -->					</tr>
								</tbody>
							</table>
						</a>
						<img src="view/img/spacer.gif" width="1" height="15"><br>
<!-- Product Rows -->
						<table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffffff">
<!-- ROW 1 -->
            				<tbody>
                                <? if (isset($shelf)){?>
                                <?=$shelf?>
                                <? }?>
                                
                                <? if (isset($basket)){?>
                                <?=$basket?>
                                <? }?>
                                
                                <? if (isset($orderform)){?>
                                <?=$orderform?>
                                <? }?>
                                
                                <? if (isset($about)){?>
                                <?=$about?>
                                <? }?>
                                
                                <? if (isset($service)){?>
                                <?=$service?>
                                <? }?>
								    	
<!-- END next -->
								<tr>
									<td colspan="6">
										<img src="view/img/spacer.gif" width="1" height="15">
									</td>
								</tr>
								<tr>
									<td colspan="6" background="view/img/general-sep.gif">
										<img src="view/img/spacer.gif" width="1" height="1">
									</td>
								</tr>
								<tr>
									<td colspan="6">
										<img src="view/img/spacer.gif" width="1" height="10">
									</td>
								</tr>
								<tr>
									<td colspan="6">
										<img src="view/img/spacer.gif" width="1" height="15">
									</td>
								</tr>
<!-- End of Page / Copyright -->
								<tr>
									<td colspan="6" class="copyright">
										<center>
											<img src="view/img/spacer.gif" width="51" height="10"><br>
											<img src="view/img/bottom-logo.gif" alt="" width="51" height="51" border="0"><br>©20011 Рафаэль Кирдан<br>
											<a href="index.php?c=service" style="color: #888888">Ваши вопросы / Сервис</a>
										</center>
									</td>
								</tr>
<!-- Spacer for Shopping Cart -->
								<tr>
									<td colspan="6">
										<img src="view/img/spacer.gif" width="1" height="110">
									</td>
								</tr>
							</tbody>
						</table>
<!-- End Content -->
					<!--</td>-->
						<td bgcolor="#999999">
							<img src="view/img/spacer.gif" width="1" height="22">
						</td>
						<td background="view/img/background-right-shadow.png">
							<img src="view/img/spacer.gif" width="60" height="22">
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</form>
    <!-- SHOPPING CART -->
    <? if (isset($shopping_cart)){?>
    <?=$shopping_cart?>
    <? }?>	

<!-- ELIST SIGNUP LAYER -->
</body>
</html>