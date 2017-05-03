<?php


//połączenie z bazą
require_once 'db_connection.php';

if (isset ( $_POST['student_id']) && $_POST['student_id'] != " ") {
	
	$student_id = $_POST['student_id'];
	$first_name = $_POST ['first_name'];
	$last_name = $_POST ['last_name'];
	$major = $_POST ['major'];
	$year = $_POST ['year'];
	$email = $_POST ['email'];
	$pesel = $_POST ['pesel'];
	
	//aktualizacja danych studenta
	$query = "UPDATE studenci 
	SET imie = '$first_name', 
	nazwisko = '$last_name', 
	kierunek = '$major',
	semestr = '$year',
	email = '$email',
	pesel = '$pesel'
	WHERE nrAlbumu = '$student_id'";
	
	mysqli_query ( $con, $query );
}
?>