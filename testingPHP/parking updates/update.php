<?php 
require "conn.php";
$spacename = $_GET["spacename"];
$spacestatus = $_GET["spacestatus"];
$update = "UPDATE spots SET status = '$spacestatus' where spotname = '$spacename'";
mysqli_query($conn ,$update);
?>