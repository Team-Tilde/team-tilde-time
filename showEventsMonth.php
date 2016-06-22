<?php
	require_once "php/conf.php";

	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$selected = mysqli_real_escape_string($conn ,$_GET['task']);
	
	
	$sql = "SELECT event_id, title, description, location, date_time_start, date_time_end FROM Event WHERE date_time_start BETWEEN '" . $selected . " 00:00:00' AND '" . $selected . " 23:59:59'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		
		echo "<table id='tableEvents' class='table table-hover'>
					<tr>
						<td width='1%'><strong><input id='checkSelectAll' type='checkbox' value='All' onchange='checkAll()'></strong></td>
						<td width='10%'><strong>Event Number</strong></td>
						<td width='10%'><strong>Event Name</strong></td>
						<td width='34%'><strong>Description</strong></td>
						<td width='10%'><strong>Venue</strong></td>
						<td width='15%'><strong>Start Date</strong></td>
						<td width='15%'><strong>Finish Date</strong></td>
						<td width='5%'><strong>Options</strong></td>
					<tr>";
		
		while($row = $result->fetch_assoc()) {
			$start_date = date_create($row['date_time_start'], timezone_open("Australia/Sydney"));
			$end_date = date_create($row['date_time_end'], timezone_open("Australia/Sydney"));
			
			echo "<tr>
					<td width='1%'><label><input class='checkSelect' type='checkbox' value='" . $row['event_id'] . "'></label></td>
					<td width='10%'><p>Event " . $row['event_id'] .  "</p></td>
					<td width='10%'><p>" . $row['title'] . "</p></td>
					<td width='34%'><p>" . $row['description'] . "</p></td>
					<td width='10%'><p>" . $row['location'] . "</p></td>
					<td width='15%'><p>" . date_format($start_date, 'l jS F Y h:i a') . "</p></td>
					<td width='15%'><p>" . date_format($end_date, 'l jS F Y h:i a') . "</p></td>
					<td width='5%'><p><a href='#'" . $row['event_id'] . " title='"  . $row['event_id'] . "' onclick='showEventDetails(this.title)'><span class='glyphicon glyphicon-search'></span></a>
							<a href='#'" . $row['event_id'] . " title='"  . $row['event_id'] . "' onclick='showEditEventModal(this.title)'><span class='glyphicon glyphicon-pencil'></span></a>
							<a href='#'" . $row['event_id'] . " title='"  . $row['event_id'] . "' onclick='showDeleteEventModal(this.title)'><span class='glyphicon glyphicon-trash'></span></a></p></td>
					</tr>";
		}
		echo "</table>";
		
	} else {
		echo "No events found.";
	}
	
	$conn->close();
?>