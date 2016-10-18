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
	$taskid = mysqli_real_escape_string($conn, $_POST['taskid']);
	$taskcategoryid = mysqli_real_escape_string($conn, $_POST['taskcategoryid']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
	$startdate = mysqli_real_escape_string($conn, $_POST['startdate']);
	$enddate = mysqli_real_escape_string($conn, $_POST['enddate']);
	$taskeventstatusid = mysqli_real_escape_string($conn, $_POST['taskeventstatusid']);
	*/
	
	//Create variables to store the information obtained via AJAX.
	$taskid = mysqli_real_escape_string($conn, $data['data']['taskid']);
	$taskcategoryid = mysqli_real_escape_string($conn, $data['data']['taskcategoryid']);
	$description = mysqli_real_escape_string($conn, $data['data']['description']);
	$startdate = mysqli_real_escape_string($conn, $data['data']['startdate']);
	$enddate = mysqli_real_escape_string($conn, $data['data']['enddate']);
	$taskeventstatusid = mysqli_real_escape_string($conn, $data['data']['taskeventstatusid']);
	$tasknotearray = $data['data']['tasknotes'];
	
	$sql = "UPDATE Task SET task_category_id='" . $taskcategoryid . 
								"', description='" . $description . "', date_time_start='" . $startdate . "', date_time_end='" . $enddate .
								"', task_event_status_id='" . $taskeventstatusid . "' " .
								"WHERE task_id ='" . $taskid . "'";
	
	if (mysqli_query($conn, $sql)) {
		echo "Success";
		foreach($tasknotearray as $tasknote)
		{
			$sql = "INSERT INTO Task_Note (task_id, description, public, date_time_start, date_time_end)
			VALUES ('" . $taskid . "','" . $tasknote['description'] . "','" . $tasknote['public'] . "','" . $startdate . "','" . $enddate . "')";
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
