<?php
include('util.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en_US" xml:lang="en_US">
 <head>
 <meta http-equive="Content-Type" content=text/html charset=utf-8>
  <title> </title>
 </head>
 <body>
 <form method='post' action='upload.php' enctype="multipart/form-data">
<input type="file" name="image" />
<input type="submit" name="submit" value="上传" />
</form>
<table>
<?php
$ret = mysql_query('select * from image order by id desc');
echo $ret;
if ($ret) {
    while ($row = mysql_fetch_array($ret)) {
?>
<tr>
<td style='width:170px;'>
<img src="image.php?id=<?php echo $row['id'];?>" width="170" height="150" border="0">
<div style='text-align:center;'><?php
        echo $row['name'];
?></div>
<?php
        echo $row['date'];
?>
</td>
</tr>
<?php
    }
}
?>
</table>

 </body>
</html>

