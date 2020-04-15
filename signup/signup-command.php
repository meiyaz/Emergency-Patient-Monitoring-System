
<?php

	$HOME_DIR = "C:\wamp64\www\Projects\database.php";


	// Mention the database includer php program over here so that the webpage
	// can get connected to the database once only. That is why the code is 
	//  include once. It ensures the estabalishment of the connection with the
	// database specified in the earlier php program

	include_once $HOME_DIR

?>

<?php
	
	$out = 0;
	//retrieve the variables that were given as input over there

	$mail_id = $_POST['email'];
	// $category = $_POST['category'];
	$password = $_POST['password'];

	$sql = "SELECT mail_id FROM users WHERE mail_id='$mail_id';";

	// Check whther the given mail id for sign up is already present or not

	$result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
	
	if(! $result['mail_id'] == $mail_id)
	{
		$sql = "INSERT INTO users(mail_id, password) VALUES('$mail_id', '$password');";
	
		// Make the query to the database and add ther user
		mysqli_query($conn, $sql);

		// Set the variable to 1 so that we can go the next page from the java script
		$out = 1;
	}

	else
	{
		$out = 0;
	}
	echo $out;
?>