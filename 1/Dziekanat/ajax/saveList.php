<?php
if (isset ( $_POST ['boxesString'] ) && isset ( $_POST ['class_name'] )) {
	
	require_once 'db_connection.php';
	$class_name = $_POST ['class_name'];
	$boxesString = $_POST ['boxesString'];
	$allEventsStrings = explode ( "|", $boxesString );
	$events = array ();
	
	foreach ( $allEventsStrings as $event ) {
		$events [] = explode ( ":", $event );
	}
	
	for($i = 0; $i < count ( $events ); $i ++) {
		echo "$class_name <br/>";
		for($j = 0; $j < count ( $events [$i] ); $j ++) {
			echo $events [$i] [$j], "<br/>";
		}
		
		echo "<br/>";
	}
}
?>