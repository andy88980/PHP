<?php 
require "conn.php";
$spacename = $_GET["spacename"];
$spacestatus = $_GET["spacestatus"];
$spacename2 = $_GET["spacename2"];
$spacestatus2 = $_GET["spacestatus2"];
$spacename3 = $_GET["spacename3"];
$spacestatus3 = $_GET["spacestatus3"];
$spacename4 = $_GET["spacename4"];
$spacestatus4 = $_GET["spacestatus4"];
$update = "UPDATE spots SET status = '$spacestatus' where spotname = '$spacename'";
mysqli_query($conn ,$update);

$update2 = "UPDATE spots SET status = '$spacestatus2' where spotname = '$spacename2'";
mysqli_query($conn ,$update2);

$update3 = "UPDATE spots SET status = '$spacestatus3' where spotname = '$spacename3'";
mysqli_query($conn ,$update3);

$update4 = "UPDATE spots SET status = '$spacestatus4' where spotname = '$spacename4'";
mysqli_query($conn ,$update4);
?>