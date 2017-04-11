<?php
//负责用户的登录注销等功能
include("util.php");
session_start();
if(isset($_REQUEST['flag'])){
$flag=$_REQUEST['flag'];
}
switch ($flag){		
  case "login":	
	login();
	break;
  case "logout":   
  logout();
  break;
  //进行用户地址的添加，并且是绑定当前用户的id，只能在当前用户的ID的账号里面添加
  case "address":
  address();
  break;
  case "editaddress":
  editaddress();
}
/*用户登录*/
function login(){	
if(!isset($_POST['submit'])){
    Header("Location: loginPage.html"); 
}
$logintype=$_POST['logintype'];
$loginPwd=$_POST['loginPwd'];  
//获取传递的登录的用户名以及密码，进行数据库查询以及验证	
//echo	$logintype;
//echo    $loginPwd;
$check_query=mysql_query("select Uname ,Uid from users where Uaccount='$logintype' and   Upwd='$loginPwd'");
//获取该数据的一行信息
if($result = mysql_fetch_array($check_query)){
      $var1= $result['Uname']; 
      $var2=$result['Uid'];
     //负责处理登录表单传递回来的信息，如果是信息正确，则传递信息跳转到用户页面，如果登录失败则重新跳转到登录页面
     //显示已经是获取数据并且传递数据成功
     //开始记录session
     //根据用户名称,以及用户注册的账号
       $_SESSION['username'] = $var1;
       $_SESSION['userType'] = $logintype;
       $_SESSION['userId'] =$var2;       
       echo "<script language='javascript' type='text/javascript'>";
       echo "alert('恭喜你，登录成功，现在正在跳转页面')";
       echo "</script>";
       echo '<script language=javascript>window.location.href="userPage.php"</script>'; 
       // echo "<meta http-equiv='Refresh' content='0;URL=userPage.php'>";
       exit;
   }else{
       echo "<script language='javascript' type='text/javascript'>";
       echo "alert('输入的用户信息有误，请重新输入账号以及密码')";
       echo "</script>";
        echo '<script language=javascript>window.location.href="loginPage.html"</script>'; 
      // echo "<meta http-equiv='Refresh' content='5;URL=loginPage.html'>";
   }

}
 function logout()
{
        unset($_SESSION['userType']);
        unset($_SESSION['username']);
        echo '<script>alert("注销登陆成功，页面正在跳转");</script>';
      //  echo "<script>alert('用户尚未登录，现在跳转登录页面')；</script>";
        echo "<meta http-equiv='Refresh' content='1;URL=index.php'>";
        exit;
}
function address()
{
      //用户的登录账号以及用户的ID
      $userType= $_SESSION['userType'];
      $userid=$_SESSION['userId'];
      $consignee=$_POST['consignee'];
      $phone=$_POST['phone'];
      $area=$_POST['area'];
      $address=$_POST['address'];
      // $addressAll=$area.$address;
      //根据当前用户的id，利用外键，添加的用户信息存储到数据库里面
      //$sqlinsert="insert into t1(username,password) values('{$name}','{$pwd}')";
      $sql="insert into tb_userAddress(conname,address,detailed_add,phone,Uid) values('$consignee','$address','$area','$phone',$userid)";
      $query = mysql_query($sql);
      if($query){
      echo '<script>alert("地址添加成功");</script>';
      echo "<meta http-equiv='Refresh' content='1;URL=shipAddress.php'>";
      }else{
      echo '<script>alert("地址添加失败");</script>';
      echo "<meta http-equiv='Refresh' content='1;URL=addAddress.html'>";
      }
      }
//用户修改收货人信息
function editaddress()
{
      //用户的登录账号以及用户的ID，
      $addid=$_GET["addid"];
      // echo $addid;
      $consignee=$_POST['consignee'];
      $phone=$_POST['phone'];
      $region=$_POST['region'];
      $address=$_POST['address'];
      //根据当前用户的id，利用外键，添加的用户信息存储到数据库里面
      //$sqlinsert="insert into t1(username,password) values('{$name}','{$pwd}')";
      //
      //判断用户提交的是什么类型的按钮，如果是保存，则保存到数据库，如果为删除按钮，则将该字段的内容记录删除
      if ( !empty( $_POST['Submit1'] ) ) {
        $sql="update tb_useraddress set conname='$consignee',phone='$phone',address='$region',detailed_add='$address' where userAddressId=$addid";
        // echo $sql;
        $query = mysql_query($sql);
        if($query){
        echo '<script>alert("地址修改成功");</script>';
        echo "<meta http-equiv='Refresh' content='1;URL=shipAddress.php'>";
        }else{
        echo '<script>alert("地址修改失败");</script>';
        echo  "<meta http-equiv='Refresh' content='1;URL=address_edit.php '>";
        }
      }
      if ( !empty( $_POST['Submit2'])) {
        $sql="delete from  tb_useraddress  where userAddressId=$addid";
        // echo $sql;
        $query = mysql_query($sql);
        if($query){
        echo '<script>alert("删除地址成功");</script>';
        echo "<meta http-equiv='Refresh' content='1;URL=shipAddress.php'>";
        }else{
        echo '<script>alert("删除地址失败");</script>';
        echo  "<meta http-equiv='Refresh' content='1;URL=address_edit.php '>";
        }        
      }
      }

  ?>
