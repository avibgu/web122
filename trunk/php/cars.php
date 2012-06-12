<div class="hero-unit">

	<h1>Our Car Fleet</h1>

	<p>
		<br/>
		Our department rental car fleet offers you a modern and diverse, car rental to individuals or businesses.
		We do our best to give you the best service and to personalize your car and the package of services to suit you. 
		We have a variety of vehicles: private cars, SUVs, mini - vans and more. Additionally, you can enjoy a variety of benefits and 
		attractive rental <a href="#" onClick="load('php/specials.php')">special offers.</a>
	</p>

</div>

<?php

	$con = mysql_connect("localhost","root","zubur1");
	
	if (!$con)
		die('Could not connect: ' . mysql_error());

	mysql_select_db("web", $con);

	$query = "SELECT * FROM cartype";
	
	$result = mysql_query($query);

	$continue = true;
	
	while($continue)
	{
		echo "<div class=\"row-fluid\">";

		for ($i = 0; $i < 3; $i++){
		
			if ($row = mysql_fetch_array($result)){
			
				echo "<div class=\"span4\">";
				echo "	<h2>" . $row['Brand'] . " " . $row['Model'] . " " . $row['Year'] . "</h2>";
				echo "	<br/>";	
				echo "	<img src=\"pics/" . $row['id'] . "/0.jpg\"/>";
				echo "	<p>" . $row['Specification'] . "</p>";
				echo "<p><a href=\"#\" onClick=\"loadWithParams('php/someCar.php', '" . $row['id'] . "')\">View details &#187;</a></p>";
				echo "</div><!--/span-->";
			}
			
			else $continue = false;
		}
		
		echo "</div><!--/row-->";
	}
  
	mysql_close($con);
	
?>