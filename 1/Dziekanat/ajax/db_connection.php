<?php

//dane do połączenia z bazą (localhost)
$host = "localhost";  
$user = "root";  
$password = "";  
$database = "dziekanat";  

//dane do połączenia z bazą (hostinger)
/*  $host = "mysql.hostinger.pl";
 $user = "u939586845_troll";
 $password = "password";
 $database = "u939586845_dziek";  */
               

//połączenie z bazą
try {
	$con = new mysqli ( $host, $user, $password, $database );
} catch ( Exception $e ) {
	"Connection failed: " . $con->connect_error;
}

?>