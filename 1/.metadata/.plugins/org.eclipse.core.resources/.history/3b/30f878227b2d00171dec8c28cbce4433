<?php

//połączenie z bazą
require_once 'db_connection.php';


if (isset ( $_POST )) {
	
	$class_date_id = $_POST['class_date_id'];
	$class_name = $_POST ['class_name'];
	$class_type = $_POST['class_type'];
	$date = $_POST['date'];
	
	
	
	
	$query = "UPDATE grafik
	SET 
	data ='$date',
	grafik.idprzedmiot= (SELECT przedmiot.idprzedmiot FROM przedmioty WHERE przedmioty.nazwaPrzedmiotu='$class_name'),
	grafik.idzajecia = (SELECT zajecia.idzajecia FROM zajecia WHERE zajecia.idzajecia='$class_type')";
	
	
	//aktualizacja szczegółów terminu przedmiotu
	mysqli_query ( $con, $query ); 
}
?>