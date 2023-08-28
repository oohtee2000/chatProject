<?php
include("Database.php");
class message extends Database{
	private $message;
	private $olutee;
	private $doc;

	

	public function __construct(){
		$this->connect();
	}

	public function setMessage($message){
		  $this->message = $message;
		  return true;		  // $this->olutee = "lldldl";
	}

	public function changet(){
		$this->olutee = "olutee";
	}

	// public function setFil(){
	// 	  $this->doc = "ldlldkkgjujggjjk";
	// }




}


?>