

<form id="edit_flight" action="">

	<fieldset>
		<legend>Basic Flight Info</legend>
		<input type="hidden" name="id" />

		<label>Date:</label>
		<input type="date" name="date" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" required />

		<label>Aircraft:</label>
		<input type="text" name="aircraft" required />

		<label>Tail Number:</label>
		<input type="text" name="tailNumber" required />

		<label>Depart From:</label>
		<input type="text" name="departurePoint" required />

		<label>Arrival To:</label>
		<input type="text" name="arrivalPoint" required />
	</fieldset>

	<fieldset>
		<legend>Aircraft Category and Classification</legend>
		<label>Single Engine Land:</label>
		<input type="number" step="any" name="singleEngineLand" />
		
		<label>Multi-Engine Land: </label>
		<input type="number" step="any" name="multiEngineLand" />
		
		<label>Rotorcraft: </label>
		<input type="number" step="any" name="rotorcraft" />
	</fieldset>

	<fieldset>
		<legend>Type of Piloting Time</legend>
		
		<label>Dual Received:</label>
		<input type="number" step="any" name="dualReceived" />

		<label>Pilot in Command:</label>
		<input type="number" step="any" name="pilotInCommand" />
		
		<label>Second in Command:</label>
		<input type="number" step="any" name="secondInCommand" />

		<label>As Flight Instructor: </label>
		<input type="number" step="any" name="asFlightInstructor" />
	</fieldset>

	<fieldset>
		<legend>Conditions of Flight</legend>
		
		<label>Ground Trainer:</label>
		<input type="number" step="any" name="groundTrainer" />

		<label>Day:</label>
		<input type="number" step="any" name="day" />

		<label>Night:</label>
		<input type="number" step="any" name="night" />

		<label>Cross Country:</label>
		<input type="number" step="any" name="crossCountry" />

		<label>Actual Instrument: </label>
		<input type="number" step="any" name="actualInstrument" />

		<label>Simulated Instrument:</label>
		<input type="number" step="any" name="simulatedInstrument" />
	</fieldset>

	<fieldset>
		<legend>Landings</legend>
		
		<label>Instrument Approach:</label>
		<input type="number" name="instrumentApproach" />

		<label>Day: </label>
		<input type="number" name="dayLandings" />

		<label>Night: </label>
		<input type="number" name="nightLandings" />
	</fieldset>

	<fieldset>
		<legend>Total</legend>

		<label>Total Duration of Flight:</label>
		<input type="number" step="any" name="total" required />

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

    <input type="submit" id="update_flight" value="Add Flight" >
	
</form>


