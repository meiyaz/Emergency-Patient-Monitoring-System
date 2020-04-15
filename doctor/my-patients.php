<?php

	$HOME_DIR = "C:\wamp64\www\Projects\database.php";

	// Mention the database includer php program over here so that the webpage
	// can get connected to the database once only. That is why the code is 
	//  include once. It ensures the estabalishment of the connection with the
	// database specified in the earlier php program
	include_once $HOME_DIR
?>
<?php

	session_start();

?>

<?php
	
	// Get the Doctor user id from a 
	// $Doc_id = $_SESSION["Doctor_id"];
	$Doc_id = 10;

	$other = array();

	$arrs=array('Fever','Cough','Tiredness','Breathing Difficulties','Nasal Congestion','Heart Atack','Stroke','Allergy','Hypersensitivity','Cold','Hives','Sinusites','Bone Problems','Joint Problems','Asthma','Cancer','Back Pain','ENT Problems','Pneumonia','Tonsilities','Diabetes','Appendicitis','Ulcer','Constipation','Diarrhoea','Angina','Hepatitis','Liver Cirrhosis','Blood Pressure','HIV/AIDS','Dengue','Malaria','Meningitie','Fits/Epilepsy','Nervous Problems','Thyroid','Kidney Problems','Menopause','Dialysis','Fracture');
	

	$arrs1 = array('Fever','Cough','Tiredness','Breathing_Difficulties','Nasal_Congestion','Heart_Attack','Stroke','Allergy','Hypersensitivity','Cold','Hives','Sinusites','Bone_Problems','Joint_Problems','Asthma','Cancer','Back_Pain','ENT_Problems','Pneumonia','Tonsilities','Diabetes','Appendicitis','Ulcer','Constipation','Diarrhoea','Angina','Hepatitis','Liver_Cirrhosis','Blood_Pressure','AIDS','Dengue','Malaria','Meningitie','Fits','Nervous_Problems','Thyroid','Kidney_Problems','Menopause','Dialysis','Fracture');

	$sql = "SELECT * FROM patients WHERE doctor_user_id='$Doc_id';";

	$result = mysqli_query($conn, $sql);

	$length =   mysqli_num_rows($result);

	// Contains all the details of the patient
	$patient_list = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	echo json_encode($patient_list);

	// Close the Connection
	mysqli_close($conn);
?>
