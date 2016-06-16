<?php
	session_start();
	require_once "php/auth.php";
	require_login();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Month View</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	<link href="css/nav.css" rel="stylesheet">
</head>
<body>	
	<script src="scripts/jquery-1.9.1.min.js"></script>
	<script src="scripts/bootstrap.min.js"></script>
	
	<div class="container">
		<?php
			require_once "php/nav.php";
		?>
	</div>

	<script>
	$(document).ready(function(){
		$('[data-toggle="popover"]').popover();
	});
	</script>

	<div class="container-fluid" id="day_container">
		<div class="row" id="day_header">
			<div class="col-md-1"><span class="glyphicon glyphicon-menu-left"></span></div>
			<div class="col-md-10">
				<a href="#" data-toggle="popover" title="Date Selector" data-placement="bottom" data-trigger="focus" data-content="Date Selector placeholder">
					<h4>May 2016</h4>
				</a>
			</div>
			<div class="col-md-1"><span class="glyphicon glyphicon-menu-right"></span></div>
		</div>

		<div class="row table-bordered" id="day_table">
			<div id ="monthView">
				  
			</div>
			
			<div id="eventData">
				
			</div>
		</div>
	</div>
	
	<script> 
 	
			function CalendarTable(){

			var div = document.getElementById('monthView');
			
			div.innerHTML = "<table  class='table' id='clndr'><tr><th>Monday</th><th>Tuesday</th><th>Wednesday</th><th>Thursday</th><th>Friday</th><th>Saturday</th><th>Sunday</th></tr></table>";
			 var table = div.getElementsByTagName('tbody')[0];
				//creates rows and cell to be added to table
				var days = 0;
				function calDays(){
				if(days > -1 && days <31){
					days++;
					}
				else{
				
				days = 1
					return 1;
				}
				
				return days;
				}
				
				for(var i = 1; i<=5;i++){
					var row = table.insertRow(i);
					var cell1 = row.insertCell(0);
					var cell2 = row.insertCell(1);
					var cell3 = row.insertCell(2);
					var cell4 = row.insertCell(3);
					var cell5 = row.insertCell(4);
					var cell6 = row.insertCell(5);
					var cell7 = row.insertCell(6);
					
					cell1.setAttribute("id",calDays());
					cell2.setAttribute("id",calDays());
					cell3.setAttribute("id",calDays());
					cell4.setAttribute("id",calDays());
					cell5.setAttribute("id",calDays());
					cell6.setAttribute("id",calDays());
					cell7.setAttribute("id",calDays());
					cell1.innerHTML = cell1.getAttribute("id") + "<div id='"+cell1.getAttribute("id")+"/5'></div>";
					cell2.innerHTML = cell2.getAttribute("id") + "<div id='"+cell2.getAttribute("id")+"/5'></div>";
					cell3.innerHTML = cell3.getAttribute("id") + "<div id='"+cell3.getAttribute("id")+"/5'></div>";
					cell4.innerHTML = cell4.getAttribute("id") + "<div id='"+cell4.getAttribute("id")+"/5'></div>";
					cell5.innerHTML = cell5.getAttribute("id") + "<div id='"+cell5.getAttribute("id")+"/5'></div>";
					cell6.innerHTML = cell6.getAttribute("id") + "<div id='"+cell6.getAttribute("id")+"/5'></div>";
					cell7.innerHTML = cell7.getAttribute("id") + "<div id='"+cell7.getAttribute("id")+"/5'></div>";

				}

			}
			function hasEvent(date){
				var thisDay = date +"/5";
				var dayToAdd = document.getElementById(thisDay);
				console.log(dayToAdd);
				dayToAdd.innerHTML = "<button onclick= 'showEventsByDate(this.parentNode.parentNode.id)'>Events</button>";
			}
			
			CalendarTable();
			

			function getEvents(){
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

						var return_data = xmlhttp.responseText;
						//decodes JSON file
						var parsed = JSON.parse(return_data);
						console.log(parsed);
						
						for (var x = 0; x < parsed.length; x++){
							console.log(parsed[x].date_time_start);
							var str = parsed[x].date_time_start;
							if (str.indexOf("2016-05") >= 0){
								var res = str.substr(8, 2);
								
								var s = res;
								while(s.charAt(0) === '0'){
									s = s.substr(1);
								}
								console.log(s);
								hasEvent(s);
								
							}
						}						
						
					}
					};
				xmlhttp.open("GET", "calendarMonthAPI.php" , true);
				xmlhttp.send();
			}
			getEvents();
			
			
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////			
			
			
			
				function showEventsByDate(date) {
	  var xhttp;    
	  if (date == "") {
		document.getElementById("eventData").innerHTML = "";
		return;
	  }
	  xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
		  document.getElementById("eventData").innerHTML = xhttp.responseText;
		}
	  };
		if( date.length == 1){
		date = "0"+date;
		}
		
		var newDate= "2016-05-"+date;
		console.log(newDate);
		xhttp.open("GET", "showEventsMonth.php?task="+newDate, true);
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
</body>
</html>
