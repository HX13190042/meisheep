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
<title>购物车</title>
<style type="text/css">

</style>
</head>
<?php
error_reporting(0);
session_start();//启用session
$arr=$_SESSION["mycar"];//从session中拿出二维数组
include 'util.php';
if(!isset($_SESSION['userType'])){
   $userstype="";
  }       
else{
     $userstype=$_SESSION['userType'];
     $username =$_SESSION['username'];
}

?>
<body>
	<div class="cartContainer">
		<header class="header">
			<div class="fix_nav">
				<div style="max-width:768px;margin:0 auto;background:#D91D37;position: relative;">
					<a class="nav-left back-icon"  href="index.php">返回</a>
					<div class="tit">购物车</div>
				</div>
			</div>
		</header>
	<article class="cartContent" >
		<div class="cartAll">
			<ul class="listall">
			<?php
             $result = empty($arr);
			if($result==true){
				echo "<p class='cartnull' style='text-align:center; height:490px; line-height:490px; color:#F35E8C'>购物车空空如也</p>";
			}else{
			//还需要判断购物车是够为空，如果为空的话，设置为一个空空如也的页面
			$cartlength=count($arr);
			// echo '$cartlength购物车的商品种类为：'.$cartlength;
			$i=0;
			foreach($arr as $a)//遍历这个二维数组
			{
				//开始判断每个首先获得的id值，然后在数据库里面查询，将商品的全部具体信息传递过来
				$sql="select * from shopinfo where Sid=".$a["pid"];
				//echo $sql;
				$resultall=mysql_query($sql);
				//echo '<br>'.'商品的数量为'.$a["num"];
				// $rowlength=count($row=mysql_fetch_array($resultall));

				while($row=mysql_fetch_array($resultall)){

			   ?>
				<li class="list-group-item clearfix">

					<div class="demo1" style="border-bottom:1px solid #e5e5e5;">
						<input type="checkbox" checked name="check1" value="check<?php  echo $i;?>" id="check<?php  echo $i;?>"><label for="check<?php  echo $i;?>"><?php echo $row["Sbrand"]?></label>
					</div>
					<div class="hproduct">
						<div class="goods-pic">
							 <?php echo'<img src="'.$row['SimgPath'].'" class="img-responsive">'?>
						</div>
						<div class="goods-message clearfix">
							<p class="p-title"> <a href="#"><?php echo $row["Sname"]?></a></p>
							 <p class="p-color"><?php echo $row["Squality"]?>g</p>
						 	 <p class="p-origin clearfix" style="color:#F84572;">￥
		                        <em class="p-price"><?php echo $row["cutprice"]?></em>
		                        <a class="delete-icon" href="deleteGoods.php?id=<?php echo $row['Sid']?>"></a>
		                     </p>
							<div class="count"><span class="reduce">-</span><input class="count-input" type="text" value="<?php echo $a['num'];?>"/><span class="add">+</span></div>
							 <p class="xiaojisuan"><span>小计￥</span><span class="xiaoji"><?php echo $row["cutprice"]*$a['num']?></span></p>
							 <p style="display:none" class="cartGoods"><?php echo $row["Sid"]?></p>
							 <p style="display:none" class="cartname"><?php echo $row["Sname"]?></p>
						</div>

					</div>
				</li>
				<?php
						}
						$i=$i+1;
					}
				}
				// echo '$i的值为'.$i;
				?>

			</ul>
		</div>
	</article>
	<!--底部结算栏目-->
	<div class="fixed-foot clearfix">
	<div class="fixed_inner">
	<div class="demo1" style="float:left;width:15%; height:100%;background:#dddddd;">
		<input type="checkbox" checked name="check5" value="check5" id="check5"><label for="check5" style="padding-left: 25px;margin-top:15px;">全选</label>
	</div>
	<p style="padding:0;margin:0;text-align:center; float:left;height:100%;display:inline-block;width:70%; line-height:50px; background:#f7f7fa;">合计：<em class="red f22">¥<em id="totalPrice">0</em></em></p>
	<a class="jiesuan"  style="float:right;height: 50px;width:15%; line-height:50px;background:#e21323;color:#fff;text-align:center;">去结算</a>
	</div>
	</div>
	</div>
	<footer class="footer">
	  <div class="foot-con">
		  <div class="foot-con_2">
			    <a href="index.php" >
				    <i class="navIcon home"></i>
				    <span class="text">首页</span>
			    </a>
			    <a href="classiFication.php">
				    <i class="navIcon sort"></i>
				    <span class="text">分类</span>
			    </a>
			    <a href="shoppingCart.html" class="active">
				    <i class="navIcon shop"></i>
				    <span class="text">购物车</span>
			    </a>
			    <a class="judgemen" >
				    <i class="navIcon member"></i>
				    <span class="text">我的</span>
				    <span class="usertype"><?php echo  $userstype?></span>
			    </a>
		  </div>
	  </div>
	</footer>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		var numgoods;//商品的数量
		var temp;
		var addself=0;
		var alltotal=0;
		var xiaojisuan1=0;
		var xiaojisuan2=0;
		var cartGoods;
		var allcheck=0;
		var statenum;
		var cartname;
		//判断当前的按钮是处于什么样的状态，如果是选中的话，下面的全部价钱也会跟着改变
		//每次添加点击事件的时候，都要更改购物车的arr的状态
		$('.add').click(function(){
			alltotal=0;
			temp=$(this).siblings("input").val().trim();
			addself=parseInt(temp)+1;;
			$(this).siblings("input").val(addself);
			xiaojisuan2=$(this).parent().parent().find('.p-price').text();
			cartGoods=$(this).parent().parent().find('.cartGoods').text();
			cartname=$(this).parent().parent().find('.cartname').text();
			addself=addself*parseInt(xiaojisuan2);
			$(this).parent().parent().find('.xiaoji').text(addself);
			//开始遍历全部的小计的数量，进行全部数量的相加
			//选项总个数
			$(".list-group-item .demo1 :checkbox").each(function(){  
				statenum=$(this).attr('checked');	
				if(statenum==true){
					alltotal+=parseInt($(this).parent().parent().find('.xiaoji').text());

				}
		    })
		    $('#totalPrice').text(alltotal);
		     // goodsdeta(cartGoods,cartname);
		});
		$('.reduce').click(function(){
			alltotal=0;
			temp=$(this).siblings("input").val().trim();
			if(parseInt(temp)<2){
			  $(this).siblings("input").val('1');
			}else{
				addself=parseInt(temp)-1;;
				$(this).siblings("input").val(addself);
				xiaojisuan2=$(this).parent().parent().find('.p-price').text();
				addself=addself*parseInt(xiaojisuan2);
				$(this).parent().parent().find('.xiaoji').text(addself);
			//选项总个数
			$(".list-group-item .demo1 :checkbox").each(function(){  
				statenum=$(this).attr('checked');	
				if(statenum==true){
					 alltotal+=parseInt($(this).parent().parent().find('.xiaoji').text());

				}
		    })
		    $('#totalPrice').text(alltotal);
			}

		});
		$('#totalPrice').text(alltotal);
		var num;
		var temprice;		
		var tempstate=false;
		var temptotal;
		//此处判断 的是开始进入页面的状态
		var checkstate=$('#check5').attr("checked");
		if(checkstate==true){
			$(".list-group-item .demo1 :checkbox").each(function(){  
			   alltotal+=parseInt($(this).parent().parent().find('.xiaoji').text());
			 })
			$('#totalPrice').text(alltotal);
		}

			//判断check5的点击状态
			$('#check5').click(function() {
			 alltotal=0;
			if(tempstate==false){
				$('.demo1 :checkbox').attr("checked", false);
				$('#totalPrice').text(0);
				tempstate=true;
			}else{
				$('.demo1 :checkbox').attr("checked", true);
				//将全部的数量以及单价相加
				$(".list-group-item .demo1 :checkbox").each(function(){  
					alltotal+=parseInt($(this).parent().parent().find('.xiaoji').text());
				})
				$('#totalPrice').text(alltotal);
				tempstate=false;
			}
		})
	     	//当任意一个按钮被点击的时候，判断剩下的复选框的状态
	     	var single=true;
			$(".list-group-item .demo1 :checkbox").click(function(){
				alltotal=0;
				allchk();
				$(".list-group-item .demo1 :checkbox").each(function(){  
					single=$(this).attr('checked');	
					if(single==true){
					alltotal+=parseInt($(this).parent().parent().find('.xiaoji').text());
					}

			    })
			     $('#totalPrice').text(alltotal);
			});
			//检测全选按钮是否在选中或者未选中状态
	     	function allchk(){
			var chknum = $(".list-group-item .demo1 :checkbox").size();//选项总个数,个数为4
			var chk= 0;
			//alert(chk);
			var statenum;
			var total;
			var temptotal=0;
			$(".list-group-item .demo1 :checkbox").each(function(){  
				statenum=$(this).attr('checked');	
				if(statenum==true){
					chk++;

				}
		    });
			if(chknum==chk){//全选
				$("#check5").attr("checked",true);
			}else{//不全选
				$("#check5").attr("checked",false);
			}			 
			}

		    $('.jiesuan').click(function(){
			//在点击结算的时候，可以实现商品的数量的存储以及商品的id，则在订单详情页可以显示
			var tArray = new Array();   //先声明一维
			var chnlong=$(".list-group-item .demo1 :checkbox").size();
			var k=0;
			var singleto=0;
			var numtotal=0;
			var style="";
			var imgpath="";
			var allnum=0;
			$(".list-group-item .demo1 :checkbox").each(function(){  
				statenum=$(this).attr('checked');
				if(statenum==true){
				//id
			    cartarr=$(this).parent().parent().find('.cartGoods').text();
			    //名字
			    namearr=$(this).parent().parent().find('.cartname').text();	
			    //选中的单件商品的总价钱
			    singleto= $(this).parent().parent().find('.xiaoji').text();	
			    //计算全部商品的数量
			    allnum+=parseInt($(this).parent().parent().find('.count-input').val());
			    style=$(this).parent().parent().find('.p-color').text();
			    imgpath=$(this).parent().parent().find('.goods-pic img').attr("src");
			    //商品的数量
			   	numtotal= $(this).parent().parent().find('.count-input').val();						
			    tArray[k]=new Array(cartarr, namearr, singleto,	numtotal,style,imgpath); //声明二维，每一个一维数组里面的一个元素都是一个数组；
			    k++;
				}
		    });
		   var tempto=$('.f22').text();
		    	 goodsdeta(tArray,tempto, allnum);
		    });
		   

	});
</script>
<script type="text/javascript">
	function goodsdeta(argument1,argument2,argument3) {
    document.write("<form action='order_session.php' method='post' name='form2' style='display:none'>");  
    document.write("<input type='hidden' name='id' value='"+argument1+"'/>");
     document.write("<input type='hidden' name='idtotal' value='"+argument2+"'/>");
     document.write("<input type='hidden' name='allnum' value='"+argument3+"'/>");
    document.write("</form>");  
    document.form2.submit(); 
}
</script>
<script type="text/javascript">
  $('.judgemen').click(function(){
    var temp=$(this).find('.usertype').text();
      if(temp==""){
        parent.location.href='loginPage.html';
      }else{
         parent.location.href='userPage.php';
      }
  });
</script>
</html>
<!--则需要将选中的物品全部传递到订单详情页面将选中的商品的id，存储在一个数组里面，然后一起post到订单页面，然后进行id的逐步显示-->
