<?php
if (isset ($_POST ['class_name']) && isset ($_POST ['student_full_name']) ) {
	
	//połączenie z bazą
	require_once 'db_connection.php';
	
	// pobranie wartości z formularza
	$class_name = $_POST ['class_name'];
	$student_full_name = $_POST ['student_full_name'];
	$exploded = explode ( " ", $student_full_name );
	$student_surname = trim ( $exploded [0] );
	$student_first_name = trim ( $exploded [1] );
	
	
 	//pobranie danych studenta
	$query = "SELECT * FROM studenci WHERE imie='$student_first_name' AND nazwisko='$student_surname'";
	$result = mysqli_query ( $con, $query );
	$row = mysqli_fetch_assoc ( $result );
	$student_id = $row ['nrAlbumu'];
		
	//pobranie danych przedmiotu
	$query = "SELECT * FROM przedmioty WHERE nazwaPrzedmiotu='$class_name'";
	$result = mysqli_query ( $con, $query );
	$row = mysqli_fetch_assoc ( $result );
	$class_id = $row ['idprzedmiot'];
	
	
	//dodanie przedmiotu do bazy
	$query = "INSERT INTO studenci_has_przedmioty (studenci_nr_albumu,przedmioty_idprzedmiot_1) 
				VALUES('$student_id','$class_id')";  
	
	$result = mysqli_query ( $con, $query );
}