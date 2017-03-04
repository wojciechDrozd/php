<?php

class ShopProduct{

	private $title;
	private $producerFirstName;
	private $producerLastName;
	protected $price;
	private $discount = 0;

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

$shopProduct = new ShopProduct("Brain", "Steven", "Kalper", 9.99);
print "{$shopProduct->getSummaryLine()}"."<br>";


$cdProduct = new CdProduct("Radio M", "Sir", "Małpa", 100, 56);
print $cdProduct->getSummaryLine()."<br>";

$bookProduct = new BookProduct("Ma Buk", "Anna", "Smith", 2.99, 300);
print $bookProduct->getSummaryLine();


?>











































