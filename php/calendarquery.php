<?php
	header('Content-type: application/json; charset=utf-8');
	require_once "conf.php";

	$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);

	if (!$conn) {
		die("Connection failed");
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
		$sql = "SELECT event_id, title, description, date_time_start, date_time_end FROM event WHERE date_time_start BETWEEN '$startT' AND '$endT' UNION SELECT event_id, title, description, date_time_start, date_time_end FROM event WHERE date_time_end BETWEEN '$startT' AND '$endT' UNION SELECT event_id, title, description, date_time_start, date_time_end FROM event WHERE '$startT' <= date_time_start AND '$endT' >= date_time_end";
		$result = $conn->query($sql);
	} else {
		die("Query failed, variables not initialized");
	}

	if(isset($result)) { 
		if($result->rowCount() > 0) {
			$data = array();
			foreach($result as $key => $row) {
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
		} else {
			echo json_encode(null);
		}
	} else {
		die("Query failed, results not initialized");
	}
	//$conn->close();
?>