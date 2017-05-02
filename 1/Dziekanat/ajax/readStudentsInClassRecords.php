<?php

if (isset($_POST['class_name']) && $_POST['class_name'] != ""){
	
	
	require_once 'db_connection.php'; 
	
	// nagłówek tabeli studenci
	$data = '<table class="table table-bordered table-striped">
                        <tr>
                            <th>Nr albumu</th>
                            <th>Nazwisko</th>
							<th>Imię</th>
                            <th>Kierunek studiów</th>
							<th>Semestr</th>
							<th>Email</th>
							<th>PESEL</th>
                        </tr>';
	
	$class_name = $_POST['class_name'];
	
	$query1 = "SELECT * FROM przedmioty WHERE nazwaPrzedmiotu='$class_name'";
	$result1 = mysqli_query($con,$query1);
	$row1 = mysqli_fetch_assoc($result1);
	$class_id = $row1['idprzedmiot']; 
	$teacher_name = $row1['wykladowca'];
	
	$teacher_table = <<<EOD
	<table class="table table-bordered table-striped">
		<tr>
			<th>Przedmiot</th>
			<th>Wykładowca</th>
		</tr>
		<tr>
			<td>$class_name</td>
			<td>$teacher_name</td>
		</tr>
	</table>
EOD;
	
	$query2 = "SELECT * FROM studenci_has_przedmioty 
	INNER JOIN studenci ON studenci_has_przedmioty.studenci_nr_albumu=studenci.nrAlbumu
	WHERE przedmioty_idprzedmiot_1='$class_id' ORDER BY nazwisko ASC";
	$result2 = mysqli_query($con,$query2);
	
	$students_ids_array = array();
	while($row2 = mysqli_fetch_assoc($result2)){
		
		$students_ids_array[] = $row2['studenci_nr_albumu'];
	}
	
	
	foreach ($students_ids_array as $student_id){
	$query3 = "SELECT * FROM studenci WHERE nrAlbumu='$student_id'";
	$result3 = mysqli_query($con,$query3);
	
	$row3 = mysqli_fetch_assoc($result3);
	
	$data .= '<tr>
                <td>'.$row3['nrAlbumu'].'</td>
                <td>'.$row3['nazwisko'].'</td>
                <td>'.$row3['imie'].'</td>
                <td>'.$row3['kierunek'].'</td>
               	<td>'.$row3['semestr'].'</td>
                <td>'.$row3['email'].'</td>
                <td>'.$row3['pesel'].'</td>
            </tr>';
	}
	
	if (count($students_ids_array) == 0){
		$data .= '<tr><td colspan="7">Brak studentów zapisanych na wybrany przedmiot.</td></tr>';
	}
	
	$data .= '</table>';
	
	echo $teacher_table;
	echo $data;
	
	
}
?>