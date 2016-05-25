
<?php
/**
 * Description: 获取图片列表
 * Created by PhpStorm.
 * User: Shinelon
 * Date: 2016/5/23
 * Time: 14:12
 */

require_once "../libs/Db.php";
require_once "../libs/Response.php";
//echo "获取图片列表";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $page = isset($_POST['page']) ? $_POST['page'] : "";
    $size = isset($_POST['size']) ? $_POST['size'] : "";
}

if (!is_numeric($page) || !is_numeric($size)) {
    return Response::getJson(403,"格式错误");
}
$rows=Db::getInstance()->limit("t_beauty",$page,$size);
Response::getJson(0,"获取数据成功",$rows);

