<?php

//wyświetlanie tabeli z grafikiem zajęć w panelu nauczyciela

if(isset($_POST['class_name']) && $_POST['class_name'] != ""){
	
	$class_name = $_POST['class_name'];

require_once 'db_connection.php';

$data = <<<EOD
<table class="table table-bordered table-striped">
                        <tr>
                            <th>Data</th>
                            <th>Przedmiot</th>
                            <th>Rodzaj zajęć</th>
                            <th>Obecność</th>
                        </tr>

EOD;

$query = "SELECT grafik.idgrafik,grafik.data, przedmioty.nazwaPrzedmiotu, zajecia.nazwa,profesores.imie,profesores.nazwisko 
			FROM (((grafik INNER JOIN przedmioty ON grafik.idprzedmiot = przedmioty.idprzedmiot)		
		   INNER JOIN zajecia ON grafik.idzajecia = zajecia.idzajecia)
			INNER JOIN profesores ON grafik.idProfesores = profesores.idProfesores)
		WHERE nazwaPrzedmiotu = '$class_name'
		ORDER BY grafik.data ASC";
		
$result = mysqli_query($con, $query);
$counter=0;
while($row=mysqli_fetch_assoc($result)){
	
	$data .= <<<EOD
	            <tr>
				<td><h5 id="my_date{$counter}">{$row['data']}</h5></span></td>
				<td>{$row['nazwaPrzedmiotu']}</td>
				<td>{$row['nazwa']}</td>
				<td><button onclick="showListForDate({$counter})" class="btn btn-info"><i class="material-icons">mode_edit</i></button></td>
                </tr>
						
EOD;
				$counter++;
						
}

$data .= '</table>';

echo $data;

}

?>