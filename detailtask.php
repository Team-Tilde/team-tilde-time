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
				echo "<p><label>Task Number: </label>" . $row['task_id'] . "</p>";
				echo "<p><label>Task Category: </label>" . $row['tcdescription'] . "</p>";
				echo "<p><label>Task Name: </label>" . $row['description'] . "</p>";
				echo "<p><label>Task Start Date/Time: </label>" . $row['date_time_start'] . "</p>";
				echo "<p><label>Task End Date/Time: </label>" . $row['date_time_end'] . "</p>";
				echo "<p><label>Status: </label>" . $row['status'] . "</p>";
			}
		} else {
			echo "No tasks found.";
		}
		
		$conn->close();
	}
?>