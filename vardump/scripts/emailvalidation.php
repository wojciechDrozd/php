<?php

var_dump($argv);
$emails = [];

for ($i = 1; $i < count($argv);$i++){
	
	array_push($emails,$argv[$i]);
}

print_r($emails);

foreach ($emails as $email){
	$pattern = '%[\w-\.]+@((?:[\w]+\.)+)([a-zA-Z]{2,4})%';
	preg_match($pattern, $email,$matches);
	if($matches){
		echo "$email valid\n";
	}else {
		echo "$email not valid\n";
	}
	
}



?>