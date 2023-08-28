<?php
session_start();

class Database{




	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	public $conn;

	

	public function connect(){
		$options = [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		];

		try{
			$this->conn = new PDO("mysql:host=$this->servername;dbname=chat", $this->username, $this->password, $options);
			echo "connected successfully";

		}
		catch(PDOException $e)
		{
			echo "connection failed" . $e->getMessage();
		}

	}




}


$db = new Database();









?>