<?php

/**
 * Description: API通公共类
 * Created by PhpStorm.
 * User: Shinelon
 * Date: 2016/5/23
 * Time: 16:34
 */
require_once "../libs/Db.php";
require_once "../libs/Response.php";
class Common
{

    protected function param($param)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $retult = isset($_POST[$param]) ? $_POST[$param] : "";
            return $retult;
        }
    }

    protected function makeJson($code,$message,$data)
    {
        Response::getJson($code,$message,$data);
    }
}