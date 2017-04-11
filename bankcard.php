<!DOCTYPE html>
<html>
<head>
<script charset="utf-8" src="js/jquery.min.js"></script>
<script charset="utf-8" src="js/bootstrap.min.js"></script>

<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/goodsDetails.css">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="yes" name="apple-touch-fullscreen">
<meta content="telephone=no" name="format-detection">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1;user-scalable=no;">
<title>银行卡管理</title>
<style type="text/css">
.leftarea{float: left;}
.rightarea{float: right;}
.info{border-bottom: 1px solid #e5e5e5; padding:10px; margin: 0 10px;}
.info:first-child{border-top: 1px solid #e5e5e5;}
.btn-area{text-align: center;padding-bottom: 10px;}
.button {
  display: inline-block;
  outline: none;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  font: 16px/100% 'Microsoft yahei',Arial, Helvetica, sans-serif;
  padding: .5em 2em .55em;
  text-shadow: 0 1px 1px rgba(0,0,0,.3);
  -webkit-border-radius: .5em; 
  -moz-border-radius: .5em;
  border-radius: .5em;
  -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.2);
  -moz-box-shadow: 0 1px 2px rgba(0,0,0,.2);
  box-shadow: 0 1px 2px rgba(0,0,0,.2);
  color: #fff;
}
/* orange */
.orange {
  color: #fef4e9;
  border: solid 1px #da7c0c;
  background: #F5D000;
  background: -webkit-gradient(linear, left top, left bottom, from(#faa51a), to(#f47a20));
  background: -moz-linear-gradient(top,  #faa51a,  #f47a20);
  filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#faa51a', endColorstr='#f47a20');
}
.orange:hover {
  color: #fff;
  background:#F5D000;
  background: -webkit-gradient(linear, left top, left bottom, from(#f88e11), to(#f06015));
  background: -moz-linear-gradient(top,  #f88e11,  #f06015);
  filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#f88e11', endColorstr='#f06015');
}
.orange:active {
  color: #fcd3a5;
  background: -webkit-gradient(linear, left top, left bottom, from(#f47a20), to(#faa51a));
  background: -moz-linear-gradient(top,  #f47a20,  #faa51a);
  filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#f47a20', endColorstr='#faa51a');
}
</style>
<?php
session_start();
include('util.php');
$sql="select * from userbankcard where Uid=".$_SESSION['userId'];
$result=mysql_query($sql);
?>
</head>
<body>
  <div class="gDetaContainer" style="background:#fff; margin-top:10px;">
    <header class="header">
      <div class="fix_nav">
        <div style="max-width:768px;margin:0 auto;background:#D91D37;position: relative;">
          <a class="nav-left back-icon" href="userPage.php">返回</a>
          <div class="tit">银行卡管理</div>
        </div>
      </div>
    </header>
  <div class="cardcontainner">
    <div class="cardlist">
<?php
while ($rows=mysql_fetch_array($result)) {
 
?>
      <div class=" info clearfix">
        <span class="leftarea"><?php echo $rows["cardnum"]?></span>
        <span class="rightarea"><?php echo $rows["carbank"]?>>></span>
      </div>

<?php
  }
?>
    </div>
    <br>
    <div class="btn-area">
     <a href="add_card.html"  class="button orange">+添加银行卡</a>
    </div>
  </div>
</div>
</body>
</html>