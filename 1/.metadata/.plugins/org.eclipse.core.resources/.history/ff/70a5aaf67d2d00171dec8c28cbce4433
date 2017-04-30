<?php

if(isset($_POST['class_id']) && isset($_POST['class_id']) != "")
{
	//połączenie z bazą
	require_once 'db_connection.php';

	
	$class_id= $_POST['class_id'];

	// usunięcie przedmiotu z bazy
	$query = "DELETE FROM przedmioty WHERE idprzedmiot='$class_id'";
	if (!$result = mysqli_query($con, $query)) {
		exit(mysqli_error($con));
	}
}
?>