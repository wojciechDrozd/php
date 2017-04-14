<?php

//select for dropdown form

require_once 'db_connection.php';

$query = "SELECT * FROM profesores";

if (!$result = mysqli_query($con, $query)) {
	exit(mysqli_error($con));
}

//wynik zapytania
if(mysqli_num_rows($result) > 0)
{
	
echo <<<EOD
	<label for="select_teacher">Prowadzący</label> <select class="form-control" id="teacher_full_name">
EOD;
	
	while($row = mysqli_fetch_assoc($result))
	{
		echo '<option>'.$row['imie'].' '.$row['nazwisko'].'</option>';
           
	}
	
	echo '</select>';
	
}
else
{
	// brak rekordów
	echo '<option>Brak wykładowców!</option>';
}
?>
