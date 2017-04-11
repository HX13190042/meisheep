<!DOCTYPE html>
<html>
<head>
<title>管理员列表列表</title>
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
$sql ="select * from tb_orderlist";
$result=mysql_query($sql);
?>
<div class="margin order_style" id="page_style">
<div class="operation clearfix">
<button class="btn button_btn btn-danger" type="button" onclick=""><i class="fa fa-trash-o"></i>&nbsp;删除</button> 
<div class="search  clearfix">
 <label class="label_name">订单号：</label>
 <input name="" type="text"  class="form-control col-xs-6" style=" width:250px;"/>
  <label class="label_name">下单时间：</label>
  <input class="inline laydate-icon " id="start" type="text"  style=" margin-right:10px; height:auto; float:left; width:150px;" />
 <button class="btn button_btn bg-deep-blue " onclick=""  type="button"><i class="fa  fa-search"></i>&nbsp;搜索</button>
</div>
</div>
<div class="List_display">
 
  <table class="table table_list table_striped table-bordered" id="sample-table">
  <thead>
  <tr>
   <th width="100">订单号</th>
   <th width="150">用户编号</th>   
   <th width="150">下单时间</th>
   <th width="80">消费金额</th>
   <th width="50">数量</th>
   <th width="150">状态</th>
   <th width="100">备注</th>
   <th width="200">操作</th>
   </tr>   
  </thead>
  <tbody>
  <?php while($rows=mysql_fetch_array($result)){?>
   <tr>
   <td width="100"><?php echo $rows['idorder']?></td>
   <td width="150"><?php echo $rows['Uid']?></td>   
   <td width="150"><?php echo $rows['orderDate']?></td>
   <td width="80"><?php echo $rows['moneyAll']?></td>
   <td width="50"><?php echo $rows['orderNum']?></td>
   <td width="150"><?php echo $rows['orderstate']?></td>
   <td width="100">请管理员及时追踪订单</td>
   <td width="200">
   	
  <a title="编辑" href="Logistics.php?idorder=<?php echo $rows['idorder']?>&&flag=bianji" class="btn button_btn bg-deep-blue"><?php echo $rows['orderstate']?></a>        
  <a title="删除"  href="Logistics.php?idorder=<?php echo $rows['idorder']?>&&flag=delete"   class="btn button_btn btn-danger delete">删除</a>
  <a class="goodsnumber" style="display:none"><?php echo $rows['idorder']?></a>
  <a title="查看" href="Ordergoodslist.php?id=<?php echo $rows['idorder']?>"  class="btn button_btn btn-green">查看</a>
  </td>
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
