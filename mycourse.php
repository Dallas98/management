<!DOCTYPE html>
<?php
session_start();
require "connect.inc.php";
if (isset($_SESSION["IsLogin"]) && $_SESSION["IsLogin"] === 1) {
    $sql6 = "select xm from s where xh='" . $_SESSION["username"] . "'";
    $result6 = $conn->query($sql6);
    if ($result6->num_rows > 0) {
        while ($row6 = $result6->fetch_assoc()) {
            $user = $row6["xm"];
        }
    }
}
//$sql3 = "select xq from term where id=1";
//$result3 = $conn->query($sql3);
//if ($result3->num_rows > 0) {
//    while ($row3 = $result3->fetch_assoc()) {
//        $_POST["xxq"] = $row3["xq"];
//    }
//}
?>
<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>
        我的课程表
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
<h1 align="center"><?php echo $user ?>2018-2019的课程表</h1>
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
        <th>学分</th>
        <th>上课时间</th>
        <th>任教老师</th>
        </thead>
        <?php
        require "connect.inc.php";

        if (isset($_POST["sub3"])) {
            echo $_POST["xxq"];
            $sql7 = "select e.xq,o.sksj,e.kh,c.km,c.xf,t.xm from e,c,t,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.gh=t.gh and e.kh=o.kh and t.gh=o.gh and e.xq=o.xq and e.xq='" . $_POST["xxq"] . "'";
            $result7 = $conn->query($sql7);
            if ($result7->num_rows > 0) {
                while ($row7 = $result7->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row7["xq"] ?></td>
                        <td><?php echo $row7["kh"] ?></td>
                        <td><?php echo $row7["km"] ?></td>
                        <td><?php echo $row7["xf"] ?></td>
                        <td><?php echo $row7["sksj"] ?></td>
                        <td><?php echo $row7["xm"] ?></td>
                    </tr>
                    <?php
                }
            } else {
                echo "           没有结果显示";
            }
        }
        ?>

    </table>

    <!-- <table class="table">
        <thead>
        <th></th>
        <th>星期一</th>
        <th>星期二</th>
        <th>星期三</th>
        <th>星期四</th>
        <th>星期五</th>
        </thead>
        <tr>
            <td>1-2</td>
            <td>
                <?php
                require "connect.inc.php";
                $sql8 = "select DISTINCT c.km,o.sksj from e,c,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.kh=o.kh  and o.xq='" . $_POST["xxq"] . "'";
                $result8 = $conn->query($sql8);
                if ($result8->num_rows > 0) {
                    while ($row8 = $result8->fetch_assoc()) {
                        $sksj = $row8["sksj"];
                        $sql9 = "select flag from b where sksj='$sksj'";
                        $result9 = $conn->query($sql9);
                        $row = $result9->fetch_assoc();
                        $flag = $row["flag"];
                        if ($flag == 1) {
                            echo $row8["km"];
                        }
                    }
                }
                ?>
            </td>
            <td>
                <?php
                require "connect.inc.php";
                $sql8 = "select DISTINCT c.km,o.sksj from e,c,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.kh=o.kh  and o.xq='" . $_POST["xxq"] . "'";
                $result8 = $conn->query($sql8);
                if ($result8->num_rows > 0) {
                    while ($row8 = $result8->fetch_assoc()) {
                        $sksj = $row8["sksj"];
                        $sql9 = "select flag from b where sksj='$sksj'";
                        $result9 = $conn->query($sql9);
                        $row = $result9->fetch_assoc();
                        $flag = $row["flag"];
                        if ($flag == 7) {
                            echo $row8["km"];
                        }
                    }
                }
                ?>
            </td>
            <td>
                <?php
                require "connect.inc.php";
                $sql8 = "select DISTINCT c.km,o.sksj from e,c,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.kh=o.kh  and o.xq='" . $_POST["xxq"] . "'";
                $result8 = $conn->query($sql8);
                if ($result8->num_rows > 0) {
                    while ($row8 = $result8->fetch_assoc()) {
                        $sksj = $row8["sksj"];
                        $sql9 = "select flag from b where sksj='$sksj'";
                        $result9 = $conn->query($sql9);
                        $row = $result9->fetch_assoc();
                        $flag = $row["flag"];
                        if ($flag == 13) {
                            echo $row8["km"];
                        }
                    }
                }
                ?>
            </td>
            <td>
                <?php
                require "connect.inc.php";
                $sql8 = "select DISTINCT c.km,o.sksj from e,c,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.kh=o.kh  and o.xq='" . $_POST["xxq"] . "'";
                $result8 = $conn->query($sql8);
                if ($result8->num_rows > 0) {
                    while ($row8 = $result8->fetch_assoc()) {
                        $sksj = $row8["sksj"];
                        $sql9 = "select flag from b where sksj='$sksj'";
                        $result9 = $conn->query($sql9);
                        $row = $result9->fetch_assoc();
                        $flag = $row["flag"];
                        if ($flag == 19) {
                            echo $row8["km"];
                        }
                    }
                }
                ?>
            </td>
            <td>
                <?php
                require "connect.inc.php";
                $sql8 = "select DISTINCT c.km,o.sksj from e,c,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.kh=o.kh  and o.xq='" . $_POST["xxq"] . "'";
                $result8 = $conn->query($sql8);
                if ($result8->num_rows > 0) {
                    while ($row8 = $result8->fetch_assoc()) {
                        $sksj = $row8["sksj"];

                        $sql9 = "select flag from b where sksj='$sksj'";
                        $result9 = $conn->query($sql9);
                        $row = $result9->fetch_assoc();
                        $flag = $row["flag"];
                        if ($flag == 25) {
                            echo $row8["km"];
                        }
                    }
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>3-4</td>
            <td>
                <?php
                require "connect.inc.php";
                $sql8 = "select DISTINCT c.km,o.sksj from e,c,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.kh=o.kh  and o.xq='" . $_POST["xxq"] . "'";
                $result8 = $conn->query($sql8);
                 if ($result8->num_rows > 0) {
                    while ($row8 = $result8->fetch_assoc()) {
                        $sksj = $row8["sksj"];

                        $sql9 = "select flag from b where sksj='$sksj'";
                        $result9 = $conn->query($sql9);
                        $row = $result9->fetch_assoc();
                        $flag = $row["flag"];
                        if ($flag == 2) {
                            echo $row8["km"];
                        }
                    }
                }
                ?>
            </td>
            <td>
                <?php
                require "connect.inc.php";
                $sql8 = "select DISTINCT c.km,o.sksj from e,c,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.kh=o.kh  and o.xq='" . $_POST["xxq"] . "'";
                $result8 = $conn->query($sql8);
                if ($result8->num_rows > 0) {
                    while ($row8 = $result8->fetch_assoc()) {
                        $sksj = $row8["sksj"];

                        $sql9 = "select flag from b where sksj='$sksj'";
                        $result9 = $conn->query($sql9);
                        $row = $result9->fetch_assoc();
                        $flag = $row["flag"];
                        if ($flag == 8) {
                            echo $row8["km"];
                        }
                    }
                }
                ?>
            </td>
            <td>
                <?php
                require "connect.inc.php";
                $sql8 = "select DISTINCT c.km,o.sksj from e,c,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.kh=o.kh  and o.xq='" . $_POST["xxq"] . "'";
                $result8 = $conn->query($sql8);
                if ($result8->num_rows > 0) {
                    while ($row8 = $result8->fetch_assoc()) {
                        $sksj = $row8["sksj"];

                        $sql9 = "select flag from b where sksj='$sksj'";
                        $result9 = $conn->query($sql9);
                        $row = $result9->fetch_assoc();
                        $flag = $row["flag"];
                        if ($flag == 14) {
                            echo $row8["km"];
                        }
                    }
                }
                ?>
            </td>
            <td>
                <?php
                require "connect.inc.php";
                $sql8 = "select DISTINCT c.km,o.sksj from e,c,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.kh=o.kh  and o.xq='" . $_POST["xxq"] . "'";
                $result8 = $conn->query($sql8);
                if ($result8->num_rows > 0) {
                    while ($row8 = $result8->fetch_assoc()) {
                        $sksj = $row8["sksj"];

                        $sql9 = "select flag from b where sksj='$sksj'";
                        $result9 = $conn->query($sql9);
                        $row = $result9->fetch_assoc();
                        $flag = $row["flag"];
                        if ($flag == 20) {
                            echo $row8["km"];
                        }
                    }
                }
                ?>
            </td>
            <td>
                <?php
                require "connect.inc.php";
                $sql8 = "select DISTINCT c.km,o.sksj from e,c,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.kh=o.kh  and o.xq='" . $_POST["xxq"] . "'";
                $result8 = $conn->query($sql8);
                if ($result8->num_rows > 0) {
                    while ($row8 = $result8->fetch_assoc()) {
                        $sksj = $row8["sksj"];

                        $sql9 = "select flag from b where sksj='$sksj'";
                        $result9 = $conn->query($sql9);
                        $row = $result9->fetch_assoc();
                        $flag = $row["flag"];
                        if ($flag == 26) {
                            echo $row8["km"];
                        }
                    }
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>5-6</td>
            <td>
                <?php
                require "connect.inc.php";
                $sql8 = "select DISTINCT c.km,o.sksj from e,c,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.kh=o.kh  and o.xq='" . $_POST["xxq"] . "'";
                $result8 = $conn->query($sql8);
                if ($result8->num_rows > 0) {
                    while ($row8 = $result8->fetch_assoc()) {
                        $sksj = $row8["sksj"];

                        $sql9 = "select flag from b where sksj='$sksj'";
                        $result9 = $conn->query($sql9);
                        $row = $result9->fetch_assoc();
                        $flag = $row["flag"];
                        if ($flag == 3) {
                            echo $row8["km"];
                        }
                    }
                }
                ?>
            </td>
            <td>
                <?php
                require "connect.inc.php";
                $sql8 = "select DISTINCT c.km,o.sksj from e,c,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.kh=o.kh  and o.xq='" . $_POST["xxq"] . "'";
                $result8 = $conn->query($sql8);
                if ($result8->num_rows > 0) {
                    while ($row8 = $result8->fetch_assoc()) {
                        $sksj = $row8["sksj"];

                        $sql9 = "select flag from b where sksj='$sksj'";
                        $result9 = $conn->query($sql9);
                        $row = $result9->fetch_assoc();
                        $flag = $row["flag"];
                        if ($flag == 9) {
                            echo $row8["km"];
                        }
                    }
                }
                ?>
            </td>
            <td>
                <?php
                require "connect.inc.php";
                $sql8 = "select DISTINCT c.km,o.sksj from e,c,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.kh=o.kh  and o.xq='" . $_POST["xxq"] . "'";
                $result8 = $conn->query($sql8);
                if ($result8->num_rows > 0) {
                    while ($row8 = $result8->fetch_assoc()) {
                        $sksj = $row8["sksj"];

                        $sql9 = "select flag from b where sksj='$sksj'";
                        $result9 = $conn->query($sql9);
                        $row = $result9->fetch_assoc();
                        $flag = $row["flag"];
                        if ($flag == 15) {
                            echo $row8["km"];
                        }
                    }
                }
                ?>
            </td>
            <td>
                <?php
                require "connect.inc.php";
                $sql8 = "select DISTINCT c.km,o.sksj from e,c,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.kh=o.kh  and o.xq='" . $_POST["xxq"] . "'";
                $result8 = $conn->query($sql8);
                if ($result8->num_rows > 0) {
                    while ($row8 = $result8->fetch_assoc()) {
                        $sksj = $row8["sksj"];

                        $sql9 = "select flag from b where sksj='$sksj'";
                        $result9 = $conn->query($sql9);
                        $row = $result9->fetch_assoc();
                        $flag = $row["flag"];
                        if ($flag == 21) {
                            echo $row8["km"];
                        }
                    }
                }
                ?>
            </td>
            <td>
                <?php
                require "connect.inc.php";
                $sql8 = "select DISTINCT c.km,o.sksj from e,c,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.kh=o.kh  and o.xq='" . $_POST["xxq"] . "'";
                $result8 = $conn->query($sql8);
                if ($result8->num_rows > 0) {
                    while ($row8 = $result8->fetch_assoc()) {
                        $sksj = $row8["sksj"];

                        $sql9 = "select flag from b where sksj='$sksj'";
                        $result9 = $conn->query($sql9);
                        $row = $result9->fetch_assoc();
                        $flag = $row["flag"];
                        if ($flag == 27) {
                            echo $row8["km"];
                        }
                    }
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>7-8</td>
            <td>
                <?php
                require "connect.inc.php";
                $sql8 = "select DISTINCT c.km,o.sksj from e,c,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.kh=o.kh  and o.xq='" . $_POST["xxq"] . "'";
                $result8 = $conn->query($sql8);
                if ($result8->num_rows > 0) {
                    while ($row8 = $result8->fetch_assoc()) {
                        $sksj = $row8["sksj"];

                        $sql9 = "select flag from b where sksj='$sksj'";
                        $result9 = $conn->query($sql9);
                        $row = $result9->fetch_assoc();
                        $flag = $row["flag"];
                        if ($flag == 4) {
                            echo $row8["km"];
                        }
                    }
                }
                ?>
            </td>
            <td>
                <?php
                require "connect.inc.php";
                $sql8 = "select DISTINCT c.km,o.sksj from e,c,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.kh=o.kh  and o.xq='" . $_POST["xxq"] . "'";
                $result8 = $conn->query($sql8);
                if ($result8->num_rows > 0) {
                    while ($row8 = $result8->fetch_assoc()) {
                        $sksj = $row8["sksj"];

                        $sql9 = "select flag from b where sksj='$sksj'";
                        $result9 = $conn->query($sql9);
                        $row = $result9->fetch_assoc();
                        $flag = $row["flag"];
                        if ($flag == 10) {
                            echo $row8["km"];
                        }
                    }
                }
                ?>
            </td>
            <td>
                <?php
                require "connect.inc.php";
                $sql8 = "select DISTINCT c.km,o.sksj from e,c,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.kh=o.kh  and o.xq='" . $_POST["xxq"] . "'";
                $result8 = $conn->query($sql8);
                if ($result8->num_rows > 0) {
                    while ($row8 = $result8->fetch_assoc()) {
                        $sksj = $row8["sksj"];

                        $sql9 = "select flag from b where sksj='$sksj'";
                        $result9 = $conn->query($sql9);
                        $row = $result9->fetch_assoc();
                        $flag = $row["flag"];
                        if ($flag == 16) {
                            echo $row8["km"];
                        }
                    }
                }
                ?>
            </td>
            <td>
                <?php
                require "connect.inc.php";
                $sql8 = "select DISTINCT c.km,o.sksj from e,c,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.kh=o.kh  and o.xq='" . $_POST["xxq"] . "'";
                $result8 = $conn->query($sql8);
                if ($result8->num_rows > 0) {
                    while ($row8 = $result8->fetch_assoc()) {
                        $sksj = $row8["sksj"];
                        $sql9 = "select flag from b where sksj='$sksj'";
                        $result9 = $conn->query($sql9);
                        $row = $result9->fetch_assoc();
                        $flag = $row["flag"];
                        if ($flag == 22) {
                            echo $row8["km"];
                        }
                    }
                }
                ?>
            </td>
            <td>
                <?php
                require "connect.inc.php";
                $sql8 = "select DISTINCT c.km,o.sksj from e,c,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.kh=o.kh  and o.xq='" . $_POST["xxq"] . "'";
                $result8 = $conn->query($sql8);
                if ($result8->num_rows > 0) {
                    while ($row8 = $result8->fetch_assoc()) {
                        $sksj = $row8["sksj"];
                        $sql9 = "select flag from b where sksj='$sksj'";
                        $result9 = $conn->query($sql9);
                        $row = $result9->fetch_assoc();
                        $flag = $row["flag"];
                        if ($flag == 28) {
                            echo $row8["km"];
                        }
                    }
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>9-10</td>
            <td>
                <?php
                require "connect.inc.php";
                $sql8 = "select DISTINCT c.km,o.sksj from e,c,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.kh=o.kh  and o.xq='" . $_POST["xxq"] . "'";
                $result8 = $conn->query($sql8);
                  if ($result8->num_rows > 0) {
                    while ($row8 = $result8->fetch_assoc()) {
                        $sksj = $row8["sksj"];

                        $sql9 = "select flag from b where sksj='$sksj'";
                        $result9 = $conn->query($sql9);
                        $row = $result9->fetch_assoc();
                        $flag = $row["flag"];
                        if ($flag == 5) {
                            echo $row8["km"];
                        }
                    }
                }
                ?>
            </td>
            <td>
                <?php
                require "connect.inc.php";
                $sql8 = "select DISTINCT c.km,o.sksj from e,c,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.kh=o.kh  and o.xq='" . $_POST["xxq"] . "'";
                $result8 = $conn->query($sql8);
                if ($result8->num_rows > 0) {
                    while ($row8 = $result8->fetch_assoc()) {
                        $sksj = $row8["sksj"];

                        $sql9 = "select flag from b where sksj='$sksj'";
                        $result9 = $conn->query($sql9);
                        $row = $result9->fetch_assoc();
                        $flag = $row["flag"];
                        if ($flag == 11) {
                            echo $row8["km"];
                        }
                    }
                }
                ?>
            </td>
            <td>
                <?php
                require "connect.inc.php";
                $sql8 = "select DISTINCT c.km,o.sksj from e,c,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.kh=o.kh  and o.xq='" . $_POST["xxq"] . "'";
                $result8 = $conn->query($sql8);

                if ($result8->num_rows > 0) {
                    while ($row8 = $result8->fetch_assoc()) {
                        $sksj = $row8["sksj"];

                        $sql9 = "select flag from b where sksj='$sksj'";
                        $result9 = $conn->query($sql9);
                        $row = $result9->fetch_assoc();
                        $flag = $row["flag"];
                        if ($flag == 17) {
                            echo $row8["km"];
                        }
                    }
                }
                ?>
            </td>
            <td>
                <?php
                require "connect.inc.php";
                $sql8 = "select DISTINCT c.km,o.sksj from e,c,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.kh=o.kh  and o.xq='" . $_POST["xxq"] . "'";
                $result8 = $conn->query($sql8);

                if ($result8->num_rows > 0) {
                    while ($row8 = $result8->fetch_assoc()) {
                        $sksj = $row8["sksj"];
                        $sql9 = "select flag from b where sksj='$sksj'";
                        $result9 = $conn->query($sql9);
                        $row = $result9->fetch_assoc();
                        $flag = $row["flag"];
                        if ($flag == 23) {
                            echo $row8["km"];
                        }
                    }
                }
                ?>
            </td>
            <td>
                <?php
                require "connect.inc.php";
                $sql8 = "select DISTINCT c.km,o.sksj from e,c,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.kh=o.kh  and o.xq='" . $_POST["xxq"] . "'";
                $result8 = $conn->query($sql8);
                if ($result8->num_rows > 0) {
                    while ($row8 = $result8->fetch_assoc()) {
                        $sksj = $row8["sksj"];
                        $sql9 = "select flag from b where sksj='$sksj'";
                        $result9 = $conn->query($sql9);
                        $row = $result9->fetch_assoc();
                        $flag = $row["flag"];
                        if ($flag == 29) {
                            echo $row8["km"];
                        }
                    }
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>11-12</td>
            <td>
                <?php
                require "connect.inc.php";
                $sql8 = "select DISTINCT c.km,o.sksj from e,c,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.kh=o.kh  and o.xq='" . $_POST["xxq"] . "'";
                $result8 = $conn->query($sql8);
                if ($result8->num_rows > 0) {
                    while ($row8 = $result8->fetch_assoc()) {
                        $sksj = $row8["sksj"];
                        $sql9 = "select flag from b where sksj='$sksj'";
                        $result9 = $conn->query($sql9);
                        $row = $result9->fetch_assoc();
                        $flag = $row["flag"];
                        if ($flag == 6) {
                            echo $row8["km"];
                        }
                    }
                }
                ?>
            </td>
            <td>
                <?php
                require "connect.inc.php";
                $sql8 = "select DISTINCT c.km,o.sksj from e,c,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.kh=o.kh  and o.xq='" . $_POST["xxq"] . "'";
                $result8 = $conn->query($sql8);
                if ($result8->num_rows > 0) {
                    while ($row8 = $result8->fetch_assoc()) {
                        $sksj = $row8["sksj"];
                        $sql9 = "select flag from b where sksj='$sksj'";
                        $result9 = $conn->query($sql9);
                        $row = $result9->fetch_assoc();
                        $flag = $row["flag"];
                        if ($flag == 12) {
                            echo $row8["km"];
                        }
                    }
                }
                ?>
            </td>
            <td>
                <?php
                require "connect.inc.php";
                $sql8 = "select DISTINCT c.km,o.sksj from e,c,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.kh=o.kh  and o.xq='" . $_POST["xxq"] . "'";
                $result8 = $conn->query($sql8);
                if ($result8->num_rows > 0) {
                    while ($row8 = $result8->fetch_assoc()) {
                        $sksj = $row8["sksj"];
                        $sql9 = "select flag from b where sksj='$sksj'";
                        $result9 = $conn->query($sql9);
                        $row = $result9->fetch_assoc();
                        $flag = $row["flag"];
                        if ($flag == 18) {
                            echo $row8["km"];
                        }
                    }
                }
                ?>
            </td>
            <td>
                <?php
                require "connect.inc.php";
                $sql8 = "select DISTINCT c.km,o.sksj from e,c,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.kh=o.kh  and o.xq='" . $_POST["xxq"] . "'";
                $result8 = $conn->query($sql8);
                if ($result8->num_rows > 0) {
                    while ($row8 = $result8->fetch_assoc()) {
                        $sksj = $row8["sksj"];
                        $sql9 = "select flag from b where sksj='$sksj'";
                        $result9 = $conn->query($sql9);
                        $row = $result9->fetch_assoc();
                        $flag = $row["flag"];
                        if ($flag == 24) {
                            echo $row8["km"];
                        }
                    }
                }
                ?>
            </td>
            <td>
                <?php
                require "connect.inc.php";
                $sql8 = "select DISTINCT c.km,o.sksj from e,c,o where e.xh='" . $_SESSION["username"] . "' and e.kh=c.kh and e.kh=o.kh  and o.xq='" . $_POST["xxq"] . "'";
                $result8 = $conn->query($sql8);
                if ($result8->num_rows > 0) {
                    while ($row8 = $result8->fetch_assoc()) {
                        $sksj = $row8["sksj"];
                        $sql9 = "select flag from b where sksj='$sksj'";
                        $result9 = $conn->query($sql9);
                        $row = $result9->fetch_assoc();
                        $flag = $row["flag"];
                        if ($flag == 30) {
                            echo $row8["km"];
                        }
                    }
                }
                ?>
            </td>
        </tr>


    </table> -->
</div>
</body>
</html>
