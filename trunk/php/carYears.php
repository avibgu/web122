<?php

	$con = mysql_connect("localhost","root","zubur1");

	if (!$con)
		die('Could not connect: ' . mysql_error());

	mysql_select_db("web", $con);

	$query = "SELECT Year FROM cartype WHERE Brand = '" . $_GET['Brand'] . "' AND Model = '" . $_GET['Model'] . "'";

	$result = mysql_query($query);

	while ($row = mysql_fetch_array($result)){

		echo "<option value=\"" . $row['Year'] . "\">" . $row['Year'] . "</option>";
	}

	mysql_close($con);

?>