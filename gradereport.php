<!DOCTYPE html>
<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>
        成绩报告
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
<h1 align="center"><?php echo $user ?>的成绩单</h1>
<div class="container">
    <form class="form-inline" role="form" method="post">
        <div class="form-group">
            <select class="form-control" name="xxq">
                <option value="2018-2019秋季">2018-2019秋季</option>
                <option value="2018-2019冬季">2018-2019冬季</option>
                <option value="2018-2019春季">2018-2019春季</option>
                <option value="2018-2019夏季">2018-2019夏季</option>
            </select>
        </div>
        <button type="submit" class="btn btn-default" name="sub3">查询</button>
    </form>
    <table class="table">
        <thead>
        <th>学期</th>
        <th>课程号</th>
        <th>课程名</th>
        <th>成绩</th>
        <th>学分</th>
        <th>任教老师</th>
        </thead>
        <?php
        require "connect.inc.php";
        if (isset($_POST["sub3"])) {
            echo $_POST["xxq"];
            $sql7 = "select e.xq,e.zpcj,e.kh,c.km,c.xf,t.xm from e,c,t where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.gh=t.gh and e.xq='" . $_POST["xxq"] . "'";
            $result7 = $conn->query($sql7);
            if ($result7->num_rows > 0) {
                while ($row7 = $result7->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row7["xq"] ?></td>
                        <td><?php echo $row7["kh"] ?></td>
                        <td><?php echo $row7["km"] ?></td>
                        <td><?php echo $row7["zpcj"] ?></td>
                        <td><?php echo $row7["xf"] ?></td>
                        <td><?php echo $row7["xm"] ?></td>
                    </tr>
                    <?php
                }
            }
        }
            ?>
    </table>
</div>
</body>
</html>
