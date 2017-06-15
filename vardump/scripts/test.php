<?php

$url ='http://www.onet.pl/';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,-1);
$response = curl_exec($ch);
curl_close($ch);

$reg='%href=[\'"]([^\'"]+)[\'"]%Uis';
preg_match_all($reg,$response,$match);



$links = $match[1];
arsort($links);

foreach($links as $link){
	echo $link,"\n";
}

