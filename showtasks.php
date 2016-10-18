<?php
	require_once "php/conf.php";
	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$selected = (int)mysqli_real_escape_string($conn ,$_GET['taskCatID']);
	
	$sql = "SELECT description FROM TaskCategory WHERE task_category_id = '" . $selected . "'";
	$result = mysqli_query($conn, $sql);
	$arow = mysqli_fetch_row($result);

	if ($selected === 0) {
		echo "<h2>All Tasks</h2>";
		$sql = "SELECT t.task_id, tc.description as tcdescription, t.description, t.task_category_id, t.date_time_start, t.date_time_end, tes.status FROM Task as t
			JOIN taskcategory as tc ON t.task_category_id = tc.task_category_id
			JOIN TaskEventStatus as tes ON t.task_event_status_id = tes.task_event_status_id
			WHERE t.task_event_status_id != 4";
	} else {
		echo "<h2>$arow[0]</h2>";
		$sql = "SELECT t.task_id, tc.description as tcdescription, t.description, t.task_category_id, t.date_time_start, t.date_time_end, tes.status FROM Task as t
			JOIN taskcategory as tc ON t.task_category_id = tc.task_category_id
			JOIN TaskEventStatus as tes ON t.task_event_status_id = tes.task_event_status_id

	if ($selected === 0) {
		echo "<h2>All Tasks</h2>";
		$sql = "SELECT t.task_id, tc.description as tcdescription, t.description, t.task_category_id, t.date_time_start, t.date_time_end, tes.status FROM Task as t
			JOIN taskcategory as tc ON t.task_category_id = tc.task_category_id
			JOIN TaskEventStatus as tes ON t.task_event_status_id = tes.task_event_status_id
			WHERE t.task_event_status_id != 4";
	} else {
		echo "<h2>$arow[0]</h2>";
		$sql = "SELECT t.task_id, tc.description as tcdescription, t.description, t.task_category_id, t.date_time_start, t.date_time_end, tes.status FROM Task as t
			JOIN taskcategory as tc ON t.task_category_id = tc.task_category_id
			JOIN TaskEventStatus as tes ON t.task_event_status_id = tes.task_event_status_id
			WHERE t.task_category_id = '" . $selected . "' AND t.task_event_status_id != 4";
	}
	
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		
		echo "<table id='tableTasks' class='table table-hover'>
					<tr>
						<td width='1%'><strong><input id='checkSelectAll' type='checkbox' value='All' onchange='checkAll()'></strong></td>
						<td width='4%'><strong>Task Number</strong></td>
						<td width='10%'><strong>Task Category</strong></td>
						<td width='20%'><strong>Task Description</strong></td>
						<td width='10%'><strong>Start Date</strong></td>
						<td width='10%'><strong>Finish Date</strong></td>
						<td width='4%'><strong>Status</strong></td>
						<td width='5%'><strong>Options</strong></td>
					<tr>";
		
		while($row = $result->fetch_assoc()) {
			$start_date = date_create($row['date_time_start'], timezone_open("Australia/Sydney"));
			$end_date = date_create($row['date_time_end'], timezone_open("Australia/Sydney"));
			
			echo "<tr>
					<td width='1%'><label><input class='checkSelect' type='checkbox' value='" . $row['task_id'] . "'></label></td>
					<td width='4%'><p>Task " . $row['task_id'] .  "</p></td>
					<td width='10%'><p>" . $row['tcdescription'] . "</p></td>
					<td width='20%'><p>" . $row['description'] . "</p></td>
					<td width='10%'><p>" . date_format($start_date, 'l jS F Y h:i a') . "</p></td>
					<td width='10%'><p>" . date_format($end_date, 'l jS F Y h:i a') . "</p></td>
					<td width='4%'><p>" . $row['status'] . "</p></td>
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
