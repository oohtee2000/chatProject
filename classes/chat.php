<?php
include('message.php');


$chat = new message();
var_dump($chat);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>chat</title>
</head>
<body>

	<form method="post" action="" enctype="multipart/form-data"><br><br>
		<input type="text" name="message"><br><br>
		<input type="file" name="doc"><br><br>

		<button type="submit" name="send">Send</button>
		
	</form>

</body>
</html>

<?php if(isset($_POST['send'])):
	// echo "sent";

	$chat->setMessage($_POST['message']);

	var_dump($chat);

	$chat->changet();



?>

<?php endif; ?>