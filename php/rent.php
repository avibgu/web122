<div class="hero-unit">

	<h1>Rent A Car!</h1>

	<br/>
	
	<form class="form">

		<fieldset>

			<div class="row-fluid">
				
				<div class="span3">

					<label class="control-label">Select Car Brand</label>
					
					<div class="controls">

						<select id="selectCarBrand" onchange="get('php/carYears.php', this.value, 'selectCarYear')">
						
							<option value="Brand">Brand</option>
							
						<?php

							$con = mysql_connect("localhost","root","zubur1");
							
							if (!$con)
								die('Could not connect: ' . mysql_error());

							mysql_select_db("web", $con);

							$query = "SELECT Brand, Model FROM cartype";
							
							$result = mysql_query($query);

							while ($row = mysql_fetch_array($result)){
							
								echo "<option value=\"Brand=" . $row['Brand'] . "&Model=" . $row['Model'] . "\">" . $row['Brand'] . " " . $row['Model'] . "</option>";
							}
						  
							mysql_close($con);
	
						?>

						</select>
						
					</div>
					
					<label class="control-label" >Pickup Date \ Time</label>

					<div class="controls">

						<select id="selectPickupYear">
							<option value="Year">Year</option>
							<option value="2012">2012</option>
							<option value="2013">2013</option>
							<option value="2014">2014</option>
						</select>
						
						<select id="selectPickupMonth">
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
					
						<select id="selectPickupDay">
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
						
						<select id="selectPickupTime">
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
					
						<select id="selectCarYear">
							<option value="Year">Year</option>
							<!--
							<option value="2012">2012</option>
							<option value="2013">2011</option>
							<option value="2014">2010</option>
							<option value="2015">2009</option>
							<option value="2016">2008</option>
							<option value="2017">2007</option>
							-->
						</select>
						
					</div>
						
					<label class="control-label" >Return Date \ Time</label>
					
					<div class="controls">
					
						<select id="selectReturnYear">
							<option value="Year">Year</option>
							<option value="2012">2012</option>
							<option value="2013">2013</option>
							<option value="2014">2014</option>
						</select>
						
						<select id="selectReturnMonth">
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
						
						<select id="selectReturnDay">
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
						
						<select id="selectReturnTime">
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
			
			<div class="row-fluid form-actions span3">
				<button type="submit" class="btn btn-success" id="buttonRent">Rent!</button>
				<button class="btn" id="buttonClearForm">Clear Form</button>
			</div>
			
		</fieldset>

	</form>

</div>
