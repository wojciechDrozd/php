<?php

//skrypt do generowania listy obecności dla wybranego przedmiotu w panelu nauczyciela

if(isset($_POST['class_name']) && $_POST['class_name'] != ""){
	
	require_once 'db_connection.php';
	$class_name = $_POST['class_name'];
	

	//nagłówek tabeli lista obecności
	$data = <<<EOD
	<table class="table table-bordered table-striped">
			<tr>
				<th colspan="7">$class_name</th>
			</tr>
			<tr>
				<th>Nr albumu</th>
				<th>Nazwisko</th>
				<th>Imię</th>
EOD;
	
	$query ="SELECT * FROM ((grafik INNER JOIN przedmioty ON grafik.idprzedmiot=przedmioty.idprzedmiot)
	INNER JOIN zajecia ON grafik.idzajecia=zajecia.idzajecia)
	WHERE nazwaPrzedmiotu='$class_name' ORDER BY data ASC";
	$result = mysqli_query($con, $query);
	
	$dateColumnCounter = 0;
	$allDates = array();
	while($row=mysqli_fetch_assoc($result)){
		$data .= '<th>'.$row['data'].' ('.$row['nazwa'].') '.'</th>';
		$allDates[] = $row['data'];
		$dateColumnCounter++;
	}
	mysqli_free_result($result);
	$data .='</tr>';
	
	$query = "SELECT * FROM 
	((studenci_has_przedmioty INNER JOIN przedmioty ON studenci_has_przedmioty.przedmioty_idprzedmiot_1 = przedmioty.idprzedmiot)
	INNER JOIN studenci ON studenci_has_przedmioty.studenci_nr_albumu=studenci.nrAlbumu)
	WHERE nazwaPrzedmiotu='$class_name'";
	
	
	
	$result = mysqli_query($con, $query);
	while ( $row = mysqli_fetch_assoc ( $result ) ) {
		$data .= '<tr>
				<td>' . $row ['nrAlbumu'] . '</td>
				<td>' . $row ['nazwisko'] . '</td>
				<td>' . $row ['imie'] . '</td>';
		for($i = 0; $i < $dateColumnCounter; $i ++) {
			$data .= '<td><input type="checkbox" class="classlistcheckbox" value="' . $row ['nrAlbumu'] . '" id="' . $row ['nrAlbumu'].':'.$allDates[$i]. '"></td>';
		}
	}
	
	
	$data .= ' </tr></table>
			
			<div class="col-md-12 text-center"> 
			<button type="button" class="btn btn-primary" id="listSubmitButton" onclick="saveList()">Zapisz</button>
			</div>
			
			';
	
	echo $data;
	
}


/*
 * $query = "DELETE FROM lista_obecnosci WHERE nrAlbumu='$student_id' AND
		przedmiot_data = '$class_date' AND	przedmioty_idprzedmiot = '$class_id'";
		$result = mysqli_query($con, $query);
					
		$query = "INSERT INTO lista_obecnosci
		(nrAlbumu,przedmiot_data,przedmioty_idprzedmiot,obecny)
		VALUES ('$student_id','$class_date','$class_id','$student_status')";
		$result = mysqli_query ( $con, $query );
		echo "done ";
 */

?>




























