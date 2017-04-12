<?php

// include Database connection file
require_once 'db_connection.php';

// nagłówek tabeli studenci
$data = '<table class="table table-bordered table-striped">
                        <tr>
                            <th>Id</th>
                            <th>Imię</th>
                            <th>Nazwisko</th>
                            <th>Katedra</th>
							<th>Email</th>
							<th>Pesel</th>
                            <th>Edytuj</th>
                            <th>Usuń</th>
                        </tr>';

$query = "SELECT * FROM profesores";

if (!$result = mysqli_query($con, $query)) {
	exit(mysqli_error($con));
}

// if query results contains rows then featch those rows
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		$data .= '<tr>
                <td>'.$row['idProfesores'].'</td>
                <td>'.$row['imie'].'</td>
                <td>'.$row['nazwisko'].'</td>
                <td>'.$row['katedra'].'</td>
                <td>'.$row['mail'].'</td>
                <td>'.$row['pesel'].'</td>
                <td>
                <button onclick="GetTeacherDetails('.$row['pesel'].')" class="btn btn-warning">Edytuj</button>
                </td>
                <td>
                <button onclick="DeleteTeacher('.$row['pesel'].')" class="btn btn-danger">Usuń</button>
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
?>