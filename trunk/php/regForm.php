<?php

	require 'php/conn.php';

	$query = "SELECT * FROM customer WHERE id = " . $_POST['inputID'];

	$result = mysql_query($query);
	
	if (mysql_num_rows($result) > 0)
		if (isset($_POST['reqType'])){
			$query = "UPDATE customer SET UserName='" . $_POST['inputEmail'] ."',Email='" . $_POST['inputEmail'] . "',LicenseId='"
			. $_POST['inputLicenseNo']. "' WHERE id='" . $_POST['inputID'] . "'";
			mysql_query($query) or die ("Invalid insert " . mysql_error());
			echo "<div class=\"hero-unit\"><h3>Detailes Updated!</h3></div>";
		}
		else
			echo "<div class=\"hero-unit\"><h3> ID is already registerd</h3></div>";
	else{
		$query = "SELECT * FROM customer WHERE Username Like '" . $_POST['inputEmail'] . "' OR LicenseId =" . $_POST['inputLicenseNo'] . " OR
			id=" . $_POST['inputID'];
		$result = mysql_query($query);
		if (mysql_num_rows($result) > 0)
			echo "<div class=\"hero-unit\"><h3> One of the details you enterd already exists. You can contact support 
			<a href=\"#\" onClick=\"load('php/contact.php')\"> here </a></h3></div>";
		else {
			$query = "insert into customer values (" . $_POST['inputID'] . ",'" . $_POST['inputFirstName'] . "','" . $_POST['inputLastName'] 
				. "','" . $_POST['inputEmail'] . "','" . $_POST['inputPassword'] . "','" . $_POST['inputEmail'] . "'," . 0 . "," . 1 . ",'" . date("y-m-d H:i:s")
				. "'," . $_POST['inputLicenseNo'] . ")";				
			mysql_query($query) or die ("Invalid insert " . mysql_error());
			echo "<div class=\"hero-unit\"><h3> Registration Successful </h3><br/></div>";	
			
		}
	}
//id  FirstName LastName  Username Password Email CreditCardNum SubscriptionType RegistrationDate LicenseId
	mysql_close($con);
	

?>