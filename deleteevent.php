<?php

	require_once "php/conf.php";
	
	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
						
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	if (isset($_GET['event']))
	{
		$eventID = mysqli_real_escape_string($conn, $_GET['event']);

		#$sql = "DELETE FROM Event WHERE event_id=" . $eventID; //Perma delete (removed)
		
		//Query to set status to deleted. 4 = Deleted.
		$sql = "UPDATE Event SET task_event_status_id=4 WHERE event_id=" . $eventID;

		if (mysqli_query($conn, $sql)) {
			echo "0";
		}
		
		else {
			echo "-1";
		}

	}
	
	$conn->close();

?>