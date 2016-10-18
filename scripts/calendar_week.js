var _date;
var _format = 'dddd, Do MMMM YYYY';
//var year = new Date().getYear();
//var month = new Date().getMonth() + 1;
//var day = new Date().getDate();

function dt() {
	$(function () {
		$('#date').datetimepicker({
			inline: true,
			sideBySide: false,
			defaultDate: _date
		});
		
		$('#date').on("dp.change", function (e) {
			_date = $('#date').data('DateTimePicker').date();
			$('#dateval').text(_date.format(_format));
			$('[data-toggle="popover"]').blur();
			$('[data-toggle="popover"]').popover("hide");
			CalendarTable();
		});
	
	});

}


function dateInit() {
	_date = moment();
	$('#dateval').text(_date.format(_format));
}

$(document).ready(function(){
    $('[data-toggle="popover"]').popover({
		html: true,
		content: "<div id=\"date\"></div><script>dt();<\/script>" // Embedded end script element breaks js, remember to split it.
	});
});

function dateSet(rewind) {
	if(rewind) {
		_date.subtract(7, 'day');
		CalendarTable();
		
	} else {
		_date.add(7, 'day');

		CalendarTable();

	}
	$('#dateval').text(_date.format(_format));
	

}

function loadWeekView() {
	dateInit();

}

	var monday;
	var tuesday;
	var wednesday;
	var thursday;
	var friday;
	var saturday;
	var sunday;
	var allDates;
	var str;
	var currYear;
	var yearHolder;
	
 	function CalendarTable(){
		
		currYear = new Date(_date).getYear();
		yearHolder = "20" + currYear.toString().substr(1);
		year = parseInt(yearHolder);
		var selectedDay = _date._d;

		function getMonday(d) {
		  d = new Date(d);
		  var day = d.getDay(),
			  diff = diff = d.getDate() - day + (day == 0 ? -6:1); // adjust when day is sunday
		  return new Date(d.setDate(diff));
		}

		function getTuesday(d) {
		  d = new Date(d);
		  var day = d.getDay(),
			  diff = d.getDate() - day + (day == 0 ? -5:2); // adjust when day is sunday
		  return new Date(d.setDate(diff));
		}

		function getWednesday(d) {
		  d = new Date(d);
		  var day = d.getDay(),
			  diff = d.getDate() - day + (day == 0 ? -4:3); // adjust when day is sunday
		  return new Date(d.setDate(diff));
		}

		function getThursday(d) {
		  d = new Date(d);
		  var day = d.getDay(),
			  diff = d.getDate() - day + (day == 0 ? -3:4); // adjust when day is sunday
		  return new Date(d.setDate(diff));
		}

		function getFriday(d) {
		  d = new Date(d);
		  var day = d.getDay(),
			  diff = d.getDate() - day + (day == 0 ? -2:5); // adjust when day is sunday
		  return new Date(d.setDate(diff));
		}

		function getSaturday(d) {
		  d = new Date(d);
		  var day = d.getDay(),
			  diff = d.getDate() - day + (day == 0 ? -1:6); // adjust when day is sunday
		  return new Date(d.setDate(diff));
		}

		function getSunday(d) {
		  d = new Date(d);
		  var day = d.getDay(),
			  diff = d.getDate() - day + (day == 0 ? 0:7); // adjust when day is sunday
		  return new Date(d.setDate(diff));
		}

		
		monday = getMonday(selectedDay);
		tuesday = getTuesday(selectedDay);
		wednesday = getWednesday(selectedDay);
		thursday = getThursday(selectedDay);
		friday = getFriday(selectedDay);
		saturday = getSaturday(selectedDay);
		sunday = getSunday(selectedDay);
		
		var div = document.getElementById('weekView');
		

		div.innerHTML = "<h4><strong>Monday "+monday.getDate()+"/"+(monday.getMonth()+1)+"</strong></h4>";
		div.innerHTML += "<div id='"+monday.getDate()+"/"+(monday.getMonth()+1)+"'  class='well'>No Events</div>";
		
		div.innerHTML += "<h4><strong>Tuesday "+tuesday.getDate()+"/"+(tuesday.getMonth()+1)+"</strong></h4>";
		div.innerHTML += "<div id='"+tuesday.getDate()+"/"+(tuesday.getMonth()+1)+"'  class='well'>No Events</div>";
		
		div.innerHTML += "<h4><strong>Wednesday "+wednesday.getDate()+"/"+(wednesday.getMonth()+1)+"</strong></h4>";
		div.innerHTML += "<div id='"+wednesday.getDate()+"/"+(wednesday.getMonth()+1)+"'  class='well'>No Events</div>";
		
		div.innerHTML += "<h4 ><strong>Thursday "+thursday.getDate()+"/"+(thursday.getMonth()+1)+"</strong></h4>";
		div.innerHTML += "<div id='"+thursday.getDate()+"/"+(thursday.getMonth()+1)+"'  class='well'>No Events</div>";
								
		div.innerHTML += "<h4><strong>Friday "+friday.getDate()+"/"+(friday.getMonth()+1)+"</strong></h4>"			
		div.innerHTML += "<div id='"+friday.getDate()+"/"+(friday.getMonth()+1)+"'  class='well'>No Events</div>"			
				
		div.innerHTML += "<h4><strong>Saturday "+saturday.getDate()+"/"+(saturday.getMonth()+1)+"</strong></h4>"			
		div.innerHTML += "<div id='"+saturday.getDate()+"/"+(saturday.getMonth()+1)+"'  class='well'>No Events</div>"			
				
		div.innerHTML += "<h4><strong>Sunday "+sunday.getDate()+"/"+(sunday.getMonth()+1)+"</strong></h4>"			
		div.innerHTML += "<div id='"+sunday.getDate()+"/"+(sunday.getMonth())+"'  class='well'>No Events</div>"			
		div.innerHTML += "<div id='eventData'></div>"
		allDates = [monday, tuesday, wednesday, thursday, friday, saturday, sunday];		
		getEvents();			
	}
		
	function hasEvent(date, passedMonth){

		if(passedMonth.toString().charAt(0) === '0'){
			passedMonth = passedMonth.substr(1);
		}
		var thisDay = date + "/" +passedMonth;

		var dayToAdd = document.getElementById(thisDay);
		if(dayToAdd){

		dayToAdd.innerHTML = showEventsByDate(date , passedMonth);
	}
	}

	function myFunction(item) {
	
		var month = item.getDate();

		
		
		
		if( month.toString().length == 1){
			useMonth = "0"+ item.getMonth();;

		}
		else{
			useMonth = month;
		}
		

	}			
	
	function getEvents(){
		var s;
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

				var return_data = xmlhttp.responseText;
				//decodes JSON file
				var parsed = JSON.parse(return_data);

									
				for (var x = 0; x < parsed.length; x++){

					str = parsed[x].date_time_start;
					var month = monday.getMonth()+1;

					
					
					
					if( month.toString().length == 1){
						useMonth = "0"+ (monday.getMonth() + 1);

					}
					else{
						useMonth = month;
					}
					

					var res = str.substr(8, 2);

					if (str.indexOf(yearHolder +"-"+useMonth) >= 0) {
						if(res >= monday.getDate() && res <= sunday.getDate()){
							var s = res;
						while(s.charAt(0) === '0'){
							s = s.substr(1);
						}
						hasEvent(s,  useMonth);
						}
					}
					else if(str.indexOf(yearHolder +"-"+(useMonth +1)) >= 0){
						var monthToSend = useMonth +1;
						if(res >= monday.getDate() && res <= sunday.getDate()){
							var s = res;
						while(s.charAt(0) === '0'){
							s = s.substr(1);
						}
						hasEvent(s,  monthToSend);
						}
						
					}
				}
			}
			};
		xmlhttp.open("GET", "calendarMonthAPI.php" , true);
		xmlhttp.send();
	}
						
			
			
	function showEventsByDate(date, passedMonth) {
	  var xhttp;    
	  if (date == "") {
		document.getElementById(date).innerHTML = "";
		return;
	  }
	  var tDate = date;

	  xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
		  document.getElementById(date + "/" +passedMonth).innerHTML = xhttp.responseText;
		}
	  };
		
		

		
		var newDate= yearHolder+"-"+passedMonth+"-"+tDate;
		console.log(newDate);
		xhttp.open("GET", "showEventsWeek.php?task="+newDate, true);
		xhttp.send();	}