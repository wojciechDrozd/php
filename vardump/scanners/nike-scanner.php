<?php

$mainPage = 'http://www.nike.com/us/en_us/';
$ch = curl_init($mainPage);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,-1);
$urlContent = curl_exec($ch);
echo $urlContent;
curl_close($ch);
preg_match_all('@href="([^"]+?)"@si',$urlContent,$matches);
echo "<pre>",print_r($matches),"<pre>";
?>