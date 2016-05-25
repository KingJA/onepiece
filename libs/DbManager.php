<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
</head>
<body >
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: Shinelon
 * Date: 2016/5/2
 * Time: 14:26
 */
header("Content-type:text/html; charset=utf-8");

class DbManager
{
    var $con;

    function __construct()
    {
        $this->con = new mysqli('127.0.0.1', 'root', 'root', 'login');
        $this->con->set_charset("utf8");
        if ($this->con ->connect_error) {
            die("Connection failed: " . $this->con ->connect_error);
        }
    }
    function __destruct()
    {
        $this->con->close();
    }

    public  function checkRegisterAble($username,$password)
    {

        $query = "select * from t_login where name='$username'";
        $result = $this->con->query($query);
        $arr = $result->fetch_array();
        if ($arr) {
            echo "<script>alert('UserName has been registered!');</script>";
            return false;
        } else {
            //注册用户
            $add="insert into  t_login(name,password)VALUES ('$username','$password')";//
            if ($this->con->query($add)) {
                echo "<script>alert('注册成功，即将为你跳转到登录页面!'); window.location.href=\"login.php\";</script>";
                return true;
            }
            return false;
        }

       
    }

    public function checkUser($username, $password)
    {
        $query = "select * from t_login where name='$username' AND password='$password'";
        $result = $this->con->query($query);
        $arr = $result->fetch_array();
        if ($arr) {
            echo "<script>alert('Login Successful!');</script>";
            return true;
        } else {
            echo "<script>alert('Wrong username or password!');</script>";
            return false;
        }
    }
}