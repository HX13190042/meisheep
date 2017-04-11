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
$arr_goods=$_POST['id'];
$arr_new=explode(',',$arr_goods);
//切割数组，每四个内容为一组，一共传递了两个字段过来
$cartinfo=array_chunk($arr_new, 4);
?>