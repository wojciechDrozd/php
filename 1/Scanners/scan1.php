<?php
$url = 'https://www.alltricks.com/';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$subject = curl_exec($ch);
$pattern = '/(?<=href=")([^"]+)/';

preg_match_all($pattern, $subject, $matches);

echo "<pre>",var_dump($matches),"</pre>";


//categories



foreach ($matches[0] as $match){
	if(substr($match,0,4) == "http"){
		$subject1 = file_get_contents($match);
		$pattern1 = '/(?<=href=")([^"]+)/';
		preg_match_all($pattern1, $subject1, $matches1);
		echo "<pre>",var_dump($matches1[0]),"</pre>";
	}
}

?>