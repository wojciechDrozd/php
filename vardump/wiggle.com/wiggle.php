<?php 

require_once 'scanner.php';

$scanner = new Scanner('http://www.wiggle.co.uk/');


$url = "http://www.wiggle.co.uk/";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, -1);
$urlContent = curl_exec($ch);

//categories regex
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

for ($i=0;$i <5;$i++){
	$url = nextPage($url);
	$urls[] = $url;
	
}


/*
 * pobiera dynamicznie generowane linki do 
 * kolejnej strony w podkategorii dopóki nie zaczynają się powtarzać
 * za duże na testowanie na localhost
 */
/* while(nextPage($url)){
	$url = nextPage($url);
	if(in_array($url,$urls)){
		break;
	}
	$urls[] = $url;
}
 */
 
//fetching products from subcategory view
$productRegex ='@bem-product-thumb__name--grid"\s+href="([^"]+?)"\s+data-ga-label="[^"]+"\s+
		data-ga-action="Product\sTitle">([^<]+?)</a>\s+
		<div\sclass="bem-product-price--grid">\s+<span\sclass="bem-product-price__unit--grid">€(\d+.\d+)</span>@sx';

//populate array product name => price
$prices = array();
foreach ($urls as $item){
	$ch = curl_init($item);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,-1);
	$urlContent = curl_exec($ch);
	curl_close($ch);
	preg_match_all($productRegex, $urlContent,$matches);
	for ($i=0;$i<count($matches[0]);$i++){
		$prices["{$matches[2][$i]}"] = $matches[3][$i];
	}
			
}

ksort($prices);

foreach ($prices as $key => $value){
	//echo $key," ",$value,"<br/>";
}

//populate array of strings: link|product name|price
$prices = array();
foreach ($urls as $item){
	$ch = curl_init($item);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,-1);
	$urlContent = curl_exec($ch);
	curl_close($ch);
	preg_match_all($productRegex, $urlContent,$matches);
	for ($i=0;$i<count($matches[0]);$i++){
		
		$link = $matches[1][$i];
		$productName = $matches[2][$i];
		$price = $matches[3][$i];
		$priceString = $link."|".$productName."|".$price;
		array_push($prices,$priceString);
	}

}

foreach($prices as $item){
	//echo $item,"<br/>";
}

$exploded = explode("|",$prices[0]);
echo "<pre>",print_r($exploded),"<pre/>";

//header of the link-product-price table
$data = '<table>
		<tr>
		<th>Link</th>
		<th>Product name</th>
		<th>Price</th>
		</tr>';

//get url to the next page
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