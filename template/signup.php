<?php 
include("../classes/user.php"); 

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIGNUP</title>
</head>
<body>

	<?php
	
// Initialize variables to store form data
$name = $email = $message = '';

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Collect form data
    $client = new user();
    $username = $_POST['username'];
    $email = $_POST['email'];
    $full_name = $_POST['full_name'];
    $bio = $_POST['bio'];
    $password = $_POST['password'];
    $picture = $_FILES['profile_picture'];
}
?>

	<form method="POST" action="" enctype="multipart/form-data">
		
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" ><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" ><br><br>
        
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name"><br><br>
        
        <label for="profile_picture">Profile Picture URL:</label>
        <input type="file" id="profile_picture" name="profile_picture"><br><br>
        
        <label for="bio">Bio:</label><br>
        <textarea id="bio" name="bio" rows="4" cols="50"></textarea><br><br>
        
        <button type="submit" name="submit">Register</button>

		
	</form>

	<?php if (isset($_POST['submit'])):	

        // setting user data

		$client->setUsername($username);
		$client->setEmail($email);
		$client->setFullname($full_name);
		$client->setBio($bio);
		$client->setPassword($password);
		$client->setProfilepix($picture);

		var_dump($client);

		
         
          echo "<b>".$client->getImageName()."</b>";
          echo dirname(__DIR__, 1);

          echo "<h3>".$client->dest.$client->getImageName()."</h3>";


          // uploading image            
         echo $loaded = $client->uploadImage($client->profile_pix['tmp_name'], $client->dest.$client->getImageName());

          if($loaded){
            echo "loaded successfully";
          }
          else{
            echo "<br>failed to load";
          }


          // uploading data to database
           $test = $client->register($client->getUsername(), $client->getEmail(), $client->getFullname(), $client->getBio(), $client->getPassword(), $client->getImageName()); 


           var_dump($test);
           ?>


    <?php endif; ?>

</body>
</html>