<!DOCTYPE html>
<html>
<head>
<title>展示是否传递值</title>
<meta charset="utf-8">
</head>
<body>
<?php
session_start();//使用session之前一定要将session开启
//开始判断用户是否登录，如果检测不到的话，用户需要返回页面进行的登录
ob_start();//要清空缓存就必须ob_start()
if(!isset($_SESSION['userType'])){
       echo "<script language='javascript' type='text/javascript'>";
       echo "alert('用户尚未登录，现在正在跳转页面')";
       echo "</script>"; 
      echo "<meta http-equiv='Refresh' content='0;URL=loginpage.html'>";
}else{


$pid=$_GET["id"];//得到购买物品的id
$name=$_GET["pname"];//得到购买物品的名字
// $color=$_post['name2'];
//验证传递的参数是否正确
// echo  $pid;
// echo $name;
$num=1;
$mycar= array
(
    array('pid'=>"",'name'=>"",'num'=>"")
);
$_SESSION["mycar"];
$arr2=$_SESSION["mycar"];//将session中的变量取出来
//下面先判断这个变量是否是数组,可以得到以前是否买过东西
//如果是数组，说明以前买过东西
//如果买过东西又分两种情况：继续添加原有的物品，或者添加新物品
if(is_array($arr2)){
	if(array_key_exists($pid,$arr2))
     {
     //1、array_key_exists($pid,$arr)判断$arr中是否存在键值为$pid的一个一维数组，如果存在的话，就说明此商品以前购买过，只需要把数量加1
          $uu=$arr2[$pid]; //从二维数组里拿出对应的一维数组，该一维数组包括id name num 三个值
          $uu["num"]=$uu["num"]+1; //改变数量，将数量加1
          $arr2[$pid]=$uu; //改完后再将此一维数组放回二维数组中
     }
     else
     {   //2.此商品第一次购买，就将得到的id和name值组成一个一维数组
          $arr2[$pid]=array("pid"=>$pid,"name"=>$name,"num"=>1);
     }
}else{
	$arr2[$pid]=array("pid"=>$pid,"name"=>$name,"num"=>1);
}

$_SESSION["mycar"]=$arr2;
//购买完后，将此数组重新放入session中，便可以在各个页面看到此session
//验证已经获得值并且存储再session里面
//print_r($_SESSION["mycar"]);
header("location: shoppingcart.php");
}
?>
</body>
</html>