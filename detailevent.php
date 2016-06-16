<?php
	require_once "php/conf.php";

	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	if (isset($_GET['event']))
	{
		$eventID = mysqli_real_escape_string($conn ,$_GET['event']);
		
		$sql = "SELECT e.event_id, e.title, e.description, e.location, e.public, e.private, e.date_time_start, e.date_time_end, t.description as tdescription, tc.description as tcdescription, ec.description as ecdescription, tes.status
				FROM Event as e, Task as t, TaskCategory as tc, EventCategory as ec, TaskEventStatus as tes
				WHERE e.event_id = '" . $eventID . "' AND e.task_id=t.task_id
					AND t.task_category_id=tc.task_category_id 
					AND e.event_category_id=ec.event_category_id
					AND e.task_event_status_id=tes.task_event_status_id";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			
			while($row = $result->fetch_assoc()) {
				echo "<p><label>Task Title: </label>" . $row['tdescription'] . "</p>";
				echo "<p><label>Task Category: </label>" . $row['tcdescription'] . "</p>";
				echo "<p><label>Event ID: </label>" . $row['event_id'] . "</p>";
				echo "<p><label>Event Title: </label>" . $row['title'] . "</p>";
				echo "<p><label>Event Description: </label>" . $row['description'] . "</p>";
				echo "<p><label>Event Location: </label>" . $row['location'] . "</p>";
				echo "<p><label>Event Category: </label>" . $row['ecdescription'] . "</p>";
				echo "<p><label>Event Start Date/Time: </label>" . $row['date_time_start'] . "</p>";
				echo "<p><label>Event End Date/Time: </label>" . $row['date_time_end'] . "</p>";
				echo "<p><label>Public: </label>" . ($row['public'] === '1' ? "Yes" : "No") . "</p>";
				echo "<p><label>Private: </label>" . ($row['private'] === '1' ? "Yes" : "No") . "</p>";
				echo "<p><label>Status: </label>" . $row['status'] . "</p>";
			}
		} else {
			echo "No events found.";
		}
		
		$conn->close();
	}
?>