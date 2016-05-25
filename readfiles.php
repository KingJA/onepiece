<?php
/**
 * Description:
 * Created by PhpStorm.
 * User: Shinelon
 * Date: 2016/5/23
 * Time: 11:02
 */
require_once "./libs/Db.php";


$dir = "imgs/";
$des = "一张美女图片";
$con=Db::getInstance()->conn();


if (is_dir($dir)) {
    if ($dh = opendir($dir)) {

        while (($file = readdir($dh)) !== false) {
            $url=$dir.$file ;
            $add="insert into  t_beauty(img_url,img_des)VALUES ('$url','$des')";//增
            $con->query($add);
            echo $add;
            echo "<br/>";

        }
        closedir($dh);
    }
}
