<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
</head>
</html>
<?php
    $conn = @mysql_connect("localhost","root","") //网页地址和登陆的用户名以及我们设置的密码
        or die("数据库连接失败，请检查你的网络,稍后再试试");//这句的意思是隐藏错误的显示还有就是在PHP语句加上@即可；
    mysql_select_db("shoppingproject");//连接我们所在phpMyAdmin里面创建的数据库的名字；
    mysql_query("set names 'utf8'");//为中文编码集
?>