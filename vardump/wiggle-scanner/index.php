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

//echo $categoriesNamesLinks['Accessories'];

$ch = curl_init('http://www.wiggle.com/accessories/?o=9');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,-1);
$urlContent = curl_exec($ch);
curl_close($ch);

//link do kolejnej strony w widoku produktów w kategorii
$nextPageLinkReg ='@bem-paginator__link--selected">\d+</span>.+?(?!=<)<a class="bem-paginator__link js-nav-ajax" data-ajax="[^"]+" href="([^"]+?)">\d+</a>@s';
preg_match_all($nextPageLinkReg, $urlContent, $matches);
$matches[1] = array_unique($matches[1]);

//echo "<pre>",print_r($matches[1]),"</pre>";

$next = 'http://www.wiggle.com/accessories/?o=9&g=25';
$nextPage =$matches[1][0];
echo $nextPage,"<br/>";

$string_old = $nextPage;
$string_new = $next;
$diff = get_decorated_diff($string_old, $string_new);
echo "<table>
    <tr>
        <td>".$diff['old']."</td>
        <td>".$diff['new']."</td>
    </tr>
</table>";

$nextPage = html_entity_decode($matches[1][0]);
echo $nextPage;


       //  'http://www.wiggle.com/accessories/?o=9&g=25'
$next = 'http://www.wiggle.com/accessories/?o=9&g=25';

$ch = curl_init($nextPage);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,-1);
$urlContent = curl_exec($ch);

//link do kolejnej strony w widoku produktów w kategorii
$nextPageLinkReg ='@bem-paginator__link--selected">\d+</span>.+?(?!=<)<a class="bem-paginator__link js-nav-ajax" data-ajax="[^"]+" href="([^"]+?)">\d+</a>@s';
preg_match_all($nextPageLinkReg, $urlContent, $matches);

$matches[1] = array_unique($matches[1]);
//echo "<pre>",print_r($matches[1]),"</pre>";

function get_decorated_diff($old, $new){
	$from_start = strspn($old ^ $new, "\0");
	$from_end = strspn(strrev($old) ^ strrev($new), "\0");

	$old_end = strlen($old) - $from_end;
	$new_end = strlen($new) - $from_end;

	$start = substr($new, 0, $from_start);
	$end = substr($new, $new_end);
	$new_diff = substr($new, $from_start, $new_end - $from_start);
	$old_diff = substr($old, $from_start, $old_end - $from_start);

	$new = "$start<ins style='background-color:#ccffcc'>$new_diff</ins>$end";
	$old = "$start<del style='background-color:#ffcccc'>$old_diff</del>$end";
	return array("old"=>$old, "new"=>$new);
}

$string_old = $nextPage;
$string_new = $next;
$diff = get_decorated_diff($string_old, $string_new);
echo "<br/><br/>SJDKNSJKD<table>
    <tr>
        <td>".$diff['old']."</td>
        <td>".$diff['new']."</td>
    </tr>
</table>";
/* 
	$item = str_replace(htmlentities("o=9&"), "", $item);
 */









?>
</body>
</html>































