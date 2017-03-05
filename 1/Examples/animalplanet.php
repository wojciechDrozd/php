<?php

abstract class Animal {
	
	private $name;
	private $age;
	private $id;
	private $food;
	public static $nextID = 1;
	
	public function __construct($name,$age,$food){
		$this->name=$name;
		$this->age = $age;
		$this->food = $food;
		
		$this->id = self::$nextID;
		self::$nextID++;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function getAge(){
		return $this->age;
	}
	
	public function getID(){
		return $this->id;
	}
	
	public function eat(){
		print $this->name." eats ".$this->food;
	}
	
	public function __toString(){
		return "<br><br>ID: ".$this->getID()."<br>Name: ".$this->getName()."<br>Age: ".$this->getAge();
	}
	
	abstract function move();
	
}

class Bird extends Animal {
	
	private $flyable;
	
	public function __construct($name,$age,$food,$flyable){
		parent::__construct($name,$age,$food);
		$this->flyable = $flyable;
	}
	
	public function isFlyable(){
		if($this->flyable)
			return "true";
		else 
			return "false";
	}
	
	public function move(){
		if($this->flyable)
			print $this->getName()." flys";
		else
			print $this->getName(). " can't fly";
	}
	
	public function eat(){
		print parent::eat()." like a crazy bird";
	}
	
	public function __toString(){
		return parent::__toString()."<br>Flyable: ".$this->isFlyable();
	}
}

class Eagle extends Bird implements Hunter {
	
	public function hunt(){
		print $this->getName(). " hunts furiously";
	}
}

interface Hunter{
	public function hunt();
}
//**********Testing area******************************************************************************************//

$b1 = new Bird("Stefan", 21,"broccoli", true);
print $b1;
print "<br><br>";

print $b1->move();
print "<br><br>";

print $b1->eat();
print "<br><br>";

$b2 = new Bird("Antek", 12, "fries", false);
print $b2;
print "<br><br>";

print $b2->eat();
print "<br><br>";



?>



























