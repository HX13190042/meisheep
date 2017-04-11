<?php 
include ('util.php');
$id=$_GET['idorder'];
$flag=$_GET['flag'];
echo $id;
echo $flag;
if($flag='bianji'){
$sql="select * from tb_orderlist where idorder=$id";
mysql_query($sql);
$rows=mysql_fetch_array(mysql_query($sql));
$state=$rows["orderstate"];
echo $state;
switch ($state) {
	 case '待付款':
		$sqlsatet="update tb_orderlist set orderstate='待发货' where idorder=$id";
		break;
	 case '已付款':
		$sqlsatet="update tb_orderlist set orderstate='待发货' where idorder=$id";
		break;
	  case '待发货':
		$sqlsatet="update tb_orderlist set orderstate='待收货' where  idorder=$id";
		break;

	  case '待收货':
		$sqlsatet="update tb_orderlist set orderstate='待评价' where idorder=$id";
		break;
	   case '待评价':
		$sqlsatet="update tb_orderlist set orderstate='订单完成' where idorder=$id";
		break;

}
mysql_query($sqlsatet);
}
else if($flag='delete'){
$sqlsatet="delete from tb_orderlist  where idorder=$id";
mysql_query($sqlsatet);
}
else{
header("Location:Orderlist.php");
}

header("Location:Orderlist.php");
?>