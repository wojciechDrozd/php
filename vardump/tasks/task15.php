<?php


/*
 * Fetch all road bikes (Name, link to product, price, frame material).
 * Extract bikes with aluminium frame.
 * Results save to csv file with bikes sorted by price in ascending order
 */

ini_set('max_execution_time', 0);

function getUrlContent($url){
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
	$content = curl_exec($ch);
	curl_close($ch);
	return $content;
	
	
}

function fetchProduct($matches){
	
}

$baseUrl ='http://www.tredz.co.uk';
$firstPageUrl = 'http://www.tredz.co.uk/road-bikes';
$nextPageRegex = '%rel="next"[\s\t]+href="([^"]+)"%Usix';
$productRegex ='%class="ga"[\s\t]*href="([^"]+)">.*
				ellipsis[\s\t]*">([^<]+)<.*price">([^<]+)<%Usix';

$frameRegex = '%<b>Frame</b>:([^<]+)<br>%Usi';

$content = getUrlContent($firstPageUrl);



//array for products fetched from all pages
$products = array();

//fetch products from the first page
preg_match_all($productRegex,$content,$matches);


for($i =0; $i <count($matches[0]); $i++){
	$product = array(
			'name' => trim($matches[2][$i]),
			'url' => $baseUrl.trim($matches[1][$i]),
			//'price' => str_replace("Now £","",trim($matches[3][$i])),
			//'price1' => trim($matches[3][$i]),
			'price' => preg_replace("/.*?((?:\d+,)*\d{2,3}(?:\.\d{2})?).*/i","$1",trim($matches[3][$i])),
			
	);
	
	$itemContent = getUrlContent($baseUrl.trim($matches[1][$i]));
	preg_match($frameRegex, $itemContent,$match);
	$product['frame'] = trim($match[1]);
	
	
	$products[] = $product;
}

//fetch products from the next pages
while(preg_match($nextPageRegex,$content,$match)){
	$content = getUrlContent($match[1]);
	
	preg_match_all($productRegex,$content,$matches);
	for($i =0; $i <count($matches[0]); $i++){
		$product = array(
				'name' => trim($matches[2][$i]),
				'url' => $baseUrl.trim($matches[1][$i]),
				//'price' => str_replace("Now £","",trim($matches[3][$i])),
				//'price1' => trim($matches[3][$i]),
				'price' => preg_replace("/.*?((?:\d+,)*\d{2,3}(?:\.\d{2})?).*/i","$1",trim($matches[3][$i])),
				
		);
		
		$itemContent = getUrlContent($baseUrl.trim($matches[1][$i]));
		preg_match($frameRegex, $itemContent,$match);
		$product['frame'] = trim($match[1]);
		
		
		$products[] = $product;
		
		echo"<pre>",print_r($product),"</pre>";
	}
	
}



//file pointer
$fp = fopen('task15.csv','w');
foreach($products as $product){
	fputcsv($fp,$product);
}
fclose($fp);

//echo"<pre>",var_dump($products),"<pre>";