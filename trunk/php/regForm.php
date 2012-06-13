<?php

	$con = mysql_connect("localhost","root","");

	if (!$con)
		die('Could not connect: ' . mysql_error());

	mysql_select_db("web", $con);

	$query = "SELECT * FROM customer WHERE id = " . $_POST['inputID'];// AND Model = '" . $_GET['Model'] . "'";

	$result = mysql_query($query);
	
	if (mysql_num_rows($result) > 0)
		echo "<p> ID is already registerd</p>";
	else{
		$query = "SELECT * FROM customer WHERE Username Like '" . $_POST['inputEmail'] . "'";// AND Model = '" . $_GET['Model'] . "'";
		$result = mysql_query($query);
		if (mysql_num_rows($result) > 0)
			echo "<p> User Name is already exists</p>";
		else {
			$query = "insert into customer values (" . $_POST['inputID'] . ",'" . $_POST['inputFirstName'] . "','" . $_POST['inputLastName'] 
				. "','" . $_POST['inputEmail'] . "','" . $_POST['inputPassword'] . "','" . $_POST['inputEmail'] . "'," . 0 . "," . 1 . "," . date("y-m-d")
				. "," . $_POST['inputLicenseNo'] . ")";	
			echo "<p> Registration Successful </p><br/><p>" . $query . "</p>";				
			mysql_query($query) or die ("Invalid insert " . mysql_error());
			
		}
	}

	mysql_close($con);

?>