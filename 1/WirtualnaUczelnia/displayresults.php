<?php

require_once "connect.php";



try{
	
	$connection=new mysqli($host,$db_user,$db_password,$db_name);
	
	//nieudane połączenie
	if($connection->connect_errno!=0){
		echo "error".$connection->connect_errno;
	}
	
	//udane połączenie
	else{
		
		$result = $connection->query("SELECT * FROM students ORDER BY 'Id' ASC");
		
		if($result->num_rows > 0){
			echo "<table><tr>
					<th>id</th>
					<th>imie</th>
					<th>nazwisko</th>
					<th>email</th>
					<th>phone</th>
					</tr>";
			
			//wyświetl wiersze
			while($row=$result->fetch_assoc()){
				echo"<tr><td>{$row['Id']}</td>
						<td>{$row['name']}</td>
						<td>{$row['surname']}</td>
						<td>{$row['email']}</td>
						<td>{$row['phone']}</td>
						</tr>";
			}
			
			echo "</table>";
		}
	}
	
	
}catch(Exception $e){
	
}

?>


<form action="admin_panel.php">
	<br/><input type="submit" value="Wróć do głównej"/>
</form>