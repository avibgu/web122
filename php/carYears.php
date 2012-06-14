<?php

	require 'php/conn.php';

	$query = "SELECT Year FROM cartype WHERE Brand = '" . $_GET['Brand'] . "' AND Model = '" . $_GET['Model'] . "'";

	$result = mysql_query($query);

	while ($row = mysql_fetch_array($result)){

		echo "<option value=\"" . $row['Year'] . "\">" . $row['Year'] . "</option>";
	}

	mysql_close($con);

?>