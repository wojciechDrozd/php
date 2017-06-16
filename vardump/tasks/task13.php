<?php

/*
Create a script that will slice all products from this page and 
fetch title and  direct url for each one of them. 
Then output data in console as example below:
 
Title => I like trains
Url => https://www.example.com/
*/

//get url content
function getUrlContent($url){
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$content= curl_exec($ch);
	curl_close($ch);
	return $content;
}

$url ='http://it-supplier.co.uk/computers/all-in-one-pcs';
$content = getUrlContent($url);
$nextPageRegex ='%class="next i-next" href="([^"]+)" title="Next%';
$productRegex ='%class="box\s*item\s*last">.*href="([^"]+)"\s*title="([^"]+)"\s*class="product-im%Usix';
$products = array();
$counter = 0;

//fetch product from the first page
preg_match_all($productRegex, $content,$matches);
for ($i =0; $i < count($matches[0]); $i++){
	$product = array(
			'Title' => $matches[2][$i],
			'Url' => $matches[1][$i],
	);
	
	$products[] = $product;
	$counter++;
}

//fetch products from the naxt pages
while(preg_match($nextPageRegex,$content,$match)){
	
	$content = getUrlContent($match[1]);
	preg_match_all($productRegex, $content,$matches);
	for ($i =0; $i < count($matches[0]); $i++){
		$product = array(
				'Title' => $matches[2][$i],
				'Url' => $matches[1][$i],
				);
		
		$products[] = $product;
		$counter++;
	}

}



print_r($products);
echo "\n$counter products fetched\n";







