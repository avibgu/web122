<div class="hero-unit">

	<h1>Rent A Car!</h1>

	<br/>
	
	<!--<form name="rentForm" class="form" action="php/rentForm.php" onsubmit="return validateAndSendRentForm()" method="post">-->
	<form name="rentForm" class="form">

		<fieldset>

			<div class="row-fluid">
				
				<div class="span3">

					<label class="control-label">Select Car Brand</label>
					
					<div class="controls">

						<select name="Brand" id="selectCarBrand" onchange="get('php/carYears.php', this.value, 'selectCarYear')">
							
						<?php
							require 'php/conn.php';							
							
							$year = '';
							
							if (!isset($_GET['car'])){
								if (isset($_GET['savedcookie'])){
									foreach ($_COOKIE['rentdata'] as $name => $value)
										setcookie("rentdata[".$name."]", '', time() - 3600);
								}
								$rentVars = array('Brand' => "", 'Model' =>"");										
								if (!isset($_GET['savedcookie']) && isset($_COOKIE['rentdata'])){
									foreach ($_COOKIE['rentdata'] as $name => $value)
										$rentVars[$name] = $value;
									$year = $rentVars['Year'];
								}
								$query = "SELECT Brand, Model FROM cartype";
								
								$result = mysql_query($query);

								echo "<option value=\"Brand\">Brand</option>";
								
								while ($row = mysql_fetch_array($result)){
									if (($rentVars['Brand'] == $row['Brand']) && ($rentVars['Model'] == $row['Model']))
										echo "<option value=\"Brand=" . $row['Brand'] . "&Model=" . $row['Model'] . "\" selected=\"selected\">" . $row['Brand'] . " " . $row['Model'] . "</option>";
									else
										echo "<option value=\"Brand=" . $row['Brand'] . "&Model=" . $row['Model'] . "\">" . $row['Brand'] . " " . $row['Model'] . "</option>";
								}
								
							}
							
							else {
								
								$query = "SELECT * FROM cartype WHERE id ='" . $_GET['car'] . "'";
								
								$result = mysql_query($query);

								if ($row = mysql_fetch_array($result)){
									
									foreach ($_COOKIE['rentdata'] as $name => $value){
										setcookie("rentdata[".$name."]", '', time() - 3600);
										$rentVars[$name] = '';
									}
									$rentVars['Brand'] = $row['Brand'];
									$rentVars['Model'] = $row['Model'];
									setcookie("rentdata[Brand]", $row['Brand'], time() + 3600);
									setcookie("rentdata[Model]", $row['Model'], time() + 3600);
									
									echo "<option value=\"Brand=" . $row['Brand'] . "&Model=" . $row['Model'] . "\">" . $row['Brand'] . " " . $row['Model'] . "</option>";
									
									$year = $row['Year'];
								}
							}

							mysql_close($con);
						?>

						</select>
					</div>
					
					<label class="control-label" >Pickup Date \ Time</label>

					<div class="controls">

						<select name="PickupYear" id="selectPickupYear">
							<option value="Year">Year</option>
							<?php
							for ($i = 2012; $i < 2015; $i++){
								if ($rentVars['PickupYear'] == $i)
									echo "<option value=" . $i . " selected=\"selected\">" . $i . "</option>";
								else
									echo "<option value=" . $i . ">" . $i . "</option>";
							}
							?>
							</select>
						
						<select name="PickupMonth" id="selectPickupMonth">
							<option value='Month'>Month</option>
							<?php
							for ($i = 1; $i < 13; $i++){
								if ($rentVars['PickupMonth'] == $i)
									echo "<option value=" . sprintf("%02d", $i) . " selected=\"selected\">" . sprintf("%02d", $i) . "</option>";
								else
									echo "<option value=" . sprintf("%02d", $i) . ">" . sprintf("%02d", $i) . "</option>";
							}
							?>
						</select>
					
						<select name="PickupDay" id="selectPickupDay">
							<option value='Day'>Day</option>
							<?php
							for ($i = 1; $i < 32; $i++){
								if ($rentVars['PickupDay'] == $i)
									echo "<option value=" . sprintf("%02d", $i) . " selected=\"selected\">" . sprintf("%02d", $i) . "</option>";
								else
									echo "<option value=" . sprintf("%02d", $i) . ">" . sprintf("%02d", $i) . "</option>";
							}
							?>
						</select>
						
						<select name="PickupTime" id="selectPickupTime">
							<option value='Time'>Time</option>
							<?php
							for ($i = 8; $i < 20; $i=$i+2){
								if ($rentVars['PickupTime'] == sprintf("%02d:00", $i))
									echo "<option value=" . sprintf("%02d:00", $i) . " selected=\"selected\">" . sprintf("%02d:00", $i) . "</option>";
								else
									echo "<option value=" . sprintf("%02d:00", $i) . ">" . sprintf("%02d:00", $i) . "</option>";
							}
							?>
						</select>
						
					</div>

				</div>
			
				<div class="span3">

					<label class="control-label">Select Car Year</label>

					<div class="controls">
					
						<select name="Year" id="selectCarYear">
						
						<?php
						
							if (isset($_GET['car']))
								echo "<option value=\"" . $year . "\">" . $year . "</option>";
								
							else							
								for ($i = 2012; $i < 2015; $i++){
									if ($rentVars['Year'] == $i)
										echo "<option value=" . $i . " selected=\"selected\">" . $i . "</option>";
									else
										echo "<option value=" . $i . ">" . $i . "</option>";
								}							
						?>
							
						</select>
						
					</div>
						
					<label class="control-label" >Return Date \ Time</label>
					
					<div class="controls">
					
						<select name="ReturnYear" id="selectReturnYear">
							<option value="Year">Year</option>
							<?php
								for ($i = 2012; $i < 2015; $i++){
									if ($rentVars['ReturnYear'] == $i)
										echo "<option value=" . $i . " selected=\"selected\">" . $i . "</option>";
									else
										echo "<option value=" . $i . ">" . $i . "</option>";
								}						
							?>
						</select>
						
						<select name="ReturnMonth" id="selectReturnMonth">
							<option value='Month'>Month</option>
							<?php
							for ($i = 1; $i < 13; $i++){
								if ($rentVars['ReturnMonth'] == $i)
									echo "<option value=" . sprintf("%02d", $i) . " selected=\"selected\">" . sprintf("%02d", $i) . "</option>";
								else
									echo "<option value=" . sprintf("%02d", $i) . ">" . sprintf("%02d", $i) . "</option>";
							}
							?>
						</select>
						
						<select name="ReturnDay" id="selectReturnDay">
							<option value='Day'>Day</option>
							<?php
							for ($i = 1; $i < 32; $i++){
								if ($rentVars['ReturnDay'] == $i)
									echo "<option value=" . sprintf("%02d", $i) . " selected=\"selected\">" . sprintf("%02d", $i) . "</option>";
								else
									echo "<option value=" . sprintf("%02d", $i) . ">" . sprintf("%02d", $i) . "</option>";
							}
							?>
						</select>
						
						<select name="ReturnTime" id="selectReturnTime">
						<option value='Time'>Time</option>
							<?php
							for ($i = 8; $i < 20; $i=$i+2){
								if ($rentVars['ReturnTime'] == sprintf("%02d:00", $i))
									echo "<option value=" . sprintf("%02d:00", $i) . " selected=\"selected\">" . sprintf("%02d:00", $i) . "</option>";
								else
									echo "<option value=" . sprintf("%02d:00", $i) . ">" . sprintf("%02d:00", $i) . "</option>";
							}
							?>
						</select>
						
					</div>
					
				</div>

			</div>
			
			<div class="row-fluid form-actions span5">
				<!-- <input class="btn btn-success" type="submit" value="Rent !"/> -->
				<a class="btn btn-success" href="#" onClick="validateAndSendRentForm()">Rent !</a>
				<?php
					if (isset($_COOKIE['rentdata'])){
					?>
					<a class="btn" href="#" onClick="loadWithParams('php/rent.php','savedcookie=true')">Clear</a>
					<?php
					}
					else{
					?>
					<a class="btn" href="#" onClick="load('php/rent.php')">Clear</a>
					<?php } ?>
			</div>
			
		</fieldset>

	</form>
</div>
