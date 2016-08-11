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
				echo '<table><col width="200"><col width="400">';
				echo "<tr><th>Task</th></tr>";
				echo "<tr><th>Title:</th><td>" . $row['tdescription'] . "</td></tr>";
				echo "<tr><th>Category:</th><td>" . $row['tcdescription'] . "</td></tr>";
				echo "<tr><th>Events</th></tr>";
				echo "<tr><th>ID:</th><td>" . $row['event_id'] . "</td></tr>";
				echo "<tr><th>Title:</th><td>" . $row['title'] . "</td></tr>";
				echo "<tr><th>Description:</th><td>" . $row['description'] . "</td></tr>";
				echo "<tr><th>Location:</th><td>" . $row['location'] . "</td></tr>";
				echo "<tr><th>Category:</th><td>" . $row['ecdescription'] . "</td></tr>";
				echo "<tr><th>Start Date/Time:</th><td>" . $row['date_time_start'] . "</td></tr>";
				echo "<tr><th>End Date/Time:</th><td>" . $row['date_time_end'] . "</td></tr>";
				echo "<tr><th>Public:</th><td>" . ($row['public'] === '1' ? "Yes" : "No") . "</td></tr>";
				echo "<tr><th>Private:</th><td>" . ($row['private'] === '1' ? "Yes" : "No") . "</td></tr>";
				echo "<tr><th>Status:</th><td>" . $row['status'] . "</td></tr>";
				echo "</table>";
			}
		} else {
			echo "No events found.";
		}
		
		$conn->close();
	}
?>