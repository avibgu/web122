<?php

	$con = mysql_connect("localhost","root","zubur1");
	
	if (!$con)
		die('Could not connect: ' . mysql_error());

	mysql_select_db("web", $con);

	$query =	"SELECT C.id " .
				"FROM cartype as CT JOIN car as C " .
				"WHERE CT.Brand = '" . $_POST['Brand'] . "' AND CT.Model = '" .
				$_POST['Model'] . "' AND CT.Year = '" .$_POST['Year'] . "' AND C.Availability = '1'";
	
	$result = mysql_query($query);
	
	$CarId = '0';
	
	if ($row = mysql_fetch_array($result))
		$CarId = $row['id'];

	$query = "SELECT id FROM customer WHERE Username = '". $_COOKIE['username'] . "'";
	
	$result = mysql_query($query);
	
	$CustomerId = '0';
	
	if ($row = mysql_fetch_array($result))
		$CustomerId = $row['id'];

	$EmployeeId = '1';
	
	$PickUpDate = $_POST['PickupYear'] . "-" . $_POST['PickupMonth'] . "-" . $_POST['PickupDay'];
	$PickUpTime = $_POST['PickupTime'];
	
	$ReturnDate = $_POST['ReturnYear'] . "-" . $_POST['ReturnMonth'] . "-" . $_POST['ReturnDay'];
	$ReturnTime = $_POST['ReturnTime'];
	
	$Price = '200';
	
	$Approval = 'Approved';

	$insert =	"INSERT INTO lease " .
				"(CarId, CustomerId, EmployeeId, PickUpDate, PickUpTime, ReturnDate, ReturnTime, Price, Approval) ".
				"VALUES ('$CarId','$CustomerId','$EmployeeId','$PickUpDate','$PickUpTime','$ReturnDate','$ReturnTime','$Price','$Approval')";
				
	if (!mysql_query($insert, $con)){

?>

<div class="hero-unit">

	<h3>There was an issue with the lease, Please call our Support.</h3>
	
</div>

<?php
	
	}

	else {
?>

<div class="hero-unit">

	<h3>Your Rental has been Approved !</h3>
	
</div>

<?php

	}
	
?>