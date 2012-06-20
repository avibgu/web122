<?php

	$selected = $_POST['selected'];
	$existed = $_POST['existed'];

	require 'php/conn.php';

	$query = "SELECT CreditCardNum FROM customer WHERE Username = '" . $_COOKIE['username'] . "'";

	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	if ($row['CreditCardNum'] == 0){
?>
<div class="hero-unit">

	<h3>Please Edit Your Credit Card Number!</h3>
	</br>
	</br>
	<a class="btn btn-warning" href="#" onClick="load('php/registration.php')">Update Credit Card</a>
	
</div>
<?php 
	}		
	
	else {
		if (0 == $selected)
			$selected = "null";
			
		else
			$selected = "'" . $selected . "'";
		
		$query =	"UPDATE customer SET SubscriptionTypeId = " . $selected .
					" WHERE Username = '" . $_COOKIE['username'] . "'";
		
		if (!mysql_query($query)){

?>

<div class="hero-unit">

	<h3>There was an issue with the Subscription, Please call our Support.</h3>
	
</div>

<?php
	
		}

		else {
?>

<div class="hero-unit">

	<h3>Your Subscription has been Approved !</h3>
	
</div>

<?php

		}
	}
	
?>