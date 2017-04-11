<!DOCTYPE html>
<html>
<head>
<script charset="utf-8" src="js/jquery.min.js"></script>
<script charset="utf-8" src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/loginPage.css">
<!--弹出层 开始 -->
<link type="text/css" rel="stylesheet" href="css/zdialog.css" />
<script type="text/javascript" src="js/zdialog.js"></script>
<!--弹出层 结束 -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="yes" name="apple-touch-fullscreen">
<meta content="telephone=no" name="format-detection">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1;user-scalable=no;">
<title>订单管理</title>
</head>
<?php
//将数据从数据库里面读取出来
include ('util.php');
session_start();
$Uid=$_SESSION['userId'];
?>
<body>
	<div class="loginContainenr" style="background:#fff">
		<header class="header">
			<div class="fix_nav">
				<div style="max-width:768px;margin:0 auto;background:#D91D37;position: relative;">
					<a class="nav-left back-icon"  href="index.php">返回</a>
					<div class="tit">订单管理</div>
				</div>
			</div>
		</header>
		<div class="order_allstyle">
			<div class="order_style">
				<a href="#tab1" class="active">全部</a>
				<a href="#tab2">待付款</a>
				<a href="#tab3">待发货</a>
				<a href="#tab4">待收货</a>
				<a href="#tab5">待评价</a>
			</div>
		</div>
	<div class="order_total" style="width:768px; background:red" >
	<!--全部-->
	<div class="order_all order_all_active" id="tab1">
    <?php 
    $sqlpaid="select * from tb_orderlist where Uid=$Uid";
    $resultpaid=mysql_query($sqlpaid);
    while($rows=mysql_fetch_array($resultpaid)){
    ?>
		<div class="order_detailed clearfix">
			<div class="order_num clearfix">
				<span class="order_num01">订单编号<?php echo $rows['idorder'];?></span><span class="order_num02">状态：<?php echo $rows['orderstate']?></span>
			</div>
            <?php 
            $allid= $rows['idorder'];
            $sqlall="select * from tb_orderdetail where ordernum=$allid";
            $resultall=mysql_query($sqlall);
            while ($rowall=mysql_fetch_array($resultall)) {
            $goodid= $rowall['Sid'];
            $sqlgood="select * from shopinfo where Sid=$goodid";
            $resulgood=mysql_query($sqlgood);
            while($rowgood=mysql_fetch_array($resulgood)){
               $img= $rowgood['SimgPath'];
            ?>
			<div class="ord-pro-list clearfix">
				<div class="ord-box_hd"><a href="#"><img src="<?php echo $img;?>" height="100" width="100"></a></div>
            <?php } ?>
                <h1 class="media-box_desc"><a href="pro_info.html" class="ord-pro-link"><?php echo $rowall['goodsname'];?></a></h1>
                <div class="mg-t-10">
                  <div class="wy-pro-pri fl">¥<em class="num font-15"><?php echo $rowall['allmoney'];?></em></div>
                  <div class="pro-amount fr"><span class="font-13">数量×<em class="name"><?php echo $rowall['goodsnum'];?></em></span></div>
                </div>
			</div>
            <?php } ?>
			<div class="ord_total clearfix">
				<p><span>(含运费0.0元)</span><span class="price_total"><?php echo $rows['moneyAll']?></span><span style="color:#e21424">共</span><span>共<?php echo $rows['orderNum']?>件商品，</span></p>
			</div>
		</div>
        <?php 
            }
        ?>
	</div>

	<!--全部-->
	<!--待付款-->
	<div class="order_all" id="tab2">
    <?php 
        $sqlnopaid="select * from tb_orderlist where Uid=$Uid and orderstate='待付款'";
        $resultnopaid=mysql_query($sqlnopaid);
        while($rowsnopaid=mysql_fetch_array($resultnopaid)){
    ?>
		<div class="order_detailed clearfix">
			<div class="order_num clearfix">
				<span class="order_num01">订单编号：<?php echo $rowsnopaid['idorder'];?></span><span class="order_num02">状态：待付款</span>
			</div>
            <?php 
            $nopaidid=$rowsnopaid['idorder'];
            $sqlnopaid1="select * from tb_orderdetail where ordernum=$nopaidid";
            $resultnopaid1=mysql_query($sqlnopaid1);
            $i=0;
            while ($rownopaid1=mysql_fetch_array($resultnopaid1)) {
                $goodid1= $rownopaid1['Sid'];
                $sqlgood1="select * from shopinfo where Sid=$goodid1";
                $resulgood1=mysql_query($sqlgood1);
                while($rowgood1=mysql_fetch_array($resulgood1)){
                   $img1= $rowgood1['SimgPath'];
            ?>

			<div class="ord-pro-list clearfix">
				<div class="ord-box_hd"><a href="#"><img src="<?php echo $img1;?>" height="100" width="100"></a></div>
                <?php } ?>
                <h1 class="media-box_desc"><a href="pro_info.html" class="ord-pro-link"><?php echo $rownopaid1['goodsname']?></a></h1>
                <div class="mg-t-10">
                  <div class="wy-pro-pri fl">¥<em class="num font-15"><?php echo $rownopaid1['allmoney']?></em></div>
                  <div class="pro-amount fr"><span class="font-13">数量×<em class="name"><?php echo $rownopaid1['goodsnum']?></em></span></div>
                </div>
			</div>
             <?php } ?>
			<div class="ord_total clearfix">
				<p><span>(含运费0.0元)</span><span class="price_total"><?php echo $rowsnopaid['moneyAll']?>元</span><span style="color:#e21424">共</span><span>共<?php echo $rowsnopaid['orderNum']?>件商品，</span></p>
			</div>
			<div class="ord_btn">
				 <a href="javascript:;" class="ords-btn-dele">删除订单</a>
                 <a class="ords-btn-com  ords-btn-pay">去付款</a>
                  <a class="ords-btn-id" style="display:none"><?php echo $nopaidid;?></a>

			</div>
		</div>
<?php  } ?>
	</div>
	<!--待付款-->
	<!--待发货-->
    <div class="order_all" id="tab3">
    <?php 
        $sqlyipaid="select * from tb_orderlist where Uid=$Uid and orderstate='已付款'";
        $resultyipaid=mysql_query($sqlyipaid);
        while($rowsyipaid=mysql_fetch_array($resultyipaid)){
    ?>
        <div class="order_detailed clearfix">
            <div class="order_num clearfix">
                <span class="order_num01">订单编号：<?php echo $rowsyipaid['idorder'];?></span><span class="order_num02">状态：待发货</span>
            </div>
            <?php 
            $yipaidid=$rowsyipaid['idorder'];
            $sqlyipaid1="select * from tb_orderdetail where ordernum=$yipaidid";
            $resultyipaid1=mysql_query($sqlyipaid1);
            while ($rowyipaid1=mysql_fetch_array($resultyipaid1)) {
                $goodid2= $rowyipaid1['Sid'];
                $sqlgood2="select * from shopinfo where Sid=$goodid2";
                $resulgood2=mysql_query($sqlgood2);
                while($rowgood2=mysql_fetch_array($resulgood2)){
                   $img2= $rowgood2['SimgPath'];
            ?>

            <div class="ord-pro-list clearfix">
                <div class="ord-box_hd"><a href="#"><img src="<?php echo $img2;?>" height="100" width="100"></a></div>
                <?php } ?>
                <h1 class="media-box_desc"><a href="pro_info.html" class="ord-pro-link"><?php echo $rowyipaid1['goodsname']?></a></h1>
                <div class="mg-t-10">
                  <div class="wy-pro-pri fl">¥<em class="num font-15"><?php echo $rowyipaid1['price']?></em></div>
                  <div class="pro-amount fr"><span class="font-13">数量×<em class="name"><?php echo $rowyipaid1['goodsnum']?></em></span></div>
                </div>
            </div>
             <?php } ?>
            <div class="ord_total clearfix">
                <p><span>(含运费0.0元)</span><span class="price_total"><?php echo $rowsyipaid['moneyAll']?></span><span style="color:#e21424">共</span><span>共<?php echo $rowsyipaid['orderNum']?>件商品，</span></p>
            </div>
			<div class="ord_btn">
				 <a href="#" class="ords-btn-packe">商品正在打包中，请您耐心等待....</a>
			</div>
		</div>
        <?php } ?>
	</div>
	<!--待发货-->
	<!--待收货-->
	<div class="order_all" id="tab4">
    <?php 
        $sqlreceive="select * from tb_orderlist where Uid=$Uid and orderstate='已发货'";
        $resultreceive=mysql_query($sqlreceive);
        while($rowsreceive=mysql_fetch_array($resultreceive)){
    ?>
        <div class="order_detailed clearfix">
            <div class="order_num clearfix">
                <span class="order_num01">订单编号：<?php echo $rowsreceive['idorder'];?></span><span class="order_num02">状态：待收货</span>
            </div>
            <?php 
            $receive=$rowsreceive['idorder'];
            $sqlreceive1="select * from tb_orderdetail where ordernum=$receive";
            $resultreceive1=mysql_query($sqlreceive1);
            while ($rowreceive1=mysql_fetch_array($resultreceive1)) {
                $goodid3= $rowreceive1['Sid'];
                $sqlgood3="select * from shopinfo where Sid=$goodid3";
                $resulgood3=mysql_query($sqlgood3);
                while($rowgood3=mysql_fetch_array($resulgood3)){
                   $img3= $rowgood3['SimgPath'];
            ?>

            <div class="ord-pro-list clearfix">
                <div class="ord-box_hd"><a href="#"><img src="<?php echo $img3;?>" height="100" width="100"></a></div>
                <?php } ?>
                <h1 class="media-box_desc"><a href="pro_info.html" class="ord-pro-link"><?php echo $rowreceive1['goodsname']?></a></h1>
                <div class="mg-t-10">
                  <div class="wy-pro-pri fl">¥<em class="num font-15"><?php echo $rowreceive1['price']?></em></div>
                  <div class="pro-amount fr"><span class="font-13">数量×<em class="name"><?php echo $rowreceive1['goodsnum']?></em></span></div>
                </div>
            </div>
             <?php } ?>
            <div class="ord_total clearfix">
                <p><span>(含运费0.0元)</span><span class="price_total"><?php echo $rowsreceive['moneyAll']?></span><span style="color:#e21424">共</span><span>共<?php echo $rowsreceive['orderNum']?>件商品，</span></p>
            </div>
			<div class="ord_btn">
				 <a href="#" class="ords-btn-com ords-btn-getfoods">确认收货</a>
          <a class="ords-btn-id" ><?php echo $rowsreceive['idorder'];?></a>
			</div>
		</div>
        <?php } ?>
	</div>
	<!--待发货-->
	<!--待评价-->
	<div class="order_all" id="tab5">
    <?php 
        $sqlcomm="select * from tb_orderlist where Uid=$Uid and orderstate='已收货'";
        $resultcomm=mysql_query($sqlcomm);
        while($rowscomm=mysql_fetch_array($resultcomm)){
    ?>
        <div class="order_detailed clearfix">
            <div class="order_num clearfix">
                <span class="order_num01">订单编号：<?php echo $rowscomm['idorder'];?></span><span class="order_num02">状态：待评价</span>
            </div>
            <?php 
            $comm=$rowscomm['idorder'];
            $sqlcomm1="select * from tb_orderdetail where ordernum=$comm";
            $resultcomm1=mysql_query($sqlcomm1);
            while ($rowcomm1=mysql_fetch_array($resultcomm1)) {
                $goodid4= $rowcomm1['Sid'];
                $sqlgood4="select * from shopinfo where Sid=$goodid4";
                $resulgood4=mysql_query($sqlgood4);
                while($rowgood4=mysql_fetch_array($resulgood4)){
                   $img4= $rowgood4['SimgPath'];
            ?>

            <div class="ord-pro-list clearfix">
                <div class="ord-box_hd"><a href="#"><img src="<?php echo $img4;?>" height="100" width="100"></a></div>
                <?php } ?>
                <h1 class="media-box_desc"><a href="pro_info.html" class="ord-pro-link"><?php echo $rowcomm1['goodsname']?></a></h1>
                <div class="mg-t-10 clearfix">
                  <div class="wy-pro-pri fl">¥<em class="num font-15"><?php echo $rowcomm1['price']?></em></div>
                  <div class="pro-amount fr"><span class="font-13">数量×<em class="name"><?php echo $rowcomm1['goodsnum']?></em></span></div>
                </div>
                 <div class="ord_btn  clearfix btn-comm">
                   <a href="comment.php?goodid=<?php echo $rowcomm1['Sid']?>" class="ords-btn-com">去评价</a>
                </div>
            </div>
             <?php } ?>
            <div class="ord_total clearfix">
                <p><span>(含运费0.0元)</span><span class="price_total"><?php echo $rowscomm['moneyAll']?></span><span style="color:#e21424">共</span><span>共<?php echo $rowscomm['orderNum']?>件商品</span></p>
            </div>
		</div>
        <?php } ?>
	</div>
	<!--待评价-->
