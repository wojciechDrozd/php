<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>Wiggle scan</title>
	<!-- Jquery JS  -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
	<!-- Bootstrap JS  -->
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<!--  custom js -->
	<script type="text/javascript" src="js/script.js"></script>
	
	<!-- Bootstrap CSS   -->
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	
</head>
<body>
<?php 
$url = "http://www.wiggle.co.uk/";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, -1);
$urlContent = curl_exec($ch);

$regex = '@href="(http://www.wiggle.co.uk/([^/]+)/)" class="bem-menu__item-link@';
preg_match_all($regex,$urlContent,$matches);


//echo "<pre>",print_r($matches),"</pre>";

$categoriesNamesLinks = array();


for ($i=0; $i<count($matches[1]); $i++){
	$key = $matches[2][$i];
	$value = $matches[1][$i]; 
	$key = ucwords(str_replace("-"," ",$key));
	$categoriesNamesLinks[$key] = $value;
}
ksort($categoriesNamesLinks);
$table = '<table class="table-bordered table-striped">
		<tr>
			<th>Category</th>
			<th>Link</th>
			<th>Show products</th>
		</tr>';
foreach($categoriesNamesLinks as $key => $value){
	$table .= '<tr>
				 <td>'.$key.'</td>
				 <td><a href="'.$value.'">'.$value.'</a></td>
			   </tr>';
}

$table .= '</table>';


//link do pierwszej strony z listą produktów w podkategorii
$firstPage ='http://www.wiggle.com/accessories/?o=9';

$url = $firstPage;
$urls = array();
$urls[] = $firstPage;

//wersja uproszczona bez while
$url = nextPage($url);
$urls[] = $url;
$url = nextPage($url);
$urls[] = $url;
$url = nextPage($url);
$urls[] = $url;
$url = nextPage($url);
$urls[] = $url;
$url = nextPage($url);
$urls[] = $url;
$url = nextPage($url);
$urls[] = $url;

//echo "<pre>",print_r($urls),"<pre/>";

/*
 * pobiera dynamicznie generowane linki do 
 * kolejnej strony w podkategorii dopóki nie zaczynają się powtarzać
 */
/* while(nextPage($url)){
	$url = nextPage($url);
	if(in_array($url,$urls)){
		break;
	}
	$urls[] = $url;
}
 */
$productRegex ='@bem-product-thumb__name--grid"\s+href="([^"]+?)"\s+data-ga-label="[^"]+"\s+
		data-ga-action="Product\sTitle">([^<]+?)</a>\s+
		<div\sclass="bem-product-price--grid">\s+<span\sclass="bem-product-price__unit--grid">€(\d+.\d+)</span>@sx';
$prices = array();
foreach ($urls as $item){
	$ch = curl_init($item);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,-1);
	$urlContent = curl_exec($ch);
	curl_close($ch);
	preg_match_all($productRegex, $urlContent,$matches);
	for ($i=0;$i<count($matches[0]);$i++){
		echo $matches[2][$i]," : ",$matches[3][$i],"<br/>";
		$prices["{$matches[2][$i]}"] = $matches[3][$i];
	}
	//echo "<pre>",print_r($matches),"<pre/>";
			
}

ksort($prices);

foreach ($prices as $key => $value){
	echo $key," ",$value,"<br/>";
}

/*
 * return: link do kolejnej strony w podkategorii
 */

function nextPage($url){
	$ch = curl_init($url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,-1);
	$urlContent = curl_exec($ch);
	curl_close($ch);
	$nextPageLinkReg ='@bem-paginator__link--selected">\d+</span>.+?(?!=<)<a class="bem-paginator__link js-nav-ajax" data-ajax="[^"]+" href="([^"]+?)">\d+</a>@s';
	preg_match_all($nextPageLinkReg, $urlContent, $matches);
	$matches[1] = array_unique($matches[1]);
	$nextPage =$matches[1][0];
	$nextPage = html_entity_decode($matches[1][0]);
	return $nextPage;
	
}




?>
</body>
</html>































