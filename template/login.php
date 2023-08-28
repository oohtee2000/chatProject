
<?php 
require("../classes/user.php"); 

if (isset($_POST['login'])) {
    // Collect form data
    $client = new user();
    $username = $_POST['username'];
    $password = $_POST['password'];
    
}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>


	<form method="POST" action="" enctype="multipart/form-data">
		
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br><br>        
       
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" ><br><br>
       
        
        <button type="submit" name="login">login</button>

		
	</form>

</body>
</html>


<?php if (isset($_POST['login'])):	

        // setting user data
	var_dump($client);

	$data = $client->login($_POST['username'], $_POST['password']);
	var_dump($data);
	echo(count($data));
	if(count($data)>1){
		echo "multiple data";
	}
	elseif (count($data)==0) {
		// code...
		echo "data not exist";
	}

	elseif(count($data)==1){
		$_SESSION['user_id'] = $data[0]['user_id'];
		echo $_SESSION['user_id'];

		$_SESSION['login_sucess'] = "Login successfully";

		echo "
		<script>
			window.location.href = '../index.php';
		</script>
		";


	}
	echo "<br>";
	

	// echo

	// echo $username;
	// echo $password;
		// $client->setEmail($email);
		?>


<?php
 endif; 
?>