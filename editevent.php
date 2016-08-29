<?php
	require_once "php/conf.php";
	
	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	
	$eventID = mysqli_real_escape_string($conn ,$_GET['event']);
	
	$sql = "SELECT e.event_category_id, e.title, e.description, e.location, e.public, e.date_time_start, e.date_time_end, e.task_id, e.task_event_status_id FROM Event as e
			WHERE event_id = '" . $eventID . "'";
	
	$result = $conn->query($sql);
	$title;
	$description;
	$location;
	$public;
	
	if ($result->num_rows > 0) {
			
		while($row = $result->fetch_assoc()) {
			$title = $row['title'];
			$description = $row['description'];
			$location = $row['location'];
			$event_category_id = $row['event_category_id'];
			$start_date = $row['date_time_start'];
			$end_date = $row['date_time_end'];
			$public = $row['public'];
			$taskid = $row['task_id'];
			$task_event_status_id = $row['task_event_status_id'];
		}
	} else {
		echo "No events found.";
	}

	echo '<form id="editEventForm" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">Title:</label>
				<div class="col-sm-10">
					<input id="editEventTitleText" type="text" class="form-control" value="' . $title . '">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Start Date/Time:</label>
				<div class="col-sm-10">
					<input id="editEventStartDateText" type="text" class="form-control" value="' . $start_date . '">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">End Date/Time:</label>
				<div class="col-sm-10">
				<input id="editEventEndDateText" type="text" class="form-control" value="' . $end_date . '">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Description:</label>
				<div class="col-sm-10">
				<textarea id="editEventDescriptionText" class="form-control" rows="5">' . $description . '</textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Location:</label>
				<div class="col-sm-10">
				<input id="editEventLocationText" type="text" class="form-control" value="' . $location . '">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Category:</label>
				<div class="col-sm-10">
					<select id="editEventCategoryText" class="form-control">';
						
						$sql = "SELECT event_category_id, description FROM EventCategory";
						$result = $conn->query($sql);
						
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								if ($event_category_id === $row['event_category_id'])
								{
									echo "<option value='" . $row['event_category_id'] . "' selected='selected'>" . $row['description'] . "</option>";
								}
								else
								{
									echo "<option value='" . $row['event_category_id'] . "'>" . $row['description'] . "</option>";
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
				<label class="col-sm-2 control-label">Assign To:</label>
				<div class="col-sm-10">
					<select id="editEventTaskIDText" class="form-control">';
						
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
					<select id="editEventPublicText" class="form-control">';
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
				<label class="col-sm-2 control-label">Status:</label>
				<div class="col-sm-10">
					<select id="editEventStatusText" class="form-control">';
						
						$sql = "SELECT task_event_status_id, status FROM TaskEventStatus";
						$result = $conn->query($sql);
						
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								if ($task_event_status_id === $row['task_event_status_id'])
								{
									echo "<option value='" . $row['task_event_status_id'] . "' selected='selected'>" . $row['status'] . "</option>";
								}
								else
								{
									echo "<option value='" . $row['task_event_status_id'] . "'>" . $row['status'] . "</option>";
								}	
							}
						}
						else {
							echo "<option>'No task found'</option>";
						}
					
					echo '</select>
				</div>
			</div>';
			
			echo '<div class="form-group">
				<label class="col-sm-2 control-label">Notes</label>
				<div class="col-sm-10">
					<div>';
					
					$sql = "SELECT description, date_time_start, date_time_end, public FROM Event_Note WHERE event_id = '" . $eventID . "'
							ORDER BY date_time_start";
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
						echo '<div>';
						while($row = $result->fetch_assoc()) {
							echo '<textarea class="form-control event-notes-text" row="3" placeholder="New Note" readonly>' . $row['description'] . "</textarea>";
							echo '<div>';
							
								if($row['public'] === '1') {
									echo '<input class="event-notes-checkbox" type="checkbox" value="" checked disabled><label>Public</label>';
								}
								else {
									echo '<input class="event-notes-checkbox" type="checkbox" value="" disabled><label>Public</label>';
								}
								
							echo '</div>';
						}
						echo '</div>';
					}
						echo '<div id="editEventNotesDiv">
						</div>
					</div>
				</div>
				<div class="col-sm-offset-2 col-sm-10">
					<a href="#" onclick="addEditEventNotes()">
						<span class="glyphicon glyphicon-plus"></span><label>Add more notes</label>
					</a>
				</div>
			</div>';
			
			echo '<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button class="btn btn-default" onclick="editEventData('; echo $eventID . ')">Edit event</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>';
		
		$conn->close();
?>