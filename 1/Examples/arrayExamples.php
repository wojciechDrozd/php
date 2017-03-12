<?php
//http://php.net/manual/en/language.types.array.php

//a simple array example
$array = array(
		
		"foo" => "bar",
		"bar" => "foo",
);

var_dump($array);
print '<br>';

//as of PHP 5.4

$array = [
		
	"foo" => "bar",
	"bar" => "foo",
];

var_dump($array);
print '<br>';

$array = [
		
		'bro' => 'tip',
		'golden' => 1,
		"funny" => true,
		false => 0,
		
];

echo "<pre>" , var_dump($array) , "</pre>";

$array[] = 9;
$array[12] = 'protein';
$array[] = false;

echo "<pre>" , var_dump($array) , "</pre>";



print '<br><br>';

//type casting and overwriting example
$ar = array(
		
		1 => "a",
		"1" => 'b',
		1.5 => "c",
		true => "d",
);

var_dump($ar);
print '<br><br>';

$ar[] = 'zorro';
var_dump($ar);
print '<br><br>';

//arrays without keys

$aar = array('keys','mobile','wallet');
print_r($aar);
print '<br>';
var_dump($aar);
print '<br><br>';


//keys not on all elements

$array = array(
	
		"a",
		"n",
		6 => "c",
		"d",
);

var_dump($array);
print '<br><br>';


//accessing array elements - [] {} interchangeably

$array = array(
		
		"foo" => "bar",
		24 => 42,
		"moolti" =>array(
				"dymensional" => array(
						"array"=>"pooh"
				)
		)
);

var_dump($array['foo']);
print '<br><br>';
var_dump($array['moolti']);
print '<br><br>';
var_dump($array{'moolti'});
print '<br><br>';
var_dump($array['moolti']['dymensional']);
print '<br><br>';
var_dump($array{'moolti'}['dymensional']{'array'});
print '<br><br>';

//array dereferencing

function getArray(){
	return array(1,2,3);
}

$secondElement = getArray()[1];
var_dump($secondElement);
print '<br><br>';

//creating/modifying with square brackets sytax

//key may be integer or string
//value may be any value of any type
$createdArray['key'] = 'value'; //this is legal but discouraged    
$createdArray[] = 3;
$createdArray[3] = 'water';
$createdArray[] = 222;

var_dump($createdArray);
print '<br><br>';

//ARRAY OPERATIONS

$araj = array(5 =>1, 12 =>2);
var_dump($araj);
print '<br><br>';

//adding a new element with default key
$araj[] = 56;
var_dump($araj);
print '<br><br>';

//adding a new element with key 'x'
$araj['x'] = 42;
var_dump($araj);
print '<br><br>';

//removing the element from the array
unset($araj[5]);
var_dump($araj);
print '<br><br>';

//deleting the whole array
unset($araj);
//var_dump($araj); -> results in Notice; undefined variable
print '<br><br>';





//a simple array, var_dump vs print_r

$arr = array(1,2,3,4,5);
print '<br><br>';
echo '<br><b>$arr = array(1,2,3,4,5);<b><br>';
echo '<br><b>var_dump($arr):</b><br>';
echo "<pre>" , var_dump($arr) , "</pre>";

echo '<b>print_r($arr):</b><br>';
echo "<pre>" , print_r($arr) , "</pre>";

?>















