</div>
</div>
<script src="js/jquery-2.1.4.js"></script> 
<script src="js/jquery-weui.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.order_style a').click(function(){
		$(this).addClass('active').siblings().removeClass();
		$(".order_total > .order_all").hide().eq($('.order_style a').index(this)).show(); 
	});

});
</script>
<link type="text/css" rel="stylesheet" href="css/zdialog.css" />
<script type="text/javascript" src="js/zdialog.js"></script>
	<script>
	   $(".ords-btn-dele").click(function(){
           $.DialogByZ.Confirm({Title: "", Content: "确认删除订单吗？",FunL:confirmL1,FunR:Immediate})
	   })
       function confirmL1(){
            	$.DialogByZ.Close();
           	  $.DialogByZ.Alert({Title: "提示", Content: "删除成功",BtnL:"确定"})
       }
       function Immediate(){
       	  //location.href="http://www.jsdaima.com"
       	  window.open("order_management.html", "_self")
       }
	</script>
</body>
</html>
    <script>
    var tempid;
      $(".ords-btn-pay").click(function(){
          tempid= $(this).next().text();
           $.DialogByZ.Confirm({Title: "", Content: "确认要付款吗",FunL:confirmL2,FunR:Immediate});
       })
       function confirmL2(){
              $.DialogByZ.Close();
              $.DialogByZ.Alert({Title: "", Content: "",BtnL:"",FunL:goodsdeta(tempid)})
       } 
       function Immediate(){
          window.open("order_management.php");
       }
    </script>
    <!-- 确认收货函数 -->
    <script type="text/javascript">
    //传递参数，改变当前参数的状态
    function goodsdeta(argument) {
        document.write("<form action='gopayment.php' method='post' name='form1' style='display:none'>");
        document.write("<input type='hidden' name='name' value='"+argument+"'/>");
        document.write("</form>");  
        document.form1.submit(); 
    }
    </script>
    <script>
    var tempid;
      $(".ords-btn-getfoods").click(function(){
          tempid= $(this).next().text();
           $.DialogByZ.Confirm({Title: "", Content: "确认要确认收货吗？                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ",FunL:confirmL2,FunR:Immediate});
       })
       function confirmL2(){
              $.DialogByZ.Close();
              $.DialogByZ.Alert({Title: "", Content: "",BtnL:"",FunL:goodsdeta(tempid)})
       } 
       function Immediate(){
          window.open("order_management.php");
       }
    </script>
    <script type="text/javascript">
    //传递参数，改变当前参数的状态
    function goodsdeta(argument) {
        document.write("<form action='getfoods.php' method='post' name='form1' style='display:none'>");
        document.write("<input type='hidden' name='name' value='"+argument+"'/>");
        document.write("</form>");  
        document.form1.submit(); 
    }
    </script>