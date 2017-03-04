<?php

class Wrong {}

class ShopProduct {
	
	public $title;
	public $producerMainName;
	public $producerFirstName;
	public $price;
	
	public function __construct($title,$producerFirstName,$producerMainName,$price){
		$this->title = $title;
		$this->producerFirstName = $producerFirstName;
		$this->producerMainName = $producerMainName;
		$this->price = $price;
		
	}
	
	public function getTitle(){
		return $this->title;
	}
	
	public function getPrice(){
		return $this->price;
	}
	
	public function getProducer(){
		
		return "{$this->producerFirstName} ".
				"{$this->producerMainName}";
	}
	
	/*wymuszenie parametru poprzez użycie class type hints - pouczenia (mechanizm wymuszania typu)
	 * nie działa dla typów prostych
	 * */
	public function write(ShopProduct $shopProduct){
		$string = "{$shopProduct->getTitle()}: ".
		"{$shopProduct->getProducer()}, ".
		"{$shopProduct->getPrice()}";
		
		print $string;
	}
	
	
	//changing output from var_dump(), always return array
	public function __debugInfo(){
	
		return array('title' => $this->title);
	}
}

$product1 = new ShopProduct("Productivity 101","John", "Snow", 9.99);
$product2 = new ShopProduct("Intermittent Fasting: Improving Cognitive Functions","Angelo","Mendoza", "14.99");

$product1->write($product1);

//$product1->write(new Wrong()); nie zadziała, bo nie zgadza się typ parametru




















print "<br><br>";
var_dump($product1);

print '<br><br>';
var_dump($product2);

print "<br><br>";

echo "{$product1->getTitle()}: "."{$product1->getProducer()}";
print "<br><br>";
echo '{$product1->getTitle()}: '.'{$product1->getProducer()}';
print "<br><br>";
print "Autor: ".$product1->getProducer();
print "<br><br>";
print "Autor: ".$product2->getProducer();
print "<br><br>";

if(is_string($product1))
	print "yes, it's a ".gettype($product1);
else
	print "naah, it's not a string, it's a(n) ".gettype($product1);

	
print "<br><br>";
if(is_object($product2))
	print '$product2 is an object';

print "<br><br>";
print "<br><br>";
print "<br><br>";
print "<br><br>";


?>