var date = new Date();
var _format = 'dddd, Do MMMM YYYY'

function dt() {
	$(function () {
		$('#date').datetimepicker({
			inline: true,
			sideBySide: false,
			defaultDate: date
			});
		$('#date').on("dp.change", function (e) {
			date = $('#date').data('DateTimePicker').date();
			$('#dateval').text(date.format(_format));
			$('[data-toggle="popover"]').blur();
			$('[data-toggle="popover"]').popover("hide");
		});
	});
}

$(document).ready(function(){
    $('[data-toggle="popover"]').popover({
		html: true,
		content: "<div id=\"date\"></div><script>dt();</script>"
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

function draw() {
	divWidth = canvas.width() / divisions;

	//ctx.fillStyle = bgColor;
	//ctx.font = "16px verdana";
	//ctx.textAlign  = "center";
	for(var i = 0; i < reqData.length; ++i) {
		var tLength = timeCalc(reqData[i].date_time_start, reqData[i].date_time_end);
		if(tLength != 0) {
			var container = new createjs.Container();

			var box = new createjs.Shape();
			box.graphics.beginFill(bgColor).drawRect(0, rowHeight * 0, divWidth, rowHeight * (tLength * 2 - 2))
			container.addChild(box);

			var bText = new createjs.Text(reqData[i].title, "16px verdana", "white");
			bText.x = divWidth * .5;
			bText.y = (i == 1) ? rowHeight * .65 : (rowHeight * (tLength * 2 - 2)) * .51;
			bText.textAlign = "center";
			container.addChild(bText);

			container.x = 0
			container.y = rowHeight * 0;

			container.on("click", handleClick, null, false, reqData[i]);
			stage.addChild(container);

			stage.update();
			//ctx.fillStyle = bgColor;
			//ctx.fillRect(0, rowHeight * 0, divWidth, rowHeight * (tLength * 2 - 2));  // x, y, w, h
			//ctx.fillStyle = "white";
			//ctx.fillText(reqData[i].title, divWidth * (.5 + colMultiplier), (rowTimeMultiplier == 1) ? rowHeight * .65 : (rowHeight * (tLength * 2 - 2)) * .51);
		}
	}
}

function handleClick(event, data) {
	console.log(data);
}

function timeCalc(tStart, tEnd) {
	console.log(tStart + " " + tEnd);
	var a = moment(tStart, moment.ISO_8601);
	var b = moment(tEnd, moment.ISO_8601);

	var diff = ((b.diff(a) / 1000) / 60) / 60;
	if(diff > 24 || diff == 0) {
		return 0;
	}
	console.log(diff);
	return diff;
}

function prepareCanvas() {
	drawTimeColumn();

	// Wait for page load to get the correct dimensions of the canvas element
	$(window).load(function() {
		canvas = $('#calendar_drawarea');

		// Once loaded, scale the canvas to the css values
		canvas[0].width = canvas.width();
		canvas[0].height = canvas.height();

		ctx = canvas[0].getContext("2d");
		stage = new createjs.Stage("calendar_drawarea");
	});

	// Finally, make an ajax call to prep data
	$.ajax({
		method: "POST",
		url: "php/calendarquery.php",
		success: function(data) {
			reqData = data;
			divisions = reqData.length;
			draw();
		},
		dataType: "json"
	});
}

function drawTimeColumn() {
	for (i = 1; i < 25; ++i) {
		var ev = (i < 13) ? i : i - 12;
		document.write("  <div class=\"row\" id=\"time_whole\">");
		document.write("    <div class=\"col-md-1\" id=\"time_whole_item\">" + ev + "</div>");
		document.write("  </div>");
		document.write("  <div class=\"row\" id=\"time_half\"");
		if (i == 12) {
			document.write("style=\"border-bottom: 3px double #007cc3;\"");
		}
		document.write(">   <div class=\"col-md-1\" id=\"time_half_item\">" + (ev + 0.3) + "0</div>");
		document.write("  </div>");
	}
}