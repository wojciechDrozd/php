<?php

//połączenie z bazą
require_once 'db_connection.php';


if (isset ( $_POST )) {
	
	$class_date_id = $_POST['class_date_id'];
	$class_name = $_POST ['class_name'];
	$class_type = $_POST['class_type'];
	$date = $_POST['date'];
	
	
	
	
	$query = 
	"UPDATE grafik
	SET 
	data ='$date',
	idprzedmiot = (SELECT idprzedmiot FROM przedmioty WHERE przedmioty.nazwaPrzedmiotu='$class_name'),
	idzajecia = (SELECT idzajecia FROM zajecia WHERE zajecia.nazwa='$class_type')
	WHERE idgrafik = '$class_date_id'";
	
	
	//aktualizacja szczegółów terminu przedmiotu
	mysqli_query ( $con, $query ); 
}
?>