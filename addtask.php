<?php
	require_once "php/conf.php";

	echo '<form id="addTaskForm" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2 control-label">Task Category:</label>
				<div class="col-sm-10">
					<select id="taskCategoryText" class="form-control">';
						 
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
					<input id="taskNameText" type="text" class="form-control" placeholder="Task Name">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Start Date/Time:</label>
				<div class="col-sm-10">
					<input id="taskStartDateText" type="text" class="form-control" placeholder="Start Date/Time" value="'; echo date("Y-m-d H:i:s"); echo '">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">End Date/Time:</label>
				<div class="col-sm-10">
				<input id="taskEndDateText" type="text" class="form-control" placeholder="End Date/Time" value="'; echo date("Y-m-d H:i:s"); echo '">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Task Status:</label>
				<div class="col-sm-10">
					<select id="eventStatusText" class="form-control">';
						 
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
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button class="btn btn-default" onclick="insertTaskData()">Add task</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>';
		$conn->close();
?>