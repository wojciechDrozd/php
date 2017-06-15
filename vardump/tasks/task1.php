<?php


/* Scan images with best possible resolution.
Output the result in a separate csv file.
The file should contain two columns:
ident [from original file] and url to image(s). */

$url ='https://pastebin.com/raw/ecmr3016';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$subject = curl_exec($ch);
curl_close($ch);

$pattern = '%http://www.awin1.com/pclick.php\?p=(.*)&a=.*
		(http://s1.static69.com/hifi/images/.*
		(?:produits|bundles)/large/.*.jpg)%Usix';

preg_match_all($pattern, $subject,$matches);



$images = array();

for ($i = 0; $i < count($matches[0]); $i++){
	$image = array();
	array_push($image,$matches[1][$i],$matches[2][$i]);
	$images[] = $image;
}

$list = $images;
$fp = fopen('task1.csv','w');
$counter = 0;

foreach($list as $fields){
	fputcsv($fp, $fields);
	$counter ++;
}
fclose($fp);

echo "$counter images saved to the task1.csv";