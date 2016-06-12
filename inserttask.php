<?php
	require_once "php/conf.php";
	
	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
						
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$taskcategoryid = mysqli_real_escape_string($conn, $_POST['taskcategoryid']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
	$startdate = mysqli_real_escape_string($conn, $_POST['startdate']);
	$enddate = mysqli_real_escape_string($conn, $_POST['enddate']);
	$taskeventstatusid = mysqli_real_escape_string($conn, $_POST['taskeventstatusid']);
	
	$sql = "INSERT INTO Task (description, task_category_id, date_time_start, date_time_end, task_event_status_id)
			VALUES ('" . $description . "','" . $taskcategoryid . "','" . $startdate . "','" . $enddate . "','" . $taskeventstatusid . "')";
	
	if (mysqli_query($conn, $sql)) {
		echo "0";
	}
	
	else {
		echo "-1";
	}
	
?>