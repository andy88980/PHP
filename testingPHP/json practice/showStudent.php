<?
if($_SERVER["REQUEST_METHOD"] == POST){
	include 'conn.php';
	showStudent();
}
function showStudent(){
	global $connect;
	$query = "Select * FROM student;";
	
	$result = mysqli_query($connect,$query);
	$number_of_row = mysqli_num_rows($result);
	
	$temp_array = array();
	if($number_of_row > 0){
		while($row = mysqli_fetch_assoc($result)){
			$temp_array[] = $row;
		}
	}
	
	header('Content-Type: application/json');
	echo json_encode(array("Students"=>$temp_array));
	mysqli_close($connect);
	
}

?>