<?php


//evaluation

echo $foo=1;
print '<br>';
var_dump($foo);
print '<br>';

echo $foo = '1';
print '<br>';
var_dump($foo);
print '<br>';

echo $foo *= 2;
print '<br>';
var_dump($foo);
print '<br>';

echo $foo=$foo*1.3;
print '<br>';
var_dump($foo);
print '<br>';

$foo = "10 pigs" +1;
echo $foo;
print '<br>';
var_dump($foo);
print '<br>';

//settype(): set the type of the variable

$int = 8;
var_dump($int);
print '<br>';
settype($int, "string");
var_dump($int);
print '<br>';

print PHP_INT_MAX;

?>





























