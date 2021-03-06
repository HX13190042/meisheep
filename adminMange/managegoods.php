<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>商品详情信息上传</title>
    <link rel="stylesheet" media="screen" href="css/styles.css" >
    <script src="js/jquery-2.1.4.js"></script>
    <style>
    .contact_form{padding-top:40px;}
    .title {background-color:rgba(0,0,0,0.56); text-align:center; width:100%; position:fixed; top:0; left:0; padding:5px 0;}
    .title a {color:#FFF; text-decoration:none; font-size:16px; font-weight:bolder; line-height:24px;}
    </style>
</head>
<body>
<?php 
session_start();
include ('util.php');
$goodsid=$_GET["id"];
 // echo '传递的商品的id是'.$goodsid;
$sql="select * from  shopinfo where Sid=$goodsid";
$result=mysql_query($sql);
while($rows=mysql_fetch_array($result)){

?>
<div align="center">
<table border="1" width="47%" height="250" style="border-width: 0px">
    <!-- MSTableType="layout" -->
    <tr>
        <td style="border-style: none; border-width: medium">　
        <form class="contact_form" action="updategoods.php" method="post" enctype="multipart/form-data">
      <ul class="proinfo">
        <li>
             <h2>商品的具体信息</h2>
             <span class="required_notification">* 表示必填项</span>
        </li>
        <li>
            <label for="name">编号:</label>
            <input type="text"  name="Sid" value="<?php echo $rows['Sid']?>"  required />
        </li>
        <li>
            <label for="name">商品标题:</label>
            <input type="text"  name="Sname" value="<?php echo $rows['Sname']?>"  required />
        </li>
        <li>
            <label for="name">商品小标题:</label>
            <input type="text"  name="Stitle" value="<?php echo $rows['Stitle']?>"  required />
        </li>
        <li>
            <label for="name">商品原价:</label>
            <input type="text" name="Sprice" value="<?php echo $rows['Sprice']?>"  required />
        </li>
        <li>
            <label for="name">商品净含量:</label>
            <input type="text" name="Squality" value="<?php echo $rows['Squality']?>"  required />
        </li>
        <li>
            <label for="name">商品种类:</label>
            <input type="text" name="Species" value="<?php echo $rows['Species']?>"  required />
        </li>
        <li>
            <label for="name">商品折后价:</label>
            <input type="text" name="disSprice" value="<?php echo $rows['cutprice']?>"   required />
        </li>
        <li>
            <label for="name">商品折扣:</label>
            <input type="text" name="disNum" value="<?php echo $rows['discount']?>"   required />
        </li>
        <li>
            <label for="name">商品库存:</label>
            <input type="text" name="Snum" value="<?php echo $rows['Snum']?>"  required />
        </li>
<!--         <li>
            <label for="name">商品资料:</label>
            <input type="text" name="Snetcontent" value="<?php echo $rows['Snetcontent']?>"  required />
        </li>
 -->
        <li>
            <label for="email">商品类型:</label>
            <select name="Stype"  style="height:30px; width:260px; padding:5px 8px;background: #fff url(images/red_asterisk.png) no-repeat 98% center;box-shadow: 0 0 5px #5cd053;">
            <option value="面膜">面膜</option>
            <option value="洁面卸妆">洁面卸妆</option>
            <option value="水乳面霜">水乳面霜</option>
            <option value="防晒隔离">防晒隔离</option>
            <option value="遮瑕修容">遮瑕修容</option>
            <option value="基础底妆">基础底妆</option>
            <option value="眼部彩妆">眼部彩妆</option>
            <option value="唇部彩妆">唇部彩妆</option>
            <option value="眉部彩妆">眉部彩妆</option>
            <option value="唇部护理">唇部护理</option>
            <option value="眼部护理">眼部护理</option>
            <option value="精华精油">精华精油</option>
            <option value="身体护理">身体护理</option>
            <option value="美护美发">美护美发</option>
            <option value="口腔护理">口腔护理</option>
            </select>
        </li>
        <li>
            <label for="website">商品状态:</label>
            <select name="State"  style="height:30px; width:260px; padding:5px 8px;background: #fff url(images/red_asterisk.png) no-repeat 98% center;box-shadow: 0 0 5px #5cd053;">
            <option value="<?php echo $rows['State']?>" ><?php echo $rows['State']?></option>
            <option value="无">无</option>
            <option value="新品">新品</option>
            <option value="尖货">尖货</option>
            <option value="最新活动">最新活动</option>
            </select>
        </li>
        <li>
            <label for="message">商品详情描述:</label>
            <textarea name="Snetcontent" cols="40" rows="6" required >
                <?php echo $rows['Snetcontent']?>
            </textarea>
        </li>
       <!--  <li>提示：图片必须全部重新上传，此次更改原来图片将会全部丢失</li> -->
        <li>
        <!--此图片作为商品列表时显示的图片，商品的详情图片则会在同一时间上传，但是详情图片单独保存在另外一个数据库里面-->
            <label for="name">商品标志图片:</label>
            <input name="myform" type="file"  value="浏览" >
        </li>
<?php }?>
        <li>
            <label for="name">产品介绍:</label>
            <input name='myfile[]' type="file"  value="浏览" >           
        </li>
        <li>
        <li>
            <button class="submit"  id="addimg" type="button" name="update">继续添加图片</button>
        </li>
        <li>
            <button class="submit" type="submit" name="update">提交</button>
        </li>
    </ul>
</form></td>
    </tr>
</table>
</div>
<script type="text/javascript">
    $("#addimg").click(function(){
         $(".proinfo li:eq(14)").append('<li><label for="name">产品介绍:</label> <input type="file"  name="myfile[]" value="浏览" > </li>');
});
</script>
</body>
</html>