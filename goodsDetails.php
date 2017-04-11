<!DOCTYPE html>
<html>
<head>
<script charset="utf-8" src="js/jquery.min.js"></script>
<script charset="utf-8" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/num-alignment.js"></script>

<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/goodsDetails.css">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="yes" name="apple-touch-fullscreen">
<meta content="telephone=no" name="format-detection">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1;user-scalable=no;">
	<title>商品详情</title>
</head>
<?php
//此前商品的id已经完成传递过来，可以利用id在信息表和图片中进行信息的展示
$backValue=$_POST['name'];
//index.php,实现从首页商品的标题进来
//当前商品的id值传递成功，将商品的详细信息显示在页面上
//echo $backValue;
//根据商品的id，查询商品的详细信息
//数据库的连接
include ('util.php');
//根据商品的id，进行商品的详情展示
$sql="select * from shopinfo where Sid=".$backValue;
//进行商品图片查询
$sqlpic="select * from tb_goodspic where Sid=".$backValue;
$result=mysql_query($sql);
$resultpic=mysql_query($sqlpic);
//将查询的结果显示出来,解雇显示在一个数组里面
while ($rows=mysql_fetch_array($result)) {


?>
<body>
	<div class="gDetaContainer">
		<header class="header">
			<div class="fix_nav">
				<div style="max-width:768px;margin:0 auto;background:#f5d000;position: relative;">
					<a class="nav-left back-icon" href="index.php">返回</a>
					<div class="tit">商品详细</div>
				</div>
			</div>
		</header>
		<section>
			<div class="container">
			    <div class="navcontainer-slide" style="width:100%; background:#fff; margin:0;">
			      <div class="slide-img">
			          <div class="slide-imgcon" style="overflow:hidden;">
			            <ul>
			              <li><a href="#"><?php echo'<img src="'.$rows['SimgPath'].'" class="img-responsive">'?></a></li>
			            </ul>
			          </div>
			      </div>
			  </div>
			</div>
			<!--商品内容文字介绍内容-->
			<div class="goodsInfo">
				<div class="goodsTit">
					<h4><?php  echo $rows["Sname"]?></h4>
					<h6 style="color:#fd8dac; "><?php  echo $rows["Sname"]?></h6>
				</div>
				<ul  class="goodsComm">
					<li>
						<label class="goodsPrice">价格：</label>
						<span class="symbol">￥<span><?php  echo $rows["cutprice"]?></span></span>
					</li>
					<li>
						<label class="goodsPrice">原格：</label>
						<span class="symbol" style=" color:#e5e5e5;">￥<span style="text-decoration:line-through; color:#e5e5e5;"><?php  echo $rows["Sprice"]?></span></span>
					</li>
					<li class="goodsColor clearfix">
					<?php 
					//判断是否为唇部彩妆，如果是，则判断Species里面包含的额字段，如果不是，则输出为商品净含量
						$leixing=$rows["Stype"];
						if($leixing=="唇部彩妆"){
							//进行分组，字符的分割
						$source=$rows["Species"];
						$hello = explode(',',$source);

					  echo '<label>颜色分类：</label>';
					//<!--判断-->
					  echo '<dl>';
					 for($index=0;$index<count($hello);$index++) 
						{ 
							if($index==0){
								echo '<dd class="active">'.$hello[$index].'<span></span></dd>';
							 }else{
								echo '<dd>'.$hello[$index].'<span></span></dd>';
							 }
							
						} 
					    echo '</dl>';
						}
						else if($leixing=="面膜"){
							echo '<label>净含量：</label>';
							echo '<dl><dd class="active">'.$rows["Squality"].'片<span></span></dd></dl>';
						}
						else{
							echo '<label>净含量：</label>';
							echo '<dl><dd class="active">'.$rows["Squality"].'ml<span></span></dd></dl>';
						}
					?>
					</li>
					<li class="goodsNum" >
						<label>数量：</label>
							<div class="goodsSyam">
							<!--最大值可以根据数据库里面的数量值来决定大小-->
								<input id="5" data_step="1" data_min="0" data_max="50" data_digit="0" value="1"/><br><br>
							</div>
					</li>
				</ul>
			<?php
				}
				while ($rowspic=mysql_fetch_array($resultpic)) {
			?>
				<!--图文详情、规格参数、评价-->
				<div>
					<h4 style="background:#661ec8; padding:10px 0; color:#fff;text-align:center; margin-top:15px;">商品详情</h4>
					<ul>
						<li> <?php echo'<img src="'.$rowspic['goods_intro'].'" class="img-responsive">'?></li>
						<li> <?php echo'<img src="'.$rowspic['goods_show'].'" class="img-responsive">'?></li>
						<li> <?php echo'<img src="'.$rowspic['goods_fun'].'" class="img-responsive">'?></li>
						<li> <?php echo'<img src="'.$rowspic['goods_use'].'" class="img-responsive">'?></li>
						<li> <?php echo'<img src="'.$rowspic['goods_function'].'" class="img-responsive">'?></li>
					</ul>
				</div>
			</div>
			<?php
				}
			?>
		</section>
		<footer class="buy-footer">
			<div class="buy-info">
				<a href="#" class="btn-fav">
					<i class="i-fav"></i>
					<span>收藏</span>
				</a>
				<a href="#" class="cart-wrap">
					<i class="i-cart"></i>
					<span>购物车</span>
					<span class="add-num" id="totalNum">0</span>
				</a>
				<div class="buy-btn-fix">
					<button type="button" class="btn btn-warning">加入购物车</button>
					<button type="button" class="btn btn-danger">立刻购买</button>
				</div>
			</div>
		</footer>
	</div>
</body>
</html>