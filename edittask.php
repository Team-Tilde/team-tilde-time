<?php
	require_once "php/conf.php";
	
	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	
	$taskID = mysqli_real_escape_string($conn ,$_GET['task']);
	
	$sql = "SELECT t.task_id, tc.description as tcdescription, t.description, t.task_category_id, t.date_time_start, t.date_time_end, t.task_event_status_id FROM Task as t, TaskCategory as tc
			WHERE task_id = '" . $taskID . "'";
	
	$result = $conn->query($sql);
	$taskid;
	$task_category_id;
	$description;
	$start_date;
	$end_date;
	
	if ($result->num_rows > 0) {
			
		while($row = $result->fetch_assoc()) {
			$taskid = $row['task_id'];
			$task_category_id = $row['task_category_id'];
			$description = $row['description'];
			$start_date = $row['date_time_start'];
			$end_date = $row['date_time_end'];
			$task_event_status_id = $row['task_event_status_id'];
		}
	} else {
		echo "No tasks found.";
	}

	echo '<form id="editTaskForm" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">Task Type:</label>
				<div class="col-sm-10">
					<select id="editTaskCategoryText" class="form-control">';
						
						$sql = "SELECT task_category_id, description FROM TaskCategory";
						$result = $conn->query($sql);
						
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								if ($task_category_id === $row['task_category_id'])
								{
									echo "<option value='" . $row['task_category_id'] . "' selected='selected'>" . $row['description'] . "</option>";
								}
								else
								{
									echo "<option value='" . $row['task_category_id'] . "'>" . $row['description'] . "</option>";
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
				<label class="col-sm-2 control-label">Description:</label>
				<div class="col-sm-10">
				<textarea id="editTaskDescriptionText" class="form-control" rows="5">' . $description . '</textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Start Date/Time:</label>
				<div class="col-sm-10">
					<input id="editTaskStartDateText" type="text" class="form-control" value="' . $start_date . '">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">End Date/Time:</label>
				<div class="col-sm-10">
				<input id="editTaskEndDateText" type="text" class="form-control" value="' . $end_date . '">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Task Status:</label>
				<div class="col-sm-10">
					<select id="editTaskStatusText" class="form-control">';
						
						$sql = "SELECT task_event_status_id, status FROM TaskEventStatus";
						$result = $conn->query($sql);
						
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								if ($task_event_status_id === $row['task_event_status_id'])
								{
									echo "<option value='" . $row['task_event_status_id'] . "' selected='selected'>" . $row['status'] . "</option>";
								}
								else
								{
									echo "<option value='" . $row['task_event_status_id'] . "'>" . $row['status'] . "</option>";
								}	
							}
						}
						else {
							echo "<option>'No task found'</option>";
						}
					
					echo '</select>
				</div>
			</div>';
			
			echo '<div class="form-group">
				<label class="col-sm-2 control-label">Notes</label>
				<div class="col-sm-10">
					<div>';
					
					$sql = "SELECT description, date_time_start, date_time_end, public FROM Task_Note WHERE task_id = '" . $taskID . "'
							ORDER BY date_time_start";
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
						echo '<div>';
						while($row = $result->fetch_assoc()) {
							echo '<textarea class="form-control task-notes-text" row="3" placeholder="New Note" readonly>' . $row['description'] . "</textarea>";
							echo '<div>';
							
								if($row['public'] === '1') {
									echo '<input class="task-notes-checkbox" type="checkbox" value="" checked disabled><label>Public</label>';
								}
								else {
									echo '<input class="task-notes-checkbox" type="checkbox" value="" disabled><label>Public</label>';
								}
								
							echo '</div>';
						}
						echo '</div>';
					}
						echo '<div id="editTaskNotesDiv">
						</div>
					</div>
				</div>
				<div class="col-sm-offset-2 col-sm-10">
					<a href="#" onclick="addEditTaskNotes()">
						<span class="glyphicon glyphicon-plus"></span><label>Add more notes</label>
					</a>
				</div>
			</div>';
			
			echo '<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button class="btn btn-default" onclick="editTaskData('; echo $taskID . ')">Edit task</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>';
		$conn->close();
?>
