<?php 
if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['major']) 
		&& isset($_POST['year']) && isset($_POST['email']) && isset($_POST['pesel'])){

	//dane do połączenia z bazą
	require_once 'db_connection.php';

	//pobranie wartości z formularza
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$major = $_POST['major'];
	$year = $_POST['year'];
	$email = $_POST['email'];
	$pesel = $_POST['pesel'];
	
	$query = "UPDATE studenci 
	SET 
	imie='$first_name',
	nazwisko='$last_name',
	kierunek='$major',
	semestr='$year',
	email='$email',
	WHERE pesel='$pesel'";
			; 
	
	$result = mysqli_query($con, $query);
	}
?>