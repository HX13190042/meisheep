<!DOCTYPE html>
<html>
<head>
	<title>管理员列表列表</title>
	<meta charset="utf-8">
<link href="css/shop.css" type="text/css" rel="stylesheet" />
<link href="css/Sellerber.css" type="text/css"  rel="stylesheet" />
<link href="css/bkg_ui.css" type="text/css"  rel="stylesheet" />
<link href="font/css/font-awesome.min.css"  rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-2.1.4.js"></script>
</head>
<body>
<?php 
include ('util.php');
$sql ="select * from tb_admin";
$result=mysql_query($sql);
?>
<div class="margin order_style" id="page_style">
    <div class="operation clearfix">
    <ul class="choice_search">
     <li class="clearfix col-xs-3 col-lg-3 col-ms-3 "><label class="label_name ">订单号：</label><input name="" type="text"  class="form-control col-xs-8 col-lg-7"/></li>
      <li class="clearfix col-xs-3 col-lg-3 col-ms-3 "><label class="label_name ">产品名称：</label><input name="" type="text"  class="form-control col-xs-8 col-lg-7"/></li>
      <li class="clearfix col-xs-4 col-lg-5 col-ms-5 "><label class="label_name ">下单时间：</label> 
     <input class="laydate-icon col-xs-4 col-lg-3" id="start" style=" margin-right:10px; height:28px; line-height:28px; float:left">
      <span  style=" float:left; padding:0px 10px; line-height:32px;">至</span>
      <input class="laydate-icon col-xs-4 col-lg-3" id="end" style="height:28px; line-height:28px; float:left"></li>
     <button class="btn button_btn bg-deep-blue " onclick=""  type="button"><i class="fa  fa-search"></i>&nbsp;搜索</button>
    </ul>
    </div>
    <div class="list_order">
        <table class="Logisticsb table table_list table_striped table-bordered">
      <?php 
      include ('util.php');
      //选择订单的id
      $sqlordernum="select * from tb_orderlist";
      $resultorder=mysql_query($sqlordernum);
      while($rows=mysql_fetch_array($resultorder)){
        $xiangxi=$rows['idorder'];
       $sql ="select * from tb_orderdetail where ordernum='$xiangxi'";
       $result=mysql_query($sql);
      ?>
              <tr class="Logisticsb_info clearfix ">
           <td colspan="4">
             <ul>
             <li class="clearfix col-xs-2 col-lg-3">订单号：<?php echo $rows['idorder']?></li>
             <li class="clearfix col-xs-2 col-lg-3">下单时间：<?php echo $rows['orderDate']?></li>
             </ul>
           </td>
           </tr>
        <?php  while($rowsdetail=mysql_fetch_array($result)){?>
           <tr class="Logisticsb_content clearfix">
           <td class="content_jb_name">
            <table>
            <tbody>
               <tr><td><?php echo $rowsdetail['goodsname']?></td><td><?php echo $rowsdetail['goodsnum']?></td><td><?php echo $rowsdetail['price']?></td></tr>
              </tbody>
            </table>         
           </td>
           <td class="content_jb"><?php echo $rowsdetail['allmoney']?></td>
           <td class="content_jb">
             <a class="btn bg-deep-blue operation_btn">查看</a>
             <a class="goodsnumber" style="display:none"><?php echo $rowsdetail['id']?></a>
           </td>
           </tr>
          <?php
              }
           }?>
        </table>
    </div>
</div>
</body>
</html>

<script type="text/javascript">
  $('.fahuo').click(function() {
       var temp= $(this).next('.goodsnumber').text();
       $(this).text('已发货');
        goodsdeta(temp);
  });
</script>
<script type="text/javascript">
  function goodsdeta(argument) {
    document.write("<form action='fahuo.php' method='post' name='form1' style='display:none'>");  
    document.write("<input type='hidden' name='id' value='"+argument+"'/>");
    document.write("</form>");  
    document.form1.submit(); 
}
</script>
