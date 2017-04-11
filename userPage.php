<!DOCTYPE html>
<html>
<head>
<script charset="utf-8" src="js/jquery.min.js"></script>
<script charset="utf-8" src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/style.css">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="yes" name="apple-touch-fullscreen">
<meta content="telephone=no" name="format-detection">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1;user-scalable=no;">
<title>个人中心</title>
</head>
<body>
	<div class="userContainer">
		<header class="userHeader">
			<div class="userHeaderContent">
				<div class="headerContent">
        <!--通过$_SESSION['user_id']进行判断，如果用户未登录，则显示登录表单，让用户输入用户名和密码-->
				<a>
				<?php
						include('util.php');
						session_start();
						if(!isset($_SESSION['userType'])){
							echo "<script> alert('用户尚未登录，需要登录才能查看订单，现在跳转登录页面');parent.location.href='loginPage.html'; </script>"; 
						}else{

						$userid = $_SESSION['userType'];
						$username =$_SESSION['username'];
					   
					?>
                    <img src="images/Headportrait_.png" alt="头像"  class="img-responsive">
					<?php
						echo '<p>',$username,'</p>';
						echo '<p>',$userid,'</p>';    
					?>
                </a>

				</div>
			</div>
		</header>
<!--内容部分-->
		<article class="userArticle">
			<a class="orderContent" href="order_management.php">
				<div class="orderTitle">
					<p>我的订单</p>
					<span>查看全部订单></span>
				</div>
					<div class="orderType clearfix">
						<div class="col-xs-3 order">
							<a href="#">
								<img src="images/daifukuan.png" alt="待付款">
								<p>待付款</p>
							</a>
						</div>
						<div class="col-xs-3 order">
							<a href="#">
								<img src="images/daifahuo.png" alt="待发货">
								<p>待发货</p>
							</a>
						</div>
						<div class="col-xs-3 order">
							<a href="#">
								<img src="images/daishouhuo.png" alt="待收货">
								<p>待收货</p>
							</a>
						</div>
						<div class="col-xs-3 order">
							<a href="#">
								<img src="images/daituihuo.png" alt="待评价">
								<p>待评价</p>
							</a>
						</div>
					</div>
			</a>
			<div class="userFunction">
				<ul>
					<li style="position:relative;" class="clearfix">
						<a href="personinfo.php">
							<img src="images/geren.png"class="img-responsive">
							<span class="orderName">个人信息</span>
							<span class="orderMore">ooo</span>
						</a>
					</li>
					<li style="position:relative;" class="clearfix">
						<a href="shipAddress.php">
							<img src="images/shouhuodizhi.png" class="img-responsive" >
							<span class="orderName">我的收货地址</span>
							<span class="orderMore">ooo</span>
						</a>
					</li>
					<li style="position:relative;" class="clearfix">
						<a href="bankcard.php">
							<img src="images/fenxiang.png">
							<span class="orderName">银行卡管理</span>
							<span class="orderMore">ooo</span>
						</a>
					</li>
					<li style="position:relative;" class="clearfix">
						<a href="changepass.html">
							<img src="images/yijianfankui.png">
							<span class="orderName">密码修改</span>
							<span class="orderMore">ooo</span>
						</a>
					</li>
					<li style="position:relative;" class="clearfix">
						<a href="bangzhu.html">
							<img src="images/question.png">
							<span class="orderName">帮助中心</span>
							<span class="orderMore">ooo</span>
						</a>
					</li>
					<li style="position:relative;" class="clearfix">
						<a href="userController.php?flag=logout">
							<img src="images/logout.png">
							<span class="orderName">退出登陆</span>
							<span class="orderMore">ooo</span>
						</a>
					</li>
				</ul>
			</div>
		</article>
<!--脚本部分-->		
<!--底部导航栏-->
<footer class="footer">
  <div class="foot-con">
  <div class="foot-con_2">
    <a href="index.php">
      <i class="navIcon home"></i>
      <span class="text">首页</span>
    </a>
    <a href="classiFication.php">
      <i class="navIcon sort"></i>
      <span class="text">分类</span>
    </a>
    <a href="shoppingCart.php">
      <i class="navIcon shop"></i>
      <span class="text">购物车</span>   
    </a>
    <a href="userPage.php" class="active">
      <i class="navIcon member"></i>
      <span class="text">我的</span>
    </a>
  </div>
  </div>
</footer>
	</div>
	<?php }?>
</body>
</html>