<?php

	require 'php/conn.php';
	
	if (!isset($_POST['reqType']))//user called update
		$query = "SELECT * FROM customer WHERE id = " . $_POST['inputID'];
	else
		$query = "SELECT * FROM customer WHERE Username Like '" . $_POST['inputEmail'] . "'";
	$result = mysql_query($query) or die (mysql_error());
	
	if (mysql_num_rows($result) > 0)//user already exists
	{
		if (isset($_POST['reqType']))//user called update
		{
			$query = "UPDATE customer SET UserName='" . $_POST['inputEmail'] ."',Email='" . $_POST['inputEmail'] . "'";
			if ($_POST['inputLicenseNo'] != "")
				$query = $query . ",LicenseId=" . $_POST['inputLicenseNo'];
			if ($_POST['CreditCardNumber'] != "")
				$query = $query . ",CreditCardNum=" . $_POST['CreditCardNumber'];
			$query = $query . " WHERE Username Like '" . $_POST['inputEmail'] . "'";
			mysql_query($query) or die ("Invalid insert " . mysql_error());
			echo "<div class=\"hero-unit\"><h3>Detailes Updated!</h3></div>";
		}
		else	//user already exists - alert
			echo "<div class=\"hero-unit\"><h3> ID is already registerd</h3></div>";
	}
	else	
	{		//new user
		$query = "SELECT * FROM customer WHERE Username Like '" . $_POST['inputEmail'] . "' OR LicenseId =" . $_POST['inputLicenseNo'] . " OR
			id=" . $_POST['inputID'];
		$result = mysql_query($query) or die (mysql_error());
		if (mysql_num_rows($result) > 0)
		{	//duplicate details - alert
			echo "<div class=\"hero-unit\"><h3> One of the details you enterd already exists. You can contact support 
			<a href=\"#\" onClick=\"load('php/contact.php')\"> here </a></h3></div>";
		}
		else //complete register process
		{
			$creditcard = 0;
			if ($_POST['CreditCardNumber'] != "")
				$creditcard = $_POST['CreditCardNumber'];
			print_r($_POST);
			$query = "insert into customer values (" . $_POST['inputID'] . ",'" . $_POST['inputFirstName'] . "','" . $_POST['inputLastName'] 
				. "','" . $_POST['inputEmail'] . "','" . $_POST['inputPassword'] . "','" . $_POST['inputEmail'] . "'," . $creditcard . "," . 1 . ",'" . date("y-m-d H:i:s")
				. "'," . $_POST['inputLicenseNo'] . ")";				
			mysql_query($query) or die ("Invalid insert " . mysql_error());
			echo "<div class=\"hero-unit\"><h3> Registration Successful </h3><br/></div>";	
			
		}
	}
//id  FirstName LastName  Username Password Email CreditCardNum SubscriptionType RegistrationDate LicenseId
	mysql_close($con);
	

?>