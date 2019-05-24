<?php

session_start();
require "connect.inc.php";
if (isset($_POST["sub1"])) {
    $sql = "select * from s where xh='" . $_POST["user"] . "' and pwd='" . $_POST["pass"] . "'";
    $conn->query($sql);
    $row = $conn->affected_rows;
    if ($row > 0) {
        $_SESSION["username"] = $_POST["user"];
        $_SESSION["IsLogin"] = 1;
        header("Location:studentindex.php");
    } else {
        echo "用户名或密码错误！";
    }
}
if (isset($_POST["sub1"])) {
    $sql = "select * from t where gh='" . $_POST["user"] . "' and pwd='" . $_POST["pass"] . "'";
    $conn->query($sql);
    $row = $conn->affected_rows;
    if ($row > 0) {
        $_SESSION["username"] = $_POST["user"];
        $_SESSION["IsLogin"] = 1;
        header("Location:teacherIndex.php");
    } else {
        echo "用户名或密码错误！";
    }
}
if (isset($_POST["sub1"])) {
    $sql = "select * from r where gh='" . $_POST["user"] . "' and pwd='" . $_POST["pass"] . "'";
    $conn->query($sql);
    $row = $conn->affected_rows;
    if ($row > 0) {
        $_SESSION["username"] = $_POST["user"];
        $_SESSION["IsLogin"] = 1;
        header("Location:rootIndex.php");
    } else {
        echo "用户名或密码错误！";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>
        登录页面
    </title>
    <style>
        body {
            background-image: url("bb.jpg");
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 align="center">上海大学教务管理系统</h2>
    <hr>
    <br>
    <form action="login.php" method="post" class="form-horizontal" role="form">
        <div class="form-group">
            <label for="username" class="col-sm-4 control-label">用户名</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="user" placeholder="请输入账号"/>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-4 control-label">密码</label>
            <div class="col-sm-3">
                <input type="password" class="form-control" name="pass" placeholder="请输入密码"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-6">
                <input type="submit" class="btn btn-default col-sm-1.6" name="sub1" value="登录"/>
<!--                <input type="submit" class="btn btn-default col-sm-1.6" name="sub2" value="教师登录"/>-->
<!--                <input type="submit" class="btn btn-default col-sm-1.6" name="sub3" value="管理员登录"/>-->
            </div>
        </div>
    </form>
</div>
</body>
</html>

