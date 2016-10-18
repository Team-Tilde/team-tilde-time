<?php
	require_once "php/conf.php";

	echo '<form id="addTaskForm" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">Task Category:</label>
				<div class="col-sm-10">
					<select id="addTaskCategoryText" class="form-control">';
						 
						$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
						
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}
						
						$sql = "SELECT task_category_id, description FROM TaskCategory";
						$result = $conn->query($sql);
						
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								echo "<option value='" . $row['task_category_id'] . "'>" . $row['description'] . "</option>";
							}
						}
						else {
							echo "<option>'No task found'</option>";
						}
					
					echo '</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Task Name:</label>
				<div class="col-sm-10">
					<input id="addTaskNameText" type="text" class="form-control" placeholder="Task Name">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Start Date/Time:</label>
				<div class="col-sm-10">
					<input id="addTaskStartDateText" type="text" class="form-control" placeholder="Start Date/Time" value="'; echo date("Y-m-d H:i:s"); echo '">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">End Date/Time:</label>
				<div class="col-sm-10">
				<input id="addTaskEndDateText" type="text" class="form-control" placeholder="End Date/Time" value="'; echo date("Y-m-d H:i:s"); echo '">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Task Status:</label>
				<div class="col-sm-10">
					<select id="addTaskStatusText" class="form-control">';
						 
						$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
						
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}
						
						$sql = "SELECT task_event_status_id, status FROM TaskEventStatus";
						$result = $conn->query($sql);
						
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								echo "<option value='" . $row['task_event_status_id'] . "'>" . $row['status'] . "</option>";
							}
						}
						else {
							echo "<option>'No task found'</option>";
						}
					
					echo '</select>
				</div>
			</div>
			
			<h4 class="modal-title">Task Notes</h4>
			<div class="form-group">
				<label class="col-sm-2 control-label">Notes</label>
				<div id="addTaskNotesDiv" class="col-sm-10">
					<div>
						<textarea class="form-control task-notes-text" rows="3" placeholder="Note 1"></textarea>
						<div>
							<input class="task-notes-checkbox" type="checkbox" value=""><label>Public</label>
						</div>
					</div>
					
				</div>
				<div class="col-sm-offset-2 col-sm-10">
					<a href="#" onclick="addTaskNotes()">
						<span class="glyphicon glyphicon-plus"></span><label>Add more notes</label>
					</a>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button class="btn btn-default" onclick="insertTaskData()">Add task</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>';
		$conn->close();
?>