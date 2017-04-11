<!DOCTYPE html>
<html>
<head>
<script charset="utf-8" src="js/jquery.min.js"></script>
<script src="js/jquery-2.1.4.js"></script> 
<script charset="utf-8" src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/loginPage.css">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="yes" name="apple-touch-fullscreen">
<meta content="telephone=no" name="format-detection">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1;user-scalable=no;">
<title>发表评价</title>
</head>
<?php session_start();
include ('util.php');
$goodid=$_GET['goodid'];
$username=$_SESSION['username'];
$useraccount=$_SESSION['userType'];
// echo $username.'<br>';
// echo $useraccount.'<br>';
?>
<style type="text/css">
html{font-size: 100%;}
.img_upload{background:url(images/shangchuanimg.png) no-repeat left top;}
.file0{opacity: 0;width:2rem;height:2rem;}
.img0{width:100%; height: auto; border: none;}
.comm_button{margin-top: 5rem;}
.imgup{width:100%; margin-top:1.5rem; padding-top:10px;}
.comm_all {margin-top: -1.2rem}
</style>
<body>
<div class="loginContainenr">
	<header class="header">
		<div class="fix_nav">
			<div style="max-width:768px;margin:0 auto;background:#D91D37;position: relative;">
				<a class="nav-left back-icon" href="order_management.php">返回</a>
				<div class="tit">发表评价</div>
			</div>
		</div>
	</header>
<form action="upload_file.php" method="post"  enctype="multipart/form-data">
	<div class="comm_all clearfix">
		<div class="order-list-Below clearfix">
        <input name='goodid' value='<?php echo $goodid;?>' style="display:none;">
		<p class="order_comm_title">商品评价:</p>
	    <ul>
	      <li class="on"></li>
	      <li class="on"></li>
	      <li class="on"></li>
	      <li class="on"></li>
	      <li class="on"></li>
	    </ul>
		</div>
        <div class="comm_text">
        <textarea class="txt-area" name="txtcomm" placeholder="这个商品满足你的期待吗？说说你的使用心得，分享给想买的他们吧" rows="5"></textarea> 
        <div class="comm_num"><span>200</span></div>
       </div>
        <div class="comm_text">
        <div class="comm_title_upload"><span>图片上传</span><span>1</span></div>
        <div class="img_upload">
        <input type="file" name="file" id="file" class="file0" />
        <div class="imgup">
            <img src="" id="img0" class="img0"></div>
        </div>
      </div>
      <div class="comm_button"><button>发表评价</button></div>
	</div>
</div>
</form>
<script type="text/javascript">
$(".order-list-Below ul li").click(
    function(){
        var num = $(this).index()+1;
        var len = $(this).index();
        var thats = $(this).parent(".order-list-Below ul").find("li");
        if($(thats).eq(len).attr("class")=="on"){
            if($(thats).eq(num).attr("class")=="on"){
                $(thats).removeClass();
                for (var i=0 ; i<num; i++) {
                    $(thats).eq(i).addClass("on");
                }
            }else{
                $(thats).removeClass();
                for (var k=0 ; k<len; k++) {
                    $(thats).eq(k).addClass("on");
                }
            }
        }else{
            $(thats).removeClass();
            for (var j=0 ; j<num; j++) {
                $(thats).eq(j).addClass("on");
            }
        }
    }
);
</script>

<script>    
$(".file0").change(function(){
    var objUrl = getObjectURL(this.files[0]) ;
    console.log("objUrl = "+objUrl) ;
    if (objUrl) {
        $("#img0").attr("src", objUrl) ;
    }
}) ;
//建立一個可存取到該file的url
function getObjectURL(file) {
    var url = null ; 
    if (window.createObjectURL!=undefined) { // basic
        url = window.createObjectURL(file) ;
    } else if (window.URL!=undefined) { // mozilla(firefox)
        url = window.URL.createObjectURL(file) ;
    } else if (window.webkitURL!=undefined) { // webkit or chrome
        url = window.webkitURL.createObjectURL(file) ;
    }
    return url ;
}
</script>
</body>
</html>