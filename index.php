<!DOCTYPE html>
<html>
<head>
<script charset="utf-8" src="js/jquery.min.js"></script>
<script charset="utf-8" src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/slider.js"></script>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="yes" name="apple-touch-fullscreen">
<meta content="telephone=no" name="format-detection">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1;user-scalable=no;">
<title>购物商城</title>
</head>
<?php
    //开启session,验证用户是否登录
      session_start();
      if(!isset($_SESSION['userType'])){
           $userstype="";
          }       
        else{
             $userstype=$_SESSION['userType'];
             $username =$_SESSION['username'];
        }
     
      //将数据库加载进来
      include('util.php');
      //进行sql语句的使用，并且当前的商品处于尖货状态，
      $sql="select * from shopinfo where State='尖货' " ;
      //limit 5
      $result= mysql_query($sql);
      //进行sql语句的查询，并且当前的物品处于新品状态，根据物品的上架时间来进行判定
      $sqlnews="select * from shopinfo where State='新品' ";
      $resultnews= mysql_query($sqlnews);
      //最新活动的查询语句,并且类型为水乳面霜的类型
      $sqlface="select * from shopinfo where State='最新活动' and Stype='水乳面霜' limit 2";
      $resultface= mysql_query($sqlface);
      //最新活动的查询语句,并且类型为面膜的类型
      $sqlmask="select * from shopinfo where State='最新活动' and Stype='面膜' limit 2";
      $resultmask= mysql_query($sqlmask);
      //最新活动的查询语句,并且类型为唇部彩妆的类型
      $sqlmouth="select * from shopinfo where State='最新活动' and Stype='唇部彩妆' limit 2";
      $resulmouth= mysql_query($sqlmouth);
?>
<body>
<div class="index-container">
<header class="header">
  <div class="fix_nav">
  <div style="max-width:768px;margin:0 auto;height:44px;position: relative;background:#D91D37;">
    <form action="searchList.php" method="post" id="searchform" name="searchform">
      <div class="navbar-search left-search">
          <input type="text" id="keyword" name="keyword" value="面膜" placeholder="搜索商品" class="form-control">
      </div>
      <div class="nav-right">
        <input class="nav-right-button img-responsive" type="submit"  value="搜索" />
      </div>
    </form>
  </div>
  </div>
</header>
<!--轮播图-->
<div id="banner_tabs" class="flexslider" style="margin-top:-20px;">
  <ul class="slides">
    <li>
      <a title="" target="_blank" href="#">
        <img width="100%" height="200" alt="商品" style="background: url(images/banner1.jpg) no-repeat center;" src="images/alpha.png">
      </a>
    </li>
    <li>
      <a title="" href="#">
        <img width="100%" height="200" alt="商品" style="background: url(images/banner2.jpg) no-repeat center;" src="images/alpha.png">
      </a>
    </li>
    <li>
      <a title="" href="#">
        <img width="100%" height="200" alt="商品" style="background: url(images/banner3.jpg) no-repeat center;" src="images/alpha.png">
      </a>
    </li>
  </ul>
  <ol id="bannerCtrl" class="flex-control-nav flex-control-paging">
    <li><a>1</a></li>
    <li><a>2</a></li>
    <li><a>2</a></li>
  </ol>
</div>

<!--导航栏-->
<div class="row navTitle">
    <a href="latestactivity.php?type=8" class="col-xs-3">
      <img class="img-responsive" src="images/icon_rm.png">
      <h5>热门</h5>
    </a>
    <a href="Newproduct.php?type=2" class="col-xs-3">
      <img class="img-responsive" src="images/icon_tm.png">
      <h5>新品</h5>
    </a>
    <a href="#" class="col-xs-3 orderman">
      <img class="img-responsive" src="images/icon_theme.png">
      <span class="usertype"><?php echo  $userstype?></span>
      <h5>订单管理</h5>
    </a>
    <a href="life.html" class="col-xs-3">
      <img class="img-responsive" src="images/icon_pp.png">
      <h5>爱生活</h5>
    </a>
