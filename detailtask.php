<?php
	require_once "php/conf.php";

	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	if (isset($_GET['task']))
	{
		$taskID = mysqli_real_escape_string($conn ,$_GET['task']);
		
		$sql = "SELECT e.task_id, e.title, e.description, e.date_time_start, e.date_time_end, t.description as tdescription, tc.description as tcdescription FROM Task as e, Task as t, TaskCategory as tc WHERE e.task_id = '" . $taskID . "' AND e.task_id=t.task_id AND t.task_category_id=tc.task_category_id";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			
			while($row = $result->fetch_assoc()) {
				echo "<p><label>Task Title: </label>" . $row['tdescription'] . "</p>";
				echo "<p><label>Task Category: </label>" . $row['tcdescription'] . "</p>";
				echo "<p><label>Task ID: </label>" . $row['task_id'] . "</p>";
				echo "<p><label>Task Title: </label>" . $row['title'] . "</p>";
				echo "<p><label>Task Description: </label>" . $row['description'] . "</p>";
				echo "<p><label>Task Start Date/Time: </label>" . $row['date_time_start'] . "</p>";
				echo "<p><label>Task End Date/Time: </label>" . $row['date_time_end'] . "</p>";
			}
		} else {
			echo "No tasks found.";
		}
		
		$conn->close();
	}
?>