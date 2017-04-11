<!DOCTYPE html>
<html>
<head>
<title>展示是否传递值</title>
<meta charset="utf-8">
</head>
<body>
<?php
include 'util.php';
$goodid=$_POST['id'];
echo $goodid;
$sql="update tb_orderdetail set goodstate='已发货' where id=$goodid";
echo $sql;
mysql_query($sql);
header("location:Order_Logistics.php");
?>
</body>
</html>