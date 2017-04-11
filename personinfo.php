<!DOCTYPE html>
<html>
<head>
<script charset="utf-8" src="js/jquery.min.js"></script>
<script charset="utf-8" src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/style.css">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="yes" name="apple-touch-fullscreen">
<meta content="telephone=no" name="format-detection">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1;user-scalable=no;">
<title>个人信息</title>
<?php
session_start();
include('util.php');
$sql="select * from users where Uid=".$_SESSION['userId'];
$result=mysql_query($sql);
 
?>
</head>
<body>
  <div class="gDetaContainer" style="background:#fff">
    <header class="header">
      <div class="fix_nav">
        <div style="max-width:768px;margin:0 auto;background:#D91D37;position: relative;">
          <a class="nav-left back-icon" href="userPage.php">返回</a>
          <div class="tit">个人信息</div>
        </div>
      </div>
    </header>
    <div class="userinfo">
        <div>
          <?php
          while($rows=mysql_fetch_array($result)){
          ?>
            <div class=" info clearfix" style="border-top:1px solid #e5e5e5">
            <span class="leftarea">用户ID</span><span class="rightarea"><?php echo $rows["Uid"]?></span>
            </div>
             <div class="info clearfix">
            <span class="leftarea">用户账号</span><span class="rightarea"><?php echo $rows["Uaccount"]?></span>
             </div>
             <div class=" info clearfix">
            <span class="leftarea">用户名</span><span class="rightarea"><?php echo $rows["Uname"]?></span>
             </div>
          <?php
            }
          ?>
        </div>
    </div>
</div>
</body>
</html>