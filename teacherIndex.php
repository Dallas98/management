<!DOCTYPE html>
<?php
session_start();
require "connect.inc.php";
if(isset($_SESSION["IsLogin"])&&$_SESSION["IsLogin"]===1){
    //echo "欢迎来到教师管理系统，";
    //echo "当前用户".$_SESSION["username"];
    $sql6="select xm from t where gh='" . $_SESSION["username"] . "'";
    $result6=$conn->query($sql6);
    if ($result6->num_rows > 0) {
        while ($row6 = $result6->fetch_assoc()) {
            $user = $row6["xm"];
        }
    }
}

?>

<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>
        教师管理系统首页
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
                <a class="navbar-brand" href="teacherIndex.php">教师管理</a>
            </div>
            <div>
                <ul class="nav navbar-nav">
<!--                    选课学生的信息-->
                    <li><a href="mystudent.php">学生信息</a></li>
<!--                    开设课程的信息：课程的基本信息，选课人数-->
                    <li><a href="courseInfo.php">课程信息</a></li>
<!--                    录入每门课程学生的成绩-->
                    <li><a href="gradeInput.php">录入成绩</a></li>
<!--                    每门课程的平均分，最高分和最低分-->
                    <li><a href="login.php">退出</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<h1 align="center">欢迎来到教师管理系统，当前用户：<?php echo $user ?></h1>
<br>
</body>
</html>