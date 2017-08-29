<?php 
require "connbems.php";
$plugname = $_GET["name"];
$plugVoltage = $_GET["voltage"];
$plugCurrent = $_GET["current"];
$plugangle = $_GET["angle"];
$plugS = $_GET["s"];
$plugPower = $_GET["power"];
$plugVx = $_GET["vx"];
$searchstatus2 = mysqli_query($conn ,"UPDATE plug SET voltage = '$plugVoltage',current = '$plugCurrent', S = '$plugS', P = '$plugPower', space1 = '$plugangle', space2 = '$plugVx' where name = '$plugname'"); //修改plug的資訊
$searchstatus = mysqli_query($conn ,"select status, schedule from plug where name = '$plugname'"); //印出指定plug的status
$status = mysqli_fetch_row($searchstatus);
echo $status[0]." ".$status[1];
?>