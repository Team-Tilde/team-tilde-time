<?php
	
	echo '<form id="deleteEventForm" class="form-horizontal">';
	
	require_once "php/conf.php";
	
	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$eventID = mysqli_real_escape_string($conn, $_GET['event']);
	
	$sql = "SELECT e.event_id, e.task_id, e.title, t.description as tdescription FROM Event as e, Task as t WHERE e.event_id = '" . $eventID . "' AND e.task_id=t.task_id";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<p>Are you sure you want to delete:<br/>EVENT " . $row['event_id'] . ": " . $row['title'] . " from TASK " . $row['task_id'] . ": " . $row['tdescription'] . "?</p>";
		}
	}
	else {
		echo "<p>'No task found'</p>";
	}

					
	echo '<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="button" class="btn btn-default" onclick="deleteEvent(' . $eventID . ')">Yes</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
				</div>
			</div>
		</form>';
		$conn->close();
?>