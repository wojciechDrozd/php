<?php

//połączenie z bazą
require_once 'db_connection.php';

// nagłówek tabeli pracownicy
$data = '<table class="table table-bordered table-striped">
                        <tr>
                            <th>Imię</th>
                            <th>Nazwisko</th>
                            <th>Katedra</th>
							<th>Email</th>
							<th>PESEL</th>
                            <th>Edytuj</th>
                            <th>Usuń</th>
                        </tr>';

$query = "SELECT * FROM profesores";

if (!$result = mysqli_query($con, $query)) {
	exit(mysqli_error($con));
}

//wynik zapytania
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		$data .= '<tr>
                <td>'.$row['imie'].'</td>
                <td>'.$row['nazwisko'].'</td>
                <td>'.$row['katedra'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['pesel'].'</td>
                <td><button onclick="getTeacherDetails('.$row['pesel'].')" class="btn btn-warning"><i class="material-icons">mode_edit</i></button></td>
                <td><button onclick="deleteTeacher('.$row['pesel'].')" class="btn btn-danger"><i class="material-icons">delete</i></button></td>
            </tr>';
	}
}
else
{
	// brak rekordów
	$data .= '<tr><td colspan="6">Records not found!</td></tr>';
}

$data .= '</table>';

echo $data;
?>