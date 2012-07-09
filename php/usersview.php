<div class="hero-unit">
<?php
if (isset($_COOKIE['isAdmin']))
{
?>
<div>
<h2> Users Registerd </h2>
</br>
</div>
<table class="table table-condensed">
	<tr>
		<th>#</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Username\Email</th>
		<th>Registration Date</th>
		<th>Subscription Type</th>
		<th>Valid License</th>
		<th>Current Rents</th>
	</tr>
<?php
		require 'php/conn.php';

		$query = "SELECT * FROM customer";
		
		$result = mysql_query($query);
		$i = 1;
		while ($row = mysql_fetch_array($result))
		{
		//$query2 = "SELECT name FROM subscriptiontype WHERE id=".$row['SubscriptionTypeId']."";echo $query2;
			$subscriptioname = mysql_fetch_array(mysql_query("SELECT name FROM subscriptiontype WHERE id='"
				.$row['SubscriptionTypeId']."'"));
			echo "	<tr>
					<td>$i</td>
					<td>".$row['FirstName']."</td>
					<td>".$row['LastName']."</td>
					<td>".$row['Username']."</td>
					<td>".$row['RegistrationDate']."</td>
					<td>".$subscriptioname['name']."</td>
					<td>Yes</td>
					<td><a href='#' onClick=\"loadWithParams('php/userrents.php', 'Username=".$row['Username']."&CustomerId=".$row['id']."')\">View Rents</a></td>
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