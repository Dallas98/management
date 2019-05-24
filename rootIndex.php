<!DOCTYPE html>
<?php
session_start();

if (isset($_SESSION["IsLogin"]) && $_SESSION["IsLogin"] === 1) {
    //echo "欢迎来到教师管理系统，";
    //echo "当前用户".$_SESSION["username"];
}

?>
<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>
        管理员系统首页
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
                    <li><a href="teacherAll.php">教师信息</a></li>
                    <li><a href="login.php">退出</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>


<div class="container">
    <!--    选定学期-->
    <form class="form-inline" role="form" method="post">
        <div class="form-group">
            <?php
            require "connect.inc.php";
            $sql3 = "select xq from term";
            $result3 = $conn->query($sql3);
            ?>
            <select class="form-control" name="xq">
                <?php
                if ($result3->num_rows > 0) {
                    while ($row3 = $result3->fetch_assoc()) {
                        ?>
                        <option><?php echo $row3["xq"] ?></option>
                        <?php
                    }
                }
                ?>
            </select>
            <br>
            <button type="submit" class="btn btn-default" name="sub">选定当前学期</button>
        </div>
    </form>
    <br>
    <?php
    require "connect.inc.php";
    if (isset($_POST["sub"])) {
        $sql5 = "update term set id=0 where id=1";
        $conn->query($sql5);
        $sql4 = "update term set id=1 where xq='" . $_POST["xq"] . "'";
        if ($conn->query($sql4)) {
            ?>
            <script>
                window.alert("选定当前学期成功！")
            </script>
        <?php
        }
        else{
        ?>
            <script>
                window.alert("选定当前学期失败！")
            </script>
            <?php
        }
    }
    ?>

    <!--    添加学期-->
    <form class="form-inline" role="form" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="xq" placeholder="如2019-2020冬季">
            <br>
            <button type="submit" class="btn btn-default" name="sub5">添加学期</button>
        </div>
    </form>
    <br>
    <?php
    require "connect.inc.php";
    if (isset($_POST["sub5"])) {
        $sql8 = "insert into term(id,xq) values ('4','" . $_POST["xq"] . "')";
        $result8 = $conn->query($sql8);
        if ($conn->query($sql8)) {
            ?>
            <script>
                window.alert("插入学期成功！")
            </script>
            <?php
        }
    }
    ?>


    <!--    添加课程-->
    <form class="form-inline" role="form" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="kh" placeholder="输入课程号">
            <input type="text" class="form-control" name="km" placeholder="输入课程名">
            <input type="text" class="form-control" name="xf" placeholder="输入学分">
            <input type="text" class="form-control" name="xs" placeholder="输入学时">
            <input type="text" class="form-control" name="yxh" placeholder="输入院系号">
            <input type="text" class="form-control" name="gh" placeholder="输入任教老师工号">
            <input type="text" class="form-control" name="sksj" placeholder="输入上课时间">
            <?php
            require "connect.inc.php";
            $sql3 = "select xq from term";
            $result3 = $conn->query($sql3);
            ?>
            <select class="form-control" name="xq">
                <?php
                if ($result3->num_rows > 0) {
                    while ($row3 = $result3->fetch_assoc()) {
                        ?>
                        <option><?php echo $row3["xq"] ?></option>
                        <?php
                    }
                }
                ?>
            </select>
            <br>
            <button type="submit" class="btn btn-default" name="sub2">添加课程</button>
        </div>
    </form>
    <br>
    <?php
    require "connect.inc.php";
    if (isset($_POST["sub2"])) {
        $sql6 = "insert into c(kh,km,xf,xs,yxh) VALUES ('" . $_POST["kh"] . "','" . $_POST["km"] . "','" . $_POST["xf"] . "','" . $_POST["xs"] . "','" . $_POST["yxh"] . "')";
        $sql7 = "insert into o(xq,kh,gh,sksj)VALUES ('" . $_POST["xq"] . "','" . $_POST["kh"] . "','" . $_POST["gh"] . "','" . $_POST["sksj"] . "')";
        if ($conn->query($sql6) and $conn->query($sql7)) {
            ?>
            <script>
                window.alert("插入课程成功！")
            </script>
            <?php
        }
    }
    ?>


    <!--    删除课程-->
    <form class="form-inline" role="form" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="kh" placeholder="输入课程号">
            <input type="text" class="form-control" name="gh" placeholder="输入任教老师工号">
            <br>
            <button type="submit" class="btn btn-default" name="sub3">删除课程</button>
        </div>
    </form>
    <br>
    <?php
    require "connect.inc.php";
    if (isset($_POST["sub3"])) {
        $sql8 = "delete from c where kh='" . $_POST["kh"] . "'";
        $sql9 = "delete from o where kh='" . $_POST["kh"] . "' and gh='" . $_POST["gh"] . "'";
        if ($conn->query($sql8) and $conn->query($sql9)) {
            ?>
            <script>
                window.alert("删除课程成功！")
            </script>
            <?php
        }
    }
    ?>


    <!--    添加学生-->
    <form class="form-inline" role="form" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="xh" placeholder="输入学号">
            <input type="text" class="form-control" name="xm" placeholder="输入姓名">
            <input type="text" class="form-control" name="xb" placeholder="输入性别">
            <input type="date" class="form-control" name="csrq" placeholder="2000/1/1">
            <input type="text" class="form-control" name="jg" placeholder="输入籍贯">
            <input type="text" class="form-control" name="sjhm" placeholder="输入手机号码">
            <input type="text" class="form-control" name="yxh" placeholder="输入院系号">
            <br>
            <button type="submit" class="btn btn-default" name="sub4">添加学生</button>
        </div>
    </form>
    <br>
    <?php
    require "connect.inc.php";
    if (isset($_POST["sub4"])) {
        $sql10 = "insert into s VALUES ('" . $_POST["xh"] . "','" . $_POST["xm"] . "','" . $_POST["xb"] . "','" . $_POST["csrq"] . "','" . $_POST["jg"] . "','" . $_POST["sjhm"] . "','" . $_POST["yxh"] . "','" . $_POST["xh"] . "')";
        if ($conn->query($sql10)) {
            ?>
            <script>
                window.alert("添加学生成功！")
            </script>
            <?php
        }
    }
    ?>


    <!--    删除学生-->
    <form class="form-inline" role="form" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="xh" placeholder="输入学号">
            <input type="text" class="form-control" name="xm" placeholder="输入姓名">
            <br>
            <button type="submit" class="btn btn-default" name="sub6">删除学生</button>
        </div>
    </form>
    <?php
    require "connect.inc.php";
    if (isset($_POST["sub6"])) {
        $sql11 = "delete from e where xh='" . $_POST["xh"] . "'";
        $sql12 = "delete from s where xh='" . $_POST["xh"] . "'and xm='" . $_POST["xm"] . "'";
        if ($conn->query($sql11) and $conn->query($sql12)) {
            ?>
            <script>
                window.alert("删除学生成功！")
            </script>
            <?php
        }
    }
    ?>
</div>
</body>
</html>