<?php
	#Required to get configuration file, database details is contained inside.
	require_once "php/conf.php";
	
	#Change the content type to JSON.
	header('Content-Type: application/json');
	
	#Connects to the mySQL database using the configuration details.
	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
	
	#If there is an error, kill the page and print out the error. May need to be changed later as this is bad.
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	//Store the data retrieved by AJAX and decode the JSON which got passed through.
	$data = json_decode(file_get_contents("php://input"), true);
	
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
	$eventnotearray = $data['data']['eventnotes'];
	
	$sql = "INSERT INTO Event (task_id, event_category_id, title, location, public, description, date_time_start, date_time_end, task_event_status_id)
			VALUES ('" . $taskid . "','" . $eventcategoryid . "','" . $title . "','" . $location . "','" . $public . "','" . $description . "','" . $startdate . "','" . $enddate . "','" . $taskeventstatusid . "')";
	
	if (mysqli_query($conn, $sql))
	{
		$lasteventid = mysqli_insert_id($conn);
		foreach($eventnotearray as $eventnote)
		{
			$sql = "INSERT INTO Event_Note (event_id, description, public, date_time_start, date_time_end)
			VALUES ('" . $lasteventid . "','" . $eventnote['description'] . "','" . $eventnote['public'] . "','" . $startdate . "','" . $enddate . "')";
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
	else
	{
		echo "Failed";
	}
	
	$conn->close();
	
	//print_r($eventnotearray);
	
	/*
	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$startdate = mysqli_real_escape_string($conn, $_POST['startdate']);
	$enddate = mysqli_real_escape_string($conn, $_POST['enddate']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
	$location = mysqli_real_escape_string($conn, $_POST['location']);
	$eventcategoryid = mysqli_real_escape_string($conn, $_POST['eventcategoryid']);
	$taskid = mysqli_real_escape_string($conn, $_POST['taskid']);
	$public = mysqli_real_escape_string($conn, $_POST['public']);
	$private = mysqli_real_escape_string($conn, $_POST['private']);
	$taskeventstatusid = mysqli_real_escape_string($conn, $_POST['taskeventstatusid']);
	
	$sql = "INSERT INTO Event (task_id, event_category_id, title, location, public, private, description, date_time_start, date_time_end, task_event_status_id)
			VALUES ('" . $taskid . "','" . $eventcategoryid . "','" . $title . "','" . $location . "','" . $public . "','" . $private . "','" . $description . "','" . $startdate . "','" . $enddate . "','" . $taskeventstatusid . "')";
	
	if (mysqli_query($conn, $sql)) {
		echo "0";
	}
	
	else {
		echo "-1";
	}
	*/
	
?>