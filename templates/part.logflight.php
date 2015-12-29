
<H1> Add a Flight</H1>


<form id="edit_flight" action="">

	<fieldset>
		<legend>Basic Flight Info</legend>
		<input type="hidden" name="id" />

		<label>Date:</label>
		<input type="date" name="date" />

		<label>Aircraft:</label>
		<input type="text" name="aircraft" />

		<label>Tail Number:</label>
		<input type="text" name="tailNumber" />

		<label>Depart From:</label>
		<input type="text" name="departurePoint" />

		<label>Arrival To:</label>
		<input type="text" name="arrivalPoint" />
	</fieldset>

	<fieldset>
		<legend>Aircraft Category and Classification</legend>
		<label>Single Engine Land:</label>
		<input type="text" name="singleEngineLand" />
		
		<label>Multi-Engine Land: </label>
		<input type="text" name="multiEngineLand" />
		
		<label>Rotorcraft: </label>
		<input type="text" name="rotorcraft" />
	</fieldset>

	<fieldset>
		<legend>Type of Piloting Time</legend>
		
		<label>Dual Received:</label>
		<input type="text" name="dualReceived" />

		<label>Pilot in Command:</label>
		<input type="text" name="pilotInCommand" />
		
		<label>Second in Command:</label>
		<input type="text" name="secondInCommand" />

		<label>As Flight Instructor: </label>
		<input type="text" name="asFlightInstructor" />
	</fieldset>

	<fieldset>
		<legend>Conditions of Flight</legend>
		
		<label>Ground Trainer:</label>
		<input type="text" name="groundTrainer" />

		<label>Day:</label>
		<input type="text" name="day" />

		<label>Night:</label>
		<input type="text" name="night" />

		<label>Cross Country:</label>
		<input type="text" name="crossCountry" />

		<label>Actual Instrument: </label>
		<input type="text" name="actualInstrument" />

		<label>Simulated Instrument:</label>
		<input type="text" name="simulatedInstrument" />
	</fieldset>

	<fieldset>
		<legend>Landings</legend>
		
		<label>Instrument Approach:</label>
		<input type="text" name="instrumentApproach" />

		<label>Day: </label>
		<input type="text" name="dayLandings" />

		<label>Night: </label>
		<input type="text" name="nightLandings" />
	</fieldset>

	<fieldset>
		<legend>Total</legend>

		<label>Total Duration of Flight:</label>
		<input type="text" name="total" />

		<label>Notes:</label>
		<textarea rows="5" cols="80" name="notes" />
	</fieldset>

	<fieldset>
		<legend>Instructor Info</legend>
		
		<label>CFI Name:</label>
		<input type="text" name="cfiName" />

		<label>CFI Number:</label>
		<input type="text" name="cfiNumber" />
	</fieldset>

	<fieldset>
		<input type="submit" id="update_flight" value="Add Flight" >
	</fieldset>
	
</form>


