<?php


$url = 'http://productdata.zanox.com/exportservice/v1/rest/42733809C453134639.xml?ticket=DD530ED5D40C653198A5DD105A0DC9C1&productIndustryId=1&gZipCompress=null';

$subject = file_get_contents($url);
$pattern ='%zupid="([^"]+)">.*<name>([^<]+)</name><number>(.*)</number>
		<deepLink>http://ad\.zanox\.com/ppc/\?42733809C453134639&amp;
		ULP=\[\[([^\]]+)]]</deepLink>.*<price>([^<]+)</price>.*
		merchantCategoryPath>(.*)</merchantCategoryPath>.*<largeImage>(.*)
		</largeImage>.*<stockAmount>(.*)</stockAmount>.*<ean>(.*)</ean>%Usix';
preg_match_all($pattern, $subject,$matches);

$products = array();
$baseUrl ='http://www.cellularline.com/';


/* for($i = 1; $i < count ($matches[0]); $i ++) {
	echo $matches[2][$i]."\n";

} */


for($i = 1; $i < count ($matches[0]); $i ++) {
	$product = array();
	$product['name'] = $matches[2][$i];
	$product['pris_unique_code'] = $matches[1][$i];
	$product['category_name'] = $matches[5][$i];
	$product['url'] = $baseUrl.$matches[4][$i];
	$product['image'] = $matches[7][$i];
	$product['price'] = $matches[5][$i];
	$product['shipping'] = null;
	$product['ean'] = $matches[9][$i];
	$product['stock_status'] = $matches[8][$i];
	$product['junk_typ'] = null;
	$product['extra'] = $matches[3][$i];
	$product['manufacturersku'] = null;
	
	
	array_push($products,$product);
	
}
foreach($matches[1] as $match){
	print $match."\n";
}
