<?php
include ('util.php');
session_start();
//传递管理员账号
$name=$_POST['user-name'];
$pwd=$_POST['userpassword'];
$phone=$_POST['user-tel'];
$email=$_POST['email'];
//验证数据库中是否存在相同的账号
$sql="select adminname from tb_admin where adminname='$name'";

if(mysql_query($sql)){
    $sqladmin="insert into tb_admin (adminname,  pwd, phone,email,time) values ('$name','$pwd','$phone','$email',now())";
    mysql_query($sqladmin);
    header("location:administrator_list.php");
    exit;
   }else{

      echo "<script language='javascript' type='text/javascript'>";
      echo "alert('该账号已经存在，请重新添加新的账号')";
      echo "</script>";
      exit;
   }
?>