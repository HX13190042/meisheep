<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="css/shop.css" type="text/css" rel="stylesheet" />
<link href="css/Sellerber.css" type="text/css"  rel="stylesheet" />
<link href="css/bkg_ui.css" type="text/css"  rel="stylesheet" />
<link href="font/css/font-awesome.min.css"  rel="stylesheet" type="text/css" />
</head>
<style>
html,body
{
height:100%;
width:100%;
line-height:100%;
}
body{line-height: 100%; text-align:center;vertical-align:middle; }
#center{ MARGIN-RIGHT: auto;MARGIN-LEFT: auto;width: 100%;height: 585px;line-height:200px;vertical-align:middle; }
.mainbody{background: url(../images/loginbg3.png) no-repeat center center; width: 100%; height: 585px;color: #fff;font-size: 25px;}
</style>
<body class="login_style">
<div id="center" class="mainbody">
<?php session_start();
 echo '欢迎你，亲爱的管理员'.$_SESSION['$adminname'];
 ?>
</div>
</body>
</html>
