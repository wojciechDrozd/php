
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<br />
	<br />
	<div class="container" style="width: 500px;">

		<h3 align="center">Dziekanat</h3>
		<br />
		<form action="login.php" method="post">
			<label>Login</label> <input type="text" name="login" class="form-control" /> <br />
			<label>Hasło</label> <input type="text" name="password" class="form-control" /> <br />

			<div class="btn-group" role="group" aria-label="userType">
				<button type="button" name="userType" class="btn btn-default">Student</button>
				<button type="button" name="userType" class="btn btn-default">Dydaktyk</button>
				<button type="button" name="userType" class="btn btn-default">Administrator</button>
			</div>
			<br /> <br /> <input type="submit" name="login" value="Zaloguj" class="btn btn-info" /> <br />
		</form>
	</div>
</body>
</html>



</body>
</html>
