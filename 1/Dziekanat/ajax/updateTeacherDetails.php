<?php
require_once 'db_connection.php';


if (isset ( $_POST )) {
	
	
	$first_name = $_POST ['first_name'];
	$last_name  = $_POST ['last_name'];
	$faculty = $_POST['faculty'];
	$email = $_POST['email'];
	$pesel = $_POST['pesel'];
	$teacher_id = $_POST['teacher_id'];
	
	//aktualizacja danych pracownika
	$query = "UPDATE profesores 
	SET imie = '$first_name',
	nazwisko = '$last_name',
	katedra = '$faculty',
	email = '$email',
	pesel = '$pesel'
	WHERE idProfesores ='$teacher_id'"; 
	
	mysqli_query ( $con, $query ); 
}
?>