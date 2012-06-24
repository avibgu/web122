<?php
	
if (isset($_COOKIE['username'])){//save reviewed cars (last 3 only)
	if (!isset($_COOKIE["historycount"]))
		setcookie("historycount", "0", time() + 3600);
	$reviewedindex = $_COOKIE['historycount'] % 3 + 1;
	setcookie("reviewed" . $reviewedindex, $_GET['car'], time()+3600, "\\", "localhost");
	setcookie("historycount", $reviewedindex . "", time() + 3600);
}


require 'php/conn.php';

$query = "SELECT * FROM cartype WHERE id = '" . $_GET['car'] . "'";

$result = mysql_query($query);

if ($row = mysql_fetch_array($result)){

	echo "<div class=\"hero-unit\">";
	echo "	<h1>" . $row['Brand'] . " " . $row['Model'] . "</h1>";
	echo "	<br/>";
	echo "	<p>Attributes:<br/>" . $row['Attributes'] . "</p>";
	echo "	<br/><p><a class=\"btn btn-warning btn-large\" href=\"#\" onClick=\"loadWithParams('php/rent.php', 'car=" . $row['id'] . "')\">Rent this Car &#187;</a></p>";
	echo "</div>";
	
	echo "<div class=\"row-fluid\">";
	
	for ($i = 1; $i <= 3; $i++){
	
		echo "<div class=\"span4\">";
        echo "	<a href=\"pics/" . $row['id'] . "/" . $i . ".jpg\">";
		echo "		<img src=\"pics/" . $row['id'] . "/" . $i .".jpg\"/>";
		echo "	</a>";
        echo "</div><!--/span-->";
	}
	
	echo "</div><!--/row-->";
	echo "<br/><br/>"; 
	echo "<div class=\"row-fluid\">";
	
	for ($i = 4; $i <= 6; $i++){
	
		echo "<div class=\"span4\">";
        echo "	<a href=\"pics/" . $row['id'] . "/" . $i . ".jpg\">";
		echo "		<img src=\"pics/" . $row['id'] . "/" . $i .".jpg\"/>";
		echo "	</a>";
        echo "</div><!--/span-->";
	}
	
	echo "</div><!--/row-->";
}

mysql_close($con);
	print_r ($_COOKIE);
?>