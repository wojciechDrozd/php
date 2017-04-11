<?php
// check request
if(isset($_POST['pesel']) && isset($_POST['pesel']) != "")
{
	// include Database connection file
	include("db_connection.php");

	// get user id
	$pesel= $_POST['pesel'];

	// delete User
	$query = "DELETE FROM studenci WHERE pesel='$pesel'";
	if (!$result = mysqli_query($con, $query)) {
		exit(mysqli_error($con));
	}
}
?>