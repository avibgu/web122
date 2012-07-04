<div class="hero-unit">
<?php
if (isset($_COOKIE['adminuser']))
{
?>
<div></div>
<table class="table table-condensed">
	<tr>
		<th>#</th>
		<th>Username\Email</th>
		<th>Car</th>
		<th>PickUp Date</th>
		<th>PickUp Time</th>
		<th>Retrun Date</th>
		<th>Retrun Time</th>
	</tr>
<?php
		require 'php/conn.php';

		$query = "SELECT * FROM lease WHERE CustomerId=" . $_GET['CustomerId'];
		$result = mysql_query($query);
		$i = 1;
		while ($row = mysql_fetch_array($result))
		{
		$cardetails = mysql_fetch_array(mysql_query("SELECT Brand, Model FROM cartype WHERE id="
			.$row['CarId'].""));
			echo "	<tr>
					<td>$i</td>
					<td>".$_GET['Username']."</td>
					<td>".$cardetails['Brand']." " .$cardetails['Model']."</td>
					<td>".$row['PickUpDate']."</td>
					<td>".$row['PickUpTime']."</td>
					<td>".$row['ReturnDate']."</td>
					<td>".$row['ReturnTime']."</td>
					</tr>";
			$i++;
		}
		
		
?>
</table>
<a class="btn" href="#" onClick="load('php/usersview.php')">Back</a>
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