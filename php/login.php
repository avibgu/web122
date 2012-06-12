<?php

	$con = mysql_connect("localhost","root","zubur1");
	
	if (!$con)
		die('Could not connect: ' . mysql_error());

	mysql_select_db("web", $con);

	$query = "SELECT * FROM customer WHERE Username = '" . $_POST["usernameInput"]
				. "' AND Password = '" . $_POST["passwordInput"] . "'";
	
	$result = mysql_query($query);

	if($row = mysql_fetch_array($result))
	{
		setcookie("username", $row['username'], time()+3600);
	}
  
	mysql_close($con);
?>