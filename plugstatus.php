<?php 
require "connbems.php";
$plugname = $_GET["name"];
$searchstatus = mysqli_query($conn ,"select status, schedule from plug where name = '$plugname'"); //印出指定plug的status
$status = mysqli_fetch_row($searchstatus);
echo $status[0]." ".$status[1];
?>