<!DOCTYPE html>
<html>
<head>
<script charset="utf-8" src="js/jquery.min.js"></script>
<script charset="utf-8" src="js/bootstrap.min.js"></script>

<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/goodsDetails.css">
<link rel="stylesheet" href="css/weui.min.css">
<link rel="stylesheet" href="css/jquery-weui.css">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="yes" name="apple-touch-fullscreen">
<meta content="telephone=no" name="format-detection">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1;user-scalable=no;">
<title>产品详情</title>
</head>

<?php
//此前商品的id已经完成传递过来，可以利用id在信息表和图片中进行信息的展示
$backValue=$_POST['name'];
include ('util.php');
//根据商品的id，进行商品的详情展示
$sql="select * from shopinfo where Sid=".$backValue;
//进行商品图片查询
$sqlpic="select * from tb_proinfo where Sid=".$backValue;
$result=mysql_query($sql);
$resultpic=mysql_query($sqlpic);
//将查询的结果显示出来,解雇显示在一个数组里面
//如果查询的数据为口红或者眉笔，里面存放的是一个字符串类型，只是需要将字符切割
$arr_color=array();$arr_pic=array();
//获得商品的名字，将会与商品的id一起传送到buy.php页面来进行添加到购物车
$backname='';
?>
<body>
	<div class="gDetaContainer" style="position:relative;">
		<header class="header">
			<div class="fix_nav">
				<div style="max-width:768px;margin:0 auto;background:#D91D37;position: relative;">
					<a class="nav-left back-icon"  href="index.php">返回</a>
					<div class="tit">产品详细</div>
				</div>
			</div>
		</header>
		<div class="goods_allstyle">
			<div class="goods_style" >
				<a href="#tab1" class="active">商品</a>
				<a href="#tab2">详情</a>
				<a href="#tab3">评价</a>
			</div>
		</div>
    <div id="tab1" class="tabnum tabnum_active">
        <div class="swiper-container swiper-zhu">
          <div class="swiper-wrapper">
		<?php
			//将图片进行分割
			$arr_picslide="";
			while ($rowspic=mysql_fetch_array($resultpic)){
				$arr_pic=$rowspic["proImg_arr"];
			}

			$arr_path = explode("*",$arr_pic);
			//验证路径print_r($arr_path);
			//$new_arr = array_slice($new_arr,0,$length);//取出数组中指定的长度
			$new_arr = array_slice($arr_path ,0,5);//取出数组中指定的长度
			foreach ($new_arr as $temp)  
			{

		    ?>
           <div class="swiper-slide"><img class="impressive" src="<?php  echo $temp;?>" /></div>
          <?php
          	}
          ?>
          </div>
          <div class="swiper-pagination swiper-zhutu-pagination"></div>
        </div>
		<?php
		//详细信息的展示
		while ($rows=mysql_fetch_array($result)) {
			$backname=$rows["Sname"];
		?>
        	<div class="god_info_title">
        		<h4><?php echo $rows["Sname"];?></h4>
        		<div class="mg-tb-5">¥<em class="num font-20"><?php echo $rows["cutprice"];?></em></div>
                <p class="weui-media-box__desc"><?php echo $rows["Stitle"];?></p>
        	</div>
        	<div class="gods_size">
			<div class="size-goods clearfix" >
			<!--判断是后口红或者是其他类型的化妆品-->
			
	        	<!--尺码-->
	        <div class="proinfo-txt-l" style="float:left;"><span class="promotion-label-tit">
	        <?php
	        	if($rows["Stype"]=="眉部彩妆"||$rows["Stype"]=="唇部彩妆"){
	        		echo"颜色";
	        		$arr_color = explode(",",$rows["Species"]);
	        		//将数组内容进行输出
	        	}else{
	        		echo "净含量";
	        		$arr_color=$rows["Squality"];
	        		// echo $rows["Squality"];
	        	}
	        	//商品的颜色
	        	
	        ?>
	        
	        </span></div>
	        	<div class="promotion-sku clearfix" style="float:left;background:#fff">
	                <ul>
	                <?php
						if(is_array($arr_color)){
						 foreach($arr_color as $col_squa ){
						echo '<li><a href="javascript:;">'.$col_squa.'</a></li>';
	                  	    }
	                  	 }
	                  	else{
	                  	echo '<li class="active"><a href="javascript:;">'.$rows["Squality"].'g</a></li>';
	                  	}
	                 }
	                  ?>
	                </ul>
	              </div>
              <!--尺码-->
			</div>
			<div class="clearfix"></div>
        	</div>
        	<div class="serviceinfo">
        		<div class="ship_add"><span>送至</span><span>广东深圳</span></div>
        		<div class="freight"><span>运费</span><span>免运费</span></div>
        		<div class="merchants"><span>商家</span><span>啦啦啦</span></div>
        		<div class="tips"><span>提示</span><span style="color:#115bc0;">支持七天无理由退换货</span></div>
        	</div>
		</div>
		<div id="tab2" class="tabnum">
		<div class="pro-detail">
		<?php
			//将图片进行分割
			while ($rowspic=mysql_fetch_array($resultpic)) {
				$arr_pic=$rowspic["proImg_arr"];
			}
			$arr_path = explode("*",$arr_pic);
			foreach ($arr_path as $temp1)  
			{
                echo  '<img src="'.$temp1.'"/>';
          	}
          ?>
        </div>
      </div>
		</div>
		<div id="tab3" class="tabnum comment_content">
		<!-- 将该商品的评论从数据库里面读取出来。在商品评论的表中，每个商品的id都对应着唯一的评论 -->
		<?php
			$sqlcomm="select * from tb_goodcomm where Sid=".$backValue;
			$resultcomm=mysql_query($sqlcomm);
			while($rowscomm=mysql_fetch_array($resultcomm)){
		 		// print_r($rowscomm);
		 		if($rowscomm!=null){
		    ?>
			<div class="cus_eval">
				<div class="comm_title clearfix "><span style="color:#EF621D"><?php echo $rowscomm['username']?></span><span><?php echo $rowscomm['time']?></span></div>
				<div class="star_five clearfix"></div>
				<p class="comments clearfix"><?php echo $rowscomm['comment']?></p>
				<div class="comm_img"><img src="imgcomment/<?php echo $rowscomm['commpic']?>" ></div>
			</div>
			<?php } 
			else if($rowscomm==null){
			?>
       		 <div class="cus_eval">
				<div class="comm_title clearfix "><span style="color:#EF621D">小土豆</span><span>2017-04-01</span></div>
				<div class="star_five clearfix"></div>
				<p class="comments clearfix">挺好的</p>
				<div class="comm_img"><img src="imgcomment/pro.png" ></div>
			</div>
			<?php } 

			}?>
		</div>
		<div class="goods_footer">
			<div class="goods_foot01" style="background:#19D691;">
			<a class="shoucang">
				<span></span>
				<span >收藏</span>
			</a>
			<a class="goods_cart">
				<span></span>
				<span>购物</span>
			 </a>
			</div>
			<div class="goods_foot01 addto_cart">
			<!--实现加入购物车功能，与首页面的加入功能原理是一致的-->
				<a style="text-decoration:none; color:#fff" href='buy.php?id=<?php echo $backValue;?>&pname=<?php echo $backname;?>'>加入购物车</a>
			</div>
			<div class="goods_foot01 buy_now">
				<span >立即购买</span>
			</div>
		</div>
        <script src="lib/jquery-2.1.4.js"></script> 
        <script src="js/jquery-weui.js"></script>
        <script src="js/swiper.js"></script>

        <script>
        $(".swiper-zhu").swiper({
                loop: true,
        		paginationType:'fraction',
                autoplay:5000
              });
        </script>
		<script type="text/javascript">
		$(document).ready(function(){
			$('.goods_style a').click(function(){
				$(this).addClass('active').siblings().removeClass();
				$(".tabnum").hide().eq($('.goods_style a').index(this)).show(); 
			});

		});
		</script>
		<script>
		$(function(){
			$(".promotion-sku li:eq(0)").addClass('active');
			$(".promotion-sku li").click(function(){
				$(this).addClass("active").siblings("li").removeClass("active");
				})
			})
		</script>
		<script type="text/javascript">
		var favostate=true;
		$('.shoucang').click(function(){
			if(favostate==true){
				$(this).css('background','url(images/shou02.png) no-repeat center top');
				favostate=false;
			}else{
				$(this).css('background','url(images/shou01.png) no-repeat center top');
				favostate=true;
			}
			
		});
		</script>
</body>
</html>