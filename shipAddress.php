
<!DOCTYPE html>
<html>
<head>
<script charset="utf-8" src="js/jquery.min.js"></script>
<script charset="utf-8" src="js/bootstrap.min.js"></script>

<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/shipAddress.css">

<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/slider.js"></script>
<link rel="stylesheet" href="css/banner.css">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="yes" name="apple-touch-fullscreen">
<meta content="telephone=no" name="format-detection">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1;user-scalable=no;">
<title>管理收货地址</title>
</head>
<body>
	<div class="addressContainer">
		<header class="header">
			<div class="fix_nav">
				<div style="max-width:768px;margin:0 auto;background:#D91D37;position: relative;">
					<a class="nav-left back-icon" href="userPage.php">返回</a>
					<div class="tit">管理收货地址</div>
				</div>
			</div>
		</header>
		<!--我的收货地址管理-->
<?php
    include('util.php');
    session_start();
  //检测是否获取用户的账号
  //  echo   $_SESSION['userType'];
    $userType= $_SESSION['userType'];
    $userid=$_SESSION['userId'] ;
   // echo $userid;
    $check_query=mysql_query("select userAddressId, conname, address ,detailed_add,phone from tb_userAddress where Uid='$userid'"); 
    while($rows=mysql_fetch_array($check_query))
	{
	?>
			<section class="mainAddress">
				<div class="content-Address">
				<!--<?php echo $rows["userAddressId"];?>-->
					<div class="add-info clearfix">
						<span class="add-name"><?php echo $rows["conname"];?></span>
						<span class="add-tel"><?php echo $rows["phone"];?></span>
					</div>	
					<p class="add-address"><?php echo $rows["address"];?><?php echo $rows["detailed_add"];?></p>
					<div class="add-modify">
						   <!--  <span class="add-default">默认地址</span> -->
						    <a class="add-move" href="address_edit.php?flag=<?php echo $rows["userAddressId"];?>">
							<img class="add-edit" src="images/bianji.png" height="20" width="20">编辑
							<!-- <span class="add-delete">删除</span> -->
							</a>
					</div>
				</div>
		<?php
			}
		?>
		</section>
			<footer class="add-footer">
				<div class="add-act">
					<a href="addAddress.html">添加新地址</a>
				</div>
			</footer>
	</div>
</body>
</html>