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
<title>分类</title>
</head>
<body>
<?php
error_reporting(0);
session_start();//启用session
if(!isset($_SESSION['userType'])){
   $userstype="";
  }
else{
    $userstype=$_SESSION['userType'];
     $username =$_SESSION['username'];
}
?>
<div class="classiFication">
		<header class="header">
			<div class="fix_nav">
				<div style="max-width:768px;margin:0 auto;background:#D91D37;position: relative;">
					<a class="nav-left back-icon" href="index.php">返回</a>
					<div class="tit">商品分类</div>
				</div>
			</div>
		</header>
	<div class="main">
		<div class="category" >
			<ul>
				<li>
					<a href="LipsproductList.php?type=1" >
						<img src="imgCase/category_01.jpg" style="width:initial;height:100px;" >
						<div style="width:90%;white-space: nowrap;text-overflow: ellipsis;overflow:hidden;text-align:center;margin: auto;">面膜</div>
					</a>
				</li>
				<li>
					<a href="LipsproductList.php?type=2">
						<img src="imgCase/category_02.jpg" style="width:initial;height:100px;" >
						<div style="width:90%;white-space: nowrap;text-overflow: ellipsis;overflow:hidden;text-align:center;margin: auto;">洁面卸妆</div>
					</a>
				</li>
				<li>
					<a href="LipsproductList.php?type=3">
						<img src="imgCase/category_03.jpg" style="width:initial;height:100px;" >
						<div style="width:90%;white-space: nowrap;text-overflow: ellipsis;overflow:hidden;text-align:center;margin: auto;">水乳面霜</div>
					</a>
				</li>  
				<li>
					<a href="LipsproductList.php?type=4">
						<img src="imgCase/category_04.jpg" style="width:initial;height:100px;" >
						<div style="width:90%;white-space: nowrap;text-overflow: ellipsis;overflow:hidden;text-align:center;margin: auto;">防晒隔离</div>
					</a>
				</li>
				<li>
					<a href="LipsproductList.php?type=5">
						<img src="imgCase/category_05.jpg" style="width:initial;height:100px;" >
						<div style="width:90%;white-space: nowrap;text-overflow: ellipsis;overflow:hidden;text-align:center;margin: auto;">遮瑕修容</div>
					</a>
				</li>
				<li>
					<a href="LipsproductList.php?type=6">
						<img src="imgCase/category_06.jpg" style="width:initial;height:100px;" >
						<div style="width:90%;white-space: nowrap;text-overflow: ellipsis;overflow:hidden;text-align:center;margin: auto;">基础底妆</div>
					</a>
				</li>
				<li>
					<a href="LipsproductList.php?type=7">
						<img src="imgCase/category_07.jpg" style="width:initial;height:100px;" >
						<div style="width:90%;white-space: nowrap;text-overflow: ellipsis;overflow:hidden;text-align:center;margin: auto;">眼部彩妆</div>
					</a>
				</li>
				<li>
					<a href="LipsproductList.php?type=8">
						<img src="imgCase/category_08.jpg" style="width:initial;height:100px;" >
						<div style="width:90%;white-space: nowrap;text-overflow: ellipsis;overflow:hidden;text-align:center;margin: auto;">唇部彩妆</div>
					</a>
				</li>
				<li>
					<a href="LipsproductList.php?type=9">
						<img src="imgCase/category_09.jpg" style="width:initial;height:100px;" >
						<div style="width:90%;white-space: nowrap;text-overflow: ellipsis;overflow:hidden;text-align:center;margin: auto;">眉部彩妆</div>
					</a>
				</li>
				<li>
					<a href="LipsproductList.php?type=10">
						<img src="imgCase/category_10.jpg" style="width:initial;height:100px;" >
						<div style="width:90%;white-space: nowrap;text-overflow: ellipsis;overflow:hidden;text-align:center;margin: auto;">唇部护理</div>
					</a>
				</li>
				<li>
					<a href="LipsproductList.php?type=11">
						<img src="imgCase/category_11.jpg" style="width:initial;height:100px;" >
						<div style="width:90%;white-space: nowrap;text-overflow: ellipsis;overflow:hidden;text-align:center;margin: auto;">眼部护理</div>
					</a>
				</li>
				<li>
					<a href="LipsproductList.php?type=12">
						<img src="imgCase/category_12.jpg" style="width:initial;height:100px;" >
						<div style="width:90%;white-space: nowrap;text-overflow: ellipsis;overflow:hidden;text-align:center;margin: auto;">精华精油</div>
					</a>
				</li>
				<li>
					<a href="LipsproductList.php?type=13">
						<img src="imgCase/category_13.jpg" style="width:initial;height:100px;" >
						<div style="width:90%;white-space: nowrap;text-overflow: ellipsis;overflow:hidden;text-align:center;margin: auto;">身体护理</div>
					</a>
				</li>
				<li>
					<a href="LipsproductList.php?type=15">
						<img src="imgCase/category_14.jpg" style="width:initial;height:100px;" >
						<div style="width:90%;white-space: nowrap;text-overflow: ellipsis;overflow:hidden;text-align:center;margin: auto;">美发护发</div>
					</a>
				</li>
				<li>
					<a href="LipsproductList.php?type=15">
						<img src="imgCase/category_15.jpg" style="width:initial;height:100px;" >
						<div style="width:90%;white-space: nowrap;text-overflow: ellipsis;overflow:hidden;text-align:center;margin: auto;">口腔护理</div>
					</a>
				</li>
			</ul>
		</div>
	</div>
<footer class="footer" style="margin-top:-1px;">
  <div class="foot-con">
  <div class="foot-con_2">
    <a href="index.php">
      <i class="navIcon home"></i>
      <span class="text">首页</span>
    </a>
    <a href="classiFication.php" class="active">
      <i class="navIcon sort"></i>
      <span class="text">分类</span>
    </a>
    <a href="shoppingCart.php">
      <i class="navIcon shop"></i>
      <span class="text">购物车</span>   
    </a>
    <a class="judgemen" >
      <i class="navIcon member"></i>
      <span class="text">我的</span>
      <span class="usertype" style="display:block"><?php echo $userstype ;?></span>
    </a>
  </div>
  </div>
</footer>
</div>
<script type="text/javascript">
  $('.judgemen').click(function(){
    var temp=$(this).find('.usertype').text();
      if(temp==""){
        parent.location.href='loginPage.html';
      }else{
         parent.location.href='userPage.php';
      }
  });
</script>
</body>
</html>