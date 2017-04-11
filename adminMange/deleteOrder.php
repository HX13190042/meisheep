<!-- 删除整个订单，包括该订单包含的全部商品 -->
<!DOCTYPE html>
<html>
<head>
<title>展示是否传递值</title>
<meta charset="utf-8">
</head>
<body>
<?php
include ('util.php');
$goodid=$_POST['id'];
echo $goodid;
$sql="delete from  tb_orderdetail  where ordernum=$goodid";
mysql_query($sql);

$sql="delete from  tb_orderlist  where idorder=$goodid";
mysql_query($sql);

mysql_close();
header("location:Orderlist.php");
?>
</body>
</html>