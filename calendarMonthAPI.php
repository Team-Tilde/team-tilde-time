<?php
	require_once "php/conf.php";

	$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
	$myArray = array();
	if ($result = $mysqli->query("SELECT * FROM event")) {

		while($row = $result->fetch_array(MYSQL_ASSOC)) {
				$myArray[] = $row;
		}
		echo json_encode($myArray);
	}

	$result->close();
	$mysqli->close();
	
	
	
	
?>