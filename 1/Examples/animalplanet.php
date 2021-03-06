<?php

abstract class Animal {
	
	use BasicNeedsUtilites;
	
	private $name;
	private $age;
	private $id;
	private $food;
	public static $nextID = 1;
	public static $animalCount = 0;
	public static $animals = array();
	
	public function __construct($name,$age,$food){
		$this->name=$name;
		$this->age = $age;
		$this->food = $food;
		$this->id = self::$nextID;
		self::$nextID++;
		self::$animalCount++;
		array_push(self::$animals, $this);
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
	
	public function getFood(){
		return $this->food;
	}
	
	public function __toString(){
		return "ID: ".$this->getID()."<br>Name: ".$this->getName()."<br>Age: ".$this->getAge();
	}
	
	abstract function move();
	
}

class Bird extends Animal implements Flyable {
	
	use VoicesTrait;
	
	private $flyable;
	
	public function __construct($name,$age,$food,$flyable){
		parent::__construct($name,$age,$food);
		$this->flyable = $flyable;
	}
	
	public function fly(){
		echo $this->getName()." is flying like a free spirit";
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
		print parent::eat()." like a crazy ".get_class($this);
	}
	
	public function __toString(){
		return parent::__toString()."<br>Flyable: ".$this->isFlyable();
	}
}

class Eagle extends Bird implements Hunter {
	
	use HuntUtilities;
	
}

class Dog extends Animal {
	
	use LoveUtilities;
	
	
	public function bark(){
		echo $this->getName(). " is barking like a lunatic ";
	}
	
	public function move(){
		echo $this->getName()." is running around like a wheels on the bus";
	}
}

class Cat extends Animal implements Hunter,Lovable{
	use HuntUtilities,LoveUtilities;
	
	public function move(){
		echo get_class($this)." ".$this->getName(). " is walking with grace ";
	}
	
	public function kiss(){
		echo get_class($this)." ".$this->getName(). " is kissing itself ";
	}
}

class Whale extends Animal {
	
	use VoicesTrait,TalentTrait{
		TalentTrait::sing insteadof VoicesTrait;
		VoicesTrait::sing as basicSing;
	}

		public function move(){
		echo $this->getName()." is swimming in the ocean like a king of darkness";
	}
	
	
}

interface Flyable {
	public function fly();
}

interface Hunter{
	public function hunt($tool);
}

interface Lovable {
	public function hug();
	public function kiss();
}

trait HuntUtilities{

	public function hunt($tool){
		print $this->getName(). " hunts furiously with a $tool";
	}
	
	public function prepareAttack(){
		echo $this->getName(). " is getting ready to attack ";
	}
	abstract function getName();
}

trait BasicNeedsUtilites{
	
	public function sleep(){
		echo $this->getName()." is sleeping";
	}
	
	public function eat(){
		echo $this->getName()." eats ".$this->getFood();
	}
	
	public function pee(){
		echo $this->getName()." is peeing in the woods shamelessly";
	}
	
	abstract function getName();
	abstract function getFood();
	
}

trait LoveUtilities{
	
	public function hug(){
		echo $this->getName(). " is hugging with love ";
	}
	
	abstract function getName();
}

trait TalentTrait {
	
	public function sing(){
		echo $this->getName(). " singing like Adele";
	}
	
	abstract function getName();
}

trait VoicesTrait {
	
	public function roar(){
		echo $this->getName(). " is roaring in the forst";
	}
	
	public function sing(){
		echo $this->getName(). " is singing a song of it's people";
	}
	
	abstract function getName();
	
	
}






//Testing area******************************************************************************************//

$bird = new Bird("Stefan", 21,"broccoli", true);
print $bird;
print "<br>";

print $bird->move();
print "<br>";

print $bird->eat();
print "<br>";

$bird2 = new Bird("Antek", 12, "fries", false);
print $bird2;
print "<br>";

print $bird2->eat();
print "<br>";

$eagle =  new Eagle("Piti", 32, "onion", true);
echo $eagle->hunt("blender");
print "<br>";

echo $eagle->prepareAttack();
print "<br>";

echo $eagle->eat();
print "<br>";

echo $eagle->getName()." is a(n) ".get_class($eagle);
print "<br>";

echo $eagle->pee();
print "<br>";

$dog = new Dog("Kali",3,"pizza");
echo $dog->bark();
print "<br>";

echo $dog->hug();
print "<br>";

$cat = new Cat("Lord", 7, "green peas");
echo $cat->kiss();
print "<br>";

echo $cat->move();
print "<br>";

echo Animal::$animalCount;
print "<br>";
echo Bird::$animalCount;
print "<br>";
echo Eagle::$animalCount;
print "<br>";

$whale = new Whale("Nikita", 102, "popcorn");
echo $whale->sing();
print "<br>";
echo $whale->basicSing();
print "<br>";



echo Dog::$animalCount;
print "<br>";

echo $whale::$animalCount;
print "<br>";

/* $animals = array();

for($i = 0; $i < 10; $i++){
	$dog = new Dog("Doggy".$i, 5, "food".$i);
	array_push($animals,$dog);
}

var_dump($animals); */

print_r(Animal::$animals);
print "<br><br>";

print_r            ( Animal::$animals); //też działa, spacje bez znaczenia 
print "<br><br>";




?>



























