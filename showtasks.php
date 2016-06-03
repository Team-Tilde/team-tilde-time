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
	
	$sql = "SELECT task_id, title, description, date_time_start, date_time_end FROM Task WHERE task_id = '" . $selected . "'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		
		echo "<table id='tableTasks' class='table table-hover'>
					<tr>
						<td width='1%'><strong><input id='checkSelectAll' type='checkbox' value='All' onchange='checkAll()'></strong></td>
						<td width='15%'><strong>Task Number</strong></td>
						<td width='15%'><strong>Task Name</strong></td>
						<td width='34%'><strong>Description</strong></td>
						<td width='15%'><strong>Start Date</strong></td>
						<td width='15%'><strong>Finish Date</strong></td>
						<td width='5%'><strong>Options</strong></td>
					<tr>";
		
		while($row = $result->fetch_assoc()) {
			$start_date = date_create($row['date_time_start']);
			$end_date = date_create($row['date_time_end']);
			
			echo "<tr>
					<td width='1%'><label><input class='checkSelect' type='checkbox' value='" . $row['task_id'] . "'></label></td>
					<td width='15%'><p>Task " . $row['task_id'] .  "</p></td>
					<td width='15%'><p>" . $row['title'] . "</p></td>
					<td width='34%'><p>" . $row['description'] . "</p></td>
					<td width='15%'><p>" . date_format($start_date, 'l jS F Y h:i a') . "</p></td>
					<td width='15%'><p>" . date_format($end_date, 'l jS F Y h:i a') . "</p></td>
					<td width='5%'><p><a href='#'" . $row['task_id'] . " title='"  . $row['task_id'] . "' onclick='showTaskDetails(this.title)'><span class='glyphicon glyphicon-search'></span></a>
							<a href='#'" . $row['task_id'] . " title='"  . $row['task_id'] . "' onclick='showEditTaskModal(this.title)'><span class='glyphicon glyphicon-pencil'></span></a>
							<a href='#'" . $row['task_id'] . " title='"  . $row['task_id'] . "' onclick='showDeleteTaskModal(this.title)'><span class='glyphicon glyphicon-trash'></span></a></p></td>
					</tr>";
		}
		echo "</table>";
		
	} else {
		echo "No tasks found.";
	}
	
	$conn->close();
?>