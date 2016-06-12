<?php

	require_once "php/conf.php";
	
	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
						
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	if (isset($_GET['task']))
	{
		$taskID = mysqli_real_escape_string($conn, $_GET['task']);

		$sql1 = "DELETE FROM Event WHERE task_id=" . $taskID;
		$sql2 = "DELETE FROM Task WHERE task_id=" . $taskID;

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