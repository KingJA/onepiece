<?php
/**
 * Created by PhpStorm.
 * User: Shinelon
 * Date: 2016/5/12
 * Time: 20:45
 */

class autoload {

    public static function load($fileName)
    {
        $filePath = sprintf('%s.php', str_replace('\\', '/', $fileName));
        if (is_file($filePath)) require_once $filePath;
    }

}

spl_autoload_register(['autoload', 'load']);