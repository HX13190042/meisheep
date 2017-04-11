<?php
session_start();
 //连接数据库
include ('util.php');
//检测是否登录，若没登录则转向登录界面
//if(!isset($_SESSION['username'])){
 ///   header("Location:  login.html");
  //  exit();
//}
//用户的登录账号以及用户的ID
$userType= $_SESSION['userType'];
$userid=$_SESSION['userId'];
$consignee=$_POST['consignee'];
$phone=$_POST['phone'];
$area=$_POST['area'];
$address=$_POST['address'];
$addressAll=$area.$address;

 //根据当前用户的id，利用外键，添加的用户信息存储到数据库里面
 //$sqlinsert="insert into t1(username,password) values('{$name}','{$pwd}')";
$sql="insert into tb_userAddress(conname,address,phone,Uid) values('$consignee','$phone','$addressAll',$userid)";
$query = mysql_query($sql);
if($query){
echo '数据插入成功。';
}else{
echo '数据插入失败。';
}
?>

