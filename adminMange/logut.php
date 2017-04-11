<?php 
session_start();
if(isset($_REQUEST['flag'])){
unset($_SESSION['$adminname']);
 echo "<script language = javascript>window.parent.location.href='login.html'</script>";
}
?>