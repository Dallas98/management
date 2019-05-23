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
        成绩录入
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
<h1 align="center">成绩录入</h1>
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
            <button type="submit" class="btn btn-default" name="sub1">查询</button>
            <input type="text" class="form-control" name="xh" placeholder="输入学号"/>
            <input type="text" class="form-control" name="pscj" placeholder="输入平时成绩"/>
            <input type="text" class="form-control" name="kscj" placeholder="输入考试成绩"/>
            <input type="text" class="form-control" name="zb" placeholder="平时成绩比例"/>
<!--            <input type="text" class="form-control" name="zpcj" placeholder="输入总评成绩"/>-->
            <button type="submit" class="btn btn-default" name="sub2">修改成绩</button>
        </div>
    </form>
    <br>
    <!--    查询成绩-->
    <table class="table">
        <thead>
        <th>学号</th>
        <th>姓名</th>
        <th>课程名</th>
        <th>平时成绩</th>
        <th>考试成绩</th>
        <th>总评成绩</th>
        </thead>
    <?php
    require "connect.inc.php";
    if (isset($_POST["sub1"])) {  //查询所有学生的成绩
    $_SESSION["km"] = $_POST["kname"];    //根据选择的课程名查询
    $sql4 = "select e.xh,s.xm,c.km,e.pscj,e.kscj,e.zpcj from e ,c,s where e.xh=s.xh and e.kh=c.kh and c.km='" . $_POST["kname"] . "'and e.gh='" . $_SESSION["username"] . "'";
    $result4 = $conn->query($sql4);
        if ($result4->num_rows > 0) {
            // 输出数据
            while ($row4 = $result4->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row4["xh"] ?></td>
                    <td><?php echo $row4["xm"] ?></td>
                    <td><?php echo $row4["km"] ?></td>
                    <td><?php echo $row4["pscj"] ?></td>
                    <td><?php echo $row4["kscj"] ?></td>
                    <td><?php echo $row4["zpcj"] ?></td>
                </tr>
                <?php
            }
        }
        }
        require "connect.inc.php";
        if(isset($_POST["sub2"])) {
            $km = $_SESSION["km"];
            $pscj = $_POST["pscj"];
            $kscj = $_POST["kscj"];
            $zpcj = ($pscj*$_POST["zb"]+$kscj*(1-$_POST["zb"]));
            $sql5 = "update e set pscj='" . $_POST["pscj"] . "',kscj='" . $_POST["kscj"] . "',zpcj=$zpcj where xh='" . $_POST["xh"] . "'and kh in(select kh from c where km='" . $_SESSION["km"] . "')";
            if ($conn->query($sql5)) {
                $sql4 = "select e.xh,s.xm,c.km,e.pscj,e.kscj,e.zpcj from e ,c,s where e.xh=s.xh and e.kh=c.kh and c.km='" . $_SESSION["km"] . "'and e.gh='" . $_SESSION["username"] . "'";
                $result4 = $conn->query($sql4);
                if ($result4->num_rows > 0) {
                    // 输出数据
                    while ($row4 = $result4->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row4["xh"] ?></td>
                            <td><?php echo $row4["xm"] ?></td>
                            <td><?php echo $row4["km"] ?></td>
                            <td><?php echo $row4["pscj"] ?></td>
                            <td><?php echo $row4["kscj"] ?></td>
                            <td><?php echo $row4["zpcj"] ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
                <script>
                    window.alert("修改成功")
                </script>
        <?php
            }
        }
        ?>
    </table>
</div>
</body>
</html>
