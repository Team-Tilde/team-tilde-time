<?php
	
	echo '<form id="deleteTaskForm" class="form-horizontal">';
	
	require_once "php/conf.php";
	
	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$taskID = mysqli_real_escape_string($conn, $_GET['task']);
	
	$sql = "SELECT e.task_id, e.task_id, e.title, e.description, e.date_time_start, e.date_time_end, t.description as tdescription FROM Task as e, Task as t WHERE e.task_id = '" . $taskID . "' AND e.task_id=t.task_id";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<p>Are you sure you want to delete:<br/>TASK " . $row['task_id'] . ": " . $row['title'] . " from TASK " . $row['task_id'] . ": " . $row['tdescription'] . "?</p>";
		}
	}
	else {
		echo "<p>'No task found'</p>";
	}

					
	echo '<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="button" class="btn btn-default" onclick="deleteTask(' . $taskID . ')">Yes</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
				</div>
			</div>
		</form>';
		$conn->close();
?>