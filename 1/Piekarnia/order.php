<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Podsumowanie</title>
</head>
<body>

<?php



if(!empty($_POST['donuts']) && !empty($_POST['buns']) && !empty($_POST['bread'])  ){
	$amounts = [
			'donuts'=>$_POST['donuts'],
			'buns'=>$_POST['buns'],
			'bread'=>$_POST['bread'],
	];
	$prices = array(
			'donuts'=>0.99,
			'buns'=>0.29,
			'bread'=>2.09,
	);
	
	$names = array(
			'donuts'=>'pączki',
			'buns'=>'bułki',
			'bread'=>'chleb',
	
	);
	$sum=0;
	
	$donutsTotal = $amounts['donuts']*$prices['donuts'];
	$bunsTotal = $amounts['buns']*$prices['buns'];
	$breadTotal =$amounts['bread']*$prices['bread'];
	$total = $donutsTotal+$bunsTotal+$breadTotal;
	
echo<<<END
<h2>Podsumowanie zamówienia</h2>
<table>
			<tr>
			<td><b>Produkt</b></td><td><b>Ilość</b></td><td><b>Kwota</b></td>
			</tr>
			<tr>
			<td>Pączek</td><td>{$amounts['donuts']}</td><td>$donutsTotal zł</td>
			</tr>
			<tr>
			<td>Bułka</td><td>{$amounts['buns']}</td><td>$bunsTotal zł</td>
			</tr>
			<tr>
			<td>Chleb</td><td>{$amounts['bread']}</td><td>$breadTotal zł</td>
			</tr>
			<tr>
			<td>Do zapłaty</td><td></td><td>$total zł</td>
			</tr>
					
</table>
			<br/><a href="index.php">Powrót do strony głównej</a>
END;

}else{
	echo '<font color="green" size=15><b>Wypełnij formularz</b></font><br/>';
	include "index.php";
}

?>

</body>
</html>










