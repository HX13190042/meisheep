<?php
include('util.php');
if ($_POST['submit']) {
    if ($_FILES['image']['size']) {
        $names = $_FILES['image']['name'];
        $arr   = explode('.', $names);
        $name  = $arr[0]; //图片名称
        $date  = date('Y-m-d H:i:s'); //上传日期
        $fp    = fopen($_FILES['image']['tmp_name'], 'rb');
        $type  = $_FILES['image']['type'];
        if (!$fp) {
            showInfo('读取图片失败！');
        } else {
           $image = addslashes(fread($fp, filesize($_FILES['image']['tmp_name'])));
           echo $image;
            if ($image) {
                $q      = "insert into image (name, pic, type, date) values ('$name','$image','$type','$date')";
                $result = mysql_query($q);
                if ($result) {
                    showInfo('上传成功！');
                } else {
                    showInfo('上传失败！');
                }
            } else {
                showInfo('请选择要上传的文件！');
            }
        }
    } else {
        showInfo('请选择要上传的文件！');
    }
}


function showInfo($info)
{
    echo "<html><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";
    echo "<meta http-equiv='refresh' content='1;url=index.php'>";
    echo "</head>";
    echo "<body>" . $info . "……</body>";
    echo "</html>";
}
?>