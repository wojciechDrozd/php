<?php

if(isset($_POST['teacher_id']) && isset($_POST['teacher_id']) != "")
{
	//połączenie z bazą
	require_once 'db_connection.php';

	$teacher_id= $_POST['teacher_id'];

	//usunięcie pracownika z bazy
	$query = "DELETE FROM profesores WHERE idProfesores='$teacher_id'";
	if (!$result = mysqli_query($con, $query)) {
		exit(mysqli_error($con));
	}
}
?>