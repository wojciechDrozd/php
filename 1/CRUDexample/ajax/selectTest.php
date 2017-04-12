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
		
		//<td class="first_name" data-id1="'.$row["id"].'" contenteditable>'.$row["first_name"].'</td>  
		$data .= '<tr>
                <td>'.$row['nrAlbumu'].'</td>
                <td class="first_name" data-id1="'.$row['nrAlbumu'].'" contenteditable>'.$row['imie'].'</td>
                <td class="last_name" data-id2="'.$row['nrAlbumu'].'" contenteditable>'.$row['nazwisko'].'</td>
                <td class="major" data-id3="'.$row['nrAlbumu'].'" contenteditable>'.$row['kierunek'].'</td>
                <td class="year" data-id4="'.$row['nrAlbumu'].'" contenteditable>'.$row['semestr'].'</td>
                <td class="email" data-id5="'.$row['nrAlbumu'].'" contenteditable>'.$row['email'].'</td>
                <td class="pesel" data-id6="'.$row['nrAlbumu'].'" contenteditable>'.$row['pesel'].'</td>
            </tr>';
	}

	$data .= '
           <tr>
                <td></td>
                <td id="first_name" contenteditable></td>
                <td id="last_name" contenteditable></td>
			    <td id="last_name" contenteditable></td>
			    <td id="last_name" contenteditable></td>
			    <td id="last_name" contenteditable></td>
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>
           </tr>
      ';
}
else
{
	// records now found
	$data .= '<tr><td colspan="6">Records not found!</td></tr>';
}

$data .= '</table>';

echo $data;
?>