<?php
	require_once "php/conf.php";
?>
<html>

<head>
	<title>View Events</title>
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
		<label>Select task:</label><select id="selectorTask" class='form-control' onchange='showEventsByTask(this.value)'>
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
		<div id="eventData"></div>
	</div>
	
	<script>
	function showEventsByTask(taskID) {
	  var xhttp;    
	  if (taskID == "") {
		document.getElementById("eventData").innerHTML = "";
		return;
	  }
	  xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
		  document.getElementById("eventData").innerHTML = xhttp.responseText;
		}
	  };
	  xhttp.open("GET", "showevents.php?task="+taskID, true);
	  xhttp.send();
	}
	
	function showEventDetails(eventID) {
	  var xhttp;    
	  if (eventID == "") {
		document.getElementById("eventDetail").innerHTML = "";
		return;
	  }
	  xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
		  document.getElementById("eventDetail").innerHTML = xhttp.responseText;
		}
	  };
	  xhttp.open("GET", "detailevent.php?event="+eventID, true);
	  xhttp.send();
	  $('#eventDetailModal').modal('show');
	}
	
	function showAddEventModal() {
	  var xhttp;    
	  xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
		  document.getElementById("addEventModalPlaceholder").innerHTML = xhttp.responseText;
		}
	  };
	  xhttp.open("POST", "addevent.php", true);
	  xhttp.send();
	  $('#addEventModal').modal('show');
	}
	
	function insertEventData() {
		var param = "title=" + document.getElementById("eventTitleText").value + "&"
					+ "startdate=" + document.getElementById("eventStartDateText").value + "&"
					+ "enddate=" + document.getElementById("eventEndDateText").value + "&"
					+ "description=" + document.getElementById("eventDescriptionText").value + "&"
					+ "location=" + document.getElementById("eventLocationText").value + "&"
					+ "taskid=" + document.getElementById("eventTaskIDText").value + "&"
					+ "public=" + document.getElementById("eventPublicText").value + "&"
					+ "private=" + document.getElementById("eventPrivateText").value;
	  var xhttp;
	  xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			if (xhttp.responseText == "0")
			{
				alert("Success Adding!");
				document.forms['addEventForm'].reset();
			}
			else
			{
				alert("Failed Adding!");
			}
			
		}
	  };
	  xhttp.open("POST", "insertevent.php", true);
	  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  xhttp.send(param);
	  $('#addEventModal').modal('hide');
	  showEventsByTask(document.getElementById("selectorTask").value);
	}
	
	function showEditEventModal(eventID) {
	  var xhttp;    
	  if (eventID == "") {
		document.getElementById("editEventModalPlaceholder").innerHTML = "";
		return;
	  }
	  xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
		  document.getElementById("editEventModalPlaceholder").innerHTML = xhttp.responseText;
		}
	  };
	  xhttp.open("GET", "editevent.php?event="+eventID, true);
	  xhttp.send();
	  $('#editEventModal').modal('show');
	}
	
	function editEventData(eventID) {
		if (eventID == "") {
		document.getElementById("editEventModalPlaceholder").innerHTML = "";
		return;
	  }
	  var param = "title=" + document.getElementById("eventTitleText").value + "&"
					+ "startdate=" + document.getElementById("eventStartDateText").value + "&"
					+ "enddate=" + document.getElementById("eventEndDateText").value + "&"
					+ "description=" + document.getElementById("eventDescriptionText").value + "&"
					+ "location=" + document.getElementById("eventLocationText").value + "&"
					+ "taskid=" + document.getElementById("eventTaskIDText").value + "&"
					+ "public=" + document.getElementById("eventPublicText").value + "&"
					+ "private=" + document.getElementById("eventPrivateText").value + "&"
					+ "eventid=" + eventID;
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
	  xhttp.open("POST", "updateevent.php", true);
	  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  xhttp.send(param);
	  $('#editEventModal').modal('hide');
	  showEventsByTask(document.getElementById("selectorTask").value);
	}
	
	function showDeleteEventModal(eventID) {
	  var xhttp;    
	  if (eventID == "") {
		document.getElementById("deleteEventModalPlaceholder").innerHTML = "";
		return;
	  }
	  xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
		  document.getElementById("deleteEventModalPlaceholder").innerHTML = xhttp.responseText;
		}
	  };
	  xhttp.open("GET", "deleteeventmodal.php?event="+eventID, true);
	  xhttp.send();
	  $('#deleteEventModal').modal('show');
	}
	
	function deleteEvent(eventID) {
		
		var xhttp;    
		  if (eventID == "") {
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
		  xhttp.open("GET", "deleteevent.php?event="+eventID, true);
		  xhttp.send();
		  showEventsByTask(document.getElementById("selectorTask").value);	  
		  $('#deleteEventModal').modal('hide');
	}
	
	function checkAll() {
		var checkBoxAll = document.getElementById("checkSelectAll");
		var tableRef = document.getElementById("tableEvents");
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
	
	
	<div id="eventDetailModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Event Details</h4>
				</div>
				<div id="eventDetail" class="modal-body">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	<div id="addEventModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add event</h4>
				</div>
				<div class="modal-body">
					<div id="addEventModalPlaceholder"></div>	
				</div>
			</div>
		</div>
	</div>;
	
	<div id="editEventModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Edit event</h4>
				</div>
				<div class="modal-body">
					<div id="editEventModalPlaceholder"></div>
				</div>
			</div>
		</div>
	</div>;
	
	<div id="deleteEventModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Delete event</h4>
				</div>
				<div class="modal-body">
					<div id="deleteEventModalPlaceholder"></div>
				</div>
			</div>
		</div>
	</div>;
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>