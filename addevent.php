<?php
	require_once "php/conf.php";

	echo '<form id="addEventForm" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">Event Title:</label>
				<div class="col-sm-10">
					<input id="eventTitleText" type="text" class="form-control" placeholder="Event Title">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Start Date/Time:</label>
				<div class="col-sm-10">
					<input id="eventStartDateText" type="text" class="form-control" placeholder="Start Date/Time">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">End Date/Time:</label>
				<div class="col-sm-10">
				<input id="eventEndDateText" type="text" class="form-control" placeholder="End Date/Time">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Description:</label>
				<div class="col-sm-10">
				<textarea id="eventDescriptionText" class="form-control" rows="5" placeholder="Description"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Location:</label>
				<div class="col-sm-10">
				<input id="eventLocationText" type="text" class="form-control" placeholder="Location">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Event Category:</label>
				<div class="col-sm-10">
					<select id="eventCategoryText" class="form-control">';
						 
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
					<select id="eventTaskIDText" class="form-control">';
						 
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
					<select id="eventPublicText" class="form-control">
						<option value="1">Yes</option>
						<option value="0" selected="selected">No</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Private</label>
				<div class="col-sm-10">
					<select id="eventPrivateText" class="form-control">
						<option value="1" selected="selected">Yes</option>
						<option value="0">No</option>
					</select>
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