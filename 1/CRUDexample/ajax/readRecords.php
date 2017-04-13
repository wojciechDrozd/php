<?php

// include Database connection file
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
                            <th>Edytuj</th>
                            <th>Usuń</th>
                        </tr>';

$query = "SELECT * FROM studenci";

if (!$result = mysqli_query($con, $query)) {
	exit(mysqli_error($con));
}

// if query results contains rows then featch those rows
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
                <td>
                <button onclick="GetUserDetails('.$row['pesel'].')" class="btn btn-warning">Edytuj</button>
                </td>
                <td>
                <button onclick="DeleteUser('.$row['pesel'].')" class="btn btn-danger">Usuń</button>
                </td>
            </tr>';
	}
	
}
else
{
	// records now found
	$data .= '<tr><td colspan="6">Records not found!</td></tr>';
}

$data .= '</table>';

echo $data;

echo "wtf";
?>