<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>Wiggle scan</title>
	<!-- Jquery JS  -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
	<!-- Bootstrap JS  -->
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<!--  custom js -->
	<script type="text/javascript" src="js/script.js"></script>
	
	<!-- Bootstrap CSS   -->
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	
</head>
<body>


<?php 
$url = "http://www.wiggle.co.uk/";
$ch = curl_init($url);
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, -1);
$urlContent = curl_exec($ch);

$regex = '@href="(http://www.wiggle.co.uk/([^/]+)/)" class="bem-menu__item-link@';
preg_match_all($regex,$urlContent,$matches);


//echo "<pre>",print_r($matches),"</pre>";

$a = array();


for ($i=0; $i<count($matches[1]); $i++){
	$key = $matches[2][$i];
	$value = $matches[1][$i]; 
	$key = ucwords(str_replace("-"," ",$key));
	$a[$key] = $value;
}
ksort($a);
$table = '<table class="table-bordered table-striped">
		<tr>
			<th>Category</th>
			<th>Link</th>
			<th>Show products</th>
		</tr>';
foreach($a as $key => $value){
	$table .= '<tr>
				 <td>'.$key.'</td>
				 <td><a href="'.$value.'">'.$value.'</a></td>
			   </tr>';
}

$table .= '</table>';

echo $table;

?>
</body>
</html>

