<?php

	if (!isset($_COOKIE['username'])){//save rentdata user wanted
		setcookie("rentdata[Brand]", $_POST['Brand'], time()+3600);
		setcookie("rentdata[Model]", $_POST['Model'], time()+3600);
		setcookie("rentdata[Year]", $_POST['Year'], time()+3600);
		setcookie("rentdata[PickupYear]", $_POST['PickupYear'], time()+3600);
		setcookie("rentdata[PickupMonth]", $_POST['PickupMonth'], time()+3600);
		setcookie("rentdata[PickupDay]", $_POST['PickupDay'], time()+3600);
		setcookie("rentdata[PickupTime]", $_POST['PickupTime'], time()+3600);
		setcookie("rentdata[ReturnYear]", $_POST['ReturnYear'], time()+3600);
		setcookie("rentdata[ReturnMonth]", $_POST['ReturnMonth'], time()+3600);
		setcookie("rentdata[ReturnDay]", $_POST['ReturnDay'], time()+3600);
		setcookie("rentdata[ReturnTime]", $_POST['ReturnTime'], time()+3600);
	?>
<div class="hero-unit">

	<h3>You should be logged-in in order to Rent!</h3>
	</br>
	</br>
	<a class="btn btn-warning" href="#" onClick="load('php/rent.php')">Back To Rent Page</a>
	
</div>
<?php
	}
else
{	
	require 'php/conn.php';

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
	
	if (isset($_COOKIE['rentdata'])){
		foreach ($_COOKIE['rentdata'] as $name => $value)
			setcookie("rentdata[".$name."]", '', time() - 3600);
	}
	mysql_close($con);
}
?>