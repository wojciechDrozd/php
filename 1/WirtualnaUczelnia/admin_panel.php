<?php 

session_start();
if(!isset($_SESSION['loggedin'])){
	header('Location: index.php');
	exit();
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<title>Admin panel</title>
</head>
<body>
	<form action="addstudent.php" >
		<input type="submit" value="Dodaj studenta">
	</form>
	<br/>
	<form action="addteacher.php">
		<input type="submit" value="Dodaj pracownika"/>
	</form>
	
	<br/>
	<form action="displayresults.php">
		<input type="submit" value="Baza studentów"/>
	</form>
	
	<br/>
	<form action="pdftest.php">
		<input type="submit" value="pdf test"/>
	</form>
	
	<br/>
	<form action="logout.php">
		<input type="submit" value="Wyloguj się"/>
	</form>


</body>
</html>



