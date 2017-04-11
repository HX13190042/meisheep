<!DOCTYPE html>
<html>
<head>
	<title>管理员列表列表</title>
	<meta charset="utf-8">
<link href="css/shop.css" type="text/css" rel="stylesheet" />
<link href="css/Sellerber.css" type="text/css"  rel="stylesheet" />
<link href="css/bkg_ui.css" type="text/css"  rel="stylesheet" />
<link href="font/css/font-awesome.min.css"  rel="stylesheet" type="text/css" />
</head>
<?php 
include ('util.php');
$sql ="select * from tb_admin";
$result=mysql_query($sql);
?>
<div class="margin Competence_style" id="page_style">
    <div class="operation clearfix">
<button class="btn button_btn btn-danger" type="button" onclick=""><i class="fa fa-trash-o"></i>&nbsp;删除</button>
<a href="add_administrator.html"  class="btn button_btn bg-deep-blue" title="添加管理员"><i class="fa  fa-edit"></i>&nbsp;添加管理员</a>
   <div class="search  clearfix">
   <input name="" type="text"  class="form-control col-xs-8"/><button class="btn button_btn bg-deep-blue " onclick=""  type="button"><i class="fa  fa-search"></i>&nbsp;搜索</button>
</div>
</div>
<div class="compete_list">
       <table id="sample_table" class="table table_list table_striped table-bordered dataTable no-footer">
		 <thead>
			<tr>
			  <th class="center"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
			  <th>编号</th>
			  <th>登录名</th>
			  <th>手机</th>
              <th>邮箱</th>
              <th>加入时间</th>
			  
			  <th class="hidden-480">操作</th>
             </tr>
		    </thead>
             <tbody>
               <?php 
				  while ($rows=mysql_fetch_array($result)) {

				  ?>
				<tr>
				<td class="center"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
				<td><?php  echo $rows['id']?></td>
				<td><?php  echo $rows['adminname']?></td>
				<td ><?php  echo $rows['phone']?></td>
				<td><?php  echo $rows['email']?></td>
                <td><?php  echo $rows['time']?></td>
				<td class="td-manage">
                 <a title="编辑"  href="update_administrator.php?adminid=<?php  echo $rows['id']?>" class="btn button_btn bg-deep-blue">编辑</a>        
                 <a title="删除"  class="btn button_btn btn-danger">删除</a>
                <!--  <a title="查看" href="javascript:;" onclick="Competence_View(this,'1')" class="btn button_btn btn-green">查看</a> -->
				</td>
			   </tr>
			   <?php 
			}
			   ?>
		      </tbody>
	        </table>
     </div>
</div>
</body>
</html>