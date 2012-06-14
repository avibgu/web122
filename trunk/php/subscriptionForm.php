<?php

	$selected = $_POST['selected'];
	$existed = $_POST['existed'];

	require 'php/conn.php';

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
	
?>