
<div class="hero-unit">
	
	<h1>Recently Reviewed</h1>
	<br/>
	<?php 
	if (!isset($_COOKIE['reviewed1']))
	{
	?>
		<h3>Visit our variaty of car for rent!</h3>
		</br>
		</br>
		<a class="btn btn-warning" href="#" onClick="load('php/cars.php')">View Car Fleet</a>
	<?php
	}
	else
		echo "<h3> Hello " . $_COOKIE['username'] . " - Recent cars you reviewed</h3>";
	?>
</div>

<?php
if (isset($_COOKIE['reviewed1']))
{
	require 'php/conn.php';

	$query = "SELECT * FROM cartype";
	
	$result = mysql_query($query);


	echo "<div class=\"row-fluid\">";
	
	for ($i = 1; (($i < 4) && (isset($_COOKIE["reviewed".$i]))); $i++){				
		while ($row = mysql_fetch_array($result)){
			if ($_COOKIE["reviewed". $i] == $row['id']){		
				echo "<div class=\"span4\">";
				echo "	<h2>" . $row['Brand'] . " " . $row['Model'] . "</h2>";
				echo "	<br/>";	
				echo "	<img src=\"pics/" . $row['id'] . "/0.jpg\"/>";
				echo "	<p>" . $row['Description'] . "</p>";
				echo "<p><a href=\"#\" onClick=\"loadWithParams('php/someCar.php', 'car=" . $row['id'] . "')\">View details &#187;</a></p>";
				echo "</div><!--/span-->";
			}			
		}
		mysql_data_seek($result, 0);
	}

	echo "</div><!--/row-->";

  
	mysql_close($con);
}
?>