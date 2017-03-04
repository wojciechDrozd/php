<?php

class StaticExample{
	
	static public $nextID = 0;
	static public function sayHello(){
		print "Siema";
	}
}

StaticExample::sayHello();
?>