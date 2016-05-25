<?php
/**
 * Created by PhpStorm.
 * User: Shinelon
 * Date: 2016/5/12
 * Time: 20:51
 */

require_once "./libs/Db.php";
var_dump(Db::limit("t_beauty",1,10));