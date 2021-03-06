<?php

class ShopProduct implements Chargeable, IdentityObject{

	use PriceUtilities,IdentityTrait;
	
	private $title;
	private $producerFirstName;
	private $producerLastName;
	protected $price;
	private $discount = 0;
	const AVAILABLE = 1; //stałe zawsze wielkimi literami
	const OUT_OF_STOCK = 0;

	public function __construct($title, $producerFirstName, $producerLastName,$price){
		$this->title = $title;
		$this->producerFirstName = $producerFirstName;
		$this->producerLastName = $producerLastName;
		$this->price = $price;
	}
	
	//implementacja abstrakcyjnej funkcji z cechy typowej PriceUtilities
	public function getTaxRate(){
		return 17;
	}

	public function getTitle(){
		return $this->title;
	}
	
	public function setDiscount($dis){
		$this->discount = $dis;
	}

	public function getPrice(){
		return ($this->price - $this->getDiscount());
	}

	public function getProducerFirstName(){
		return $this->producerFirstName;
	}

	public function getProducerLastName(){
		return $this->producerLastName;
	}

	public function getDiscount(){
		return $this->discount;
	}

	public function getProducer(){
		return "{$this->getProducerFirstName()} ".
		"{$this->getProducerLastName()}";
	}

	public function getSummaryLine(){
		return "Tytuł: {$this->getTitle()}, ".
		" autor: {$this->getProducer()}, ".
		"cena: {$this->getPrice()}";
	}

}

class CdProduct extends ShopProduct{
	private $playLength = 0;
	
	public function __construct($title, $firstName, $lastName, $price, $length){
		parent::__construct($title,$firstName,$lastName,$price);
		$this->playLength = $length;
	}
	
	public function getPlayLength(){
		return $this->playLength;
	}
	
	public function getSummaryLine(){
		return parent::getSummaryLine().", czas nagrania: {$this->getPlayLength()} minut";
	}
}

class BookProduct extends ShopProduct{
	
	private $numPages = 0;
	
	public function __construct($title,$first,$last,$price,$num){
		parent::__construct($title, $first, $last, $price);
		$this->numPages = $num;
	}
	
	public function getNumberOfPages(){
		return $this->numPages;
	}
	
	public function getSummaryLine(){
		return parent::getSummaryLine().", liczba stron: {$this->getNumberOfPages()}";
	}
}

abstract class ShopProductWriter{
	
	protected $products = array();
	
	public function addProduct(Chargeable $shopProduct){
		$this->products[] = $shopProduct;
	}
	
	abstract public function write();
}

class XmlProductWriter extends ShopProductWriter{
	public function write(){
		$writer = new XMLWriter();
		$writer->openMemory();
		$writer->startDocument('1.0','UTF-8');
		$writer->startElement("products");
		foreach ($this->products as $shopProduct){
			$writer->startElement("product");
			$writer->writeAttribute("title", $shopProduct->getTitle());
			$writer->startElement("summary");
			$writer->text($shopProduct->getSummaryLine());
			$writer->endElement();//element summary
			$writer->endElement();//element product
			
		}
		
		$writer->endElement();
		$writer->endDocument();
		print $writer->flush();
	}
}

class TextProductWriter extends ShopProductWriter {
	public function write(){
		$str = "PRODUCTS:<br>";
		foreach($this->products as $shopProduct){
			$str .= $shopProduct->getSummaryLine()."<br>";
		}
		print $str;
	}
}

interface Chargeable{
	public function getPrice();
}

interface IdentityObject{
	public function generateId();
}

trait PriceUtilities {
	public function calculateTax($price) {
		return (($this->getTaxRate())* $price);
	}
	
	abstract function getTaxRate();
}

trait IdentityTrait{
	public function generateId(){
		return uniqid();
	}
}

trait TaxTools{
	public function calculateTax($price){
		return 222;
	}
}

class TraitTest{
	use PriceUtilities,IdentityTrait,TaxTools {
		TaxTools::calculateTax insteadof PriceUtilities;
		PriceUtilities::calculateTax as basicTax; //alias nazwy, wymaga użycia najpierw insteadof
	}
	
	public function getTaxRate(){
		return 17;
	}
	
}

class UtilityService {
	use PriceUtilities {
		PriceUtilities::calculateTax as private;
	}
	
	private $price;
	
	public function __construct($price){
		$this->price = $price;
	}
	
	public function getTaxRate(){
		return 17;
	}
	
	public function getFinalPrice(){
		return ($this->price + $this->calculateTax($this->price));
	}
}






//================================================================================================//

print "AVAILABLE code: ".ShopProduct::AVAILABLE;
print "<br>";

$us = new UtilityService(30);
print "US final price: ".$us->getFinalPrice();
print "<br>";


$tt = new TraitTest();
print "Calculate TAX: ".$tt->calculateTax(100);
print "<br>";
print "Basic tax: ".$tt->basicTax(100);
print "<br>";

print "Generate ID: ".$tt->generateId();
print "<br>";

$shopProduct = new ShopProduct("Brain", "Steven", "Kalper", 9.99);
print $shopProduct->getSummaryLine()."<br>";
print "Calculate Tax: "."{$shopProduct->calculateTax($shopProduct->getPrice())}";
print "<br>";
print "Generate ID for shop product: ".$shopProduct->generateId();												
print "<br>";

print $shopProduct->getPrice();
print "<br>";

$cdProduct = new CdProduct("Radio M", "Sir", "Małpa", 100, 56);
print $cdProduct->getSummaryLine()."<br>";

$bookProduct = new BookProduct("Lolita", "Anna", "Smith", 2.99, 300);
print $bookProduct->getSummaryLine()."<br>";

$mywriter = new TextProductWriter();
$mywriter->addProduct($shopProduct);
$mywriter->addProduct($cdProduct);
$mywriter->addProduct($bookProduct);
$mywriter->write();

//struktura xml widoczna w źródle strony
$mywriter2 = new XmlProductWriter();
$mywriter2->addProduct($shopProduct);
$mywriter2->addProduct($cdProduct);
$mywriter2->addProduct($bookProduct);
$mywriter2->write();

?>











































