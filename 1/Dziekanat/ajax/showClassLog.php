<?php

//dziennik wybranych zajęć

if(isset($_POST['class_name']) && $_POST['class_name'] != ""){
	
	//połączenie z bazą
	require_once 'db_connection.php';
	$class_name = $_POST['class_name'];
	
	$query = "SELECT idprzedmiot FROM przedmioty WHERE nazwaPrzedmiotu='$class_name'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($result);
	$class_id = $row['idprzedmiot'];
	
	
	$query ="SELECT * FROM
	((grafik INNER JOIN przedmioty ON grafik.idprzedmiot=przedmioty.idprzedmiot)
	INNER JOIN zajecia ON grafik.idzajecia=zajecia.idzajecia)
	WHERE nazwaPrzedmiotu='$class_name' ORDER BY data ASC";
	$result = mysqli_query($con, $query);
	
	$allDates = array();
	while($row=mysqli_fetch_assoc($result)){
		$allDates[$row['data']] = $row['nazwa'];
	}
	
	foreach ($allDates as $date => $type){
	
	//nagłówek tabeli lista obecności
	$data = <<<EOD
	<table class="table table-bordered table-striped">
			<tr>
				<th colspan="7">$class_name $date $type </th>
			</tr>
			<tr>
				<th>Nr albumu</th>
				<th>Nazwisko</th>
				<th>Imię</th>
				<th>Obecność</th>
			</tr>
EOD;
	
	$query ="SELECT * FROM lista_obecnosci 
	INNER JOIN studenci ON lista_obecnosci.nrAlbumu=studenci.nrAlbumu
	WHERE przedmioty_idprzedmiot='$class_id' AND przedmiot_data='$date' ORDER BY nazwisko ASC";
	
	$result = mysqli_query($con, $query);
	
	while($row = mysqli_fetch_assoc($result)){
		
		$data .= '<tr>
				<td>'.$row['nrAlbumu'].'</td>
				<td>'.$row['nazwisko'].'</td>
				<td>'.$row['imie'].'</td>';
				
				if($row['obecny'] == 1){
					$data .='<td><i class=" icon-ok" id="myok"></td>';
				} else {
					$data .='<td><i class="icon-cancel" id="mynotok"></td>';
				}
		
				
	}
	
	$data .= '</table>';
	
	echo $data;
	
}
}
	
?>