<?php 

function print_table(){
	require_once 'connect.php';
	$output = '';
	
	try{
		
		$connection = new mysqli($host, $db_user,$db_password, $db_name);
		
		//nieudane połączenie
		if($connection->connect_errno!=0){
			echo "error".$connection->connect_errno;
		}
		
		//udane połączenie
		else{
			
			$result = $connection->query("SELECT * FROM students ORDER BY 'Id' ASC");
			
			
			while($row=$result->fetch_assoc()){
				$output .= "<tr><td>{$row['Id']}</td>
						<td>{$row['name']}</td>
						<td>{$row['surname']}</td>
						<td>{$row['email']}</td>
						<td>{$row['phone']}</td>
						</tr>";
			}
		
			
			return $output;
		}
		
	}catch(Excepion $e){
		
	}
}

if(isset($_POST['create_pdf'])){
	require_once 'tcpdf/tcpdf.php';
	$obj_pdf = new TCPDF('P',PDF_UNIT,PDF_PAGE_FORMAT,true, 'UTF-8',false);
	$obj_pdf->SetCreator(PDF_CREATOR);
	$obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");
	$obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
	$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
	$obj_pdf->SetDefaultMonospacedFont('helvetica');
	$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	$obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
	$obj_pdf->setPrintHeader(false);
	$obj_pdf->setPrintFooter(false);
	$obj_pdf->SetAutoPageBreak(TRUE, 10);
	$obj_pdf->SetFont('helvetica', '', 12);
	$obj_pdf->AddPage();
	$content = '';
	$content .='<table>'.print_table().'</table>';
	$obj_pdf->writeHTML($content);
	$obj_pdf->Output('sample.pdf','I');
}

?>




<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title> Pdf </title>
</head>
<body>

	<table>
		<tr>
			<th>ID</th>
			<th>Imię</th>
			<th>Nazwisko</th>
			<th>Email</th>
			<th>Telefon</th>
		</tr>
	<?php echo print_table()?>
	</table>
	
	
	<form method="post">
		<input type="submit" name="create_pdf" value="Create PDF"/>
	</form>
	
</body>
</html>