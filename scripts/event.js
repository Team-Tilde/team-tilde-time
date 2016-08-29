var noteCounter = 1;

$('#addEventModal').on('hidden.bs.modal', function () {
    noteCounter = 1;
})

$('#editEventModal').on('hidden.bs.modal', function () {
    noteCounter = 1;
})

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
	
	/*
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

*/

///Creates a reference to eventNotesDiv
var eventNotesDiv = document.getElementById("eventNotesDiv");

///Get all event notes textareas to put it in an array.
var eventnotes = eventNotesDiv.querySelectorAll(".event-notes-text");

///Get all event notes checkboxes to put it in an array.
var eventnotescheckbox = eventNotesDiv.querySelectorAll(".event-notes-checkbox");

///Create an array to store the related data needed to create the JSON.
///The JSON data is related to the event notes.
var notesArray = [];

///The for loop is needed to go through each of the event notes textarea.
///A variable isPublic is used to determine the checked status of the checkboxes.
///The database uses 0 and 1 to determine if the variable is public or not.
///If statement is used to assign checked=true=1 and notChecked=false=0.
///Since the event notes textareas and checkboxes related are the same count, the same
///loop is used.
///The notesArray is used to store and generate an array with JSON data part for the event notes.
for (i = 0; i < eventnotes.length; i++)
{
	var isPublic = 0;
	if (eventnotescheckbox[i].checked) {isPublic = 1;} else {isPublic = 0}
	notesArray.push({"description":eventnotes[i].value, "public":isPublic});
}

