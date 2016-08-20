<?php
	header('Content-type: application/json; charset=utf-8');
	require_once "conf.php";

	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	if(array_key_exists('date', $_POST)) {
		preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $_POST["date"], $date);
	} else if(array_key_exists('timeStart', $_POST) && array_key_exists('timeEnd', $_POST)) {
		// Temp, Proper checks required
		$startT = $_POST["timeStart"];
		$endT = $_POST["timeEnd"];
		// ---
	} else {
		die("Incorrect data provided");
	}
	
	if(isset($date)) {
		$sql = "SELECT event_id, title, description, date_time_start, date_time_end FROM event WHERE date_time_start BETWEEN \"".$date[0]." 00:00:00\" AND \"".$date[0]." 23:59:59\" ORDER BY date_time_start";
		$result = $conn->query($sql);
	} else if(isset($startT) && isset($endT)) {
		$sql = "SELECT event_id, title, description, date_time_start, date_time_end FROM event WHERE date_time_start BETWEEN \"".$startT."\" AND \"".$endT."\" ORDER BY date_time_start";
		$result = $conn->query($sql);
	} else {
		die("Query failed, variables not initialized");
	}

	if(isset($result)) { 
		if($result->num_rows > 0) {
			$data = array();
			while($row = $result->fetch_assoc()) {
				array_push($data, array(
					"event_id"			=> $row['event_id'],
					"title" 			=> $row['title'],
					"description"		=> $row['description'],
					"date_time_start" 	=> $row['date_time_start'],
					"date_time_end" 	=> $row['date_time_end']
					)
				);
			}
			echo json_encode($data);
		}
	}
	$conn->close();
?>