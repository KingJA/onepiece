<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>注册页面</title>
</head>
<body >
<form action="./register.php" method="post" >
    账号：<input type="text" name="username"/><br>
   密码： <input type="password" name="passowrd"/><br>
    <input type="submit" name="submit" value="注册"/>


</form>

</body>
</html>

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
    $register = new DbManager();
    if ($register->checkRegisterAble($username, $passowrd)) {
//        header("location:login.php");
    }

}


