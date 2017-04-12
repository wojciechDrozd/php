<?php

if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['faculty']) 
		&& isset($_POST['email']) && isset($_POST['pesel'])){

	//dane do połączenia z bazą
	require_once 'db_connection.php';

	//pobranie wartości z formularza
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$faculty = $_POST['faculty'];
	$email = $_POST['email'];
	$pesel = $_POST['pesel'];
	
	$query = "INSERT INTO profesores (imie,nazwisko,katedra,email,pesel) 
				VALUES('$first_name','$last_name','$faculty','$email', '$pesel')";
	
	$result = mysqli_query($con, $query);
	}
?>