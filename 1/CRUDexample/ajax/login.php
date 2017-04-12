<?php
session_start ();

if (! isset ( $_POST ['email'] ) && ! isset ( $_POST ['password'] ) && ! isset ( $_POST ['userType'] )) {
	header ( 'Location: ../index.php' );
	exit ();
}

require_once 'db_connection.php';
try {

		$userType = $_POST ['userType'];
		$email = $_POST ['email'];
		$password = $_POST ['password'];

		switch ($userType) {
			case 'admin' :
				if ($result = $con->query ( "SELECT * FROM admin WHERE email='$email'" )) {
					$userNum = $result->num_rows;
			
					if ($userNum > 0) {
						$row = $result->fetch_assoc ();
						if ($password == $row ['password'] ) {
							$_SESSION ['loggedin'] = true;
							header ( 'Location: ../adminPanel.php' );
						}
					}
				} else{
					header ('Location: ../index.php');
				}
				break;

			case 'student' :
				if ($result = $con->query ( "SELECT * FROM studenci WHERE email='$email'" )) {
					$userNum = $result->num_rows;

					if ($userNum > 0) {
						$row = $result->fetch_assoc ();
						if ($password == $row ['pesel'] ) {
							$_SESSION ['loggedin'] = true;
							header ( 'Location: ../studentPanel.php' );
						}
					}
				} else{
					header ('Location: ../index.php');
				}
				break;

			case 'teacher' :
				if ($result = $con->query ( "SELECT * FROM profesores WHERE email='$email'" )) {
					$userNum = $result->num_rows;

					if ($userNum > 0) {
						$row = $result->fetch_assoc ();
						if ($password == $row ['pesel'] ) {
							$_SESSION ['loggedin'] = true;
							header ( 'Location: ../teacherPanel.php' );
						}
					}
				}else{
					header ('Location: ../index.php');
				}
				break;
		}
}
 catch ( Exception $e ) {

	echo $e->getMessage ();
}

?>
