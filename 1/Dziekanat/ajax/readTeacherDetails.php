<?php


//połączenie z bazą
require_once 'db_connection.php';

if(isset($_POST['teacher_id']) && $_POST['teacher_id'] != ""){
	$teacher_id = $_POST['teacher_id'];

	//pobranie danych profesora
	$query = "SELECT * FROM profesores WHERE idProfesores= '$teacher_id'";
	
	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_assoc($result);
	
	//zakodowanie danych do jsona
	$response = json_encode($row);
	
	echo $response;
}

?>