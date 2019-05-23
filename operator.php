<!DOCTYPE html>
<?php
session_start();

if(isset($_SESSION["IsLogin"])&&$_SESSION["IsLogin"]===1){
    //echo "欢迎来到教师管理系统，";
    //echo "当前用户".$_SESSION["username"];
}

?>
<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>
        常规操作
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
                <a class="navbar-brand" href="rootIndex.php">管理员</a>
            </div>
            <div>
                <ul class="nav navbar-nav">
                    <li><a href="studentAll.php">学生信息</a></li>
                    <li><a href="courseAll.php">课程信息</a></li>
                    <li><a href="teacherAll.php">添加课程</a></li>
                    <li><a href="delCourse.php">删除课程</a></li>
                    <li><a href="operator.php">常规操作</a></li>
                    <li><a href="login.php">退出</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div class="container">
    <form class="form-inline" role="form" method="post">
        <div class="form-group">
            <?php
            require  "connect.inc.php";
            $sql3="select xq from term";
            $result3=$conn->query($sql3);
            ?>
            <select class="form-control" name="xq">
                <?php
                if($result3->num_rows>0){
                    while($row3=$result3->fetch_assoc()){
                        ?>
                        <option><?php echo $row3["xq"] ?></option>
                        <?php
                    }
                }
                ?>
            </select>
            <button type="submit" class="btn btn-default" name="sub">选定当前学期</button>
        </div>
    </form>
    <?php
    require "connect.inc.php";
    if(isset($_POST["sub"])){
       $sql4="update term set flag=1 where xq='".$_POST["xq"]."'";
       if($conn->query($sql4)){
           ?>
           <script>
               window.alert("选定当前学期成功！")
           </script>
    <?php
       }
    }
    ?>

</div>
</body>
</html>