<?php

// $pix = "olloowow is  the . dodiid ll . odo";

include("Database.php");
class user extends Database{

	private $username=null;
	private $email=null;
	private $fullname=null;
	public $profile_pix;
	private $bio=null;
	private $password=null;
	public $image_name;

	public $dest ;
	// private $db;

	public function __construct(){
		// $this->getImageExtension();
		$this->connect();
		$this->dest = dirname(__DIR__, 1);
		$this->dest .="/assets/images/";
		// $this->image_name=$this->getImageName();
		// $this->image_name.=$this->getImageExtension();
	}

	//setting username
	public function setUsername($username="username"){		
		$this->username = $username;

	}
	//getting username
	public function getUsername(){
		return $this->username;
	}


	//setting email
	public function setEmail($email="email"){		
		$this->email = $email;
	}
	//getting email
	public function getEmail(){
		return $this->email;
	}


	//setting fullname
	public function setFullname($fullname="fullname"){		
		$this->fullname = $fullname;

	}
	//getting fullname
	public function getFullname(){
		return $this->fullname;
	}


	//setting bio
	public function setBio($bio="biography"){		
		$this->bio = $bio;

	}
	//getting bio
	public function getBio(){
		return $this->bio;
	}



	//setting Profilepix
	public function setProfilepix($Profilepix){		
		$this->profile_pix = $Profilepix;

	}
	//getting Profilepix
	public function getProfilepix(){
		return $this->profile_pix;
	}


	// getting image extension


	public function getImageExtension(){
		$image_name = $this->profile_pix['name'];
		$split = explode(".", $image_name);
		return (end($split));		

	}


	public function getImageName(){

		 $d = date("Ymd_His");
		return ("user_".$d.".".$this->getImageExtension());
	}

	public function uploadImage($tmp, $destination){

		$up = move_uploaded_file($tmp, $destination);

		return $up;
	}

		//setting password
	public function setPassword($password="passwordgraphy"){		
		$this->password = $password;

	}
	//getting password
	public function getpassword(){
		return $this->password;
	}



	// Picture
	 public function uploadProfilePicture($userId, $imagePath) {
        // Implement image upload logic
        // Update user's profile picture path in the database
    }

    public function deleteProfilePicture($userId) {
        // Implement image deletion logic
        // Update user's profile picture path in the database
    }

    public function editProfilePicture($userId, $newImagePath) {
        // Implement image editing logic
        // Update user's profile picture path in the database
    }





	public function register($username, $email, $fullname, $bio, $password, $pix) {

		try {
			$stmt = $this->conn->prepare("INSERT INTO `users` (username, email,  fullname, bio, password, profilepix) VALUES(?, ?, ?, ?, ?, ?)");
			$stmt->execute([$username, $email, $fullname, $bio, $password, $pix]);
			if($stmt){
				echo "Data inserted sucessfully";
			}
			
		}

		catch (PDOException $e){
			echo "Error: " . $e->getMessage(); 

		}
        
    }

    public function login($username, $password) {

    	try{
    		$stmt = $this->conn->prepare("SELECT * FROM `users` WHERE `username` = ? && `password`= ?");
    		$stmt->execute([$username, $password]);
    		// if($stmt){
			// 	echo "Data inserted sucessfully";
			$fetch = $stmt->fetchAll();
			return $fetch;
			// }
			// return $stmt->rowCount();
			
    	}
    	catch(PDOException $e){
    		echo "Error: " .$e->getMessage();
    	}
        // Implement user login logic using PDO
    }

    public function getDatabyId($id) {

    	try{
    		$stmt = $this->conn->prepare("SELECT * FROM `users` WHERE `user_id` = ?");
    		$stmt->execute([$id]);
    		// if($stmt){
			// 	echo "Data inserted sucessfully";
			$fetch = $stmt->fetchAll();
			return $fetch;
			// }
			// return $stmt->rowCount();
			
    	}
    	catch(PDOException $e){
    		echo "Error: " .$e->getMessage();
    	}
        // Implement user login logic using PDO
    }

    public function updateProfile($userId, $newData) {
        // Implement user profile update logic using PDO
    }
}

// move_uploaded_file()






// username email password fullname profile_pix bio

// $user1 = new user();
// $user1->setUsername("oluwatosin");
// echo $user1->getUsername();
// $user1->setEmail("oluwatoisemail");
// var_dump(end($user1->getImageExtension()));
// echo $user1->getImageExtension();
// var_dump($user1);

?>




