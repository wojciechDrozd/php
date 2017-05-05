<?php

//połączenie z bazą
require_once 'db_connection.php';

$query = "SELECT * FROM studenci ORDER BY nazwisko ASC";

if (!$result = mysqli_query($con, $query)) {
	exit(mysqli_error($con));
}

//generowanie opcji dla selecta (przedmiot) w formularzu
if(mysqli_num_rows($result) > 0){
	
	while($row = mysqli_fetch_assoc($result)){
		echo '<option>'.$row['nazwisko'].' '.$row['imie'].'</option>';
	}
}
else{
	// brak rekordów
	echo '<option>Brak studentów w bazie.</option>';
}
?>