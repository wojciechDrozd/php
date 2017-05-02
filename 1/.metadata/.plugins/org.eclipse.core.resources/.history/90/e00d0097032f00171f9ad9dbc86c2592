<?php

//generowanie listy obecności dla wybranego przedmiotu i wybranej daty w panelu nauczyciela

if(isset($_POST['class_name']) && $_POST['class_name'] != "" 
		&& isset($_POST['class_date']) && $_POST['class_date'] != ""
		&& isset($_POST['class_type']) && $_POST['class_type'] != ""){
	
	require_once 'db_connection.php';
	$class_name = $_POST['class_name'];
	$class_date = $_POST['class_date'];
	$class_type = $_POST['class_type'];
	

	//nagłówek tabeli lista obecności
	$data = <<<EOD
	<table class="table table-bordered table-striped" >
			<tr>
				<th colspan="7">$class_name - lista obecności</th>
			</tr>
			<tr>
				<th>Nr albumu</th>
				<th>Nazwisko</th>
				<th>Imię</th>
				<th id="myth"><span id="my_class_date">$class_date</span> ({$class_type})</th>
EOD;
	
	$query = "SELECT * FROM 
	((studenci_has_przedmioty INNER JOIN przedmioty ON studenci_has_przedmioty.przedmioty_idprzedmiot_1 = przedmioty.idprzedmiot)
	INNER JOIN studenci ON studenci_has_przedmioty.studenci_nr_albumu=studenci.nrAlbumu)
	WHERE nazwaPrzedmiotu='$class_name'";
	
	
	$result = mysqli_query($con, $query);
	while ( $row = mysqli_fetch_assoc ( $result ) ) {
		$data .= '<tr>
				<td>' . $row ['nrAlbumu'] . '</td>
				<td>' . $row ['nazwisko'] . '</td>
				<td>' . $row ['imie'] . '</td>
			    <td id="mytd"><input type="checkbox" class="classlistcheckbox" value="' . $row ['nrAlbumu'] . '" id="' . $row ['nrAlbumu'].'"></td>
			    </tr>';
		}
	
	
		$data .= ' </table>
		
			<div class="col-md-12>
				<div class="button-group">
					<button type="button" class="btn btn-primary pull-right" id="mybutton" onclick="saveList()">Zapisz</button>
			 		<button type="button" class="btn pull-left" id="mybutton" onclick="showClassScheduleForTeacher()">Wróć do planu zajęć</button>
				</div>
			</div>
		
			';
	
	echo $data;
	
}

?>




























