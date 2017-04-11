<?php
include ('util.php');
session_start();
//传递管理员账号
$id=$_POST['adminid'];
// $name=$_POST['user-name'];
$pwd=$_POST['userpassword'];
$phone=$_POST['user-tel'];
$email=$_POST['email'];
$sqladmin="update  tb_admin set pwd='$pwd', phone='$phone',email='$email',time=now() where id=$id";
mysql_query($sqladmin);
echo "<script language='javascript' type='text/javascript'>";
echo "alert('恭喜你，数据修改成功，现在正在跳转页面')";
echo "</script>";
echo "<meta http-equiv='Refresh' content='0;URL=administrator_list.php'>";
// header("location:administrator_list.php");
?>