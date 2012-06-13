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

							$con = mysql_connect("localhost","root","zubur1");
								
							if (!$con)
								die('Could not connect: ' . mysql_error());
							
							mysql_select_db("web", $con);							
							
							$year = '';
							
							if (!isset($_GET['car'])){

								$query = "SELECT Brand, Model FROM cartype";
								
								$result = mysql_query($query);

								echo "<option value=\"Brand\">Brand</option>";
								
								while ($row = mysql_fetch_array($result)){
								
									echo "<option value=\"Brand=" . $row['Brand'] . "&Model=" . $row['Model'] . "\">" . $row['Brand'] . " " . $row['Model'] . "</option>";
								}
							}
							
							else {
							
								$query = "SELECT * FROM cartype WHERE id ='" . $_GET['car'] . "'";
								
								$result = mysql_query($query);

								if ($row = mysql_fetch_array($result)){
								
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
							<option value="2012">2012</option>
							<option value="2013">2013</option>
							<option value="2014">2014</option>
						</select>
						
						<select name="PickupMonth" id="selectPickupMonth">
							<option value='Month'>Month</option>
							<option value="01">01</option>
							<option value="02">02</option>
							<option value="03">03</option>
							<option value="04">04</option>
							<option value="05">05</option>
							<option value="06">06</option>
							<option value="07">07</option>
							<option value="08">08</option>
							<option value="09">09</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
						</select>
					
						<select name="PickupDay" id="selectPickupDay">
							<option value='Day'>Day</option>
							<option value='01'>01</option>
							<option value='02'>02</option>
							<option value='03'>03</option>
							<option value='04'>04</option>
							<option value='05'>05</option>
							<option value='06'>06</option>
							<option value='07'>07</option>
							<option value='08'>08</option>
							<option value='09'>09</option>
							<option value='10'>10</option>
							<option value='11'>11</option>
							<option value='12'>12</option>
							<option value='13'>13</option>
							<option value='14'>14</option>
							<option value='15'>15</option>
							<option value='16'>16</option>
							<option value='17'>17</option>
							<option value='18'>18</option>
							<option value='19'>19</option>
							<option value='20'>20</option>
							<option value='21'>21</option>
							<option value='22'>22</option>
							<option value='23'>23</option>
							<option value='24'>24</option>
							<option value='25'>25</option>
							<option value='26'>26</option>
							<option value='27'>27</option>
							<option value='28'>28</option>
							<option value='29'>29</option>
							<option value='30'>30</option>
							<option value='31'>31</option>
						</select>
						
						<select name="PickupTime" id="selectPickupTime">
							<option value='Time'>Time</option>
							<option value="08:00">08:00</option>
							<option value="10:00">10:00</option>
							<option value="12:00">12:00</option>
							<option value="14:00">14:00</option>
							<option value="16:00">16:00</option>
							<option value="18:00">18:00</option>
						</select>
						
					</div>

				</div>
			
				<div class="span3">

					<label class="control-label">Select Car Year</label>

					<div class="controls">
					
						<select name="Year" id="selectCarYear">
						
						<?php
						
							if (!isset($_GET['car']))
								echo "<option value=\"Year\">Year</option>";
								
							else
								echo "<option value=\"" . $year . "\">" . $year . "</option>";

						?>
							
						</select>
						
					</div>
						
					<label class="control-label" >Return Date \ Time</label>
					
					<div class="controls">
					
						<select name="ReturnYear" id="selectReturnYear">
							<option value="Year">Year</option>
							<option value="2012">2012</option>
							<option value="2013">2013</option>
							<option value="2014">2014</option>
						</select>
						
						<select name="ReturnMonth" id="selectReturnMonth">
							<option value='Month'>Month</option>
							<option value="01">01</option>
							<option value="02">02</option>
							<option value="03">03</option>
							<option value="04">04</option>
							<option value="05">05</option>
							<option value="06">06</option>
							<option value="07">07</option>
							<option value="08">08</option>
							<option value="09">09</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
						</select>
						
						<select name="ReturnDay" id="selectReturnDay">
							<option value='Day'>Day</option>
							<option value='01'>01</option>
							<option value='02'>02</option>
							<option value='03'>03</option>
							<option value='04'>04</option>
							<option value='05'>05</option>
							<option value='06'>06</option>
							<option value='07'>07</option>
							<option value='08'>08</option>
							<option value='09'>09</option>
							<option value='10'>10</option>
							<option value='11'>11</option>
							<option value='12'>12</option>
							<option value='13'>13</option>
							<option value='14'>14</option>
							<option value='15'>15</option>
							<option value='16'>16</option>
							<option value='17'>17</option>
							<option value='18'>18</option>
							<option value='19'>19</option>
							<option value='20'>20</option>
							<option value='21'>21</option>
							<option value='22'>22</option>
							<option value='23'>23</option>
							<option value='24'>24</option>
							<option value='25'>25</option>
							<option value='26'>26</option>
							<option value='27'>27</option>
							<option value='28'>28</option>
							<option value='29'>29</option>
							<option value='30'>30</option>
							<option value='31'>31</option>
						</select>
						
						<select name="ReturnTime" id="selectReturnTime">
							<option value='Time'>Time</option>
							<option value="08:00">08:00</option>
							<option value="10:00">10:00</option>
							<option value="12:00">12:00</option>
							<option value="14:00">14:00</option>
							<option value="16:00">16:00</option>
							<option value="18:00">18:00</option>
						</select>
						
					</div>
					
				</div>

			</div>
			
			<div class="row-fluid form-actions span5">
				<!-- <input class="btn btn-success" type="submit" value="Rent !"/> -->
				<a class="btn btn-success" href="#" onClick="validateAndSendRentForm()">Rent !</a>
				<a class="btn" href="#" onClick="load('php/rent.php')">Clear</a>
			</div>
			
		</fieldset>

	</form>

</div>
