<?php

/**
 * Created by PhpStorm.
 * User: Shinelon
 * Date: 2016/5/12
 * Time: 20:45
 */
//namespace libs;//路径包名
class Response
{

    /**
     * 生成Json字符串
     * @param $code
     * @param string $message
     * @param $data
     * @return string
     */
    public static function getJson($code,$message="",$data=array()){
        $json=array(
            "code"=>$code,
            "message"=>$message,
            "data"=>$data
        );
        echo json_encode($json,JSON_UNESCAPED_UNICODE);

    }


}