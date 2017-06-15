<?php
/*
 * $arr1 = ['apple','banana','citrus'];
 * $arr2 = ['red','yellow','orange'];
 *
 * $combined = array_combine($arr1, $arr2);
 * var_dump($combined);
 *
 * print_r($combined);
 */
$x = 3;
$y = 2;
$result = $x*$y-($x*($y+3));
if($result>0){
	print_r($result);
}else{
	$result = $result + $x*$y;
	print_r($result);
}
