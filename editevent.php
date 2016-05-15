<?php
	require_once "php/conf.php";
	
	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	
	$eventID = mysqli_real_escape_string($conn ,$_GET['event']);
	
	$sql = "SELECT title, description, location, public, private, date_time_start, date_time_end, task_id FROM Event WHERE event_id = '" . $eventID . "'";
	
	$result = $conn->query($sql);
	$title;
	$description;
	$location;
	$public;
	$private;
	
	if ($result->num_rows > 0) {
			
		while($row = $result->fetch_assoc()) {
			$title = $row['title'];
			$description = $row['description'];
			$location = $row['location'];
			$start_date = $row['date_time_start'];
			$end_date = $row['date_time_end'];
			$public = $row['public'];
			$private = $row['private'];
			$taskid = $row['task_id'];
		}
	} else {
		echo "No events found.";
	}

	echo '<form id="editEventForm" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">Event Title:</label>
				<div class="col-sm-10">
					<input id="eventTitleText" type="text" class="form-control" value="' . $title . '">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Start Date/Time:</label>
				<div class="col-sm-10">
					<input id="eventStartDateText" type="text" class="form-control" value="' . $start_date . '">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">End Date/Time:</label>
				<div class="col-sm-10">
				<input id="eventEndDateText" type="text" class="form-control" value="' . $end_date . '">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Description:</label>
				<div class="col-sm-10">
				<textarea id="eventDescriptionText" class="form-control" rows="5">' . $description . '</textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Location:</label>
				<div class="col-sm-10">
				<input id="eventLocationText" type="text" class="form-control" value="' . $location . '">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Assign Tasks To:</label>
				<div class="col-sm-10">
					<select id="eventTaskIDText" class="form-control">';
						
						$sql = "SELECT task_id, description FROM Task";
						$result = $conn->query($sql);
						
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								if ($taskid === $row['task_id'])
								{
									echo "<option value='" . $row['task_id'] . "' selected='selected'>" . $row['description'] . "</option>";
								}
								else
								{
									echo "<option value='" . $row['task_id'] . "'>" . $row['description'] . "</option>";
								}	
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
					<select id="eventPublicText" class="form-control">';
						if ($public === '1')
						{
							echo '<option value="1" selected="selected">Yes</option>
									<option value="0">No</option>';
						}
						else
						{
							echo '<option value="1">Yes</option>
									<option value="0" selected="selected">No</option>';
						}
					echo '</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Private</label>
				<div class="col-sm-10">
					<select id="eventPrivateText" class="form-control">';
						if ($private === '1')
						{
							echo '<option value="1" selected="selected">Yes</option>
									<option value="0">No</option>';
						}
						else
						{
							echo '<option value="1">Yes</option>
									<option value="0" selected="selected">No</option>';
						}
					echo '</select>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button class="btn btn-default" onclick="editEventData('; echo $eventID . ')">Edit event</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>';
		$conn->close();
?>