<?php 

session_start();
if(!isset($_SESSION['successfulSignUp'])){
	header('Location: index.php');
	exit();
}else{
	unset($_SESSION['successfulSignUp']);
}

//usunięcie wartości zapamiętanych w formularzu

if(isset($_SESSION['fr_nick'])) unset($_SESSION['fr_nick']);
if(isset($_SESSION['fr_email'])) unset($_SESSION['fr_email']);
if(isset($_SESSION['fr_pass1'])) unset($_SESSION['fr_pass1']);
if(isset($_SESSION['fr_pass2'])) unset($_SESSION['fr_pass2']);
if(isset($_SESSION['fr_regulamin'])) unset($_SESSION['regulamin']);

//usunięcie błędów rejestracji
if(isset($_SESSION['e_nick'])) unset($_SESSION['e_nick']);
if(isset($_SESSION['e_email'])) unset($_SESSION['e_email']);
if(isset($_SESSION['e_pass'])) unset($_SESSION['e_pass']);
if(isset($_SESSION['e_regulamin'])) unset($_SESSION['e_regulamin']);
if(isset($_SESSION['e_bot'])) unset($_SESSION['e_bot']);


?>

<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<title>Witaj w grze</title>
</head>
<body>

Udana rejestracja!
<br />
<br />

<form action="index.php">
<input type="submit" value="Zaloguj się" />
</form>
</body>
</html>

