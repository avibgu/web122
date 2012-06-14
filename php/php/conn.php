<?php

	$con = mysql_connect('localhost', 'digmia', "RYkUhstj");

	if (!$con)
		die('Could not connect: ' . mysql_error());

	mysql_select_db("web122G7", $con);
	
?>