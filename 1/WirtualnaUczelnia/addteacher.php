<?php 

session_start();

if(isset($_SESSION['teacheradded']) && isset($_SESSION['confirmation']) && $_SESSION['teacheradded']){
	echo $_SESSION['confirmation'];
	unset($_SESSION['teacheradded']);
	unset($_SESSION['confirmation']);
}

if(isset($_POST['name'])){
	$successfulValidation = true;
	
	$name = $_POST['name'];
	$surname=$_POST['surname'];
	$email = $_POST['email'];
	$faculty = $_POST['faculty'];
	
	require_once "connect.php";
	try{
		
		//nawiązanie połączenia z bazą
		$connection = new mysqli($host, $db_user,$db_password,$db_name);
		
		//połączenie nieudane
		if($connection->connect_errno!=0){
			throw new Exception(mysqli_connect_errno());
		}
		//połączenie udane
		else{
			
			//czy istnieje już taki email?
			$result=$connection->query("SELECT email FROM profesores WHERE email='$email'");
			if(!$result) throw new Exception();
			$emailNum = $result->num_rows;
			if($emailNum > 0){
				$successfulValidation = false;
				$_SESSION['e_email'] = "Istnieje już student o takim adresie email";
			}
			
			//końcowa walidacja
			if($successfulValidation){
				
				//wszytkie testy zaliczone, dodaj profesora do bazy
				if($connection->query(
						"INSERT INTO profesores (name,surname,faculty,email)
						VALUES ('$name','$surname','$surname','$email')")){
						$_SESSION['teacheradded']=true;
						$_SESSION['confirmation']='<span style="color:green">'.$name." ".$surname.' dodany do bazy!</span>';
						header('Location: addteacher.php');
				} else{
					throw new Exception("inserting error");
				}
			}
		}
		
	}catch(Exception $e){
		
		echo "Błąd serwera!sorry not sorry";
	}
	
}

?>

<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<title>Rejestracja dydaktyka</title>
	
</head>
<body>

<h3>Dodaj profesora</h3>

<form method="post" >

Imię:
<br/>
<input type="text" name="name"/><br/>
Nazwisko:
<br/>
<input type="text" name="surname"/><br/>
Email:
<br/>
<input type="text" name="email"/><br/>
Katedra:
<br/>
<input type="text" name="faculty"/><br/>
<br/>
<input type="submit" value="zarejestruj"/>

</form>
</body>
</html>
