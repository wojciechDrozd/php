<?php

$url = 'https://static.dlgamer.com/feeds/general_feed_it.json';
$subject = file_get_contents($url);

$pattern ='%id":"(\d+)","ean13":"(\d+)?".*"name":"(.*)"%U';

preg_match_all($pattern, $subject,$matches);

$products = array();

for ($i = 0; $i< count($matches[0]); $i++){
	$product = [];
	array_push($product,$matches[1][$i],$matches[2][$i],$matches[3][$i]);
	$products[] = $product;
}

$list = $products;

$fp = fopen('task3.csv','w');
foreach($list as $fields){
	fputcsv($fp,$fields);
}

fclose($fp);