</div>
<!--最新活动将四个类型中，标记为最新活动前四个商品展示出来。点击链接进入商品的详细介绍-->
<div class="latest-activity" >
  <div class="latest-content">
    <div class="home_mian_down">
        <em></em><p>恭喜<span>134****2168</span>获得100元优惠券</p> <i></i>
    </div>
    <div class="latest-type latestActhref">
    <ul>
      <a href="zuixinActivity.php?type=8" ><img class="imgProduct" src="imgCase/lastest-activity01.jpg"></a>
      <!--进行最新活动的样式的显示-->
      <?php
       while($rowsmask=mysql_fetch_array($resultmask)){
      ?>
      <!--最新活动-->
      <div class="col-xs-3 latest-product listmask">
       <p class="sidGoodnew" style="display:none;"><?php echo $rowsmask["Sid"];?></p> 
         <a href="#" style="text-decoration:none;">
           <li>
              <?php echo'<img src="'.$rowsmask['SimgPath'].'" >'?>
            </li>
         </a>
         <dl>
           <dt style="color:#37393A;text-align:center"><?php echo $rowsmask["Sname"]?></dt>
           <dt style="color:#37393A;text-align:center">￥<?php echo $rowsmask["cutprice"]?></dt>
            <a>立即抢购</a>
         </dl>      
      </div>
      <?php
      }
      ?>
      </ul>
    </div>
   <!--将水乳面霜的查询结果显示出来-->
    <div class="latest-type clearfix">
    <ul>
    <a href="zuixinActivity.php?type=3" ><img class="imgProduct" src="imgCase/lastest-activity03.jpg"></a>
    <?php 
    while($rowsface=mysql_fetch_array($resultface)){
    ?>
      <div class="col-xs-3 latest-product listface">
       <p class="sidGoodface" style="display:none;"><?php echo $rowsface["Sid"];?></p> 
         <a href="#" style="text-decoration: none;">
         <li>
          <?php echo'<img  src="'.$rowsface['SimgPath'].'">'?>
        </li>
        </a>
          <dl>
          <dt style="color:#37393A;text-align:center"><?php echo $rowsface["Sname"]?></dt>
          <dt style="color:#37393A;text-align:center">￥<?php echo $rowsface["cutprice"]?></dt>
          <a>立即抢购</a>
         </dl>  
      </div> 
    <?php
    }
    ?>  
    </ul> 
    </div>
    <!--将唇部彩妆显示出来-->
    <div class="latest-type clearfix" >
    <ul>
      <a href="zuixinActivity.php?type=8" ><img class="imgProduct" src="imgCase/lastest-activity02.jpg"></a>
      <?php 
       while($rowsmouth=mysql_fetch_array($resulmouth)){
       ?>
            <div class="col-xs-3 latest-product listmouth">
            <a href="#" style="text-decoration: none;">
             <p class="sidGoodmouth" style="display:none;"><?php echo $rowsmouth["Sid"];?></p> 
            <li>
                <?php echo'<img src="'.$rowsmouth['SimgPath'].'">'?>
                </li></a>
                <dl>
                <dt style="color:#37393A;text-align:center"><?php echo $rowsmouth["Sname"];?></dt>
                <dt style="color:#37393A;text-align:center">￥<?php echo $rowsmouth["cutprice"];?></dt>
               <a>立即抢购</a>
            </dl>
            </div>
       <?php
      }
       ?>   
       </ul>  
    </div>
 </div>
</div>
<!--最新活动的结束-->
<div class=" clearfix"></div>
<div class="Newproduct  clearfix" style="background:#fff;" >
  <div class="NewProContent">
    <h4>尖货>>>></h4>
        <?php
          while($rows=mysql_fetch_array($result))
              {
          ?>
     <div class="newGoods clearfix">
        <a href="#" style="text-decoration:none;" class="goodlist">
        <p class="sidGoodnew" ><?php echo $rows["Sid"];?></p> 
          <?php echo'<img src="'.$rows['SimgPath'].'" class="img-responsive">'?>
          <div class="newMessage">
              <p class="goods_name" name="goods_name" style="color:#37393A"><?php echo $rows["Sname"];?></p>
              <span class="discount"><?php echo $rows["discount"];?>折</span>
              <p>
                <span class="price"><em>￥<?php echo $rows["cutprice"];?></em></span>
                <span class="price-after"><del>￥<?php echo $rows["Sprice"];?></del></span>
              </p>
          </div>
        </a>
        <!--将商品的id传递值作为一个参数来进行传递,将商品的自身的id值以及商品的名称传递到buy处理页面-->
        <a  class="shop-cart" href='buy.php?id=<?php echo $rows["Sid"]?>&pname=<?php echo $rows["Sname"]?>'>
          <!-- <img src="images/shop-cart.png" alt="购物车"> -->
        </a>
    </div>
    <?php
  }
