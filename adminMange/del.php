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
$sql="delete from  shopinfo  where Sid=$goodid";
echo $sql;
mysql_query($sql);
mysql_close();
header("location:Products.php");
?>
</body>
</html>