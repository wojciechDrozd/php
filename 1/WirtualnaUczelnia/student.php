<?php

class Student{
	private $id;
	private $name;
	private $surname;
	private $pesel;
	private $email;
	private $mobile;
	public static $nextId =100000;
	
	public function __construct(String $name,String $surname, String $pesel, String $email, String $mobile){
		$this->id = self::$nextId;
		self::$nextId++;
		$this->name = $name;
		$this->surname = $surname;
		$this->pesel = $pesel;
		$this->email = $email;
		$this->mobile = $mobile;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function getSurname(){
		return $this->surname;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function getMobile(){
		return $this->mobile;
	}
	
	public function setName(String $name){
		
	}
	
	
	
	
	
	
}
?>







