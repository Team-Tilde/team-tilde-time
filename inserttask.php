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
	$taskcategoryid = mysqli_real_escape_string($conn, $data['data']['taskcategoryid']);
	$description = mysqli_real_escape_string($conn, $data['data']['description']);
	$startdate = mysqli_real_escape_string($conn, $data['data']['startdate']);
	$enddate = mysqli_real_escape_string($conn, $data['data']['enddate']);
	$taskeventstatusid = mysqli_real_escape_string($conn, $data['data']['taskeventstatusid']);
	$tasknotearray = $data['data']['tasknotes'];

	/*
	$taskcategoryid = mysqli_real_escape_string($conn, $_POST['taskcategoryid']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
	$startdate = mysqli_real_escape_string($conn, $_POST['startdate']);
	$enddate = mysqli_real_escape_string($conn, $_POST['enddate']);
	$taskeventstatusid = mysqli_real_escape_string($conn, $_POST['taskeventstatusid']);
	*/
	
	$sql = "INSERT INTO Task (description, task_category_id, date_time_start, date_time_end, task_event_status_id)
			VALUES ('" . $description . "','" . $taskcategoryid . "','" . $startdate . "','" . $enddate . "','" . $taskeventstatusid . "')";
	
	if (mysqli_query($conn, $sql)) {
		$lasttaskid = mysqli_insert_id($conn);
		foreach($tasknotearray as $tasknote)
		{
			$sql = "INSERT INTO Task_Note (task_id, description, public, date_time_start, date_time_end)
			VALUES ('" . $lasttaskid . "','" . $tasknote['description'] . "','" . $tasknote['public'] . "','" . $startdate . "','" . $enddate . "')";
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
		echo "-1";
	}
	
?>
