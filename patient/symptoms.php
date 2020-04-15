<?php

	$HOME_DIR = "C:\wamp64\www\Projects\database.php";

	// Mention the database includer php program over here so that the webpage
	// can get connected to the database once only. That is why the code is 
	//  include once. It ensures the estabalishment of the connection with the
	// database specified in the earlier php program
	include_once $HOME_DIR
?>


<?php
	
	echo 1;
	// Get the respective user_id from the users table
	$var = $_POST['email'];

	$sql = "SELECT user_id FROM users WHERE mail_id = $var";
	
	$res = mysqli_query($conn, $sql);

	// Check whether the given gamil di is present or not
	// if($res)
	// {
	// 	$u_id = mysqli_fetch_assoc($res)['user_id'];
	// 	$sql = "UPDATE patients SET user_id = $u_id WHERE mail_id = $var";
	// 	mysqli_query($conn, $sql);
	// }
	// else
	// {
	// 	echo "Given gmail id is not present...";
	// }
	
	// Contains the list of columns in teh SQL database for the patients
	$arrs = array('name','age','gender','address','zone','number','email','bg','Fever','Cough','Tiredness','Breathing_Difficulties','Nasal_Congestion','Heart_Attack','Stroke','Allergy','Hypersensitivity','Cold','Hives','Sinusites','Bone_Problems','Joint_Problems','Asthma','Cancer','Back_Pain','ENT_Problems','Pneumonia','Tonsilities','Diabetes','Appendicitis','Ulcer','Constipation','Diarrhoea','Angina','Hepatitis','Liver_Cirrhosis','Blood_Pressure','AIDS','Dengue','Malaria','Meningitie','Fits','Nervous_Problems','Thyroid','Kidney_Problems','Menopause','Dialysis','Fracture');

	//Get the passed on variables from the front end
	$sql1= 'INSERT INTO patients (';
	$sql2 = 'VALUES (';
	$res = array();

	for($i=0; $i<count($arrs);$i++)
	{
		if(($i == 0) or ($i == 2) or ($i == 3) or ($i == 4) or ($i == 5) or ($i == 6) or ($i == 7))
		{
			// Store the string based variables in the SQL query
			array_push($res, strval(('"'.$_POST[$arrs[$i]].'"')));
		}
		else
		{
			// Store the integer based variables in the SQL query
			array_push($res, (int)$_POST[$arrs[$i]]);
		}

		if($i == count($arrs)-1)
		{
			$sql1 .= strval($arrs[$i]);
			$sql1 .= ")";

			$sql2 .= strval($_POST[$arrs[$i]]);
			$sql2 .= ")";
		}
		else
		{
			$sql1 .= strval($arrs[$i]);
			$sql1 .= ",";

			$sql2 .= strval($_POST[$arrs[$i]]);
			$sql2 .= ",";
		}
	}	 

	// Add both the strings to form the query
	$sql = $sql1 . $sql2;
	
	echo $sql;

	// Make the query to the database

	// mysqli_query($conn, $sql);

	// echo 'Successfully updated the database with the new data';
?>