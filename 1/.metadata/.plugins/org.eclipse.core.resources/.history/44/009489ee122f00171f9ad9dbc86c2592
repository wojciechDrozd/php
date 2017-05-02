<?php

session_start();

if(isset($_SESSION['pesel']) && $_SESSION['pesel'] != ""){
	
	
	
// połączenie z bazą
require_once 'db_connection.php';
$teacher_id = $_SESSION['pesel'];

$query1 = "SELECT * FROM profesores WHERE pesel='$teacher_id'";
$result1 = mysqli_query($con,$query1);
$row1 = mysqli_fetch_assoc($result1);
$teacher_id = $row1['idProfesores'];

$result1->free();

$query2 = "SELECT * FROM przedmioty WHERE Profesores_idProfesores='$teacher_id'";
$result2 = mysqli_query($con,$query2);

// nagłówek tabeli przedmioty
$data = '<table class="table table-bordered table-striped">
                        <tr>
                            <th>Przedmiot</th>
                        </tr>';

// zawartość tabeli przedmioty
while($row2 = $result2->fetch_assoc()){
		$data .= '<tr>
                <td>'.$row2['nazwaPrzedmiotu'].'</td>
                </tr>';
	}
	

$data .= '</table>';

echo $data;

}
?>