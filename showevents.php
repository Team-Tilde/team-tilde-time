<?php
	require_once "php/conf.php";

	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$selected = mysqli_real_escape_string($conn ,$_GET['task']);
	
	$sql = "SELECT description FROM Task WHERE task_id = '" . $selected . "'";
	$result = mysqli_query($conn, $sql);
	$arow = mysqli_fetch_row($result);
	
	echo "<h2>$arow[0]</h2>";
	
	$sql = "SELECT e.event_id, ec.description as ecdescription, e.title, e.description, e.location, e.date_time_start, e.date_time_end, tes.status FROM Event as e
			JOIN EventCategory as ec ON e.event_category_id = ec.event_category_id
			JOIN TaskEventStatus as tes ON e.task_event_status_id = tes.task_event_status_id
			WHERE e.task_id = '" . $selected . "'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		
		echo "<table id='tableEvents' class='table table-hover'>
					<tr>
						<td width='1%'><strong><input id='checkSelectAll' type='checkbox' value='All' onchange='checkAll()'></strong></td>
						<td width='10%'><strong>Event Number</strong></td>
						<td width='10%'><strong>Event Name</strong></td>
						<td width='10%'><strong>Event Category</strong></td>
						<td width='30%'><strong>Description</strong></td>
						<td width='10%'><strong>Venue</strong></td>
						<td width='10%'><strong>Start Date</strong></td>
						<td width='10%'><strong>Finish Date</strong></td>
						<td width='4%'><strong>Status</strong></td>
						<td width='5%'><strong>Options</strong></td>
					<tr>";
		
		while($row = $result->fetch_assoc()) {
			$start_date = date_create($row['date_time_start'], timezone_open("Australia/Sydney"));
			$end_date = date_create($row['date_time_end'], timezone_open("Australia/Sydney"));
			
			if ($row['status'] === 'Delete')
			{
				echo "<tr>
					<td width='1%'><label><input class='checkSelect' type='checkbox' value='" . $row['event_id'] . "'></label></td>
					<td width='10%'><p class='statusDelete'>Event " . $row['event_id'] .  "</p></td>
					<td width='10%'><p class='statusDelete'>" . $row['title'] . "</p></td>
					<td width='10%'><p class='statusDelete'>" . $row['ecdescription'] . "</p></td>
					<td width='30%'><p class='statusDelete'>" . $row['description'] . "</p></td>
					<td width='10%'><p class='statusDelete'>" . $row['location'] . "</p></td>
					<td width='10%'><p class='statusDelete'>" . date_format($start_date, 'l jS F Y h:i a') . "</p></td>
					<td width='10%'><p class='statusDelete'>" . date_format($end_date, 'l jS F Y h:i a') . "</p></td>";
			}
			else
			{
				echo "<tr>
					<td width='1%'><label><input class='checkSelect' type='checkbox' value='" . $row['event_id'] . "'></label></td>
					<td width='10%'><p>Event " . $row['event_id'] .  "</p></td>
					<td width='10%'><p>" . $row['title'] . "</p></td>
					<td width='10%'><p>" . $row['ecdescription'] . "</p></td>
					<td width='30%'><p>" . $row['description'] . "</p></td>
					<td width='10%'><p>" . $row['location'] . "</p></td>
					<td width='10%'><p>" . date_format($start_date, 'l jS F Y h:i a') . "</p></td>
					<td width='10%'><p>" . date_format($end_date, 'l jS F Y h:i a') . "</p></td>";
			}
			
					
					if ($row['status'] === 'Pending')
					{
						echo "<td width='4%'><p class='statusPending'>" . $row['status'] . "</p></td>";
					}
					else if($row['status'] === 'Start')
					{
						echo "<td width='4%'><p class='statusStart'>" . $row['status'] . "</p></td>";
					}
					else if($row['status'] === 'Complete')
					{
						echo "<td width='4%'><p class='statusComplete'>" . $row['status'] . "</p></td>";
					}
					else if($row['status'] === 'Delete')
					{
						echo "<td width='4%'><p class='statusDelete'>" . $row['status'] . "</p></td>";
					}
					else
					{
						echo "<td width='4%'><p>" . $row['status'] . "</p></td>";
					}
					
				echo "<td width='5%'><p><a href='#'" . $row['event_id'] . " title='"  . $row['event_id'] . "' onclick='showEventDetails(this.title)'><span class='glyphicon glyphicon-search'></span></a>
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
