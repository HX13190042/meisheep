<!DOCTYPE html>
<html>
<head>
<script charset="utf-8" src="js/jquery.min.js"></script>
<script charset="utf-8" src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/style.css">
<!-- <link rel="stylesheet" type="text/css" href="css/productList.css"> -->
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
<title>产品列表</title>
<style type="text/css">
	.item-list a{text-decoration: none;}
</style>
</head>
<body>
<div class="productList">
		<header class="header">
			<div class="fix_nav">
				<div style="max-width:768px;margin:0 auto;background:#D91D37;position: relative;">
					<a class="nav-left back-icon" href="index.php">返回</a>
					<div class="tit">商品列表</div>
				</div>
			</div>
		</header>
		<div class="productMain">
			<ul class="clearfix">
				<li class="active"><a href="#">默认
				</a></li>
				<li><a href="#">销量
					<i class='icon_sort'></i>
				</a></li>
				<li><a href="#">价格
					<i class='icon_sort'></i>
				</a></li>
				<li><a href="#">人气
					<i class='icon_sort'></i>
				</a></li>
			</ul>
			<!--默认显示的商品列表-->
			<div class="item-list clearfix default">
			<?php
			//在这里判断，传递进来的字符为何什么类型，以此进行不同商品类型的选择
				include('util.php');
			//获取传递过来的参数，判断类型是什么
				
				$typeGood;
				if(isset($_POST["keyword"])){
				$type=$_POST['keyword'];
				// echo $type;
				$sql="select * from shopinfo where Sname like '%$type%'";
				// echo $sql;
		
				$result = mysql_query($sql);
				while($rows=mysql_fetch_array($result))
				{
				?>
				<!--将商品的id以及名字打包显示在商品详情页中，需要对商品进行传递-->
				<a href="#">
<!-- 				<?php echo '1111';?> -->
					<p class="list_id"><?php  echo $rows["Sid"];?></p>
					<div class="hproduct clearfix default">
					<!--goodsImg/1488182994.jpg,echo '<li><img src="'.$arr[$i].'"></li>';-->
						<div class="pic-product"><?php echo'<img src="'.$rows['SimgPath'].'" class="img-responsive">'?></div>
						<div class="p-message">
							<p class="p-title"><?php echo $rows["Sname"];?></p>
							<p class="p-origin"><em class="price">¥<?php echo $rows["cutprice"];?></em></p>
							<p class="mb0"><del class="old-price">¥<?php echo $rows["Sprice"];?></del></p>
						</div>
					</div>
				</a>
			<?php 
			 }
			 ?> 
			</div>
			<!--销量的显示-->
			<div class="item-list clearfix salesvolume">
			<?php
			if(isset($_GET["type"])){
				$sqlsales="select * from shopinfo order by cutprice desc";
			}else{
				$sqlsales="select * from shopinfo";
			}
				
				$resultsales= mysql_query($sql);
				//echo $sqlsales;
				while($rowssales=mysql_fetch_array($resultsales))
				{
				?>
				<a href="#">
				    <p class="list_id"><?php  echo $rowssales["Sid"];?></p>
					<div class="hproduct clearfix">
					<!--goodsImg/1488182994.jpg,echo '<li><img src="'.$arr[$i].'"></li>';-->
						<div class="pic-product"><?php echo'<img src="'.$rowssales['SimgPath'].'" class="img-responsive">'?></div>
						<div class="p-message">
							<p class="p-title"><?php echo $rowssales["Sname"];?></p>
							<p class="p-origin"><em class="price">¥<?php echo $rowssales["cutprice"];?></em></p>
							<p class="mb0"><del class="old-price">¥<?php echo $rowssales["Sprice"];?></del></p>
						</div>
					</div>
				</a>
			<?php 
			 }
			 ?> 
			</div>
			<!--价格的显示-->
			<div class="item-list clearfix classPrice">
				<div id="one" class="oneone">
				<?php
				if(isset($_GET["type"])){
					$sqlpricetop="select * from shopinfo  order by cutprice asc";
				}else{
					   $sqlpricetop="select * from shopinfo";
				}
				 
				
					$resultpricetop= mysql_query($sqlpricetop);
					while($rowstop=mysql_fetch_array($resultpricetop))
					{
					?>
					<a href="#">
					   <p class="list_id"><?php  echo $rowstop["Sid"];?></p>
						<div class="hproduct clearfix">
						<!--goodsImg/1488182994.jpg,echo '<li><img src="'.$arr[$i].'"></li>';-->
							<div class="pic-product"><?php echo'<img src="'.$rowstop['SimgPath'].'" class="img-responsive">'?></div>
							<div class="p-message">
								<p class="p-title"><?php echo $rowstop["Sname"];?></p>
								<p class="p-origin"><em class="price">¥<?php echo $rowstop["cutprice"];?></em></p>
								<p class="mb0"><del class="old-price">¥<?php echo $rowstop["Sprice"];?></del></p>
							</div>
						</div>
					</a>
				<?php 
				 }
				 ?> 
				</div>
				<div id="two" class="twotwo">
				<?php
					$sql2="select * from shopinfo";
				 //   echo $sql2;
					$result2 = mysql_query($sql2);
					while($rows2=mysql_fetch_array($result2))
					{
					?>
					<a href="#">
					   <p class="list_id"><?php  echo $rows2["Sid"];?></p>
						<div class="hproduct clearfix">
						<!--goodsImg/1488182994.jpg,echo '<li><img src="'.$arr[$i].'"></li>';-->
							<div class="pic-product"><?php echo'<img src="'.$rows2['SimgPath'].'" class="img-responsive">'?></div>
							<div class="p-message">
								<p class="p-title"><?php echo $rows2["Sname"];?></p>
								<p class="p-origin"><em class="price">¥<?php echo $rows2["cutprice"];?></em></p>
								<p class="mb0"><del class="old-price">¥<?php echo $rows2["Sprice"];?></del></p>
							</div>
						</div>
					</a>
				<?php 
				 }
				 ?> 
				</div>
			</div>
			<!--人气的显示-->
			<div class="item-list clearfix  classHuman">
			<?php
				$sql2="select * from shopinfo  order by Snum ASC";
				$result2 = mysql_query($sql2);
				while($rows2=mysql_fetch_array($result2))
				{
				?>
				<a href="#">
				  <p style="display:none"><?php  echo $rows2["Sid"];?></p>
					<div class="hproduct clearfix">
					<!--goodsImg/1488182994.jpg,echo '<li><img src="'.$arr[$i].'"></li>';-->
						<div class="pic-product"><?php echo'<img src="'.$rows2['SimgPath'].'" class="img-responsive">'?></div>
						<div class="p-message">
							<p class="p-title"><?php echo $rows2["Sname"];?></p>
							<p class="p-origin"><em class="price">¥<?php echo $rows2["cutprice"];?></em></p>
							<p class="mb0"><del class="old-price">¥<?php echo $rows2["Sprice"];?></del></p>
						</div>
					</div>
				</a>
			<?php 
			 }
			}
			 ?> 
			</div>
		</div>
		<footer class="footer" >
		  <div class="foot-con">
		  <div class="foot-con_2">
		    <a href="index.php" class="active">
		      <i class="navIcon home"></i>
		      <span class="text">首页</span>
		    </a>
		    <a href="classiFication.html">
		      <i class="navIcon sort"></i>
		      <span class="text">分类</span>
		    </a>
		    <a href="shoppingCart.php">
		      <i class="navIcon shop"></i>
		      <span class="text">购物车</span>   
		    </a>
		    <a href="userPage.php" >
		      <i class="navIcon member"></i>
		      <span class="text">我的</span>
		    </a>
		  </div>
		  </div>
		</footer>
	</div>
<!--底部导航栏-->
<!--1即DESC从大到小，0即ASC从小到大-->
<script type="text/javascript">
	$(document).ready(function () {
		var state=true;
		$(".productMain li").click(function(){
			$(this).addClass('active').siblings().removeClass('active');
			var temp=$(this).find('a').text().trim();
			$(".productMain > .item-list").hide().eq($('.productMain li').index(this)).show(); 
		});
	});
</script>
<script type="text/javascript">
$(document).ready(function(){
		$('.item-list a').click(function(){
		var temp=$(this).find('.list_id').text();
		goodsdeta(temp);
	})
	function goodsdeta(argument) {
    document.write("<form action='pro_detail.php' method='post' name='form1' style='display:none'>");  
    document.write("<input type='hidden' name='name' value='"+argument+"'/>");
    document.write("</form>");  
    document.form1.submit(); 
	}
});
</script>
</body>
</html>