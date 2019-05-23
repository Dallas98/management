<!DOCTYPE html>
<?php
session_start();

if (isset($_SESSION["IsLogin"]) && $_SESSION["IsLogin"] === 1) {
    //echo "欢迎来到教师选课管理系统，";
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
        学生基本信息
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
                <a class="navbar-brand" href="teacherIndex.php">管理员管理</a>
            </div>
            <div>
                <ul class="nav navbar-nav">
                    <li><a href="studentInfo.php">学生信息</a></li>
                    <li><a href="courseInfo.php">课程信息</a></li>
                    <li><a href="gradeInput.php">录入成绩</a></li>
                    <li><a href="login.php">退出</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<h1 align="center">学生信息</h1>
<hr>
<br>
<div class="container">
    <form class="form-inline" role="form" method="post">
        <div class="form-group">
            <?php
            require "connect.inc.php";
            $sql3 = "select DISTINCT km from c,e where gh='" . $_SESSION["username"] . "'and c.kh=e.kh";
            $result3 = $conn->query($sql3);
            ?>
            <select class="form-control" name="kname">
                <?php
                if ($result3->num_rows > 0) {
                    while ($row3 = $result3->fetch_assoc()) {
                        ?>
                        <option><?php echo $row3["km"] ?></option>
                        <?php
                    }
                }
                ?>
            </select>
            <button type="submit" class="btn btn-default" name="sub">查询</button>
        </div>
    </form>

    <table class="table">
        <thead>
        <th>学号</th>
        <th>姓名</th>
        <th>性别</th>
        <th>联系方式</th>
        <th>课程名</th>
        <th>所属学院</th>
        </thead>
        <?php
        require "connect.inc.php";
        if (isset($_POST["sub"])) {
            $sql4 = "select DISTINCT s.xh,s.xm,s.xb,s.sjhm,d.mc,c.km from s,d,e,c where s.yxh=d.yxh and c.km='" . $_POST["kname"] . "' and c.kh=e.kh and e.xh=s.xh and e.gh='" . $_SESSION["username"] . "'";
            $result4 = $conn->query($sql4);
            if ($result4->num_rows > 0) {
                // 输出数据
                while ($row4 = $result4->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row4["xh"] ?></td>
                        <td><?php echo $row4["xm"] ?></td>
                        <td><?php echo $row4["xb"] ?></td>
                        <td><?php echo $row4["sjhm"] ?></td>
                        <td><?php echo $row4["km"] ?></td>
                        <td><?php echo $row4["mc"] ?></td>
                    </tr>

                    <?php
                }
            } else {
                echo "没有结果显示";
            }
        }
        ?>
    </table>
</div>
</body>
</html>