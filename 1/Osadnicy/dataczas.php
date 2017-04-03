<?php 

echo date('d.m.y H:i:s '), "<br />";


$datetime = new DateTime();

echo $datetime->format('Y-m-d H:i:s')."<br/>";

print_r($datetime);

$day = 1;
$month = 3;
$year = 1875;

if(checkdate($month, $day, $year)){
	echo "najs";
}

?>