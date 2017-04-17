<?php




if(isset($_POST['url'])){
	
	require_once 'db_connection.php';
	
	$name = $_POST['name'];
	$extra = $_POST['extra'];
	$website = $_POST['website'];
	
	$query = "INSERT INTO products (name,extra,website)
	VALUES('$name','$extra','$website')";
	
	$result = mysqli_query($con, $query);



}else{
	echo "kot not";
}
?>