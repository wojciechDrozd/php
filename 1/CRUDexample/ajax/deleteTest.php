<?php

require_once 'db_connection.php';
$sql = "DELETE FROM tbl_sample WHERE id = '".$_POST["id"]."'";
if(mysqli_query($con, $sql))
{
	echo 'Data Deleted';
}
?>