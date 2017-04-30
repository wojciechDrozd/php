<?php

if(isset($_POST['class_date_id']) && isset($_POST['class_date_id']) != "")
{
	//połączenie z bazą
	require_once 'db_connection.php';

	
	$class_date_id= $_POST['class_date_id'];

	// usunięcie terminu zajęć z bazy
	$query = "DELETE FROM grafik WHERE idgrafik='$class_date_id'";
	if (!$result = mysqli_query($con, $query)) {
		exit(mysqli_error($con));
	}
}
?>