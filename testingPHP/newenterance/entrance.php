<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	require 'conn.php';
	readEntrance();
}

function readEntrance(){
	global $conn;
	$entrancename = $_POST["entrancename"];
	$query = "Select entername From entrance where enter = '$entrancename'";
	mysqli_query($conn,$query);
	
}

?>