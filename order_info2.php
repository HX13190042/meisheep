<!DOCTYPE html>
<html>
<head>
<script charset="utf-8" src="js/jquery.min.js"></script>
<script charset="utf-8" src="js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf-8" src="js/formValidation.js"></script>


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
	<title>订单详情</title>
<style type="text/css">
body {font-family: Helvetica,STHeiti STXihei, Microsoft JhengHei, Microsoft YaHei, Arial; margin: 0;  height: 100%; overflow-x: hidden; -webkit-overflow-scrolling: touch;  margin:0 auto; color: #191C1D; background: #f5f5f5;}
.order_infolist{background: #fff;}
.order_info_address{ height: 60px;border-bottom:2px solid transparent; border-image:url(images/address-txt.jpg) 0 0 3 0 stretch;}
.order_info_address img{float: left; margin:  10px; display: inline-block; margin-top: 20px;}
.order_info_address .address-txt{padding-left: 50px;}
.order_info_address .address-txt p{margin:0;}
.order_info_address .address-txt p:first-child{font-weight: bold; padding-top: 10px;}
.order_info_address .address-txt span{float: right; display: inline-block;}
/*内容详情的样式代码*/
.ord-pro-link{font-size:14px; font-weight:normal; color:#232323;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;word-wrap: normal;word-wrap: break-word;word-break: break-all; line-height:1.8; display:block;}
.ord-box_hd{width: 100px; height: auto; float: left;}
.order_detailed{color: #232323;border: 1px solid #e5e5e5; }
.media-box_desc{padding-left: 120px;}
.ord-box_hdspan{padding-left: 120px;}
.mg-t-10{padding-left: 120px;}
.pro-amount{padding-right: 20px;}
.wy-pro-pri{color: #e21323; font-weight: bold;}
.ord-pro-list{border-bottom: 1px solid #e5e5e5; padding: 5px 0; margin-top: 10px;}
.ord_total span{float: right; margin-right: 5px;}
.ord_total .price_total{color: #e21424; font-weight: bold;}
.ords-btn-packe{color: #1B9CEA; padding:5px; display: inline-block;}

/*付款总额以及付款方式按钮*/
.pmoney-box_text{text-align: center; padding: 10px 0;}
.pmoney-box_text .font-20{font-size: 20px;color: #e21323; font-weight: bold;}
.pmoney-box_text .mg-tb-5{color: #e21323; }

.pmoney-box_text{background: #fff;}
.pmoney-box_text .mg10-0{padding: 5px 0;}
.pmoney-box_text .mg10-1{ background: #1aad19; width: 90%;margin:0 auto; border: 1px solid #1aad19; border-radius: 5px; padding: 5px; color: #fff;}
.pmoney-box_text .mg10-1 a{color: #fff;text-decoration: none;}
</style>
</head>

<body>
	<div class="loginContainenr">
		<header class="header">
			<div class="fix_nav">
				<div style="max-width:768px;margin:0 auto;background:#D91D37;position: relative;">
					<a class="nav-left back-icon" href="shoppingCart.php">返回</a>
					<div class="tit">订单详情</div>
				</div>
			</div>
		</header>
<?phperror_reporting(E_ALL ^ E_NOTICE);?>
<?php
session_start();
include 'util.php';
//将登陆的用户的信息显示出来 username、useraccount、userId
$username=$_SESSION['username'];
$useraccount=$_SESSION['userType'];
$userId=$_SESSION['userId'];
//进行用户的地址查询
$sqladd="select * from tb_useraddress where Uid='$userId' limit 1";
$resultadd=mysql_query($sqladd);
//商品的全部内容，存储在数组中
$arr_goods=$_SESSION['arr_goods1'];
$arr_gtotal= $_SESSION['$arr_gtotal1'];
//订单的总价钱
$allnum=$_SESSION['allnum'];
$length=count($arr_goods);

?>
		<!--订单人的详细信息-->
		<div class="order_infolist" style="">
			<div class="order_info_address">
				<img src="images/order_info_address.png" height="20" width="20">
				<div class="address-txt">
				<?php
					while($rowadd=mysql_fetch_array($resultadd)){
						//执行用户信息的显示
						echo '<p>'.$rowadd["conname"].$rowadd["phone"].'</p>';
						echo '<p>'.$rowadd["address"].$rowadd["detailed_add"].'</p>';
					}
				?>
				</div>
			</div>
			<!--将购物车的商品全部显示在订单页面-->
			<?php 
				foreach($arr_goods as $k=>$val){
			?>
			<div class="ord-pro-list clearfix">
			 <!--  <?php echo $val['0'];?> -->
				<div class="ord-box_hd"><a href="#"><img src="<?php  echo $val['5'];?>" height="100" width="100"></a></div>
                <h1 class="media-box_desc"><a href="pro_info.html" class="ord-pro-link"><?php  echo $val["1"];?></a></h1>
				<div class="ord-box_hdspan">
					<p class="box_desc"><?php  echo $val["4"];?></p>
				</div>
                <div class="mg-t-10">
                  <div class="wy-pro-pri fl">合计¥<em class="num font-15"><?php  echo $val["2"];?></em></div>
                  <div class="pro-amount fr"><span class="font-13">数量×<em class="name"><?php  echo $val["3"];?></em></span></div>
                </div>
			</div>
			<?php 
				}
			?>
		</div>
		  <div class="pmoney-box_text">
		    <div class="mg10-0">总金额：<span class="mg-tb-5"><em class="font-20"><?php echo $arr_gtotal;?></em></span></div>
		    <div class="mg10-1"><a href="paypage.php" class="btn_primary">去付款</a></div>
		  </div>
   </div>
</body>
</html>