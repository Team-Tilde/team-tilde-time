<?php
	require_once "php/conf.php";
	
	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
						
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$startdate = mysqli_real_escape_string($conn, $_POST['startdate']);
	$enddate = mysqli_real_escape_string($conn, $_POST['enddate']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
	$location = mysqli_real_escape_string($conn, $_POST['location']);
	$eventcategoryid = mysqli_real_escape_string($conn, $_POST['eventcategoryid']);
	$taskid = mysqli_real_escape_string($conn, $_POST['taskid']);
	$public = mysqli_real_escape_string($conn, $_POST['public']);
	$private = mysqli_real_escape_string($conn, $_POST['private']);
	
	$sql = "INSERT INTO Event (task_id, event_category_id, title, location, public, private, description, date_time_start, date_time_end)
			VALUES ('" . $taskid . "','" . $eventcategoryid . "','" . $title . "','" . $location . "','" . $public . "','" . $private . "','" . $description . "','" . $startdate . "','" . $enddate . "')";
	
	if (mysqli_query($conn, $sql)) {
		echo "0";
	}
	
	else {
		echo "-1";
	}
	
?>