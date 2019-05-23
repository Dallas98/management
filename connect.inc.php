<?php
$servername = 'localhost';
$user = 'root';
$pwd = 'YP072860las';
// $database = 'outdoors';
$dbname = 'school';


$conn = new mysqli($servername, $user, $pwd, $dbname);
//$conn=mysql_connect("localhost:3306","root","YP072860las");

if ($conn->connect_error) {
    echo 'helloworld！';
    die('连接失败:' . $conn->connect_error);
}
//echo'<br>';
$conn->set_charset("utf8");

$sql = "select * from s";
$sql2 = "select * from C ";
$result = $conn->query($sql);
$result2 = $conn->query($sql2);

?>
