<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST['idprzedmiot']) && isset($_POST['idprzedmiot']) != "")
{
	//pobierz id studenta
	$class_id = $_POST['idprzedmiot'];

	// Get User Details
	$query = "SELECT * FROM przedmioty WHERE idprzedmiot='$class_id'";
	if (!$result = mysqli_query($con, $query)) {
		exit(mysqli_error($con));
	}
	
    $row = mysqli_fetch_assoc($result);
    
	// display JSON data
	echo json_encode($row);
}

?>