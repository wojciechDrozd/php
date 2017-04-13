<?php

// include Database connection file
require_once 'db_connection.php';

// nagłówek tabeli przedmioty
$data = '<table class="table table-bordered table-striped">
                        <tr>
                            <th>Id </th>
                            <th>Nazwa</th>
                            <th>Wykładowca</th>
                            <th>Id wykładowcy</th>
                            <th>Edytuj</th>
                            <th>Usuń</th>
                        </tr>';

$query = "SELECT * FROM przedmioty";

if (!$result = mysqli_query($con, $query)) {
	exit(mysqli_error($con));
}

// if query results contains rows then featch those rows
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		$data .= '<tr>
                <td>'.$row['idprzedmiot'].'</td>
                <td>'.$row['nazwaPrzedmiotu'].'</td>
                <td>'.$row['wykladowca'].'</td>
                <td>'.$row['Profesores_idProfesores'].'</td>
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