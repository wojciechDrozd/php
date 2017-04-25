<?php

//dane do połączenia z bazą (localhost)
/* $host = "localhost";
$user = "root";
$password = "";
$database = "scanna"; */

//dane do połączenia z bazą (hostinger)
 $host = "mysql.hostinger.pl";
 $user = "u465013593_szej";
 $password = "password";
 $database = "u465013593_scan"; 


//połączenie z bazą
try {
	$con = new mysqli ( $host, $user, $password, $database );
} catch ( Exception $e ) {
	"Connection failed: " . $con->connect_error;
}

?>