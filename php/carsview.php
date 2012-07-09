<div class="hero-unit">
<?php
if (isset($_COOKIE['isAdmin']))
{

if (isset($_GET['CarTypeId'])){
	require 'php/conn.php';
	$query = "UPDATE car SET Availability=" . $_GET['Amount'] . " WHERE CarTypeId=" . $_GET['CarTypeId'];
	mysql_query($query) or die (mysql_error());
	mysql_close($con);
}
?>
<div>
<h2> Cars Avialable </h2>
</br>
</div>
<table class="table table-condensed">
	<tr>
		<th>#</th>
		<th>ID</th>
		<th>Brand & Model</th>
		<th>Year</th>
		<th>Availability</th>
		<th></th>
	</tr>
<?php
		require 'php/conn.php';

		$query = "SELECT * FROM cartype";
		
		$result = mysql_query($query);
		$i = 1;
		while ($row = mysql_fetch_array($result))
		{
			$caramount = mysql_fetch_array(mysql_query("SELECT * FROM car WHERE CarTypeId='"
				.$row['id']."'"));
			echo "	<tr>
					<td>$i</td>
					<td>".$row['id']."</td>
					<td>".$row['Brand'] ." " . $row['Model'] ."</td>
					<td>".$row['Year']."</td>
					<td><input class=\"input-small\" type=\"text\" id=\"Availability\" placeholder=".$caramount['Availability']."></td>
					<td><a href='#' onClick=\"editCarAmount(".$caramount['CarTypeId'].")\">Edit Amount</a></td>
					</tr>";
			$i++;
		}
		
		
?>
</table>
<?php
	mysql_close($con);
}
else
{
?>
<div class="alert alert-info">
	<p>Access Denied!</p>
</div>
<?php
}
?>
</div>