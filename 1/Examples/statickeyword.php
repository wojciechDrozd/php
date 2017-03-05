<?php

/*
 * static pierwsze, przed 
 */
class StaticExample{
	
	static private $nextID = 1;
	static public $greeting = "Siema!";
	
	public function __construct(){
		print "New object with ID ".self::$nextID." has been created<br>";
		self::$nextID++;
	}
	static public function sayHello(){
		print self::$greeting."<br>";
	}
	
	static public function showLastObjectID(){
		
		if(StaticExample::$nextID == 1){
			print "There are no objects<br>";
		}
		elseif (StaticExample::$nextID > 1){
			print "Next object ID will be: ".self::$nextID."<br>";
		}
		
	}
}

StaticExample::sayHello();
$object = new StaticExample();
$object = new StaticExample();
StaticExample::showLastObjectID();
StaticExample::$greeting = "Siemanson";
StaticExample::sayHello();


?>