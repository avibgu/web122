<div class="hero-unit">
<?php
if (isset($_POST['CustomerId'])){
	require 'php/conn.php';
	$query = "UPDATE lease SET Approval='Approved' WHERE CustomerId=" . $_POST['CustomerId'];/* . " And PickUpDate='" . $_POST['PickUpDate'] 
		. "' And PickUpTime='". $_POST['PickUpTime'] ."'";*/
	mysql_query($query) or die (mysql_error());
	mysql_close($con);
}
if (isset($_COOKIE['isAdmin']))
{
?>
<div>
<h2> Current Rent Requests </h2>
</br>
</div>
<table class="table table-condensed">
	<tr>
		<th>#</th>
		<th>Car</th>
		<th>Customer Id</th>
		<th>Username\Email</th>
		<th>PickUp Date</th>
		<th>PickUp Time</th>
		<th>Return Date</th>
		<th>Return Time</th>
		<th>Approval</th>
	</tr>
<?php
		require 'php/conn.php';

		$query = "SELECT * FROM lease";
		
		$result = mysql_query($query);
		$i = 1;
		while ($row = mysql_fetch_array($result))
		{
			$cardetails = mysql_fetch_array(mysql_query("SELECT Brand, Model FROM cartype WHERE id="
				.$row['CarId'].""));
			$customer = mysql_fetch_array(mysql_query("SELECT Username FROM customer WHERE id="
				.$row['CustomerId'].""));
			echo "	<tr>
					<td>$i</td>
					<td>".$cardetails['Brand']." " .$cardetails['Model']."</td>
					<td id=\"Cid$i\">".$row['CustomerId']."</td>
					<td>".$customer['Username']."</td>
					<td id=\"Pickdate$i\">".$row['PickUpDate']."</td>
					<td id=\"Picktime$i\">".$row['PickUpTime']."</td>
					<td>".$row['ReturnDate']."</td>
					<td>".$row['ReturnTime']."</td>
					<td>".$row['Approval']."</td>";
					if ($row['Approval'] !='Approved')
						echo "<td><a class=\"btn\" href=\"#\" onClick=\"updateRentApprove($i)\">Approve</a></td>";
					echo "</tr>";
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