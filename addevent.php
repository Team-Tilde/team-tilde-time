<?php
	require_once "php/conf.php";

	date_default_timezone_set("Australia/Sydney");
	
	echo '<form id="addEventForm" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">Event Title:</label>
				<div class="col-sm-10">
					<input id="addEventTitleText" type="text" class="form-control" placeholder="Event Title">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Start Date/Time:</label>
				<div class="col-sm-10">
					<input id="addEventStartDateText" type="text" class="form-control" placeholder="Start Date/Time" onblur="checkTimeConflict()" value="'; echo date("Y-m-d H:i:s"); echo '">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">End Date/Time:</label>
				<div class="col-sm-10">
				<input id="addEventEndDateText" type="text" class="form-control" placeholder="End Date/Time" onblur="checkTimeConflict()" value="'; echo date("Y-m-d H:i:s"); echo '">
				</div>
			</div>
			<div class="form-group hidden" id="collideSection">
				<label class="col-sm-2 control-label">Colliding Events:</label>
				<label class="col-sm-10" id="eventCollideOut"></label>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Description:</label>
				<div class="col-sm-10">
				<textarea id="addEventDescriptionText" class="form-control" rows="5" placeholder="Description"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Location:</label>
				<div class="col-sm-10">
					<input id="addEventLocationText" type="text" class="form-control" placeholder="Location">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Event Category:</label>
				<div class="col-sm-10">
					<select id="addEventCategoryText" class="form-control">';
						 
						$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
						
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}
						
						$sql = "SELECT event_category_id, description FROM EventCategory";
						$result = $conn->query($sql);
						
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								echo "<option value='" . $row['event_category_id'] . "'>" . $row['description'] . "</option>";
							}
						}
						else {
							echo "<option>'No task found'</option>";
						}
					
					echo '</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Assign Tasks To:</label>
				<div class="col-sm-10">
					<select id="addEventTaskIDText" class="form-control">';
						 
						$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
						
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}
						
						$sql = "SELECT task_id, description FROM Task";
						$result = $conn->query($sql);
						
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								echo "<option value='" . $row['task_id'] . "'>" . $row['description'] . "</option>";
							}
						}
						else {
							echo "<option>'No task found'</option>";
						}
					
					echo '</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Public</label>
				<div class="col-sm-10">
					<select id="addEventPublicText" class="form-control">
						<option value="1">Yes</option>
						<option value="0" selected="selected">No</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Event Status:</label>
				<div class="col-sm-10">
					<select id="addEventStatusText" class="form-control">';
						 
						$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
						
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}
						
						$sql = "SELECT task_event_status_id, status FROM TaskEventStatus";
						$result = $conn->query($sql);
						
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								echo "<option value='" . $row['task_event_status_id'] . "'>" . $row['status'] . "</option>";
							}
						}
						else {
							echo "<option>'No task found'</option>";
						}
					
					echo '</select>
				</div>
			</div>
			
			<h4 class="modal-title">Event Notes</h4>
			<div class="form-group">
				<label class="col-sm-2 control-label">Notes</label>
				<div id="addEventNotesDiv" class="col-sm-10">
					<div>
						<textarea class="form-control event-notes-text" rows="3" placeholder="Note 1"></textarea>
						<div>
							<input class="event-notes-checkbox" type="checkbox" value=""><label>Public</label>
						</div>
					</div>
					
				</div>
				<div class="col-sm-offset-2 col-sm-10">
					<a href="#" onclick="addEventNotes()">
						<span class="glyphicon glyphicon-plus"></span><label>Add more notes</label>
					</a>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button class="btn btn-default" onclick="insertEventData()">Add event</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>';
		$conn->close();
?>