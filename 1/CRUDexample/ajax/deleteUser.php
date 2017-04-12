<?php

if(isset($_POST['pesel']) && isset($_POST['pesel']) != "")
{
	require_once 'db_connection.php';

	// get user id
	$pesel= $_POST['pesel'];

	// delete User
	$query = "DELETE FROM studenci WHERE pesel='$pesel'";
	if (!$result = mysqli_query($con, $query)) {
		exit(mysqli_error($con));
	}
}
?>