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
<h1 align="center">课程信息</h1>
<hr>
<br>
<div class="container">
    <form class="form-inline" role="form" method="post">
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
        <button type="submit" class="btn btn-default" name="sub">查看课程</button>
    </form>
    <table class="table">
        <thead>
        <th>学期</th>
        <th>课程号</th>
        <th>课程名</th>
        <th>学分</th>
        <th>学时</th>
        <th>任教老师</th>
        <th>教师工号</th>
        <th>上课时间</th>
        <th>所属学院</th>
        </thead>
        <?php
        require "connect.inc.php";
        if(isset($_POST["sub"])){
            $sql3 = "select o.xq,o.kh,c.km,c.xf,o.gh,t.xm,o.sksj,d.mc,c.xs from d,t,o,c where o.kh=c.kh and c.yxh=d.yxh and o.gh=t.gh and o.xq='".$_POST["xq"]."'";
            $result3 = $conn->query($sql3);
            if ($result3->num_rows > 0) {
                while ($row3 = $result3->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row3["xq"]?></td>
                        <td><?php echo $row3["kh"] ?></td>
                        <td><?php echo $row3["km"] ?></td>
                        <td><?php echo $row3["xf"] ?></td>
                        <td><?php echo $row3["xs"] ?></td>
                        <td><?php echo $row3["xm"]?></td>
                        <td><?php echo $row3["gh"] ?></td>
                        <td><?php echo $row3["sksj"]?></td>
                        <td><?php echo $row3["mc"] ?></td>
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
