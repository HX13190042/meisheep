<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
</head>
<?php
 $Regmail= $_POST['Regmail'];
 $RegmailName= $_POST['RegmailName'];
 $mailPwd= $_POST['mailPwd'];
include("util.php");
$url='loginPage.html';
//判断注册的类型是否存在重复，如果有就提示账号已经存在
$sqlrepeat="select Uaccount from users where Uaccount='$Regmail'";
$sqlrepeatRes=mysql_query($sqlrepeat);
if(mysql_num_rows($sqlrepeatRes)!=0){
	echo "<script language=javasrcipt>alter('注册邮箱已经存在，请选择其他邮箱');</srcipt>";
	Header("Location: register.html"); 
}
else{
	$sql="insert into users(Uaccount,Uname,Upwd)"."values ('$Regmail','$RegmailName','$mailPwd')";
	$result = mysql_query($sql);//使用SQL关键词查询我们编写的message的信息；
	if($result) {
	echo "<script> alert('恭喜您，注册成功，请登录');parent.location.href='loginPage.html'; </script>"; 
	 } 
	else { echo "插入失败"."<br>".mysql_error();
	 echo "<script language=javasrcipt>alter('注册失败，请重新注册');</srcipt>";
     Header("Location: register.html"); 
  } 
}
?>