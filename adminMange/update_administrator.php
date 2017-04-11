<!DOCTYPE html>
<html>
<head>
	<title>管理员列表</title>
	<meta charset="utf-8">
<link href="css/shop.css" type="text/css" rel="stylesheet" />
<link href="css/Sellerber.css" type="text/css"  rel="stylesheet" />
<link href="css/bkg_ui.css" type="text/css"  rel="stylesheet" />
<link href="font/css/font-awesome.min.css"  rel="stylesheet" type="text/css" />
</head>
<?php
include ('util.php');
$adminid=$_GET['adminid'];
// echo $adminid;
$sql="select * from tb_admin where id=$adminid";
// echo $sql;
$result=mysql_query($sql);
while($rows=mysql_fetch_array($result)){
?>
<body>
<div class="margin add_administrator" id="page_style">
    <div class="add_style add_administrator_style">
    <div class="title_name">修改管理员信息</div>
    <form action="update_adminaction.php" method="post" id="form-admin-add">
    <ul>
     <li class="clearfix">
     <input type="text" name="adminid" value="<?php echo $adminid?>" placeholder="" style="display:none">
     <label class="label_name col-xs-2 col-lg-2"><i>*</i>用户名：</label>
     <div class="formControls col-xs-6">
     <input type="text" disabled="true" class="input-text col-xs-12" value="<?php echo $rows['adminname']?>" placeholder="" id="user-name" name="user-name" datatype="*2-16" nullmsg="用户名不能为空"></div>
     <div class="col-4"> <span class="Validform_checktip"></span></div>
     </li>
     <li class="clearfix">
     <label class="label_name col-xs-2 col-lg-2"><i class="c-red">*</i>初始密码：</label>
	 <div class="formControls col-xs-6">
	 <input type="password" placeholder="密码" name="userpassword" autocomplete="off" value="<?php echo $rows['pwd']?>" class="input-text col-xs-12" datatype="*6-20" nullmsg="密码不能为空">
	</div>
     <div class="col-4"> <span class="Validform_checktip"></span></div>
     </li>
     <li class="clearfix">
       <label class="label_name col-xs-2 col-lg-2"><i class="c-red">*</i>确认密码：</label>
       <div class="formControls  col-xs-6">
	<input type="password" placeholder="确认新密码" autocomplete="off" class="input-text Validform_error  col-xs-12" errormsg="您两次输入的密码不一致！" datatype="*" nullmsg="请再输入一次新密码！" recheck="userpassword" id="newpassword2" name="newpassword2">
	</div>
	  <div class="col-4"> <span class="Validform_checktip"></span></div>
     </li>
     <li class="clearfix">
      <label class="label_name col-xs-2 col-lg-2"><i class="c-red">*</i>手&nbsp;机：</label>
      <div class="formControls col-xs-6">
		<input type="text" class="input-text col-xs-12" value="<?php echo $rows['phone']?>" placeholder="" id="user-tel" name="user-tel" datatype="m" nullmsg="手机不能为空">
	  </div>
	 <div class="col-4"> <span class="Validform_checktip"></span></div>
     </li>
     <li class="clearfix">
      <label class="label_name col-xs-2 col-lg-2"><i class="c-red">*</i>邮&nbsp;箱：</label>
      <div class="formControls col-xs-6">
		<input type="text" value="<?php echo $rows['email']?>" class="input-text col-xs-12" placeholder="@" name="email" id="email" datatype="e" nullmsg="请输入邮箱！">
	   </div>
		<div class="col-4"> <span class="Validform_checktip"></span></div>
     </li>
         <li class="clearfix">
			<div class="col-xs-2 col-lg-2">&nbsp;</div>
			<div class="col-xs-6">
	       <input class="btn button_btn bg-deep-blue " type="submit" id="Add_Administrator" value="提交注册">
          <input name="reset" type="reset" class="btn button_btn btn-gray" value="取消重置" />
			</div>
		</li>
    </ul>
    </form>
    <?php }?>
    </div>
    <div class="split_line"></div>
    <div class="Notice_style l_f">
    </div>
</div>
</body>
</html>