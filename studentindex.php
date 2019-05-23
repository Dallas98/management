<!DOCTYPE html>
<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>
        学生首页
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
<div>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="studentindex.php">学生管理</a>
            </div>
            <div>
                <ul class="nav navbar-nav">
                    <li><a href="gradereport.php">成绩单</a></li>
                    <li><a href="mycourse.php">课程表</a></li>
                    <li><a href="selectcourse.php">选课管理</a></li>
                    <li><a href="dropcourse.php">退课管理</a></li>
                    <li><a href="login.php">退出</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>


<?php
session_start();
require "connect.inc.php";
if(isset($_SESSION["IsLogin"])&&$_SESSION["IsLogin"]===1){
    $sql6="select xm from s where xh='" . $_SESSION["username"] . "'";
    $result6=$conn->query($sql6);
    if ($result6->num_rows > 0) {
        while ($row6 = $result6->fetch_assoc()) {
            $user = $row6["xm"];
        }
    }
}
?>
<h1 align="center">你好 <?php echo $user ?></h1>
<br>

</body>
</html>
