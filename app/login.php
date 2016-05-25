<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>登录页面</title>
</head>
<body>
<form action="./login.php" method="post">
    账号：<input type="text" name="username"/><br>
    密码： <input type="password" name="passowrd"/><br>
    <input type="submit" name="submit" value="登录"/>


</form>
<?php
/**
 * Created by PhpStorm.
 * User: Shinelon
 * Date: 2016/4/28
 * Time: 21:55
 */
header("Content-type:text/html; charset=utf-8");
require_once "../libs/DbManager.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $passowrd = $_POST["passowrd"];
    $login = new DbManager();
    $login->checkUser($username, $passowrd);
}