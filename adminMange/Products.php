<!DOCTYPE html>
<html>
<head>
	<title>产品列表</title>
	<meta charset="utf-8">
<script type="text/javascript" src="js/jquery-2.1.4.js"></script>
<link href="css/shop.css" type="text/css" rel="stylesheet" />
<link href="css/Sellerber.css" type="text/css"  rel="stylesheet" />
<link href="css/bkg_ui.css" type="text/css"  rel="stylesheet" />
<link href="font/css/font-awesome.min.css"  rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css">
<?php 
include ('util.php');
$sql ="select * from shopinfo";
$result=mysql_query($sql);
?>
<style type="text/css">
	body{overflow:scroll;};
</style>
</head>
<body>
<div class="margin" id="page_style">
<div class="operation clearfix">
<button class="btn button_btn btn-danger" type="button" onclick=""><i class="fa fa-trash-o"></i>&nbsp;删除</button>
<div class="search  clearfix">
<label class="label_name">商品搜索：</label><input name="" type="text"  class="form-control col-xs-6"/><button class="btn button_btn bg-deep-blue " onclick=""  type="button"><i class="fa  fa-search"></i>&nbsp;搜索</button>

</div>
</div>
<!--列表展示-->
<div class="list_Exhibition margin-sx">
 <table class="table table_list table_striped table-bordered" id="sample-table">
  <thead>
  <tr>
<!--   <th width="30"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th> -->
   <th width="100">产品编号</th>
   <th width="200">产品名称</th>
   <th width="120">产品现价</th>
    <th width="120">产品原价</th>
   <th width="100">数量</th>
   <th width="100">类型</th>
   <th width="150">添加日期</th>
   <th width="220">操作</th>
   </tr>   
  </thead>
  <tbody>
  <?php 
  while ($rows=mysql_fetch_array($result)) {
$goodsId= $rows['Sid'];
  ?>
   <tr>
<!--   <td width="30"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td> -->
   <td width="100"><?php  echo $rows['Sid']?></td>
   <td width="200"><?php  echo $rows['Sname']?></td>
   <td width="120">￥<?php  echo $rows['Sprice']?></td>
   <td width="100">￥<?php  echo $rows['cutprice']?></td>
   <td width="150"><?php  echo $rows['Snum']?>件</td>
    <td width="100"><?php  echo $rows['Stype']?></td>
    <td width="100"><?php  echo $rows['Stime']?></td>
    <td width="220">
    <a title="编辑" href="managegoods.php?id=<?php echo $goodsId ;?>"  class="btn button_btn bg-deep-blue">编辑</a>        
    <a title="删除" class="btn button_btn btn-danger delete">删除</a>
     <a class="goodsnumber" style="display:none"><?php echo $rows['Sid']?></a>
   </td>
   </tr>
  <?php
		}
  ?>
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
    document.write("<form action='del.php' method='post' name='form1' style='display:none'>");  
    document.write("<input type='hidden' name='id' value='"+argument+"'/>");
    document.write("</form>");  
    document.form1.submit(); 
}
</script>
