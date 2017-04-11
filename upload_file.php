<?php
if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  }
else
  {
  echo "Upload: " . $_FILES["file"]["name"] . "<br />";
  echo "Type: " . $_FILES["file"]["type"] . "<br />";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];
  }

  $txtcomm=$_POST['txtcomm'];
  // echo $txtcomm;
  include 'util.php';
  session_start();
  $username=$_SESSION['username'];
  $goodid=$_POST['goodid'];
  // echo $username;
  // echo $goodid;

  // 对图片进行处理

  function photo_type($photo_file)
  {

    $position=strrpos($photo_file,".");
     global $suffix;
     $suffix=substr($photo_file,$position+1,strlen($photo_file)-$position);
     return $suffix;
  }
   echo $_FILES['file']['name'].'商品标识性图片的类型'.'<br>';
   $ext=photo_type($_FILES['file']['name']);
   $upload_dir='imgcomment/';
    if($suffix!="jpg" && $suffix!="gif" && $suffix!="png")
    {
     die("不支持这个类型的图片");
    }
//需要上传的文件的路径
  $uploadfile=$upload_dir.time().".".$suffix;
  //保存在数据库的文件的名字
  $imgload=time().".".$suffix;
//此处用到的是文件的需要上传的路径
     if(move_uploaded_file($_FILES['file']['tmp_name'],$uploadfile))
     {
      $sql1="insert into tb_goodcomm(Sid,username,star,comment,commpic,time) values ($goodid,'$username',5,'$txtcomm','$imgload',now())";

      echo '<br>'.$sql1;
      if(mysql_query($sql1))
      {
      echo "<script language='javascript' type='text/javascript'>";
       echo "alert('恭喜你，登录成功，现在正在跳转页面')";
       echo "</script>";
       echo '<script language=javascript>window.location.href="order_management.php"</script>'; 
      }else{
        echo "<script language='javascript' type='text/javascript'>";
       echo "alert('发表评论失败，现在正在跳转页面')";
       echo "</script>";
       echo '<script language=javascript>window.location.href="comment.php"</script>'; 
      }
    }
?>