<?php

//połączenie z bazą
require_once 'db_connection.php';

$query = "SELECT * FROM profesores";

if (!$result = mysqli_query($con, $query)) {
	exit(mysqli_error($con));
}

//generowanie opcji dla selecta (pracownik) w formularzu
if(mysqli_num_rows($result) > 0)
{
	
	while($row = mysqli_fetch_assoc($result))
	{
		echo '<option>'.$row['nazwisko'].' '.$row['imie'].'</option>';
           
	}
	
	
}
else
{
	// brak pracowników w bazie
	echo '<option>Brak pracowników.</option>';
}
?>
