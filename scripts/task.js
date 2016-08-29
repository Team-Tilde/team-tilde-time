var noteCounter = 1;

$('#addTaskModal').on('hidden.bs.modal', function () {
    noteCounter = 1;
})

$('#editTaskModal').on('hidden.bs.modal', function () {
    noteCounter = 1;
})

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
	
	/*
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
  */
  
  ///Creates a reference to taskNotesDiv
var taskNotesDiv = document.getElementById("addTaskNotesDiv");

///Get all task notes textareas to put it in an array.
var tasknotes = taskNotesDiv.querySelectorAll(".task-notes-text");

///Get all task notes checkboxes to put it in an array.
var tasknotescheckbox = taskNotesDiv.querySelectorAll(".task-notes-checkbox");

///Create an array to store the related data needed to create the JSON.
///The JSON data is related to the task notes.
var notesArray = [];

///The for loop is needed to go through each of the event notes textarea.
///A variable isPublic is used to determine the checked status of the checkboxes.
///The database uses 0 and 1 to determine if the variable is public or not.
///If statement is used to assign checked=true=1 and notChecked=false=0.
///Since the event notes textareas and checkboxes related are the same count, the same
///loop is used.
///The notesArray is used to store and generate an array with JSON data part for the event notes.
for (i = 0; i < tasknotes.length; i++)
{
	var isPublic = 0;
	if (tasknotescheckbox[i].checked) {isPublic = 1;} else {isPublic = 0}
	notesArray.push({"description":tasknotes[i].value, "public":isPublic});
}

///Create a variable to store all the JSON data with the equivalent data needed to insert the data
///into the database.
///Convert the JSON into a string so that php can read it and turn it into an array.
var json = JSON.stringify(
{"data": 
	{
		"taskcategoryid": document.getElementById("addTaskCategoryText").value,
		"description": document.getElementById("addTaskNameText").value,
		"startdate": document.getElementById("addTaskStartDateText").value,
		"enddate": document.getElementById("addTaskEndDateText").value,
		"taskeventstatusid": document.getElementById("addTaskStatusText").value,
		"tasknotes": notesArray
	}
});

//Remember to comment this when not using.
//alert(JSON.stringify(json)); //To test the JSON data as being made properly.

///Creates a variable and store the new AJAX request
var xhttp = new XMLHttpRequest();

///Attach to the ready state change event handler an anonymous function.
xhttp.onreadystatechange = function() {
	
	///Check if the state is ready and nothing went wrong with the request
	if (xhttp.readyState == 4 && xhttp.status == 200) {
		
		alert(xhttp.responseText);
		
		/*
		if (xhttp.responseText == "0")
		{
			alert("Success Adding!");
			document.forms['addEventForm'].reset();
		}
		else
		{
			alert("Failed Adding!");
		}
		*/
		
		}
	};

///Open up the request page through post. It will be done asynchronously.
xhttp.open("POST", "inserttask.php", true);

///Set the request header to accept JSON.
xhttp.setRequestHeader("Content-type", "application/json");

///Send the json data which was stored in the json variable.
xhttp.send(json);
  
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
  
  /*
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
  */
  
  if (taskID == "") {
	document.getElementById("editTaskModalPlaceholder").innerHTML = "";
	return;
  }
  
///Creates a reference to taskNotesDiv
var taskNotesDiv = document.getElementById("editTaskNotesDiv");

///Get all task notes textareas to put it in an array.
var tasknotes = taskNotesDiv.querySelectorAll(".task-notes-text");

///Get all task notes checkboxes to put it in an array.
var tasknotescheckbox = taskNotesDiv.querySelectorAll(".task-notes-checkbox");

///Create an array to store the related data needed to create the JSON.
///The JSON data is related to the task notes.
var notesArray = [];

///The for loop is needed to go through each of the task notes textarea.
///A variable isPublic is used to determine the checked status of the checkboxes.
///The database uses 0 and 1 to determine if the variable is public or not.
///If statement is used to assign checked=true=1 and notChecked=false=0.
///Since the task notes textareas and checkboxes related are the same count, the same
///loop is used.
///The notesArray is used to store and generate an array with JSON data part for the task notes.
for (i = 0; i < tasknotes.length; i++)
{
	var isPublic = 0;
	if (tasknotescheckbox[i].checked) {isPublic = 1;} else {isPublic = 0}
	notesArray.push({"description":tasknotes[i].value, "public":isPublic});
}

