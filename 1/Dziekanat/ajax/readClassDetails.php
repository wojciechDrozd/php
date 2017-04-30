<?php


//połączenie z bazą
require_once 'db_connection.php';

if(isset($_POST['class_id']) && $_POST['class_id'] != "")
{
	$class_id = $_POST['class_id'];

	//pobranie danych przedmiotu
	$query = "SELECT nazwaPrzedmiotu,wykladowca 
	FROM przedmioty 
	WHERE idprzedmiot='$class_id'";
	
	$result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    
    //zakodowanie danych do jsona
	$response= json_encode($row);
	
	echo $response;
	
}

?>