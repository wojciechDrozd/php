<?php


if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['major']) 
		&& isset($_POST['year']) && isset($_POST['email']) && isset($_POST['pesel'])){

	//połączenie z bazą
	require_once 'db_connection.php';

	//pobranie wartości z formularza
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$major = $_POST['major'];
	$year = $_POST['year'];
	$email = $_POST['email'];
	$pesel = $_POST['pesel'];
	
	//dodanie studenta do bazy
	$query = "INSERT INTO studenci (imie,nazwisko,kierunek,semestr,email,pesel) 
				VALUES('$first_name','$last_name','$major','$year','$email', '$pesel')";
	
	$result = mysqli_query($con, $query);
	}
?>