<!DOCTYPE html>
<html>
<head>
<title>将购物车的全部内容保存在session中</title>
<meta charset="utf-8">
</head>
<body>
<?php
session_start();
include 'util.php';
$userId=$_SESSION['userId'];
$all=$_SESSION['allnum'];
$almoney=$_SESSION['$arr_gtotal1'];

$state=$_POST['name'];
echo $state;

//将数据传递到总的订单页面中
$sql="insert into  tb_orderlist (orderDate,moneyAll,orderNum,Uid,orderstate) values (now(),'$almoney',$all,$userId,'$state')";
echo $sql;
$result=mysql_query($sql);

$findvalue="select * from tb_orderlist order by idorder DESC limit 1";
$result=mysql_query($findvalue);
while($rows= mysql_fetch_array($result)){
   $orderNum= $rows["idorder"];
   echo "目前订单的编码是". $orderNum.'<br>';
}
// 将每一条商品的信息放在数据库中，并且绑定当前的订单号
// 商品的id
$arr_goods=$_SESSION['arr_goods1'];
foreach($arr_goods as $k=>$val){
  echo '商品的id'.$val['0'].'<br>';
  echo '商品的名称'.$val['1'].'<br>';
  echo '该订单商品的总价'.$val['2'].'<br>';
  echo '商品数量'.$val['3'].'<br>';
  echo '商品颜色'.$val['4'].'<br>';
  echo '商品的图片'.$val['5'].'<br>';
  $tempid=$val['0'];
  $tempname=$val['1'];
  $temptotal=$val['2'];
  $tempnum= $val['3'];
  $tempcolor=$val['4'];
  $sqlprice="select cutprice from shopinfo where Sid='$val[0]'";
  $rowsprice= mysql_fetch_array(mysql_query($sqlprice));
  $cutprice=$rowsprice['cutprice'];
  echo '当前价钱是'. $cutprice;
  $sqlorder="insert into tb_orderdetail(Sid,goodsname,goodsnum,price,allmoney,ordernum) values
  ($tempid,'$tempname',$tempnum,$cutprice, $temptotal,$orderNum)";
  echo  $sqlorder;
  mysql_query($sqlorder);
  header("location: userPage.php");
 }
?>
</body>
</html>