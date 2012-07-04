<!DOCTYPE html>

<?php

	require 'php/db.php';

	$username = "";
	$adminuser = "";
	$loginError = "OK";

	if (isset($_POST['usernameInput']) && isset($_POST['passwordInput'])) {

		require 'php/php/conn.php';

		$query = "SELECT * FROM customer WHERE Username = '" . $_POST['usernameInput']
					. "' AND Password = '" . $_POST['passwordInput'] . "'";
		
		$result = mysql_query($query);

		if($row = mysql_fetch_array($result))
		{
			$username = $row['Username'];
			setcookie("username", $username, time()+3600);
		}
		else
		{
			$query = "SELECT * FROM employee WHERE Username = '" . $_POST['usernameInput']
				. "' AND Password = '" . $_POST['passwordInput'] . "'";
			
			$result = mysql_query($query);

			if($row = mysql_fetch_array($result))
			{
				$adminuser = $row['Username'];
				setcookie("adminuser", $adminuser, time()+3600);
			}
			else if($_POST['usernameInput'] != "" || $_POST['passwordInput'] != "") {
				$loginError = "ERROR";
			}
		}
		mysql_close($con);
	}
	
?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

	<head>

		<meta charset="utf-8"/>

		<title>Car4All</title>

		<link href="styles/bootstrap.css" rel="stylesheet"/>
		<link href="styles/bootstrap-responsive.css" rel="stylesheet"/>
		<link href="styles/styles.css" rel="stylesheet"/>

	</head>
	
	<body>

		<div id="navbarDiv" class="navbar navbar-fixed-top">
	
			<?php require 'php/navbar.php'; ?>
		
		</div>

		<div class="container-fluid">
			
			<div class="row-fluid">

				<div class="span3">

					<?php 
						if (!isset($_COOKIE["adminuser"]))
							require 'php/sidebar.php'; 
						else
							require 'php/sidebaradmin.php';
							
					?>

				</div><!--/span-->

				<div class="span9" id="mainDiv">
				
					<?php require 'php/home.php'; ?>
					
				</div><!--/span-->

			</div><!--/row-->

			<hr/>

			<footer>
				<p>&#169; Car4All - Avi and Benny</p>
			</footer>

		</div><!--/.fluid-container-->
			
		<?php require 'php/scripts.php'; ?>
		
	</body>

</html>