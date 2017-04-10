<?php
session_start ();

if (! isset ( $_POST ['login'] ) && ! isset ( $_POST ['password'] ) && ! isset ( $_POST ['userType'] )) {
	header ( 'Location: index.php' );
	exit ();
}

require_once "connect.php";
try {
	
	// nawiązanie połaczenia
	$connection = new mysqli ( $host, $db_user, $db_password, $db_name );
	
	// połączenie nieudane
	if ($connection->errno != 0) {
		throw new Exception ();
	}	// połączenie udane
	else {
		$userType = $_POST ['userType'];
		$login = $_POST ['login'];
		$password = $_POST ['password'];
		
		echo $userType,$login,$password;
		
		switch ($userType) {
			case 'admin' :
				$_SESSION ['loggedin'] = true;
				header ( 'Location: admin_panel.php' );
				break;
			
			case 'student' :
					if ($result = $connection->query ( "SELECT * FROM students WHERE name='$login'" )) {
						$userNum = $result->num_rows;
					
						if ($userNum > 0) {
							$row = $result->fetch_assoc ();
							if ($password == $row ['password'] ) {
								$_SESSION ['loggedin'] = true;
								header ( 'Location: student_panel.php' );
							}
						}
					}
					break;
					
			case 'teacher' :
				if ($result = $connection->query ( "SELECT * FROM profesores WHERE name='$login'" )) {
					$userNum = $result->num_rows;
				
					if ($userNum > 0) {
						$row = $result->fetch_assoc ();
						if ($password == $row ['password'] ) {
							$_SESSION ['loggedin'] = true;
							header ( 'Location: teacher_panel.php' );
						}
					}
				}
				break;
		}
	}
} catch ( Exception $e ) {
	
	echo $e->getMessage ();
}

?>