///Create a variable to store all the JSON data with the equivalent data needed to insert the data
///into the database.
///Convert the JSON into a string so that php can read it and turn it into an array.
var json = JSON.stringify(
{"data": 
	{
		"taskcategoryid": document.getElementById("editTaskCategoryText").value,
		"description": document.getElementById("editTaskDescriptionText").value,
		"startdate": document.getElementById("editTaskStartDateText").value,
		"enddate": document.getElementById("editTaskEndDateText").value,
		"taskeventstatusid": document.getElementById("editTaskStatusText").value,
		"taskid": taskID,
		"tasknotes": notesArray
	}
});

//Remember to comment this when not using.
//alert(JSON.stringify(json)); //To test the JSON data as being made properly.

///Creates a variable and store the new AJAX request
var xhttp = new XMLHttpRequest();

///Attach to the ready state change event handler an anonymous function.
xhttp.onreadystatechange = function() {
	
	///Check if the state is ready and nothing went wrong with the request
	if (xhttp.readyState == 4 && xhttp.status == 200) {
		
		alert(xhttp.responseText);
		
		/*
		if (xhttp.responseText == "0")
		{
			alert("Success Adding!");
			document.forms['addEventForm'].reset();
		}
		else
		{
			alert("Failed Adding!");
		}
		*/
		
		}
	};

///Open up the request page through post. It will be done asynchronously.
xhttp.open("POST", "updatetask.php", true);

///Set the request header to accept JSON.
xhttp.setRequestHeader("Content-type", "application/json");

///Send the json data which was stored in the json variable.
xhttp.send(json);
  
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

function addTaskNotes() {
	
	///Increase counter by 1 at start since there's a default textarea for a note when adding.
	noteCounter++;
	
	///Creates a reference to the div containing the event notes.
	var taskNotesDiv = document.getElementById("addTaskNotesDiv");
	
	///Create a div to contain all the elements.
	var div = document.createElement("div");
	
	///Create a textarea for each of the notes.
	///Note textarea set to align with other form elements with the class form-control
	///Note textarea also uses class event-notes-text to use querySelectorAll to grab all
	///textarea related to event notes.
	///Note textarea set to 3 with placeholder message as note number.
	var ta = document.createElement("textarea");
	ta.className = "form-control task-notes-text";
	ta.textContent = "";
	ta.rows = 3;
	ta.placeholder = "Note " + noteCounter;
	
	///Create a div to contain the checkbox and its label.
	var cbDiv = document.createElement("div");
	
	///Create an input that is typed checkbox.
	///Note checkbox will use the class event-notes-checkbox to use querySelectorAll to grab all
	///checkboxes related to event notes.
	var cb = document.createElement("input");
	cb.className = "task-notes-checkbox";
	cb.type = "checkbox";
	cb.value = "";
	
	///Create a label and set the text to Public.
	var cbLabel = document.createElement("label");
	cbLabel.textContent = "Public";
	
	///Append to the checkbox div the elements input type checkbox and its label.
	cbDiv.appendChild(cb);
	cbDiv.appendChild(cbLabel);
	
	///Append to the div the elements text area and check box div container.
	div.appendChild(ta);
	div.appendChild(cbDiv);
	
	///Append the whole div containing all the elements to eventNotes div.
	taskNotesDiv.appendChild(div);
}

function addEditTaskNotes() {
	
	///Creates a reference to the div containing the event notes.
	var taskNotesDiv = document.getElementById("editTaskNotesDiv");
	
	///Create a div to contain all the elements.
	var div = document.createElement("div");
	
	///Create a textarea for each of the notes.
	///Note textarea set to align with other form elements with the class form-control
	///Note textarea also uses class event-notes-text to use querySelectorAll to grab all
	///textarea related to event notes.
	///Note textarea set to 3 with placeholder message as note number.
	var ta = document.createElement("textarea");
	ta.className = "form-control task-notes-text";
	ta.textContent = "";
	ta.rows = 3;
	ta.placeholder = "New Note " + noteCounter;
	
	///Create a div to contain the checkbox and its label.
	var cbDiv = document.createElement("div");
	
	///Create an input that is typed checkbox.
	///Note checkbox will use the class event-notes-checkbox to use querySelectorAll to grab all
	///checkboxes related to event notes.
	var cb = document.createElement("input");
	cb.className = "task-notes-checkbox";
	cb.type = "checkbox";
	cb.value = "";
	
	///Create a label and set the text to Public.
	var cbLabel = document.createElement("label");
	cbLabel.textContent = "Public";
	
	///Append to the checkbox div the elements input type checkbox and its label.
	cbDiv.appendChild(cb);
	cbDiv.appendChild(cbLabel);
	
	///Append to the div the elements text area and check box div container.
	div.appendChild(ta);
	div.appendChild(cbDiv);
	
	///Append the whole div containing all the elements to eventNotes div.
	taskNotesDiv.appendChild(div);
	
	///Increase counter by 1 at end since adding new notes.
	noteCounter++;
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