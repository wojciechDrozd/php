<?php

if(isset($_POST['student_id']) && isset($_POST['first_name']) 
		&& isset($_POST['last_name']) && isset($_POST['major']) 
		&& isset($_POST['year']) && isset($_POST['email']) && isset($_POST['pesel'])){

	//dane do połączenia z bazą
	require_once 'db_connection.php';

	//pobranie wartości z formularza
	$student_id = $_POST['student_id'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$major = $_POST['major'];
	$year = $_POST['year'];
	$email = $_POST['email'];
	$pesel = $_POST['pesel'];
	
	$query = "INSERT INTO studenci (nr_albumu,imie,nazwisko,kierunek_studiow,semestr,email,pesel) 
				VALUES('$student_id','$first_name','$last_name','$major','$year','$email', '$pesel')";
	
	$result = mysqli_query($con, $query);
	}
?>