<?php 
require "connbems.php";
date_default_timezone_set('Asia/Taipei'); //更改時差
$time = date("Y-m-d H:i:s"); //這裡為現在時間,格式為西元yyyy年-mm月-dd日 hh時ii分ss秒
$plugname = $_GET["name"];
$plugVoltage = $_GET["voltage"];
$plugCurrent = $_GET["current"];
$plugPower = $_GET["power"];
$plugS = $_GET["s"];
$plugPF = $_GET["PF"];
$first = $_GET["first"];
$searchstatus2 = mysqli_query($conn ,"UPDATE plug SET voltage = '$plugVoltage',current = '$plugCurrent', S = '$plugS', power = '$plugPower', PF = '$plugPF', now = '$time' where name = '$plugname'"); //修改plug的資訊
$searchstatus = mysqli_query($conn ,"select status, schedule from plug where name = '$plugname'"); //印出指定plug的status
$status = mysqli_fetch_row($searchstatus);
echo "find:".$status[0]." ".$status[1];
if($first == 1){
	$update_first = mysqli_query($conn,"update plug set updated_at = '$time', updating = '$time', count = '0', total = '0' where name = '$plugname'"); //記錄初次上傳時間
}
$readtotal = mysqli_query($conn,"select count, total from plug where name = '$plugname'");
$plus = mysqli_fetch_row($readtotal);
$plus[0] = $plus[0] + 1;
$plus[1] = $plus[1] + $plugPower;
$upload = mysqli_query($conn,"update plug set count = '$plus[0]', total = '$plus[1]' where name = '$plugname'");//累積瞬時功率及次數
$updatetimeDiff = mysqli_query($conn,"update plug set timediff = FLOOR(TIMESTAMPDIFF(MINUTE,updating,now)) where name = '$plugname'");
$searchtimediff = mysqli_query($conn ,"select timediff from plug where name = '$plugname'");
$timediff = mysqli_fetch_row($searchtimediff);
if($timediff[0]>=15){
	$pavg = $plus[1]/$plus[0];
	$kWh = $pavg/4;
	$newplugrecord = mysqli_query($conn,"insert into plugtest(name,energy,inserted_at) values('$plugname','$kWh','$time')");
	$newtime = mysqli_query($conn,"update plug set updating = '$time', total = '0', count = '0', timediff = '0' where name = '$plugname'");
}
?>