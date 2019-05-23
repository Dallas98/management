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
        课程信息
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
    <nav class="navba navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="teacherIndex.php">教师管理</a>
            </div>
            <div>
                <ul class="nav navbar-nav">
                    <li><a href="mystudent.php">学生信息</a></li>
                    <li><a href="courseInfo.php">课程信息</a></li>
                    <li><a href="gradeInput.php">录入成绩</a></li>
                    <li><a href="login.php">退出</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<h1 align="center">课程信息</h1>
<hr>
<br>
<div class="container">
    <table class="table">
        <thead>
        <th>学期</th>
        <th>课程号</th>
        <th>课程名</th>
        <th>学分</th>
        <th>上课时间</th>
        <th>选课人数</th>
        <th>所属学院</th>
        </thead>
        <?php
        require "connect.inc.php";
        $sql3 = "select DISTINCT xq,kh from e where gh='" . $_SESSION["username"] . "'";
        $result3 = $conn->query($sql3);
        if ($result3->num_rows > 0) {
            while ($row3 = $result3->fetch_assoc()) {
                $kh = $row3["kh"];
                $xq=$row3["xq"];
                $sql4="select count(DISTINCT xh )as nums from e where kh=$kh and gh='".$_SESSION["username"]."'";
                $result4=$conn->query($sql4);
                $row4=$result4->fetch_assoc();
                $num=$row4["nums"];
                $sql5 = "select DISTINCT c.kh,c.km,c.xf,d.mc,o.sksj from e,c,d,o where e.kh=c.kh and e.gh=o.gh and c.yxh=d.yxh and e.kh=$kh and e.gh='".$_SESSION["username"]."' and e.kh=o.kh";
                $result5 = $conn->query($sql5);
                $row5=$result5->fetch_assoc();
                ?>
                <tr>
                    <td><?php echo $xq?></td>
                    <td><?php echo $row5["kh"] ?></td>
                    <td><?php echo $row5["km"] ?></td>
                    <td><?php echo $row5["xf"] ?></td>
                    <td><?php echo $row5["sksj"] ?></td>
                    <td><?php echo $num?></td>
                    <td><?php echo $row5["mc"] ?></td>
                </tr>
                        <?php
                    }
                }
        else {
            echo "没有结果显示";
        }
        ?>
    </table>
</div>
</body>
</html>
