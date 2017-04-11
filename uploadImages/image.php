<?php
include('util.php');

$id     = $_GET['id'];
$sql    = "select * from image where id= $id ";
$result = mysql_query($sql) or die("can't perform query");
if (!$result)
    die("读取图片失败！");

$row = mysql_num_rows($result);
if ($row < 1)
    die("暂无图片");
$obj = mysql_fetch_object($result);
mysql_close();
Header("Content-type: ".$obj->type);
echo $obj->pic
?>