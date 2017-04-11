<!DOCTYPE html>
<html>
<head>
	<title>删除页面</title>
	<meta charset="utf-8">
</head>
<body>
<?php
session_start();//启动session
ob_start();//清空缓存必须启动的项
$pid=$_GET["id"];//得到通过get方式传过来的id
echo $pid;
$arr=$_SESSION["mycar"];//拿出session里的二维数组
foreach($arr as$key=>$proId)//遍历该二维数组中的键值，这里也就是商品的id
{
     if($key==$pid)//判断键值等于传过来的商品id
     {
          unset($arr[$key]);//清除该一维数组
     }
}
$_SESSION["mycar"]=$arr;//将清除之后的二维数组重新放到session里

ob_clean();//清除缓存
header("location: shoppingCart.php");//跳转到购物车
?>
</body>
</html>