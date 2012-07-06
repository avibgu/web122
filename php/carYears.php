<?php

	require 'php/conn.php';

	$query = "SELECT Year FROM cartype WHERE Brand = '" . $_GET['Brand'] . "' AND Model = '" . $_GET['Model'] . "'";

	$result = mysql_query($query);

	$count = 0;
	
	while ($row = mysql_fetch_array($result)){

		echo "<option value=\"" . $row['Year'] . "\">" . $row['Year'] . "</option>";
		
		$count++;
	}
	
	if ($count < 1)
		echo "<option value=\"Year\">Year</option>";

	mysql_close($con);

?>