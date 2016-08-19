

<?php
	require_once "php/conf.php";
	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	if (isset($_GET['event']))
	{
		$eventID = mysqli_real_escape_string($conn ,$_GET['event']);
		
		$sql = "SELECT e.event_id, e.title, e.description, e.location, e.public, e.date_time_start, e.date_time_end, t.description as tdescription, tc.description as tcdescription, ec.description as ecdescription, tes.status
				FROM Event as e, Task as t, TaskCategory as tc, EventCategory as ec, TaskEventStatus as tes
				WHERE e.event_id = '" . $eventID . "' AND e.task_id=t.task_id
					AND t.task_category_id=tc.task_category_id 
					AND e.event_category_id=ec.event_category_id
					AND e.task_event_status_id=tes.task_event_status_id";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			
			while($row = $result->fetch_assoc()) {
				echo '<table><col width="150"><col width="300"><col width="150"><col width="100">';
				echo '<tr style="font-size:10px"><th>Task Title:</th><td>' . $row['tdescription'] . '</td><th>Task Category:</th><td>' . $row['tcdescription'] . '</td></tr>';
				echo '<tr style="height:5px"><td colspan="3"><tr><td style="border-bottom: 1px solid #e5e5e5"></td><td style="border-bottom: 1px solid #e5e5e5"></td><td style="border-bottom: 1px solid #e5e5e5"></td><td style="border-bottom: 1px solid #e5e5e5"></td></tr><tr style="height:5px"><td colspan="3">';
				echo "</tr><tr><th>ID:</th><td>" . $row['event_id'] . "</td></tr>";
				echo "<tr><th>Title:</th><td>" . $row['title'] . "</td></tr>";
				echo '<tr style="height:5px"><td colspan="3"><tr><th>Description:</th><td>' . $row['description'] . '</td></tr><tr style="height:5px"><td colspan="3">';
				echo "<tr><th>Location:</th><td>" . $row['location'] . "</td></tr>";
				echo "<tr><th>Category:</th><td>" . $row['ecdescription'] . "</td></tr>";
				echo "<tr><th>Start Date/Time:</th><td>" . $row['date_time_start'] . "</td></tr>";
				echo "<tr><th>End Date/Time:</th><td>" . $row['date_time_end'] . "</td></tr>";
				echo "<tr><th>Public:</th><td>" . ($row['public'] === '1' ? "Yes" : "No") . "</td><th>Status:</th><td>" . $row['status'] . "</td></tr>";
			}
		} else {
			echo "No events found.";
		}
		
		$sql = "SELECT description, date_time_start, date_time_end FROM Event_Note WHERE event_id = '" . $eventID . "'
				ORDER BY date_time_start";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			echo "<tr><th>Event Notes</th></tr>";
			while($row = $result->fetch_assoc()) {
				
				$start_date = date_create($row['date_time_start'], timezone_open("Australia/Sydney"));
				$end_date = date_create($row['date_time_end'], timezone_open("Australia/Sydney"));
				
				echo "<tr><th>" . $row['description'] . "</th></tr>";
				echo "<tr><th>Start date:</th><td>" . date_format($start_date, 'l jS F Y h:i a') . "</td><th>End Date:</th><td>" . date_format($end_date, 'l jS F Y h:i a') . "</td></tr>";
				//echo "<p><label>Public/Private: </label>" . $row['public/private'] . "</p>";
			}
			
		}
		
		echo "</table>";
		
		$conn->close();
	}
?>