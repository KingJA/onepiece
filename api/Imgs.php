<?php

/**
 * Description:
 * Created by PhpStorm.
 * User: Shinelon
 * Date: 2016/5/23
 * Time: 16:35
 */
require_once "Common.php";


class Imgs extends Common
{

    public function reponse()
    {
        $page = $this->param('page');
        $size = $this->param('size');
        if (!is_numeric($page) || !is_numeric($size)) {
            return Response::getJson(403,"格式错误");
        }
        $this->getData($page,$size);
    }

    private function getData($page,$size)
    {
        $rows=Db::getInstance()->limit("t_beauty",$page,$size);
        $this->makeJson(0,"获取数据成功",$rows);
    }

}

$reponse=new Imgs();
$reponse->reponse();