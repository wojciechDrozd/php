<?php


$str = "A GRIM year for American spy agencies took a turn for the worse with the leaking, on March 7th, of what appeared to be a lengthy, detailed catalogue of the CIA’s secret hacking tools for turning computers, internet routers, telephones and even web-enabled televisions into remote spying devices, and for bypassing encrypted messaging services by penetrating individual Apple and Android smartphones. The WikiLeaks anti-secrecy organisation posted nearly 9,000 documents and files dated 2013-16 in what it said was a first taste of a “vault” of CIA secrets. WikiLeaks claimed that the archive was provided by a former American government hacker or contractor eager to “initiate a public debate” about the security and democratic control of cyber-weapons, viruses and malware. The group said it had redacted computer code that could be used to launch attacks, pending such a debate.";

$token = strtok($str, " ");

while ($token !== false){
	
	echo ucfirst($token)."<br>";
	$token = strtok(" ");
	
}


$explodedArray = explode(" ",$str);

//echo '<pre>' , var_dump($explodedArray) , '</pre>';

echo join("*", $explodedArray);

echo join("<br>", $explodedArray);

$imploded = implode(" ", $explodedArray);

echo "<pre>",var_dump($imploded),"</pre>";

$imploded = implode($explodedArray);

echo '<pre>' , var_dump($imploded) , '</pre>';




?>