<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION["IsLogin"])&&$_SESSION["IsLogin"]===1){
}
?>

<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>
        退课管理
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

<h1 align="center">退课管理</h1>
<hr>
<br>
<div class="container">
    <form action="dropcourse.php" method="post" class="form-horizontal" role="form">
        <div class="form-group">
            <label for="kh" class="col-sm-2 control-label">课程号</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="kh" placeholder="请输入课程号"/>
            </div>
            <label for="gh" class="col-sm-2 control-label">教师工号</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="gh" placeholder="请输入教师工号"/>
            </div>
            <input type="submit" class="btn btn-default col-sm-1" name="sub2" value="退课"/>
        </div>
    </form>
    <form class="form-inline" role="form" method="post">
        <div class="form-group">
            <select class="form-control" name="xxq">
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
        <th>教师工号</th>
        <th>任教老师</th>
        <th>学分</th>
        <th>上课时间</th>
        </thead>
        <?php
        require "connect.inc.php";
        if(isset($_POST["sub3"])){
            $sql3="select e.xq,o.sksj,e.kh,c.km,c.xf,t.gh,t.xm from e,c,t,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.gh=t.gh and e.kh=o.kh and t.gh=o.gh and o.xq=e.xq and e.xq='".$_POST["xxq"]."'";
            $result3 = $conn->query($sql3);
            if ($result3->num_rows > 0) {
                while ($row3 = $result3->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row3["xq"] ?></td>
                        <td><?php echo $row3["kh"] ?></td>
                        <td><?php echo $row3["km"] ?></td>
                        <td><?php echo $row3["xm"] ?></td>
                        <td><?php echo $row3["gh"] ?></td>
                        <td><?php echo $row3["xf"] ?></td>
                        <td><?php echo $row3["sksj"]?></td>
                    </tr>
                    <?php
                }
            }
        }
        ?>
    </table>
</div>

<?php
require "connect.inc.php";
if(isset($_POST["sub2"])) {
    $kh=$_POST["kh"];
    $xh=$_SESSION["username"];
    $gh=$_POST["gh"];
    $sql4="select xq from e where kh=$kh and gh=$gh and xh=$xh";
    $result4=$conn->query($sql4);
    if ($result4->num_rows > 0) {
        while ($row4 = $result4->fetch_assoc()) {
            $xq = $row4["xq"];
        }
    }

    $sql5="delete from e where xh='$xh' and kh='$kh' and gh='$gh' and xq='$xq'";
    if ($conn->query($sql5)) {
        ?>
        <script>
            window.alert("退课成功");
        </script>
    <?php
    }
    else {
    ?>
        <script>
            window.alert("退课失败");
        </script>
        <?php
    }
}
?>
</body>
</html>
