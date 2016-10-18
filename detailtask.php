<?php
	require_once "php/conf.php";

	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	if (isset($_GET['task']))
	{
		$taskID = mysqli_real_escape_string($conn ,$_GET['task']);
		
		$sql = "SELECT t.task_id, tc.description as tcdescription, t.description, t.task_category_id, t.date_time_start, t.date_time_end, tes.status FROM Task as t
			JOIN taskcategory as tc ON t.task_category_id = tc.task_category_id
			JOIN TaskEventStatus as tes ON t.task_event_status_id = tes.task_event_status_id
			WHERE t.task_id = '" . $taskID . "'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			
			while($row = $result->fetch_assoc()) {
				echo '<table><col width="200"><col width="400">';
				echo "<tr><th>Number:</th><td>" . $row['task_id'] . "</td></tr>";
				echo "<tr><th>Category:</th><td>" . $row['tcdescription'] . "</td></tr>";
				echo "<tr><th>Name:</th><td>" . $row['description'] . "</td></tr>";
				echo "<tr><th>Start Date/Time:</th><td>" . $row['date_time_start'] . "</td></tr>";
				echo "<tr><th>End Date/Time:</th><td>" . $row['date_time_end'] . "</td></tr>";
				echo "<tr><th>Status:</th><td>" . $row['status'] . "</td></tr>";
				echo "</table>";
			}
		} else {
			echo "No tasks found.";
		}
		
		$sql = "SELECT description, date_time_start, date_time_end FROM Task_Note WHERE task_id = '" . $taskID . "'
				ORDER BY date_time_start";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			echo '<hr/><h4>Task Notes</h4><hr/>';
			$counter = 1;
			while($row = $result->fetch_assoc()) {
				
				$start_date = date_create($row['date_time_start'], timezone_open("Australia/Sydney"));
				$end_date = date_create($row['date_time_end'], timezone_open("Australia/Sydney"));
				
				echo '<table><col width="100">';
				echo "<tr><th colspan='2'> Note " . $counter . "</th></tr>";
				echo "<tr><th>Description:</th><td>" . $row['description'] . "</td></tr>";
				echo "<tr><th>Start date:</th><td>" . date_format($start_date, 'l jS F Y h:i a') . "</td></tr>";
				echo "<tr><th>End Date:</th><td>" . date_format($end_date, 'l jS F Y h:i a') . "</td></tr>";
				echo "</table><br/>";
				//echo "<p><label>Public/Private: </label>" . $row['public/private'] . "</p>";
				$counter++;
			}
			
		}
		
		$conn->close();
	}
?>
