<?php 
require "conn.php";
$spacename = $_GET["spacename"];
$spacestatus = $_GET["spacestatus"];
$spacename2 = $_GET["spacename2"];
$spacestatus2 = $_GET["spacestatus2"];

$update = "UPDATE spots SET status = '$spacestatus' where spotname = '$spacename'";
mysqli_query($conn ,$update);

$update2 = "UPDATE spots SET status = '$spacestatus2' where spotname = '$spacename2'";
mysqli_query($conn ,$update2);
?>