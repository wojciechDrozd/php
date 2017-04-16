<?php 

//sprawdzenie czy jakiś user nie jest zalogowany
session_start();
if (isset($_SESSION['adminLoggedin']) && $_SESSION['adminLoggedin'] == true){
	header ( 'Location: adminPanel.php' );
	exit ();
}

if (isset($_SESSION['studentLoggedin']) && $_SESSION['studentLoggedin'] == true){
	header ( 'Location: studentPanel.php' );
	exit ();
}

if (isset($_SESSION['teacherLoggedin']) && $_SESSION['teacherLoggedin'] == true){
	header ( 'Location: teacherPanel.php' );
	exit ();
}

?>

<!-- Strona logowania -->
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<title>Dziekanat</title>

<!-- Jquery JS  -->
<script type="text/javascript"
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Bootstrap JS  -->
<script type="text/javascript"
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Bootstrap CSS   -->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>

<body>
	<div class="container" style="width: 500px;">
	<div class="row vertical-center-row">
				<h1 align="center"><b>Dziekanat</b></h1><br/>

				<form method="post" action="ajax/login.php">
					<div class="form-group">
						<label for="email">Login</label> 
						<input type="email" class="form-control" placeholder="Login" name="email">
					</div>
					<div class="form-group">
						<label for="password">Hasło</label> 
						<input type="password" class="form-control" placeholder="Hasło" name="password">
					</div>
					<div class="radio">
						<label><input type="radio" name="userType" value="admin" checked/>Administrator</label>
						<label><input type="radio" name="userType" value="teacher" />Pracownik</label>
						<label><input type="radio" name="userType" value="student"   />Student</label>
					</div>
					<br />
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Zaloguj</button>
					</div>
				</form>
		</div>
</div>
</body>
</html>