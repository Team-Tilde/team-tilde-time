<?php
	require_once "php/conf.php";
	
	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	
	$taskID = mysqli_real_escape_string($conn ,$_GET['task']);
	
	$sql = "SELECT title, description, date_time_start, date_time_end, task_id FROM Task WHERE task_id = '" . $taskID . "'";
	
	$result = $conn->query($sql);
	$title;
	$description;
	
	if ($result->num_rows > 0) {
			
		while($row = $result->fetch_assoc()) {
			$title = $row['title'];
			$description = $row['description'];
			$start_date = $row['date_time_start'];
			$end_date = $row['date_time_end'];
			$taskid = $row['task_id'];
		}
	} else {
		echo "No tasks found.";
	}

	echo '<form id="editTaskForm" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">Task Title:</label>
				<div class="col-sm-10">
					<input id="taskTitleText" type="text" class="form-control" value="' . $title . '">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Start Date/Time:</label>
				<div class="col-sm-10">
					<input id="taskStartDateText" type="text" class="form-control" value="' . $start_date . '">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">End Date/Time:</label>
				<div class="col-sm-10">
				<input id="taskEndDateText" type="text" class="form-control" value="' . $end_date . '">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Description:</label>
				<div class="col-sm-10">
				<textarea id="taskDescriptionText" class="form-control" rows="5">' . $description . '</textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Assign Tasks To:</label>
				<div class="col-sm-10">
					<select id="taskTaskIDText" class="form-control">';
						
						$sql = "SELECT task_id, description FROM Task";
						$result = $conn->query($sql);
						
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								if ($taskid === $row['task_id'])
								{
									echo "<option value='" . $row['task_id'] . "' selected='selected'>" . $row['description'] . "</option>";
								}
								else
								{
									echo "<option value='" . $row['task_id'] . "'>" . $row['description'] . "</option>";
								}	
							}
						}
						else {
							echo "<option>'No task found'</option>";
						}
					
					echo '</select>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button class="btn btn-default" onclick="editTaskData('; echo $taskID . ')">Edit task</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>';
		$conn->close();
?>