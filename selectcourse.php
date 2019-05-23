<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION["IsLogin"]) && $_SESSION["IsLogin"] === 1) {
}
?>

<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>
        选课管理
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
require "connect.inc.php";
$sql6 = "select xq from term where id=3";
$result6 = $conn->query($sql6);
$row6 = $result6->fetch_assoc();
$xq = $row6["xq"];
$_SESSION["xq"] = $xq;
?>
<h1 align="center"><?php echo $_SESSION["xq"] ?>选课</h1>
<hr>
<br>
<div class="container">
    <form method="post" class="form-horizontal" role="form">
        <div class="form-group">
            <div class="col-sm-3">
                <input type="text" class="form-control" name="kh" placeholder="请输入课程号"/>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="gh" placeholder="请输入教师工号"/>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="km" placeholder="请输入课程名"/>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="sksj" placeholder="请输入上课时间：如星期一1-2"/>
            </div>
            <button type="submit" class="btn btn-default" name="sub1">选课</button>
            <button type="submit" class="btn btn-default" name="sub2">查询</button>
        </div>
    </form>
    <!--    所有待选课程-->
    <table class="table">
        <thead>
        <!--        <th>学期</th>-->
        <th>课程号</th>
        <th>课程名</th>
        <th>教师工号</th>
        <th>任教老师</th>
        <th>学分</th>
        <th>上课时间</th>
        </thead>
        <?php
        require "connect.inc.php";
        $sql3 = "select o.kh,c.km,t.gh,t.xm,c.xf,o.sksj from o,t,c where o.gh=t.gh and c.kh=o.kh and o.xq='" . $_SESSION["xq"] . "'";
        $result3 = $conn->query($sql3);
        if ($result3->num_rows > 0) {
            while ($row3 = $result3->fetch_assoc()) {
                ?>
                <tr>
                    <!--                        <td>--><?php //echo $row3["xq"] ?><!--</td>-->
                    <td><?php echo $row3["kh"] ?></td>
                    <td><?php echo $row3["km"] ?></td>
                    <td><?php echo $row3["gh"] ?></td>
                    <td><?php echo $row3["xm"] ?></td>
                    <td><?php echo $row3["xf"] ?></td>
                    <td><?php echo $row3["sksj"] ?></td>
                </tr>
                <?php
            }
        }
        ?>
    </table>

    <!--选课-->
    <?php
    require "connect.inc.php";
    if (isset($_POST["sub1"])) {
        $kh = $_POST["kh"];
        $xh = $_SESSION["username"];
        $gh = $_POST["gh"];
        $sql4 = "insert into e (xh,xq,kh,gh,pscj,kscj,zpcj) values('$xh','" . $_SESSION["xq"] . "','$kh','$gh',0,0,0)";
        if ($conn->query($sql4)) {
            ?>
            <script>
                window.alert("选课成功");
            </script>
        <?php
        }
        else {
        ?>
            <script>
                window.alert("选课失败");
            </script>
            <?php
        }
    }
    ?>
    <!--查询-->
<!--    <table class="table">-->
<!--        <thead>-->
<!--        <th>课程号</th>-->
<!--        <th>课程名</th>-->
<!--        <th>教师工号</th>-->
<!--        <th>任教老师</th>-->
<!--        <th>学分</th>-->
<!--        <th>上课时间</th>-->
<!--        </thead>-->
<!--        --><?php
//        require "connect.inc.php";
//        if (isset($_POST["sub2"])) {
//            echo $_SESSION["xq"];
//            if (1) {
//                $sql5 = "select o.kh,c.km,o.sksj,c.xf,t.xm,o.gh from o,c,t where o.kh=c.kh and o.gh=t.gh and xq='" . $_SESSION["xq"] . "'and o.gh='" . $_POST["gh"] . "' ";
//                $result5 = $conn->query($sql5);
//                if ($result5->num_rows > 0) {
//                    while ($row5 = $result5->fetch_assoc()) {
//                        ?>
<!--                        <tr>-->
<!--                            <td>--><?php //echo $row5["kh"] ?><!--</td>-->
<!--                            <td>--><?php //echo $row5["km"] ?><!--</td>-->
<!--                            <td>--><?php //echo $row5["gh"] ?><!--</td>-->
<!--                            <td>--><?php //echo $row5["xm"] ?><!--</td>-->
<!--                            <td>--><?php //echo $row5["xf"] ?><!--</td>-->
<!--                            <td>--><?php //echo $row5["sksj"] ?><!--</td>-->
<!--                        </tr>-->
<!---->
<!--                        --><?php
//                    }
//                }
//            }
//        }
//        ?>
<!--    </table>-->
</div>
</body>
</html>
