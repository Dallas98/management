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
<h1 align="center">教师信息</h1>
<hr>
<br>
<div class="container">
    <form class="form-inline" role="form" method="post">
        <?php
        require  "connect.inc.php";
        $sql3="select mc from d";
        $result3=$conn->query($sql3);
        ?>
        <select class="form-control" name="mc">
            <?php
            if($result3->num_rows>0){
                while($row3=$result3->fetch_assoc()){
                    ?>
                    <option><?php echo $row3["mc"] ?></option>
                    <?php
                }
            }
            ?>
        </select>
        <button type="submit" class="btn btn-default" name="sub">查看教师信息</button>
    </form>
    <table class="table">
        <thead>
        <th>工号</th>
        <th>姓名</th>
        <th>性别</th>
        <th>出生日期</th>
        <th>学历</th>
        <th>基本工资</th>
        <th>所属院系</th>
        </thead>
        <?php
        require "connect.inc.php";
        if(isset($_POST["sub"])){
            $sql4 = "select gh,xm,xb,csrq,xl,jgbz,d.mc from d,t where d.yxh=t.yxh and d.mc='".$_POST["mc"]."'";
            $result4 = $conn->query($sql4);
            if ($result4->num_rows > 0) {
                while ($row4= $result4->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row4["gh"]?></td>
                        <td><?php echo $row4["xm"] ?></td>
                        <td><?php echo $row4["xb"] ?></td>
                        <td><?php echo $row4["csrq"] ?></td>
                        <td><?php echo $row4["xl"] ?></td>
                        <td><?php echo $row4["jgbz"]?></td>
                        <td><?php echo $row4["mc"] ?></td>
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
