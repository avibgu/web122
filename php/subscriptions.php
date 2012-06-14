<div class="hero-unit">
	
	<h1>Subscriptions</h1>
	
	<br/>
	
	<p>
		You can enjoy a variety of benefits and attractive rental offers - service representatives can provide you information,
		and selection of tips and recommendations about renting a car and adjust it to your needs.
		<br/>
		<br/>
	</p>
	
<?php

			$con = mysql_connect("localhost","root","zubur1");
			
			if (!$con)
				die('Could not connect: ' . mysql_error());

			mysql_select_db("web", $con);
				
			$existedSuscription = 0;
			
			if (isset($_COOKIE['username'])){
			
				$username = $_COOKIE['username'];
			
				$query = "SELECT SubscriptionTypeId FROM customer WHERE Username = '" . $username . "'";
			
				$result = mysql_query($query);
				
				if($row = mysql_fetch_array($result))
					if (0 != $row['SubscriptionTypeId'] || "" != $row['SubscriptionTypeId'])
						$existedSuscription = $row['SubscriptionTypeId'];
			
				if (0 != $existedSuscription)
					echo "<p>You Already have a subscription, you can choose other one from the list below:</p>";
			}

?>
	
	
	
	<div class="divtable">
		
		<form name="subscriptionsForm" class="form">
		
		<table class="table" id="price-t">
			
			<thead>
				<tr>
					<th></th>
					<th>Subscription type</th>
					<th>Payment</th>
					<th>Per day</th>
					<th>Per hour</th>
				</tr>
			</thead>
			
			<tbody>
			
<?php

			$query = "SELECT * FROM subscriptiontype";
			
			$result = mysql_query($query);
			
			while($row = mysql_fetch_array($result)){
			
				echo "<tr>";
				
				if ($existedSuscription == $row['Id'])
					echo "	<td><input type=\"radio\" name=\"selected\" value=\"" . $row['Id'] . "\" checked/></td>";
				
				else
					echo "	<td><input type=\"radio\" name=\"selected\" value=\"" . $row['Id'] . "\" /></td>";
					
				echo "	<td>" . $row['Name'] . "</td>";
				echo "	<td>" . $row['Payment'] . " NIS</td>";
				echo "	<td>" . $row['PerDay'] . " NIS</td>";
				echo "	<td>" . $row['PerHour'] . " NIS</td>";
				echo "</tr>";
			}
			
			mysql_close($con);
?>

			</tbody>
		</table>
		
		<br/>
		
		<p>*Prices refers to the A-class car</p>
		
		<p>*Prices tex included.<br/></p>
		
		<p>
<?php

			echo "<input type=\"hidden\" name=\"existed\" value=\"" . $existedSuscription . "\"/>";
			
			if (0 != $existedSuscription){
				echo "<a class=\"btn btn-warning\" href=\"#\" onClick=\"validateAndSendSubscriptionForm()\">Update</a>";
				echo "   ";
				echo "<a class=\"btn btn-danger\" href=\"#\" onClick=\"validateAndSendDeleteSubscriptionForm()\">Delete</a>";
			}
		
			else
				echo "<a class=\"btn btn-success\" href=\"#\" onClick=\"validateAndSendSubscriptionForm()\">Order</a>";
?>	
			 or <a href="#" onClick="load('php/contact.php')">contact us.</a>
		</p>

		</form>
	</div>

</div>