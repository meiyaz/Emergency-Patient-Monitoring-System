
<?php

	// A PHP program to include a MYSQL database inside a HTML program for once
	$dbServername = 'localhost';
	$dbUsername = 'root';
	$dbPassword = '';

	// Give the name of the database as you like it but it must be present in the local machine

	$dbName = 'login-details';

	/* Attempt to estabalish a connection to the specified MySQL database */

	$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName, "3308");


	// Check if connection was successful
	if($conn === false)
	{
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}

?>