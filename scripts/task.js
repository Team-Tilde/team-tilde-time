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
	var param = "taskcategoryid=" + document.getElementById("taskCategoryText").value + "&"
				+ "description=" + document.getElementById("taskNameText").value + "&"
				+ "startdate=" + document.getElementById("taskStartDateText").value + "&"
				+ "enddate=" + document.getElementById("taskEndDateText").value + "&"
				+ "taskeventstatusid=" + document.getElementById("eventStatusText").value + "&";
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
  var param = "taskcategoryid=" + document.getElementById("taskCategoryText").value + "&"
				+ "description=" + document.getElementById("taskDescriptionText").value + "&"
				+ "startdate=" + document.getElementById("taskStartDateText").value + "&"
				+ "enddate=" + document.getElementById("taskEndDateText").value + "&"
				+ "taskeventstatusid=" + document.getElementById("eventStatusText").value + "&"
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