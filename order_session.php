<!DOCTYPE html>
<html>
<head>
<title>将购物车的全部内容保存在session中</title>
<meta charset="utf-8">
</head>
<body>
<?php
session_start();
include 'util.php';
//将登陆的用户的信息显示出来 username、useraccount、userId
$username=$_SESSION['username'];
$useraccount=$_SESSION['userType'];
$userId=$_SESSION['userId'];
//进行用户的地址查询
$sqladd="select * from tb_useraddress where Uid='$userId' limit 1";
$resultadd=mysql_query($sqladd);
$arr_goodsid=$_POST['id'];
$arr_gtotalid=$_POST['idtotal'];
$allnum=$_POST['allnum'];
$_SESSION['allnum']=$allnum;
if($arr_gtotalid=='¥0'){
	header("location:shoppingCart.php");
}else{
	$arr_new=explode(',',$arr_goodsid);
//切割数组，每5个内容为一组，一共传递了两个字段过来
$cartinfo=array_chunk($arr_new,6);

$length=count($cartinfo);

 $_SESSION['arr_goods1']=$cartinfo;
 $_SESSION['$arr_gtotal1']=$arr_gtotalid;
//在订单相信信息列表应该要存储的数据
print_r($_SESSION['arr_goods1']);
//只是进行循环输出数据
foreach($cartinfo as $k=>$val){
echo '<br>'.$val["0"].'<br>';	
echo $val["1"].'<br>';	
echo $val["2"].'<br>';
echo $val["3"].'<br>';
echo $val["4"].'<br>';
echo $val["5"].'<br>';
}
header("location:order_info2.php");
}

?>
</body>
</html>