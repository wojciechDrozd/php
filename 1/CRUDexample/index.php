
<!-- Login pagee -->
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<title>Dziekanat</title>

<!-- Jquery JS file -->
<script type="text/javascript"
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Bootstrap JS file -->
<script type="text/javascript"
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Custom JS file -->
<script type="text/javascript" src="js/script.js"></script>
<!-- Bootstrap CSS File  -->
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
						<label><input type="radio" name="userType" value="student" checked />Student</label>
						<label><input type="radio" name="userType" value="teacher" />Pracownik</label>
						<label><input type="radio" name="userType" value="admin" />Administrator</label>
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