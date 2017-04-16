<?php

if(isset($_POST['student_id']) && isset($_POST['student_id']) != "")
{
	//połączenie z bazą
	require_once 'db_connection.php';

	$student_id= $_POST['student_id'];

	//usunięcie studenta z bazy
	$query = "DELETE FROM studenci WHERE nrAlbumu='$student_id'";
	if (!$result = mysqli_query($con, $query)) {
		exit(mysqli_error($con));
	}
}
?>