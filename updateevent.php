<?php
	require_once "php/conf.php";
	
	#Change the content type to JSON.
	header('Content-Type: application/json');
	
	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
						
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	//Store the data retrieved by AJAX and decode the JSON which got passed through.
	$data = json_decode(file_get_contents("php://input"), true);
	
	/*
	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$startdate = mysqli_real_escape_string($conn, $_POST['startdate']);
	$enddate = mysqli_real_escape_string($conn, $_POST['enddate']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
	$location = mysqli_real_escape_string($conn, $_POST['location']);
	$eventcategoryid = mysqli_real_escape_string($conn, $_POST['eventcategoryid']);
	$taskid = mysqli_real_escape_string($conn, $_POST['taskid']);
	$public = mysqli_real_escape_string($conn, $_POST['public']);
	$eventid = mysqli_real_escape_string($conn, $_POST['eventid']);
	$taskeventstatusid = mysqli_real_escape_string($conn, $_POST['taskeventstatusid']);
	*/
	
	//Create variables to store the information obtained via AJAX.
	$title = mysqli_real_escape_string($conn, $data['data']['title']);
	$startdate = mysqli_real_escape_string($conn, $data['data']['startdate']);
	$enddate = mysqli_real_escape_string($conn, $data['data']['enddate']);
	$description = mysqli_real_escape_string($conn, $data['data']['description']);
	$location = mysqli_real_escape_string($conn, $data['data']['location']);
	$eventcategoryid = mysqli_real_escape_string($conn, $data['data']['eventcategoryid']);
	$taskid = mysqli_real_escape_string($conn, $data['data']['taskid']);
	$public = mysqli_real_escape_string($conn, $data['data']['public']);
	$taskeventstatusid = mysqli_real_escape_string($conn, $data['data']['taskeventstatusid']);
	$eventid = mysqli_real_escape_string($conn, $data['data']['eventid']);
	$eventnotearray = $data['data']['eventnotes'];
	
	$sql = "UPDATE Event SET task_id='" . $taskid . "', event_category_id='" . $eventcategoryid . 
								"', title='" . $title . "', location='" . $location . 
								"', public='" . $public . 
								"', description='" . $description . "', date_time_start='" . $startdate . "', date_time_end='" . $enddate .
								"', task_event_status_id='" . $taskeventstatusid . "' " .
								"WHERE event_id ='" . $eventid . "'";
	
	if (mysqli_query($conn, $sql)) {
		echo "Success";
		foreach($eventnotearray as $eventnote)
		{
			$sql = "INSERT INTO Event_Note (event_id, description, public, date_time_start, date_time_end)
			VALUES ('" . $eventid . "','" . $eventnote['description'] . "','" . $eventnote['public'] . "','" . $startdate . "','" . $enddate . "')";
			if (mysqli_query($conn, $sql))
			{
				echo "Success";
			}
			else
			{
				echo "Failed";
			}
		}
	}
	
	else {
		echo "Failed";
	}
	
	$conn->close();
?>