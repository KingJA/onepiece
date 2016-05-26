<?php
/**
 * Description:
 * Created by PhpStorm.
 * User: Shinelon
 * Date: 2016/5/23
 * Time: 18:25
 */
header("Content-type: text/html; charset=utf-8");
require_once "../service/doUpload_class.php";
$upload = new doUpload_class("myfile");
$upload->upload();
////print_r($_FILES);
//$file = $_FILES['myfile'];
//$fileName = $_FILES['myfile']['name'];
//$tmpName = $_FILES['myfile']['tmp_name'];
//$error = $_FILES['myfile']['error'];
//$extaArray = explode(".", $fileName);
//$ext = strtolower(end($extaArray));
////$ext=pathinfo($fileName,'extension');
//$allowExt = array("jpg", "jpeg", "png", "git");
//
//if ($error == UPLOAD_ERR_OK) {
//    if ($file['size'] > 2097152) {
//        exit("上传文件过大");
//    }
//
//    if (!in_array($ext, $allowExt)) {
//        exit("不允许的文件类型");
//    }
//    if (!is_uploaded_file($tmpName)) {
//        exit("不是通过POST方式上传而来的");
//    }
//    if (!getimagesize($tmpName)) {
//        exit("不是图片文件");
//    }
////目录不存在则创建目录
//    $path = "../files";
//    if (!file_exists($path)) {
//        mkdir($path, 0777, true);
//        chmod($path, 0777);
//    }
//    //创建唯一的文件名
//    $newName = md5(uniqid(microtime(true), true)) . "." . $ext;
//    if (move_uploaded_file($tmpName, $path . "/" . $newName)) {
//        echo "文件" . $fileName . "上传成功！";
//    } else {
//        echo "文件" . $fileName . "上传失败！";
//    }
//
//} else {
//    switch ($error) {
//        case 1:
//            echo "上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值";
//            break;
//        case 2:
//            echo "上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值";
//            break;
//        case 3:
//            echo "文件只有部分被上传";
//            break;
//        case 4:
//            echo "没有文件被上传";
//            break;
//        case 6:
//            echo "找不到临时文件夹";
//            break;
//        case 7:
//        case 8:
//            echo "系统错误";
//            break;
//        default:
//            echo "未知错误";
//            break;
//
//    }
//}

//move_uploaded_file($tmpName, $path . "/" . iconv("UTF-8", "gbk", $fileName))
