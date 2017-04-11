<!DOCTYPE html>
<html>
<head>
<script charset="utf-8" src="js/jquery.min.js"></script>
<script charset="utf-8" src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/jquery-weui.css">
<script src="js/jquery-1.10.2.min.js"></script>
<link rel="stylesheet" href="css/banner.css">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="yes" name="apple-touch-fullscreen">
<meta content="telephone=no" name="format-detection">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1;user-scalable=no;">
<title>编辑地址</title>
</head>
<?php
session_start();
include ('util.php');
$flag=$_REQUEST['flag'];
$sql="select * from tb_useraddress where userAddressId='$flag'";
$result=mysql_query($sql);
?>
<body>
	<div class="addressContainer">
		<header class="header">
			<div class="fix_nav">
				<div style="max-width:768px;margin:0 auto;background:#D91D37;position: relative;">
					<a class="nav-left back-icon" href="shipAddress.php">返回</a>
					<div class="tit">编辑地址</div>
				</div>
			</div>
		</header>
		<!--我的收货地址管理-->
			<section class="mainAddress" style="margin-top:-25px;">

				<form class="add-mess" action="userController.php?flag=editaddress&addid=<?php echo $flag;?>" method="post">
				<?php
				while($rows=mysql_fetch_array($result)){
				?>
					<div class="mess-list clearfix" style="padding-top:10px;">
						<label>收货人：</label><input type="text"  id="input1" name="consignee" value="<?php  echo $rows['conname']?>">
					</div>
					<div class="mess-list clearfix">
						<label>联系电话：</label> <input type="text" id="input2" name="phone" value="<?php  echo $rows['phone']?>">
					</div>
					<div class="mess-list clearfix">
						<label>所在地区：</label> <input type="text" name="region" id="address" value="<?php  echo $rows['address']?>" readonly="" data-code="420106" data-codes="420000,420100,420106" name="area">
						 <input id="value1" type="hidden" value="20,234,504"/>
					</div>
					<div class="mess-list clearfix">
						<label>详细地址：</label> <input type="text"id="input4"  name="address" value="<?php  echo $rows['detailed_add']?>">
					</div>	
					<div class="mess-list clearfix">
					<label></label>
						<input type="submit" value="保存新地址" name="Submit1"  id="submit" style="background:#D91D37;color:#fff;" >
					</div>
					<div class="mess-list clearfix">
					<label></label>
						<input type="submit" value="删除此地址" name="Submit2"  id="submit" style="background:#D91D37;color:#fff;" >
					</div>
				<?php
				}
				?>
				</form>
			</section>
	</div>
	<script src="js/jquery-2.1.4.js"></script> 
	<script src="js/jquery-weui.js"></script>
	<script src="js/city-picker.js"></script>
	<script>
	      $("#address").cityPicker({
	        title: "选择出发地",
	        onChange: function (picker, values, displayValues) {
	          console.log(values, displayValues);
	        }
	      });
	</script>
</body>
</html>