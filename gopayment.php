<!DOCTYPE html>
<html>
<head>
<title>去付款</title>
<meta charset="utf-8">
</head>
<body>
<?php 
session_start();
include ('util.php');
$id=$_POST["name"];
$sql="update tb_orderlist set orderstate='已付款' where idorder=$id";
mysql_query($sql);
header("location: order_management.php");
?>
</body>
</html>