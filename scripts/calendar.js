var _date;
var _format = 'dddd, Do MMMM YYYY';

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
			performQuery();
			$('[data-toggle="popover"]').blur();
			$('[data-toggle="popover"]').popover("hide");
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

//-----------------------------------------------------

var canvas;
var stage;
var ctx;

// Constants
var rowHeight = 28.5;
var bgColor = "#0068a4";	// Dk.Blue color for box bg

var divWidth;				// calculated by number of 'same day' tasks
var divisions;				// if multiple events divide sections by...
var colMultiplier = 0;		// The current working task, used to position rect and text as a multiplier
var rowTimeMultiplier = 4;

var reqData; 				// event_id, title, description, date_time_start, date_time_end
var containerStore = new Array();

function draw() {
	divWidth = canvas.width() / divisions; // Temporary, figure out columns by collision

	for(var i = 0; i < reqData.length; ++i) {
		var tLength = timeCalc(reqData[i].date_time_start, reqData[i].date_time_end); 
		var objTSlot = moment(reqData[i].date_time_start, moment.ISO_8601).toObject();
		
		console.log(objTSlot['hours']);
		var tSlot = objTSlot['hours'] * 2;
		var tMinSlot = (objTSlot['minutes'] > 0) ? rowHeight : 0;
		console.log(tSlot);
		
		if(tLength != 0) {
			var container = new createjs.Container();
			containerStore.push(container);
			container.name = "event" + i;

			var box = new createjs.Shape();
			box.graphics.beginStroke("#000");
			box.graphics.setStrokeStyle(1);
			box.graphics.beginFill(bgColor).drawRect(0, 0, divWidth, rowHeight * (tLength * 2) + tMinSlot);
			container.addChild(box);

			var bText = new createjs.Text(reqData[i].title, "16px verdana", "white");
			bText.x = divWidth * .5;
			bText.y = rowHeight * (tLength - .2) + tMinSlot;
			//bText.y = (i == 1) ? rowHeight * .65 : (rowHeight * (tLength * 1.85)) * .51;
			bText.textAlign = "center";
			container.addChild(bText);

			container.y = rowHeight * tSlot + tMinSlot;
			container.x = collideCheck(container);

			container.on("click", handleClick, null, false, reqData[i]);
			stage.addChild(container);

			stage.update();
		}
	}
}

function collideCheck(container) {
	var collideCheck = true;
	var push = 0;
	
	while(collideCheck) {
		var hits = stage.getObjectsUnderPoint(container.x + push + (divWidth / 2), container.y + 5, 0);
		collideCheck = false;
		for(var x = 0; x < hits.length; ++hits) {
			if(hits[x].parent.name.includes("event") && hits[x].parent.name != container.name) {
				push += divWidth;
				collideCheck = true;
			}
		}
	}
	
	return push;
}

// Used to display event data, WIP
function handleClick(event, data) {
	console.log("eventid:" + data.event_id);
	var xhttp;    
	if (data.event_id == "") {
		document.getElementById("eventDetail").innerHTML = "";
		return;
	}
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			document.getElementById("eventDetail").innerHTML = xhttp.responseText;
		}
	};
	xhttp.open("GET", "detailevent.php?event="+data.event_id, true);
	xhttp.send();
	$('#eventDetailModal').modal('show');
}

function timeCalc(tStart, tEnd) {
	console.log(tStart + " " + tEnd);
	var a = moment(tStart, moment.ISO_8601);
	var b = moment(tEnd, moment.ISO_8601);

	var diff = ((b.diff(a) / 1000) / 60) / 60;
	if(diff > 24 || diff == 0) {
		return 0;
	}
	return diff;
}

function prepareCanvas() {
	drawTimeColumn();
	dateInit();

	// Wait for page load to get the correct dimensions of the canvas element
	$(window).load(function() {
		canvas = $('#calendar_drawarea');
		// Once loaded, scale the canvas to the css values
		canvas[0].width = canvas.width();
		canvas[0].height = canvas.height();

		ctx = canvas[0].getContext("2d");
		stage = new createjs.Stage("calendar_drawarea");
		performQuery();
	});


}

function performQuery() {
	// Finally, make an ajax call to prep data
	$.ajax({
		method: "POST",
		url: "php/calendarquery.php",
		//data: {"date": _date.format("201-05-08")},
		data: {"date": _date.format("YYYY-MM-DD")},
		success: function(data) {
			if(data != null) {
				reqData = data;
				divisions = reqData.length;
				cleanup();
				draw();
			} else {
				cleanup();
			}
		},
		dataType: "json"
	});
}

function cleanup() {
	stage.clear();
	stage.removeAllChildren();
	stage.removeAllEventListeners();
}

function drawTimeColumn() {
	document.write("<div class=\"row\" id=\"time_whole\">\
						<div class=\"col-md-1\" id=\"time_whole_item\">12</div>\
					</div>\
					<div class=\"row\" id=\"time_half\">\
						<div class=\"col-md-1\" id=\"time_half_item\">12:30</div>\
					</div>");

	for (i = 1; i < 24; ++i) {
		var ev = (i < 13) ? i : i - 12;
		document.write("<div class=\"row\" id=\"time_whole\">\
							<div class=\"col-md-1\" id=\"time_whole_item\">" + ev + "</div>\
						</div>\
						<div class=\"row\" id=\"time_half\"");
		if(i == 12) {
			document.write("style=\"border-bottom: 3px double #007cc3;\"");
		}
		document.write("><div class=\"col-md-1\" id=\"time_half_item\">" + (ev + 0.3) + "0</div></div>");
	}
}