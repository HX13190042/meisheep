<!DOCTYPE html>
<html>
<head>
	<title>检验是否添加银行卡成功</title>
</head>
<body>
<?php
session_start();
include ('util.php');
echo "页面的切换";
$cardnum=$_POST["banknum"];//银行卡账号
$cardbank=$_POST["bank"];//开户银行
$cardname=$_POST["bankname"];//持卡人姓名
$cardphone=$_POST["bankphone"];//持卡人电话
echo $cardnum;
echo $cardphone;
echo $cardname;
echo $cardbank;
//传递数据成功
//将数据输入数据库中
$Uid=$_SESSION['userId'];

$sql="insert into userbankcard (Uid,cardnum,carbank,cardname,cardphone) values ($Uid,'$cardnum','$cardbank','$cardname','$cardphone')";
echo $sql;
$result=mysql_query($sql);
      if($result){
      echo '<script>alert("银行卡添加成功");</script>';
      echo "<meta http-equiv='Refresh' content='1;URL=bankcard.php'>";
      }else{
      echo '<script>alert("银行卡添加失败,请准确添加您的信息");</script>';
      echo "<meta http-equiv='Refresh' content='1;URL=add_card.html'>";
      }
?>
</body>
</html>