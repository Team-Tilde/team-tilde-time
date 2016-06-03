<?php

	require_once "php/conf.php";
	
	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
						
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	if (isset($_GET['task']))
	{
		$taskID = mysqli_real_escape_string($conn, $_GET['task']);

		$sql = "DELETE FROM Task WHERE task_id=" . $taskID;

		if (mysqli_query($conn, $sql)) {
			echo "0";
		}
		
		else {
			echo "-1";
		}

	}
	
	$conn->close();

?>