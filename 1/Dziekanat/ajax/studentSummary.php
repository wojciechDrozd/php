<?php

session_start();

if(isset($_SESSION['pesel']) && $_SESSION['pesel'] != ""){
	
	$pesel = $_SESSION['pesel'];

//połączenie z bazą
require_once 'db_connection.php';

// nagłówek tabeli studenci
$data = '<table class="table table-bordered table-striped">
                        <tr>
                            <th>Nr albumu</th>
                            <th>Imię</th>
                            <th>Nazwisko</th>
                            <th>Kierunek studiów</th>
							<th>Semestr</th>
							<th>Email</th>
							<th>PESEL</th>
                        </tr>';

$query = "SELECT * FROM studenci WHERE pesel='$pesel'";

if (!$result = mysqli_query($con, $query)) {
	exit(mysqli_error($con));
}


//zawartość tabeli studenci
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		$data .= '<tr>
                <td>'.$row['nrAlbumu'].'</td>
                <td>'.$row['imie'].'</td>
                <td>'.$row['nazwisko'].'</td>
                <td>'.$row['kierunek'].'</td>
               	<td>'.$row['semestr'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['pesel'].'</td>
            </tr>';
	}
	
}

$data .= '</table>';

echo $data;
                		
}

?>