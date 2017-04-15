<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST['nr_albumu']) && isset($_POST['nr_albumu']) != "")
{
	//pobierz id studenta
	$student_id = $_POST[''];

	// Get User Details
	$query = "SELECT * FROM studenci WHERE nr_albumu= '$student_id'";
	if (!$result = mysqli_query($con, $query)) {
		exit(mysqli_error($con));
	}
	$response = array();
	if(mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$response = $row;
		}
	}
	else
	{
		$response['status'] = 200;
		$response['message'] = "Data not found!";
	}
	// display JSON data
	echo json_encode($response);
}
else
{
	$response['status'] = 200;
	$response['message'] = "Invalid Request!";
}

?>