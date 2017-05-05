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
	
	<!-- google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<!-- custom css -->
	<link rel="stylesheet" type="text/css" href="css/style.css"/>

<body>

	<div class="jumbotron text-center" id="myjumbo" >
		DZIEKANAT
	</div>
	<div class="container" id="mycontainer" >
		<div class="row vertical-center-row">
				<form method="post" action="ajax/login.php">
					<div class="form-group">
						<label for="email" id="mylabel">Login</label> 
						<input type="email" class="form-control" placeholder="Login" name="email" id="myinput">
					</div>
					<div class="form-group">
						<label for="password" id="mylabel">Hasło</label> 
						<input type="password" class="form-control" placeholder="Hasło" name="password" id="myinput">
					</div>
					<div class="radio">
						<div class="myradio">
							<label><input type="radio" name="userType" value="admin" checked />Pracownik dziekanatu</label>
						</div>
						<div class="myradio">
							<label><input type="radio" name="userType" value="teacher" />Prowadzący</label>
						</div>
						<div class="myradio">
							<label><input type="radio" name="userType" value="student"   />Student</label>
						</div>
						
						
						
					</div>
					<br />
					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary align-center" id="myloginbutton">Zaloguj</button>
					</div>
				</form>
		</div>
	</div>
</body>
</html>