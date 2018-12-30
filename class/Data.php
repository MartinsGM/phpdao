<?php

 class Data extends PDO{
	
	private $con;

	function __construct(){
		
		define('HOST', "localhost");
		define('BASE', "udemy");
		define('USER', "root");
		define('PASS', "");

		$this->con = new PDO("mysql:host=" . HOST. ";dbname=". BASE, USER, PASS);
	}

	public function setParams($stm, $params = array()){
		foreach ($params as $key => $value) {
			$this->setParam($key, $value);
		}
	}

	public function setParam($stm, $key, $value){
		$stm->bindParam($key, $value);
	}

	public function query($rawQuery, $params = array()){
		$stm = $this->con->prepare($rawQuery);
		$this->setParams($stm, $params);
		$stm->execute();

		return $stm;
	}

	public function select($rawQuery, $params = array()):array{
		$stm = $this->query($rawQuery, $params);
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}
}