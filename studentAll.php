<!DOCTYPE html>
<?php
session_start();

if(isset($_SESSION["IsLogin"])&&$_SESSION["IsLogin"]===1){
    //echo "欢迎来到教师选课管理系统，";
    //echo "当前用户".$_SESSION["username"];




}
// $sql3 = "select num from count1";
// $result3 = $conn->query($sql3);
// if ($result3->num_rows > 0) {
//     while ($row3 = $result3->fetch_assoc()) {
//         $_SESSION["num"] = $row3["num"];
//     }
// }
// $sql3 = "select num from count1";
// $result3 = $conn->query($sql3);
// if ($result3->num_rows > 0) {
//     while ($row3 = $result3->fetch_assoc()) {
//         $num1 = $row3["num"];
//     }
// }

?>
<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
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
<div>

</div>
<!-- <p>123</p> -->
<h1 align="center">学生信息</h1>
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
        <button type="submit" class="btn btn-default" name="sub">查看学生信息</button>
    </form>
    <table>
        <?php
        require "connect.inc.php";
        $sql4="select num from count1";
        $result4=$conn->query($sql4);
        $row4=$result4->fetch_assoc();
        $num=$row4["num"];?>
        <thead>
        <th>学生总人数:<?php echo $num?></th>
        </thead>
    </table>
    <table class="table">
        <thead>
        <th>学号</th>
        <th>姓名</th>
        <th>性别</th>
        <th>出生日期</th>
        <th>籍贯</th>
        <th>联系方式</th>
        <th>所属学院</th>
        </thead>
        <?php
        require "connect.inc.php";
        if(isset($_POST["sub"])){
            $sql4 = "select * from s,d where s.yxh=d.yxh and d.mc='".$_POST["mc"]."'";
            $result4 = $conn->query($sql4);
            if ($result4->num_rows > 0) {
                // 输出数据
                while ($row4 = $result4->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row4["xh"] ?></td>
                        <td><?php echo $row4["xm"] ?></td>
                        <td><?php echo $row4["xb"] ?></td>
                        <td><?php echo $row4["csrq"] ?></td>
                        <td><?php echo $row4["jg"] ?></td>
                        <td><?php echo $row4["sjhm"] ?></td>
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