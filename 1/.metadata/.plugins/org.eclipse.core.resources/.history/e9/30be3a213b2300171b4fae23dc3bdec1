<?php

// połączenie z bazą
require_once 'db_connection.php';

// nagłówek tabeli przedmioty
$data = '<table class="table table-bordered table-striped">
                        <tr>
                            <th>Name</th>
                            <th>Extra</th>
                            <th>Website</th>
                        </tr>';

$query = "SELECT * FROM products";

if (!$result = mysqli_query($con, $query)) {
	exit(mysqli_error($con));
}

// zawartość tabeli przedmioty
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		$data .= '<tr>
                <td>'.$row['name'].'</td>
                <td>'.$row['extra'].'</td>
                <td>'.$row['website'].'</td>
                </tr>';
	}

}
else
{
	//brak rekordów
	$data .= '<tr><td colspan="6">No products fetched.</td></tr>';
}

$data .= '</table>';

echo $data;
?>