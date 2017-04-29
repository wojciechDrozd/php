<?php

//połączenie z bazą
require_once 'db_connection.php';


if (isset ( $_POST )) {
	
	$class_id = $_POST['class_id'];
	$class_name = $_POST ['class_name'];
	$teacher_full_name = $_POST ['teacher_full_name'];
	
	//aktualizacja danych przedmiotu
	$query = "UPDATE przedmioty 
	SET nazwaPrzedmiotu = '$class_name',
	wykladowca = '$teacher_full_name'
	WHERE idprzedmiot='$class_id'"; 
	
	mysqli_query ( $con, $query ); 
}
?>