
<?php

	$HOME_DIR = "C:\wamp64\www\Projects\database.php";


	// Mention the database includer php program over here so that the webpage
	// can get connected to the database once only. That is why the code is 
	//  include once. It ensures the estabalishment of the connection with the
	// database specified in the earlier php program

	include_once $HOME_DIR

?>

<?php

	//retrieve the variables that were given as input over there

	$mail_id = $_POST['email'];
	$password = $_POST['password'];
	
	$sql = "SELECT mail_id FROM users WHERE mail_id='$mail_id';";

	echo $sql;
	
	$result = mysqli_fetch_assoc(mysqli_query($conn, $sql));

	$out = 0;

	// Check whether the given mail id for log in is correct or not
	if ($mail_id == $result['mail_id'])
	{

		$sql = "SELECT password FROM users WHERE mail_id='$mail_id';";

		// Make the query to the databaser
		$result = mysqli_fetch_assoc(mysqli_query($conn, $sql));

		// Check whether the entered password is correct or not
		if($result['password'] == $password)
		{
			$out = 1;
		}
		else
		{
			$out = 2;
		}
	}

	else
	{
		$out = 3;
	}

	echo $out;
?>