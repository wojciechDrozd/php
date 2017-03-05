<?php

class ShopProduct implements Chargeable{

	private $title;
	private $producerFirstName;
	private $producerLastName;
	protected $price;
	private $discount = 0;
	const AVAILABLE = 1;
	const OUT_OF_STOCK = 0;

	public function __construct($title, $producerFirstName, $producerLastName,$price){
		$this->title = $title;
		$this->producerFirstName = $producerFirstName;
		$this->producerLastName = $producerLastName;
		$this->price = $price;
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








//================================================================================================//

print ShopProduct::AVAILABLE;
print "<br>";

$shopProduct = new ShopProduct("Brain", "Steven", "Kalper", 9.99);
print "{$shopProduct->getSummaryLine()}"."<br>";

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











































