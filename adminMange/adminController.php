<?php
include ('util.php');
session_start();
$adminname=$_POST['username'];
$pwd=$_POST['userpwd'];
//验证数据库中是否存在相同的账号
$sql="select adminname, pwd from tb_admin where adminname='$adminname' and pwd='$pwd'";
mysql_query($sql);
if(mysql_query($sql)){
		$_SESSION['$adminname']=$adminname;
		$_SESSION['$pwd']=$pwd;
      echo "<script language='javascript' type='text/javascript'>";
       echo "alert('恭喜你，登录成功，现在正在跳转页面')";
      echo "</script>";
      echo "<meta http-equiv='Refresh' content='0;URL=adminFrameset.html'>";
       exit;
   }else{
       echo "<script language='javascript' type='text/javascript'>";
       echo "alert('输入的用户信息有误，请重新输入账号以及密码')";
       echo "</script>";
      echo "<meta http-equiv='Refresh' content='5;URL=login.html'>";
   }
?>