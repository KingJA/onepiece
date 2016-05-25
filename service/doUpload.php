<?php
/**
 * Description:
 * Created by PhpStorm.
 * User: Shinelon
 * Date: 2016/5/23
 * Time: 18:25
 */
header("Content-type: text/html; charset=utf-8");
//print_r($_FILES);
$file=$_FILES['myfile'];
$fileName = $_FILES['myfile']['name'];
$tmpName = $_FILES['myfile']['tmp_name'];
$error = $_FILES['myfile']['error'];
$extaArray=explode(".",$fileName);
$ext=strtolower(end($extaArray));
$allowExt=array("jpg","jpeg","png","git");

if ($error== UPLOAD_ERR_OK) {
    if ($file['size'] > 2097152) {
        exit("上传文件过大");
    }

    if (!in_array($ext,$allowExt)) {
        exit("不允许的文件类型");
    }



    if (move_uploaded_file($tmpName, "../files/" . iconv("UTF-8", "gbk", $fileName))) {
        echo "文件" . $fileName . "上传成功！";
    } else {
        echo "文件" . $fileName . "上传失败！";
    }

} else {
    switch ($error) {
        case 1:
            echo "上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值";
            break;
        case 2:
            echo "上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值";
            break;
        case 3:
            echo "文件只有部分被上传";
            break;
        case 4:
            echo "没有文件被上传";
            break;
        case 6:
            echo "找不到临时文件夹";
            break;
        case 7:
        case 8:
            echo "系统错误";
            break;
        default:
            echo "未知错误";
            break;

    }
}
