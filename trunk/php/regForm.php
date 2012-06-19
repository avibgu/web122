<?php

	require 'php/conn.php';

	$query = "SELECT * FROM customer WHERE id = " . $_POST['inputID'];

	$result = mysql_query($query);
	
	if (mysql_num_rows($result) > 0)
		if (isset($_POST['reqType'])){
			$query = "UPDATE customer SET UserName='" . $_POST['inputEmail'] ."',Email='" . $_POST['inputEmail'] . "',LicenseId='"
			. $_POST['inputLicenseNo']. "' WHERE id='" . $_POST['inputID'] . "'";
			mysql_query($query) or die ("Invalid insert " . mysql_error());
			echo "<p> Detailes Updated!</p>";
		}
		else
			echo "<p> ID is already registerd</p>";
	else{
		$query = "SELECT * FROM customer WHERE Username Like '" . $_POST['inputEmail'] . "'";
		$result = mysql_query($query);
		if (mysql_num_rows($result) > 0)
			echo "<p> User Name is already exists</p>";
		else {
			$query = "insert into customer values (" . $_POST['inputID'] . ",'" . $_POST['inputFirstName'] . "','" . $_POST['inputLastName'] 
				. "','" . $_POST['inputEmail'] . "','" . $_POST['inputPassword'] . "','" . $_POST['inputEmail'] . "'," . 0 . "," . 1 . ",'" . date("y-m-d H:i:s")
				. "'," . $_POST['inputLicenseNo'] . ")";	
			echo "<p> Registration Successful </p><br/>";				
			mysql_query($query) or die ("Invalid insert " . mysql_error());
			
		}
	}

	mysql_close($con);
	

?>