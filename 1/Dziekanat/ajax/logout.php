<?php

//wylogowanie

session_start();

//wyczyszczenie wszystkich danych z sesji
session_unset();

//przekierowanie do strony głównej
header('Location: ../index.php');

?>

