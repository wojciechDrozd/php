<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST['teacher_id']) && isset($_POST['teacher_id']) != "")
{
	//pobierz id studenta
	$teacher_id = $_POST['teacher_id'];

	// Get User Details
	$query = "SELECT * FROM profesores WHERE idProfesores= '$teacher_id'";
	
	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_assoc($result);
	
	$response = json_encode($row);
	
	echo $response;
}

?>