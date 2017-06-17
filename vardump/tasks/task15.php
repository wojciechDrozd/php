<?php


$url = 'http://www.tredz.co.uk/road-bikes';
$baseUrl ='http://www.tredz.co.uk';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
$response = curl_exec($ch);
curl_close($ch);

$productRegex ='%class="ga"[\s\t]*href="([^"]+)">.*
				ellipsis[\s\t]*">([^<]+)<.*price">([^<]+)<%Usix';

preg_match_all($productRegex,$response,$matches);

$products = array();

for($i =0; $i <count($matches[0]); $i++){
	$product = array(
			'url' => $baseUrl.trim($matches[1][$i]),
			'name' => trim($matches[2][$i]),
			'price' => str_replace("Now £","",trim($matches[3][$i])),
			
	);
				
	$products[] = $product;
}


print_r($products);