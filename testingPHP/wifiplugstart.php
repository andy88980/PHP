<?php 
require "connbems.php";
date_default_timezone_set('Asia/Taipei'); //更改時差
$time = date("Y-m-d H:i:s"); //這裡為現在時間,格式為西元yyyy年-mm月-dd日 hh時ii分ss秒
$plugname = $_GET["name"];
$updatetime = mysqli_query($conn ,"UPDATE plug SET now = '$time' where name = '$plugname'");
$puttime = mysqli_query($conn ,"UPDATE plug SET timedif = FLOOR(TIMESTAMPDIFF(SECOND,now,start)) where name = '$plugname'"); 
$searchtimedif = mysqli_query($conn ,"select timedif from plug where name = '$plugname'"); 
$timedif = mysqli_fetch_row($searchtimedif);
if($timedif[0] <= 0) {
	$putstatus = mysqli_query($conn ,"UPDATE plug SET status = 1 where name = '$plugname'"); 
	}else {
		echo "hellow world";
	}
?>