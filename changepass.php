<?php
session_start();
//获取用户的账号，根据用户的账号找到密码，然后进行密码的修改，修改后用户需要注销这一次的登陆，并且使用新的密码来进行登陆
include ('util.php');
$old_psd=$_POST["old_psd"];
$new_psd=$_POST["new_psd1"];
$account=$_SESSION['userType'];
// echo $old_psd;
// echo $new_psd;
$sqlpwd="SELECT  * from users where Uaccount='$account' ";
// echo $sqlpwd;
//修改用户密码
$sql="UPDATE  users SET Upwd ='$new_psd' where Uaccount='$account'";
echo $sql;
$query = mysql_query($sql);
 unset($_SESSION['userType']);
 unset($_SESSION['username']);
 echo '<script>alert("修改密码成功，需要重新登陆");</script>';
  //  echo "<script>alert('用户尚未登录，现在跳转登录页面')；</script>";
 echo "<meta http-equiv='Refresh' content='1;URL=loginPage.html'>";
  exit;
?>
