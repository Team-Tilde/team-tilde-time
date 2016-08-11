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
		
		$conn->close();
	}
?>
