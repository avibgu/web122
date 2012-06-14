<?php

	$con = mysql_connect("localhost","root","zubur1");
	
	if (!$con)
		die('Could not connect: ' . mysql_error());

	mysql_select_db("web", $con);

	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$details = $_POST['details'];
	
	$insert = "INSERT INTO contact (FullName, Phone, EMail, Details) VALUES ('$name','$phone','$email','$details')";
				
	if (!mysql_query($insert, $con)){

?>

<div class="hero-unit">

	<h3>There was an issue with your Message.. Please try again..</h3>
	
</div>

<?php

	}

	else {

?>

<div class="hero-unit">

	<h3>Your Message has been Sent !</h3>
	
</div>

<?php

	}

	mysql_close($con);
?>