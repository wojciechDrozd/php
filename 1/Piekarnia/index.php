<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Piekarnia Online</title>
</head>
<body>
	<h1>Piekarnia Kot</h1>
	<h2>Złóż zamówienie</h2>
	<form action="order.php" method="post">
		<table>
			<tr>
				<td><b>Produkt</b></td>
				<td><b>Cena</b></td>
				<td><b>Ilość</b></td>
			</tr>
			<tr>
				<td>Pączek</td>
				<td>0.99 zł</td>
				<td><input type="text" name="donuts" size="10" /></td>
			</tr>
			<tr>
				<td>Bułka</td>
				<td>0.29 zł</td>
				<td><input type="text" name="buns" size="10"/></td>
			</tr>
			<tr>
				<td>Chleb</td>
				<td>2.09 zł</td>
				<td><input type="text" name="bread" size="10" /></td>
			</tr>

		</table>
		<br /> <input type="submit" value="Wyślij zamówienie" style="height:30px;width:200px"/>
	</form>

</body>
</html>

<?php
?>