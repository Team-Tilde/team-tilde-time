var date;
var _format = 'dddd, Do MMMM YYYY'

function drawTime() {
	for (i = 1; i < 25; ++i) {
		var ev = (i < 13) ? i : i - 12;
		document.write("  <div class=\"row\" id=\"time_whole\">");
		document.write("    <div class=\"col-md-1\" id=\"time_whole_item\">" + ev + "</div>");
		document.write("    <div class=\"col-md-11\"></div>");
		document.write("  </div>");
		document.write("  <div class=\"row\" id=\"time_half\"");
		if (i == 12) {
			document.write("style=\"border-bottom: 3px double #007cc3;\"");
		}
		document.write(">   <div class=\"col-md-1\" id=\"time_half_item\">" + (ev + 0.3) + "0</div>");
		document.write("<div class=\"col-md-11\"></div>");
		document.write("  </div>");
	}
}

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