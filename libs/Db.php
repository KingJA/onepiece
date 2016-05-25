<?php

/**
 * Created by PhpStorm.
 * User: Shinelon
 * Date: 2016/5/15
 * Time: 20:02
 */
//namespace libs;//路径包名
header("Content-type:text/html; charset=utf-8");

class Db
{
    private static $Db;
    private static $conn;

    private function __construct()
    {

    }

    public static function getInstance()
    {
        if (!self::$Db) {
            self::$Db = new Db();
            return self::$Db;
        }
        return self::$Db;
    }

    public static function conn()
    {
        self::$conn = new mysqli('127.0.0.1', 'root', 'root', 'login');
        self::$conn->set_charset("utf8");
        if (!self::$conn) {
            die("connect_error:" . self::$conn . mysqli_connect_error());
        }
        return self::$conn;
    }

    public static function selectAll($table)
    {
        $result=self::$conn->query("select * from ".$table);

        while($row = $result->fetch_assoc())
        {
            $rows[]=$row;
        }
        return $rows;

    }

    public static function limit($table, $position, $size)

    {
        $from=$position*$size;
        $sql="select * from ".$table." limit ".$from.",".$size;
        $result=self::$conn->query($sql);

        while($row = $result->fetch_assoc())
        {
            $rows[]=$row;
        }
        return $rows;
    }


}

//
$con = Db::getInstance()->conn();
$result = $con->query("select * from t_login");
//

//while($row = $result->fetch_assoc())
//{
//    echo $row['name'] . " " . $row['password'];
//    echo "<br>";
//}
//while($row = $result->fetch_row())
//{
//    echo  $row[0] . " " .$row[1] . " " . $row[2];
//    echo "<br>";
//}
//while($row = $result->fetch_array())
//{
////    echo $row['name'] . " " . $row['password'];
//    echo $row[1] . " " . $row[2];
//    echo "<br>";
//}
//while($row = $result->fetch_object())
//{
//    $rows[]=$row;
//}
//
//if ($rows) {
//    Response::getJson(100,"数据获取成功",$rows);
//}

