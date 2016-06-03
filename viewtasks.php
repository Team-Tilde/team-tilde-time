<?php
	require_once "php/conf.php";
?>
<html>

<head>
	<title>View Tasks</title>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php
	session_start();
	require_once "php/auth.php";
	require_login();
	?>
	<div class="container">
		<?php
			require_once "php/nav.php";
		?>
		<label>Select task:</label><select id="selectorTask" class='form-control' onchange='showTasksByTask(this.value)'>
		<option value='0'>Select a task:</option>
		<?php
			$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
			
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
		
			$sql = "SELECT task_id, description FROM Task";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<option value='" . $row['task_id'] . "'>" . $row['description'] . "</option>";
				}
			} else {
				echo "No task found.";
			}
			
			echo "</select>";
			
			$conn->close();
		?>
		<div id="taskData"></div>
	</div>
	
	<script>
	function showTasksByTask(taskID) {
	  var xhttp;    
	  if (taskID == "") {
		document.getElementById("taskData").innerHTML = "";
		return;
	  }
	  xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
		  document.getElementById("taskData").innerHTML = xhttp.responseText;
		}
	  };
	  xhttp.open("GET", "showtasks.php?task="+taskID, true);
	  xhttp.send();
	}
	
	function showTaskDetails(taskID) {
	  var xhttp;    
	  if (taskID == "") {
		document.getElementById("taskDetail").innerHTML = "";
		return;
	  }
	  xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
		  document.getElementById("taskDetail").innerHTML = xhttp.responseText;
		}
	  };
	  xhttp.open("GET", "detailtask.php?task="+taskID, true);
	  xhttp.send();
	  $('#taskDetailModal').modal('show');
	}
	
	function showAddTaskModal() {
	  var xhttp;    
	  xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
		  document.getElementById("addTaskModalPlaceholder").innerHTML = xhttp.responseText;
		}
	  };
	  xhttp.open("POST", "addtask.php", true);
	  xhttp.send();
	  $('#addTaskModal').modal('show');
	}
	
	function insertTaskData() {
		var param = "title=" + document.getElementById("taskTitleText").value + "&"
					+ "startdate=" + document.getElementById("taskStartDateText").value + "&"
					+ "enddate=" + document.getElementById("taskEndDateText").value + "&"
					+ "description=" + document.getElementById("taskDescriptionText").value + "&"
					+ "taskid=" + document.getElementById("taskTaskIDText").value;
	  var xhttp;
	  xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			if (xhttp.responseText == "0")
			{
				alert("Success Adding!");
				document.forms['addTaskForm'].reset();
			}
			else
			{
				alert("Failed Adding!");
			}
			
		}
	  };
	  xhttp.open("POST", "inserttask.php", true);
	  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  xhttp.send(param);
	  $('#addTaskModal').modal('hide');
	  showTasksByTask(document.getElementById("selectorTask").value);
	}
	
	function showEditTaskModal(taskID) {
	  var xhttp;    
	  if (taskID == "") {
		document.getElementById("editTaskModalPlaceholder").innerHTML = "";
		return;
	  }
	  xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
		  document.getElementById("editTaskModalPlaceholder").innerHTML = xhttp.responseText;
		}
	  };
	  xhttp.open("GET", "edittask.php?task="+taskID, true);
	  xhttp.send();
	  $('#editTaskModal').modal('show');
	}
	
	function editTaskData(taskID) {
		if (taskID == "") {
		document.getElementById("editTaskModalPlaceholder").innerHTML = "";
		return;
	  }
	  var param = "title=" + document.getElementById("taskTitleText").value + "&"
					+ "startdate=" + document.getElementById("taskStartDateText").value + "&"
					+ "enddate=" + document.getElementById("taskEndDateText").value + "&"
					+ "description=" + document.getElementById("taskDescriptionText").value + "&"
					+ "taskid=" + document.getElementById("taskTaskIDText").value + "&"
					+ "public=" + document.getElementById("taskPublicText").value + "&"
					+ "private=" + document.getElementById("taskPrivateText").value + "&"
					+ "taskid=" + taskID;
	  var xhttp;
	  xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			if (xhttp.responseText == "0")
			{
				alert("Success Updating!");
			}
			else
			{
				alert("Failed Updating!");
			}
			
		}
	  };
	  xhttp.open("POST", "updatetask.php", true);
	  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  xhttp.send(param);
	  $('#editTaskModal').modal('hide');
	  showTasksByTask(document.getElementById("selectorTask").value);
	}
	
	function showDeleteTaskModal(taskID) {
	  var xhttp;    
	  if (taskID == "") {
		document.getElementById("deleteTaskModalPlaceholder").innerHTML = "";
		return;
	  }
	  xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
		  document.getElementById("deleteTaskModalPlaceholder").innerHTML = xhttp.responseText;
		}
	  };
	  xhttp.open("GET", "deletetaskmodal.php?task="+taskID, true);
	  xhttp.send();
	  $('#deleteTaskModal').modal('show');
	}
	
	function deleteTask(taskID) {
		
		var xhttp;    
		  if (taskID == "") {
			return;
		  }
		  xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
			  if (xhttp.responseText == "0")
				{
					alert("Success Deleting!");
				}
				else
				{
					alert("Failed Deleting!" + xhttp.responseText);
				}
			}
		  };
		  xhttp.open("GET", "deletetask.php?task="+taskID, true);
		  xhttp.send();
		  showTasksByTask(document.getElementById("selectorTask").value);	  
		  $('#deleteTaskModal').modal('hide');
	}
	
	function checkAll() {
		var checkBoxAll = document.getElementById("checkSelectAll");
		var tableRef = document.getElementById("tableTasks");
		var checkBox = tableRef.querySelectorAll(".checkSelect");
			if (checkBoxAll.checked) {
				for (var i = 0; i < checkBox.length; i++)
				{
					checkBox[i].checked = true;
				}
			}
			else {
				for (var i = 0; i < checkBox.length; i++)
				{
					checkBox[i].checked = false;
				}
			}
	}
	
	</script>
	
	
	<div id="taskDetailModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Task Details</h4>
				</div>
				<div id="taskDetail" class="modal-body">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	<div id="addTaskModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add task</h4>
				</div>
				<div class="modal-body">
					<div id="addTaskModalPlaceholder"></div>	
				</div>
			</div>
		</div>
	</div>;
	
	<div id="editTaskModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Edit task</h4>
				</div>
				<div class="modal-body">
					<div id="editTaskModalPlaceholder"></div>
				</div>
			</div>
		</div>
	</div>;
	
	<div id="deleteTaskModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Delete task</h4>
				</div>
				<div class="modal-body">
					<div id="deleteTaskModalPlaceholder"></div>
				</div>
			</div>
		</div>
	</div>;
	
	<script src="scripts/jquery-1.9.1.min.js"></script>
    <script src="scripts/bootstrap.min.js"></script>

</body>

</html>
