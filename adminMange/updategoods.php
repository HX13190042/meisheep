<?php
//上传你的头像
session_start();
if(isset($_POST['update']))
{
include('util.php');
$goodsid=$_POST['Sid'];
$goodsname =$_POST['Sname'];
$Stitle=$_POST['Stitle'];
$goodsprice =$_POST['Sprice'];
$disSprice=$_POST['disSprice'];
$goodsnum =$_POST['Snum'];
$goodstype =$_POST['Stype'];
$goodstate =$_POST['State'];
$disNum =$_POST['disNum'];
$Snetcontent=$_POST['Snetcontent'];
$Squality=$_POST['Squality'];
$Species=$_POST['Species'];

echo $goodsid.'传递的商品的id';

$picNum;
//此变量负责将所有的
$allimg_pth="";
//将获得的图片用数组进行管理
  function photo_type($photo_file)
  {

    $position=strrpos($photo_file,".");
     global $suffix;
     $suffix=substr($photo_file,$position+1,strlen($photo_file)-$position);
     return $suffix;
  }
   //$photo_name=$_FILES['myform']['name'];
   echo $_FILES['myform']['name'].'商品标识性图片的类型'.'<br>';
   $ext=photo_type($_FILES['myform']['name']);
   //strtolower()转换小写   strtoupper()转换大写
   //$ext=strtolower($ext);
   $upload_dir='../goodsImg/';
    if($suffix!="jpg" && $suffix!="gif" && $suffix!="png")
    {
     die("不支持这个类型的图片");
    }

    $uploadfile=$upload_dir.time().".".$suffix;

     if(move_uploaded_file($_FILES['myform']['tmp_name'],$uploadfile))
     {
      $sql1="update shopinfo set Sname='$goodsname',Stitle='$Stitle',Sprice='$goodsprice',Squality='$Squality',Species='$Species',
      cutprice='$disNum',discount='$disNum',Snum='$goodsnum',Snetcontent='$Snetcontent',SimgPath='$uploadfile',
      Stype='$goodstype',State='$goodstate',Stime=now() where Sid=$goodsid";
      echo $sql1;
      if(mysql_query($sql1))
      {
         echo '数据更新成功'.'<br>';
      }else{
        echo '数据更新失败';
      }
    
     }


// $findvalue="select * from shopinfo order by Sid DESC limit 1";
// $result=mysql_query($findvalue);
// //="SELECT  Sid  FROM shopinfo order by Sid DESC limit 1";
// while($rows= mysql_fetch_array($result)){
//    $picNum= $rows["Sid"];
//    echo "目前商品的编码是". $picNum.'<br>';
// }
//根据现在插入的商品id，作为一个绑定，在商品图片介绍中，将存进来的图片全部放在一个字段表里面
$picPath=array();
 //打印三维数组$_FILES中的内容，查看一下存储上传文件的结构
 echo '<br>'.print_r($_FILES["myfile"]).'<br>';
 echo '<br>'.'数组的长度为：'.count($_FILES["myfile"],0).'<br>';
  echo '<br>'.'数组的长度为：'.count($_FILES["myfile"],1).'<br>';

$myfilelem=(count($_FILES["myfile"],1)-count($_FILES["myfile"],0))/5;
  echo '一共上传了'. $myfilelem.'张照片'.'<br>'; 
 //统计数组的长度，该数组是以name,type,size,error,tmp_name等五个元素组成
 //定义一个长的字符串，专门负责将全部的路径链接在一起，到时候使用分割符号将其分开
 for ($x=0; $x<=$myfilelem; $x++) {
  if (!empty($_FILES["myfile"]["name"][$x])) { //提取文件域内容名称，并判断
      //print $_FILES['myfile']['name'];
      //图片存放的路径
      $path='../goodsImg/';
      //允许上传的文件格式
     $tp = array("image/gif","image/jpeg","image/png");
     // $tp="image/jpeg";
    // 检查上传文件是否在允许上传的类型
   if(!in_array($_FILES["myfile"]["type"][$x],$tp))
    {
       echo "类型匹配未找到";
       exit;
    }//END IF
    $filetype = $_FILES['myfile']['type'][$x];
    if($filetype == 'image/jpeg'){
    $type = '.jpg';
    }
    if ($filetype == 'image/jpg') {
    $type = '.jpg';
    }
    if ($filetype == 'image/pjpeg') {
      $type = '.jpg';
    }
    if($filetype == 'image/gif'){
      $type = '.gif';
    }
    if($filetype == 'image/png'){
      $type = '.png';
    } 
    if($_FILES["myfile"]["name"][$x])
    {
     $today=date("YmdHis"); //获取时间并赋值给变量
     $file2 = $path.$today.$x.$type; //图片的完整路径
     $img = $today.$x.$type; //图片名称
     $flag=1;
   }//END IF
  if($flag) {
     if(move_uploaded_file($_FILES["myfile"]["tmp_name"][$x],$file2)){
    // $result=move_uploaded_file($_FILES["myfile"]["tmp_name"],$file2);
    // 将图片路径保存在数组里面
     $picPath[$x]=$file2;
     echo '<br>'.'当前字符的路径为'.$picPath[$x].'<br>';
     $allimg_pth=$allimg_pth.$file2.'*';
  };
   }
  }
  echo '<br>'.'全部路径'.$allimg_pth.'<br>';
}
//验证所有的图片的路径已经全部存进数组中，开始执行数据库插入语句，插入图片的时候，可以提前获得上一个图片的id,然后加1，设为下一个图片存放表的外键
 // for ($x=0; $x<=3; $x++) {
 //   echo $picPath[$x]."第".$x."张";
 //   //执行数据库语句
 //   }

     $sql1="update tb_proinfo set proImg_arr= '$allimg_pth' where Sid=$goodsid";
      echo $sql1;
      if(mysql_query($sql1))
      {
       echo "<script language='javascript' type='text/javascript'>";
       echo "alert('恭喜你，数据修改成功，现在正在跳转页面')";
       echo "</script>";
      echo "<meta http-equiv='Refresh' content='0;URL=Products.php'>";
      }else{
     echo "<script language='javascript' type='text/javascript'>";
       echo "alert('很遗憾，数据修改失败，现在正在跳转页面')";
       echo "</script>";
      echo "<meta http-equiv='Refresh' content='0;URL=Products.php'>";
      }
}
?>