?>
  </div>
</div>

<div class="Newproduct  clearfix" style="background:#fff;" >
  <div class="NewProContent">
    <h4>新品>>></h4>
        <?php
           while($rowsnews=mysql_fetch_array($resultnews))
          {
       ?>
    <div class="newGoods clearfix " >
        <a href="#"  style="text-decoration:none;" class="newGoodslist">
        <p class="sidGoods" style="display:none;"><?php echo $rowsnews["Sid"];?></p>
          <?php echo'<img src="'.$rowsnews['SimgPath'].'" class="img-responsive">'?>
          <div class="newMessage">
              <p class="goods_name" style="color:#37393A"><?php echo $rowsnews["Sname"];?></p>
              <span class="discount"><?php echo $rowsnews["discount"];?>折</span>
              <p>
                <span class="price"><em>￥<?php echo $rowsnews["cutprice"];?></em></span>
                <span class="price-after"><del>￥<?php echo $rowsnews["Sprice"];?></del></span>
              </p>
          </div>
        </a>
        <a class="shop-cart" href='buy.php?id=<?php echo $rowsnews["Sid"]?>&pname=<?php echo $rowsnews["Sname"]?>'>
        </a>
    </div>
    <?php
      }
    ?>
  </div>
</div>
<!--底部导航栏-->
<footer class="footer">
  <div class="foot-con">
  <div class="foot-con_2">
    <a  class="active">
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
    <!-- href="judge.php" -->
    <a  class="judgemen">
      <i class="navIcon member"></i>
      <span class="usertype"><?php echo  $userstype?></span>
      <span class="text">我的</span>
    </a>
  </div>
  </div>
</footer>
</div>
<script type="text/javascript">
$(document).ready(function(){
    var bannerSlider = new Slider($('#banner_tabs'), {
    time: 5000,
    delay: 400,
    event: 'hover',
    auto: true,
    mode: 'fade',
    controller: $('#bannerCtrl'),
    activeControllerCls: 'active'
  });
  $('#banner_tabs .flex-prev').click(function() {
    bannerSlider.prev()
  });
  $('#banner_tabs .flex-next').click(function() {
    bannerSlider.next()
  });
  //进行当前商品标题的获取，点击链接，直接显示商品详情
  $('.goodlist').click(function () {
    var temp=$(this).find('.sidGoodnew').text();
     goodsdeta(temp);
   });
  //标记新品的id,传递值到达商品相信 页面，传递成功
  $('.newGoodslist').click(function () {
    var temp=$(this).find('.sidGoods').text();
     goodsdeta(temp); 
  });
  //最新活动第一部分的连接的点击
  $('.listmask').click(function () {
    var temp=$(this).find('.sidGoodnew').text();
     goodsdeta(temp);
  });
  //最新活动水乳面霜的点击
  $('.listface').click(function () {
    var temp=$(this).find('.sidGoodface').text();
     goodsdeta(temp);
  });
  //最新活动水乳面霜的点击
  $('.listmouth').click(function () {
    var temp=$(this).find('.sidGoodmouth').text();
    goodsdeta(temp);
  });
function goodsdeta(argument) {
    document.write("<form action='pro_detail.php' method='post' name='form1' style='display:none'>");  
    document.write("<input type='hidden' name='name' value='"+argument+"'/>");
    document.write("</form>");  
    document.form1.submit(); 
}
});
</script>
</body>
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
<script type="text/javascript">
  $('.orderman').click(function(){
    var temp=$(this).find('.usertype').text();
      if(temp==""){
        parent.location.href='loginPage.html';
      }else{
         parent.location.href='userPage.php';
      }
  });
</script>

</html>

