<!DOCTYPE html>
<html>
<head>
<title>每一笔订单的详细内容</title>
<meta charset="utf-8">
<script type="text/javascript" src="js/jquery-2.1.4.js"></script>
<link href="css/shop.css" type="text/css" rel="stylesheet" />
<link href="css/Sellerber.css" type="text/css"  rel="stylesheet" />
<link href="css/bkg_ui.css" type="text/css"  rel="stylesheet" />
<link href="font/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php 
include ('util.php');
$id=$_GET['id'];
// echo $id;
$sql ="select * from tb_orderdetail where ordernum=$id";
$result=mysql_query($sql);
?>
<div class="margin order_style" id="page_style">
<div class="operation clearfix">
<button class="btn button_btn btn-danger" type="button" onclick=""><i class="fa fa-trash-o"></i><a href="Orderlist.php" style="color:#fff">&nbsp;返回</a></button> 

</div>
<div class="List_display">
  <table class="table table_list table_striped table-bordered" id="sample-table">
  <thead>
  <tr>
   <th width="100">订单号</th>
   <th width="150">商品名称</th>   
   <th width="150">商品数量</th>
   <th width="80">单品价格</th>
   <th width="50">小计</th>
   <th width="150">状态</th>
   </tr>   
  </thead>
  <tbody>
  <?php while($rows=mysql_fetch_array($result)){?>
   <tr>
   <td width="100"><?php echo $rows['ordernum']?></td>
   <td width="150"><?php echo $rows['goodsname']?></td>   
   <td width="150"><?php echo $rows['goodsnum']?></td>
   <td width="80"><?php echo $rows['price']?></td>
   <td width="50"><?php echo $rows['allmoney']?></td>
   <td width="100">准时发货</td>

  </tr>
<?php }?>
  </tbody>
 </table>
</div>
</div>
</body>
</html>

<script type="text/javascript">
  $('.delete').click(function() {
       var temp= $(this).next('.goodsnumber').text();
         goodsdeta(temp);
  });
</script>
<script type="text/javascript">
  function goodsdeta(argument) {
    document.write("<form action='deleteOrder.php' method='post' name='form1' style='display:none'>");  
    document.write("<input type='hidden' name='id' value='"+argument+"'/>");
    document.write("</form>");  
    document.form1.submit(); 
}
</script>
