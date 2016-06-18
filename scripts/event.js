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
				+ "eventcategoryid=" + document.getElementById("eventCategoryText").value + "&"
				+ "taskeventstatusid=" + document.getElementById("eventStatusText").value + "&"
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
				+ "eventcategoryid=" + document.getElementById("eventCategoryText").value + "&"
				+ "taskid=" + document.getElementById("eventTaskIDText").value + "&"
				+ "public=" + document.getElementById("eventPublicText").value + "&"
				+ "private=" + document.getElementById("eventPrivateText").value + "&"
				+ "taskeventstatusid=" + document.getElementById("eventStatusText").value + "&"
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