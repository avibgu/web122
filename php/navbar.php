<div class="navbar navbar-fixed-top">

	<div class="navbar-inner">

		<div class="container">

			<a class="brand" href="#">Car4All</a>

			<ul class="nav">
			
				<li id="navLiDefault"><a href="#" onClick="load('php/home.php')">Home</a></li>
				<li id="navLiAbout"><a href="#" onClick="load('php/about.php')">About</a></li>
				<li id="navLiContact"><a href="#" onClick="load('php/contact.php')">Contact</a></li>
				
			</ul>
			
			<?php
			
				if (isset($_COOKIE["username"])) {
			
					$username = $_COOKIE["username"];
				}
				
				if ("" != $username) {
			?>	
			
					<div id="loginDiv">
					
						<form class="navbar-form pull-right">
							<?php echo "<a href=\"#\" onclick=\"load('php/history.php')\">". $username . "</a>"; ?>
							&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<button class="btn" onClick="logout()">Sign out</button>
						</form>
						
					</div>
				
			<?php	

				}
				else if (isset($_COOKIE["adminuser"])){
				?>
					<div id="loginDiv">
					
						<form class="navbar-form pull-right">
							<?php echo "Welcome Back ". $_COOKIE["adminuser"] . ""; ?>
							&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<button class="btn" onClick="logout()">Sign out</button>
						</form>
						
					</div>
					
			<?php
				
				}
				else {
				
			?>
			
				<div id="loginDiv">
				
					<form action="default.php" class="navbar-form pull-right" method="post">
			<?php
						if("ERROR" == $loginError)
							echo "Wrong Username or Password:";
			?>
						&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input name="usernameInput" class="input-small" type="text" placeholder="Username">
						<input name="passwordInput" class="input-small" type="password" placeholder="Password">
						<input class="btn" type="submit" value="Sign in"/>
					</form>
					
				</div>
				
			<?php
			
				}
			?>
			
		</div>
	
	</div>
	
</div>