///Create a variable to store all the JSON data with the equivalent data needed to insert the data
///into the database.
///Convert the JSON into a string so that php can read it and turn it into an array.
var json = JSON.stringify(
{"data": 
	{
		"title": document.getElementById("eventTitleText").value,
		"startdate": document.getElementById("eventStartDateText").value,
		"enddate": document.getElementById("eventEndDateText").value,
		"description": document.getElementById("eventDescriptionText").value,
		"location": document.getElementById("eventLocationText").value,
		"eventcategoryid": document.getElementById("eventCategoryText").value,
		"taskeventstatusid": document.getElementById("eventStatusText").value,
		"taskid": document.getElementById("eventTaskIDText").value,
		"public": document.getElementById("eventPublicText").value,
		"eventnotes": notesArray
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
xhttp.open("POST", "insertevent.php", true);

///Set the request header to accept JSON.
xhttp.setRequestHeader("Content-type", "application/json");

///Send the json data which was stored in the json variable.
xhttp.send(json);
  
  //$('#addEventModal').modal('hide');
  //showEventsByTask(document.getElementById("selectorTask").value);
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
  /*
  var param = "title=" + document.getElementById("eventTitleText").value + "&"
				+ "startdate=" + document.getElementById("eventStartDateText").value + "&"
				+ "enddate=" + document.getElementById("eventEndDateText").value + "&"
				+ "description=" + document.getElementById("eventDescriptionText").value + "&"
				+ "location=" + document.getElementById("eventLocationText").value + "&"
				+ "eventcategoryid=" + document.getElementById("eventCategoryText").value + "&"
				+ "taskid=" + document.getElementById("eventTaskIDText").value + "&"
				+ "public=" + document.getElementById("eventPublicText").value + "&"
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
  */
  
if (eventID == "") {
	document.getElementById("editEventModalPlaceholder").innerHTML = "";
	return;
  }
  
///Creates a reference to eventNotesDiv
var eventNotesDiv = document.getElementById("editEventNotesDiv");

///Get all event notes textareas to put it in an array.
var eventnotes = eventNotesDiv.querySelectorAll(".event-notes-text");

///Get all event notes checkboxes to put it in an array.
var eventnotescheckbox = eventNotesDiv.querySelectorAll(".event-notes-checkbox");

///Create an array to store the related data needed to create the JSON.
///The JSON data is related to the event notes.
var notesArray = [];

///The for loop is needed to go through each of the event notes textarea.
///A variable isPublic is used to determine the checked status of the checkboxes.
///The database uses 0 and 1 to determine if the variable is public or not.
///If statement is used to assign checked=true=1 and notChecked=false=0.
///Since the event notes textareas and checkboxes related are the same count, the same
///loop is used.
///The notesArray is used to store and generate an array with JSON data part for the event notes.
for (i = 0; i < eventnotes.length; i++)
{
	var isPublic = 0;
	if (eventnotescheckbox[i].checked) {isPublic = 1;} else {isPublic = 0}
	notesArray.push({"description":eventnotes[i].value, "public":isPublic});
}

///Create a variable to store all the JSON data with the equivalent data needed to insert the data
///into the database.
///Convert the JSON into a string so that php can read it and turn it into an array.
var json = JSON.stringify(
{"data": 
	{
		"title": document.getElementById("editEventTitleText").value,
		"startdate": document.getElementById("editEventStartDateText").value,
		"enddate": document.getElementById("editEventEndDateText").value,
		"description": document.getElementById("editEventDescriptionText").value,
		"location": document.getElementById("editEventLocationText").value,
		"eventcategoryid": document.getElementById("editEventCategoryText").value,
		"taskeventstatusid": document.getElementById("editEventStatusText").value,
		"taskid": document.getElementById("editEventTaskIDText").value,
		"public": document.getElementById("editEventPublicText").value,
		"eventid": eventID,
		"eventnotes": notesArray
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
xhttp.open("POST", "updateevent.php", true);

///Set the request header to accept JSON.
xhttp.setRequestHeader("Content-type", "application/json");

///Send the json data which was stored in the json variable.
xhttp.send(json);
  
  //$('#editEventModal').modal('hide');
  //showEventsByTask(document.getElementById("selectorTask").value);
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

function addEventNotes() {
	
	///Increase counter by 1 at start since there's a default textarea for a note when adding.
	noteCounter++;
	
	///Creates a reference to the div containing the event notes.
	var eventNotesDiv = document.getElementById("eventNotesDiv");
	
	///Create a div to contain all the elements.
	var div = document.createElement("div");
	
	///Create a textarea for each of the notes.
	///Note textarea set to align with other form elements with the class form-control
	///Note textarea also uses class event-notes-text to use querySelectorAll to grab all
	///textarea related to event notes.
	///Note textarea set to 3 with placeholder message as note number.
	var ta = document.createElement("textarea");
	ta.className = "form-control event-notes-text";
	ta.textContent = "";
	ta.rows = 3;
	ta.placeholder = "Note " + noteCounter;
	
	///Create a div to contain the checkbox and its label.
	var cbDiv = document.createElement("div");
	
	///Create an input that is typed checkbox.
	///Note checkbox will use the class event-notes-checkbox to use querySelectorAll to grab all
	///checkboxes related to event notes.
	var cb = document.createElement("input");
	cb.className = "event-notes-checkbox";
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
	eventNotesDiv.appendChild(div);
}

function addEditEventNotes() {
	
	///Creates a reference to the div containing the event notes.
	var eventNotesDiv = document.getElementById("editEventNotesDiv");
	
	///Create a div to contain all the elements.
	var div = document.createElement("div");
	
	///Create a textarea for each of the notes.
	///Note textarea set to align with other form elements with the class form-control
	///Note textarea also uses class event-notes-text to use querySelectorAll to grab all
	///textarea related to event notes.
	///Note textarea set to 3 with placeholder message as note number.
	var ta = document.createElement("textarea");
	ta.className = "form-control event-notes-text";
	ta.textContent = "";
	ta.rows = 3;
	ta.placeholder = "New Note " + noteCounter;
	
	///Create a div to contain the checkbox and its label.
	var cbDiv = document.createElement("div");
	
	///Create an input that is typed checkbox.
	///Note checkbox will use the class event-notes-checkbox to use querySelectorAll to grab all
	///checkboxes related to event notes.
	var cb = document.createElement("input");
	cb.className = "event-notes-checkbox";
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
	eventNotesDiv.appendChild(div);
	
	///Increase counter by 1 at end since adding new notes.
	noteCounter++;
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

function checkTimeConflict() {
	var collideSection = document.getElementById("collideSection");
	var collideOut = document.getElementById("eventCollideOut");
	var timeStart = document.getElementById("eventStartDateText");
	var timeEnd = document.getElementById("eventEndDateText");
	var queryData;
	
	$.ajax({
		method: "POST",
		url: "php/calendarquery.php",
		data: {"timeStart": timeStart.value, "timeEnd": timeEnd.value},
		success: function(data) {
			if(data != null) {
				queryData = data;
			} 
		},
		error: function(object, status, errorThrow) {
			console.log(status + " " + errorThrow);
		},
		complete: function(jqXHR, textStatus) {
			collideSection.className = "form-group hidden";
			collideOut.innerHTML = "";
			
			if(queryData != null) {
				collideSection.className = "form-group";
				var out;
				out = "<p>The following events were found to collide with your schedule:</p>\n";
				for(var i = 0; i < queryData.length; ++i) {
					out += "<p>ID: " + queryData[i].event_id;
					out += " Title: " + queryData[i].title;
					out += "<br>\n Description: " + queryData[i].description;
					out += "<br>\n Start Date: " + queryData[i].date_time_start;
					out += "<br>\n End Date: " + queryData[i].date_time_end + "</p>\n";
				}
				collideOut.innerHTML += out;
			}
		},
		dataType: "json"
	});
}