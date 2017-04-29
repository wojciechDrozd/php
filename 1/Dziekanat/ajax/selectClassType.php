<?php

//połączenie z bazą
require_once 'db_connection.php';

$query = "SELECT * FROM zajecia";

if (!$result = mysqli_query($con, $query)) {
	exit(mysqli_error($con));
}

//generowanie opcji dla selecta (rodzaj zajęć) w formularzu dodawania terminu zajęć
if(mysqli_num_rows($result) > 0){

	while($row = mysqli_fetch_assoc($result))
	{
		echo '<option>'.$row['nazwa'].'</option>';

	}


}
else{
	echo '<option>Brak zajęć w bazie.</option>';
}

?>
