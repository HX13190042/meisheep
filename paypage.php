<!DOCTYPE html>
<html>
<head>
<script charset="utf-8" src="js/jquery.min.js"></script>
<script charset="utf-8" src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/loginPage.css">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="yes" name="apple-touch-fullscreen">
<meta content="telephone=no" name="format-detection">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1;user-scalable=no;">
	<title>支付</title>
</head>
<?php
session_start();
?>
<style type="text/css">
.paymoney{background: #fff;}
.wenx_xx .mz{ text-align: center; height: 30px;line-height: 30px;}
.wenx_xx .wxzf_price{ text-align: center; height: 50px;line-height: 50px;font-size: 20px;font-weight: bold;}
.skf_xinf{border: 1px solid #e5e5e5; height: 40px;}
.skf_xinf span{line-height: 40px; margin: 0  10px;}
.ljzf_but { border-radius: 3px; height: 45px; line-height: 45px; background: #D91D37; display: block; text-align: center; font-size: 16px; margin-top: 14px; color: #fff; color:#fff;}
.ljzf_but:hover{ color:#fff;}

</style>
<body>
	<div class="loginContainenr">
		<header class="header">
			<div class="fix_nav">
				<div style="max-width:768px;margin:0 auto;background:#D91D37;position: relative;">
					<a class="nav-left back-icon" href="order_info2.php">返回</a>
					<div class="tit">确认交易</div>
				</div>
			</div>
		</header>
		<div class="paymoney">
			<div class="wenx_xx">
			  <div class="mz">美美羊商城</div>
			  <div class="wxzf_price"><?php echo $_SESSION['$arr_gtotal1'];?></div>
			</div>
			<div class="skf_xinf">
			  <div class="all_w"> <span class="bt">收款方</span> <span class="fr">美美羊</span> </div>
			</div>
			<!-- href="orderNumber.php" -->
			<a  class="ljzf_but all_w">立即支付</a> 
		</div>
		</div>
</body>
</html>
<script type="text/javascript" charset="utf-8" >
	$(document).ready(function(){
		$('.all_w').click(function() {
			if(confirm("请确认你的付款金额")){
				//已付款
			   goodsdeta('已付款');
			  }
			  else{
			  	//待付款
			   goodsdeta('待付款');
			  }
		});
	});
</script>
<!-- 都是提交到同一个页面，确定是定义为已付款，点击取消则定义为待付款 -->
<script type="text/javascript">
	function goodsdeta(argument) {
    document.write("<form action='orderNumber.php' method='post' name='form1' style='display:none'>");  
    document.write("<input type='hidden' name='name' value='"+argument+"'/>");
    document.write("</form>");  
    document.form1.submit(); 
}
</script>