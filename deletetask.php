<?php

	require_once "php/conf.php";
	
	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
						
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	if (isset($_GET['task']))
	{
		$taskID = mysqli_real_escape_string($conn, $_GET['task']);

		#Update the status to Deleted rather than removing it from the database.
		#All events associated with the task will also change their status to Deleted.
		$sql1 = "UPDATE Event SET task_event_status_id=4 WHERE task_id=" . $taskID;
		$sql2 = "UPDATE Task SET task_event_status_id=4 WHERE task_id=" . $taskID;

		//$sql1 = "UPDATE Event SET date_time_end = date_time_start WHERE task_id=" . $taskID; //might be what tharanga wants
		//$sql2 = "UPDATE Task SET date_time_end = date_time_start WHERE task_id=" . $taskID;

		if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
			echo 0;
		}

		else {
			echo "-1";
		}

	}
	
	$conn->close();

?>
