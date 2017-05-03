<?php

//połączenie z bazą
require_once 'db_connection.php';

$query = "SELECT * FROM kierunki ORDER BY nazwa ASC";

if (!$result = mysqli_query($con, $query)) {
	exit(mysqli_error($con));
}

//generowanie opcji dla selecta (kierunek) w formularzu
if(mysqli_num_rows($result) > 0)
{
	
	while($row = mysqli_fetch_assoc($result))
	{
		echo '<option>'.$row['nazwa'].'</option>';
           
	}
	
	
}
else
{
	// brak rekordów
	echo '<option>Brak kierunków w bazie.</option>';
}
?>
