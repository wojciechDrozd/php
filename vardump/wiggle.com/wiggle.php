<?php 

require_once 'scanner.php';
$scanner = new Scanner('http://www.wiggle.co.uk/');
$catReg = '@href="(http://www.wiggle.co.uk/([^/]+)/)" class="bem-menu__item-link@';
$scanner->setCatReg($catReg);
$nextPageReg ='@bem-paginator__link--selected">\d+</span>.+?(?!=<)<a class="bem-paginator__link js-nav-ajax" data-ajax="[^"]+" href="([^"]+?)">\d+</a>@s';
$scanner->setNextPageReg($nextPageReg);
$productReg ='@bem-product-thumb__name--grid"\s+href="([^"]+?)"\s+data-ga-label="[^"]+"\s+
		data-ga-action="Product\sTitle">([^<]+?)</a>\s+
		<div\sclass="bem-product-price--grid">\s+<span\sclass="bem-product-price__unit--grid">\D*(\d+.\d+)(?:\D*(\d+\.\d+))?</span>@sx';
$scanner->setProductReg($productReg);


$matches = $scanner->getCategories();
$categoriesNamesLinks = array();

for ($i=0; $i<count($matches[1]); $i++){
	$key = $matches[2][$i];
	$value = $matches[1][$i]; 
	$key = ucwords(str_replace("-"," ",$key));
	$categoriesNamesLinks[$key] = $value;
}
ksort($categoriesNamesLinks);

//header of the category names and links table
$table = '<table class="table-bordered table-striped">
		<tr>
			<th>Category</th>
			<th>Link</th>
		</tr>';

//populating category names and links table
foreach($categoriesNamesLinks as $key => $value){
	$table .= '<tr>
				 <td>'.$key.'</td>
				 <td><a href="'.$value.'">'.$value.'</a></td>
			   </tr>';
}
$table .= '</table>';
//print $table;

//get random category
$randKey = array_rand($categoriesNamesLinks);
$firstPage =$categoriesNamesLinks[$randKey];

$url = $firstPage;
//array of links to all 'next pages' in that subcategory
$urls = array();
$urls[] = $firstPage;

//simplified version without while (less products, first 5 pages)
for ($i=0;$i <2;$i++){
	$url = $scanner->getNextPageLink($url);
	if(!in_array($url,$urls))
		$urls[] = $url;
}


/*
 * pobiera dynamicznie generowane linki do 
 * kolejnej strony w podkategorii dopóki nie zaczynają się powtarzać
 * za duże na testowanie na localhost
 */
/* while($scanner->getNextPageLink($url) != null){
	$url = $scanner->getNextPageLink($url);
	if(!in_array($url,$urls)){
		$urls[] = $url;
	}
} */

 
 array_unique($urls);
 //echo "<pre>",print_r($urls),"</pre>";


//populate array of strings: product name|price|link
$prices = array();
foreach ($urls as $item){
	$matches = $scanner->getProducts($item);
	for ($i=0;$i<count($matches[0]);$i++){
		$productName = $matches[2][$i];
		$price = $matches[3][$i];
		$link = $matches[1][$i];
		$priceString = $productName."|".$price."|".$link;
		if(!in_array($priceString, $prices))
			array_push($prices,$priceString);
	}

}

sort($prices);
//array_unique($prices);

//header of the ppl table
$data = '<table class="table-bordered table-responsive table-striped" id="ppl-table">
		<tr>
			<th colspan="4" id="myth">
			'.$randKey.'
			</th>
		</tr>
		<tr>
		<th>No.</th>
		<th>Product name</th>
		<th>Price</th>
		<th>Link</th>
		</tr>';

//populating ppl table
for($i=0; $i<count($prices); $i++){
	$exploded = explode("|",$prices[$i]);
	$data .= '<tr>
				<td>'.($i+1).'</td>
				<td>'.$exploded[0].'</td>
				<td>'.$exploded[1].'</td>
				<td><a href="'.$exploded[2].'" target="_blank">Wiggle.com</a></td>
			</tr>';
}

// lpp table end tag
$data .= '</table>';

echo $data;

?>