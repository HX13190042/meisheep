<!DOCTYPE html>
<html>
<head>
	<title>管理员列表列表</title>
	<meta charset="utf-8">
<link href="css/shop.css" type="text/css" rel="stylesheet" />
<link href="css/Sellerber.css" type="text/css"  rel="stylesheet" />
<link href="css/bkg_ui.css" type="text/css"  rel="stylesheet" />
<link href="font/css/font-awesome.min.css"  rel="stylesheet" type="text/css" />
</head>
<body>
<?php 
include ('util.php');
session_start();
$adminname=$_SESSION['$adminname'];
$sql ="select * from tb_admin where adminname='$adminname'";
$result=mysql_query($sql);
//从数据库将管理员的信息显示出来
while($rows=mysql_fetch_array($result)){
?>
<div class="margin" id="page_style">
   <div class="personal_info">
   <div class="add_style clearfix border_style">
   <form id="user_info" action="json/test_user.json" method="post">
    <div class="clearfix">
        <div class="form-group clearfix col-xs-3">
        <label class="col-xs-3 label_name" for="form-field-1">用户名：</label>
         <div class="col-xs-9 line_height1"><input type="text" name="username" data-name="用户名" id="username" value="<?php echo $rows['adminname']?>" class="col-xs-7 text_info" disabled="disabled"></div>         
          </div>
          <div class="form-group clearfix col-xs-3"><label class="col-xs-3 label_name" for="form-field-1">移动电话： </label>
          <div class="col-xs-9 line_height1"><input type="text" name="phone" data-name="移动电话" id="phone" value="<?php echo $rows['phone']?>" class="col-xs-7 text_info" disabled="disabled"></div>
          </div>
          <div class="form-group clearfix col-xs-3"><label class="col-xs-3 label_name" for="form-field-1">电子邮箱： </label>
          <div class="col-xs-9 line_height1"><input type="text" name="mailbox"  data-name="电子邮箱" id="mailbox" value="<?php echo $rows['email']?>" class="col-xs-7 text_info" disabled="disabled"></div>
          </div>
           <div class="form-group clearfix col-xs-3"><label class="col-xs-3 label_name" for="form-field-1">注册时间： </label>
          <div class="col-xs-9 line_height1"> <span><?php echo $rows['time']?></span></div>
          </div>
          </div>
<?php }?>
           <div class="Button_operation clearfix"> 
                <input type="button" onclick="modify();" class="btn btn-danger operation_btn"  value="修改信息"/>
                <a href="javascript:ovid()" onclick="change_Password()" class="btn bg-green operation_btn">修改密码</a>	
                <input type="button" id="save_info" class="btn bg-deep-blue operation_btn save"  value="保存修改"/>			     
			</div>
            </form>
            </div><div id="text_name"></div>
   </div>
    </div>
</body>
</html>