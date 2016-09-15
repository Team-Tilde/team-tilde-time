var _date;
var _format = 'dddd, Do MMMM YYYY';
var month = new Date().getMonth() + 1;
var day = new Date().getDate();

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
		});
		
		$('#date').on('dp.change', function(e){ 
		var currMonth = new Date(e.date).getMonth() + 1;
		month = currMonth;
		
		
		var currDay = new Date(e.date).getDate();
		day = currDay;
			console.log(month);
			console.log(day);
		CalendarTable();
		});

	});

}
			console.log(month);
			console.log(day);
			
function dateInit() {
	_date = moment();
	$('#dateval').text(_date.format(_format));
}

$(document).ready(function(){
    $('[data-toggle="popover"]').popover({
		html: true,
		content: "<div id=\"date\"></div><script>dt();<\/script>" 
	});
});

function dateSet(rewind) {
	if(rewind) {
		_date.subtract(7, 'day');
		
		var currMonth = new Date(_date).getMonth() + 1;
		month = currMonth;
		
		
		var currDay = new Date(_date).getDate();
		day = currDay;
			console.log(month);
			console.log(day);
		CalendarTable();
		
	} else {
		_date.add(7, 'day');
		
		var currMonth = new Date(_date).getMonth() + 1;
		month = currMonth;
		
		
		var currDay = new Date(_date).getDate();
		day = currDay;
			console.log(month);
			console.log(day);
		CalendarTable();

	}
	$('#dateval').text(_date.format(_format));
	

}

function loadWeekView() {
	dateInit();

}


 	function CalendarTable(){
			var div = document.getElementById('weekView');
				var FWD; //first week day
				var monDate;
				var monMonth;
				
				var tueDate;
				var tueMonth;
				
				var wedDate;
				var wedMonth;
				
				var thuDate;
				var thuMonth;
				
				var friDate;
				var friMonth;
				
				var satDate;
				var satMonth;
				
				var sunDate;
				var sunMonth;

			if (month == 1){ // Jan
				if (day >=1 && day <=3){ 
				monDate = 28;				
				tueDate = 29;
				wedDate = 30;
				thuDate = 31;
				friDate = 1;			
				satDate = 2;
				sunDate  = 3;
				
				monMonth = tueMonth = wedMonth = thuMonth = 12;				
				friMonth = satMonth = sunMonth = month;
				}
				
				else if (day >=4 && day <=10){ 
				FWD = 4;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				else if (day >=11 && day <=17){ 
				FWD = 11;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				else if (day >=18 && day <=24){
				FWD = 18;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				else if (day >=25 && day <=31){ 
				FWD = 25;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
			}
			else if (month == 2){ // February
				if (day >=1 && day <=7){ 
				FWD = 1;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;			

				}
				
				else if (day >=8 && day <=14){ 
				FWD = 8;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				else if (day >=15 && day <=21){ 
				FWD = 15;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				else if (day >=22 && day <=28){ 
				FWD = 22;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				else if (day >=29 && day <=29){ 
				FWD = 29;
				monDate = FWD;				
				tueDate = 1;
				wedDate = 2;
				thuDate = 3;
				friDate = 4;			
				satDate = 5;
				sunDate  = 6;
				
				monMonth = 2;
				tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
			}
			 else if (month == 3){ // March
				if (day >=1 && day <=6){ 
				FWD = 1;
				monDate = 29;				
				tueDate = FWD;
				wedDate = FWD +1;
				thuDate = FWD +2;
				friDate = FWD +3;			
				satDate = FWD +4;
				sunDate  = FWD +5;
				
				monMonth = 2;
				tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;
				}
				
				else if (day >=7 && day <=13){ 
				FWD = 7;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				else if (day >=14 && day <=20){ 
				FWD = 14;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				else if (day >=21 && day <=27){
				FWD = 21;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				else if (day >=28 && day <=31){ 
				FWD = 28;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = 1;			
				satDate = 2;
				sunDate  = 3;
				
				monMonth = tueMonth = wedMonth = thuMonth = month;
				friMonth = satMonth = sunMonth = 4;				
				}
			}
			else if (month == 4){ // April
				if (day >=1 && day <=3){ 
				FWD = 1;
				monDate = 28;				
				tueDate = 29;
				wedDate = 30;
				thuDate = 31;
				friDate = FWD ;			
				satDate = FWD +1;
				sunDate  = FWD +2;
				
				monMonth = tueMonth = wedMonth = thuMonth = 3;
				friMonth = satMonth = sunMonth = month;				
				}
				
				else if (day >=4 && day <=10){ 
				FWD = 4;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				else if (day >=11 && day <=17){ 
				FWD = 11;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				else if (day >=18 && day <=24){
				FWD = 18;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				else if (day >=25 && day <=30){ 
				FWD = 25;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +3;			
				satDate = FWD +3;
				sunDate  = 1;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = 4;
				sunMonth = 5;				
				}
			}
			else if (month == 5){ // May
				if (day >=1 && day <=1){ 
				FWD = 1;
				monDate = 25;				
				tueDate = 26;
				wedDate = 27;
				thuDate = 28;
				friDate = 29;			
				satDate = 30;
				sunDate  = FWD;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = 4;
				sunMonth = month;		
				}
				
				else if (day >=2 && day <=8){ 
				FWD = 2;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;				
				}
				
				else if (day >=9 && day <=15){ 
				FWD = 9;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				else if (day >=16 && day <=22){ 
				FWD = 16;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				else if (day >=23 && day <=29){
				FWD = 23;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				else if (day >=30 && day <=31){ 
				FWD = 30;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = 1;
				thuDate = 2;
				friDate = 3;			
				satDate = 4;
				sunDate  = 5;
				
				monMonth = tueMonth = month;
				wedMonth = thuMonth = friMonth = satMonth = sunMonth = 6;				
				}
			}
			else if (month == 6){ // June
				if (day >=1 && day <=5){ 
				FWD = 1;
				monDate = 30;				
				tueDate = 31;
				wedDate = FWD;
				thuDate = FWD +1;
				friDate = FWD +2;			
				satDate = FWD +3;
				sunDate  = FWD +4;
				
				monMonth = tueMonth = 5;
				wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				
				else if (day >=6 && day <=12){ 
				FWD = 6;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;				
				}
				
				else if (day >=13 && day <=19){ 
				FWD = 13;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				else if (day >=20 && day <=26){ 
				FWD = 20;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				else if (day >=27 && day <=30){
				FWD = 27;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = 1;			
				satDate = 2;
				sunDate  = 3;
				
				monMonth = tueMonth = wedMonth = thuMonth = month;
				friMonth = satMonth = sunMonth = 7;		
				}
			}
			
			else if (month == 7){ // July
				if (day >=1 && day <=3){ 
				FWD = 1;
				monDate = 27;				
				tueDate = 28;
				wedDate = 29;
				thuDate = 30;
				friDate = FWD;			
				satDate = FWD +1;
				sunDate  = FWD +2;
				
				monMonth = tueMonth = wedMonth = thuMonth = 6;
				friMonth = satMonth = sunMonth = month;		
				}
				
				else if (day >=4 && day <=10){ 
				FWD = 4;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;				
				}
				
				else if (day >=11 && day <=17){ 
				FWD = 11;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				else if (day >=18 && day <=24){ 
				FWD = 18;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				else if (day >=25 && day <=31){
				FWD = 25;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
			}
			
			else if (month == 8){ // August
				if (day >=1 && day <=7){ 
				FWD = 1;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				
				else if (day >=8 && day <=14){ 
				FWD = 8;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;				
				}
				
				else if (day >=15 && day <=21){ 
				FWD = 15;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				else if (day >=22 && day <=28){ 
				FWD = 22;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				else if (day >=29 && day <=31){
				FWD = 29;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = 1;
				friDate = 2;			
				satDate = 3;
				sunDate  = 4;
				
				monMonth = tueMonth = wedMonth = thuMonth = month;
				friMonth = satMonth = sunMonth = 9;		
				}
			}
			
			else if (month == 9){ // September
				if (day >=1 && day <=4){ 
				FWD = 1;
				monDate = 29;				
				tueDate = 30;
				wedDate = 31;
				thuDate = FWD;
				friDate = FWD +1;			
				satDate = FWD +2;
				sunDate  = FWD +3;
				
				monMonth = tueMonth = wedMonth = 8;
				thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				
				else if (day >=5 && day <=11){ 
				FWD = 5;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;				
				}
				
				else if (day >=12 && day <=18){ 
				FWD = 12;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				else if (day >=19 && day <=25){ 
				FWD = 19;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = month;
				satMonth = sunMonth = 10;		
				}
				else if (day >=26 && day <=30){ 
				FWD = 19;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = 1;
				sunDate  = 2;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = month;
				satMonth = sunMonth = 10;		
				}
			}
			
			else if (month == 10){ // october
				if (day >=1 && day <=2){ 
				FWD = 1;
				monDate = 26;				
				tueDate = 27;
				wedDate = 28;
				thuDate = 29;
				friDate = 30;			
				satDate = FWD ;
				sunDate  = FWD +1;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = 9;
				satMonth = sunMonth = month;		
				}
				
				else if (day >=3 && day <=9){ 
				FWD = 3;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;				
				}
				
				else if (day >=10 && day <=16){ 
				FWD = 10;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				else if (day >=17 && day <=23){ 
				FWD = 17;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = 1;
				sunDate  = 2;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = month;
				satMonth = sunMonth = 10;		
				}
				else if (day >=24 && day <=30){ 
				FWD = 24;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				else if (day >=31 && day <=31){ 
				FWD = 31;
				monDate = FWD;				
				tueDate = 1;
				wedDate = 2;
				thuDate = 3;
				friDate = 4;			
				satDate = 5;
				sunDate  = 6;
				
				monMonth = month;
				tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = 11;		
				}
			}
			
			else if (month == 11){ // November
				if (day >=1 && day <=6){ 
				FWD = 1;
				monDate = 31;				
				tueDate = FWD;
				wedDate = FWD +1;
				thuDate = FWD +2;
				friDate = FWD +3;			
				satDate = FWD +4;
				sunDate  = FWD +5 ;
				
				monMonth = 10;
				tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				
				else if (day >=7 && day <=13){ 
				FWD = 7;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;				
				}
				
				else if (day >=14 && day <=20){ 
				FWD = 14;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				else if (day >=21 && day <=27){ 
				FWD = 21;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				else if (day >=28 && day <=30){ 
				FWD = 28;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = 1;
				friDate = 2;			
				satDate = 3;
				sunDate  = 4;
				
				monMonth = tueMonth = wedMonth = month;
				thuMonth = friMonth = satMonth = sunMonth = 12;		
				}
			}
			
			else if (month == 12){ // December
				if (day >=1 && day <=4){ 
				FWD = 1;
				monDate = 28;				
				tueDate = 29;
				wedDate = 30;
				thuDate = FWD;
				friDate = FWD +1;			
				satDate = FWD +2;
				sunDate  = FWD +3 ;
				
				monMonth = tueMonth = wedMonth = 11;
				thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				
				else if (day >=5 && day <=11){ 
				FWD = 5;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;				
				}
				
				else if (day >=12 && day <=18){ 
				FWD = 12;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				else if (day >=19 && day <=25){ 
				FWD = 19;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = FWD +6;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = sunMonth = month;		
				}
				else if (day >=26 && day <=31){ 
				FWD = 28;
				monDate = FWD;				
				tueDate = FWD +1;
				wedDate = FWD +2;
				thuDate = FWD +3;
				friDate = FWD +4;			
				satDate = FWD +5;
				sunDate  = 1;
				
				monMonth = tueMonth = wedMonth = thuMonth = friMonth = satMonth = month;
				sunMonth = 1;		
				}
			}
	
			
			
			
			
			
			
			
			
			
			
			div.innerHTML = "<h4><strong>Monday "+monDate+"/"+monMonth+"</strong></h4>";
			div.innerHTML += "<div id='"+monDate+"/"+monMonth+"'  class='well'>No Events</div>";
			div.innerHTML += "<h4><strong>Tuesday "+tueDate+"/"+tueMonth+"</strong></h4>";
			div.innerHTML += "<div id='"+tueDate+"/"+tueMonth+"'  class='well'>No Events</div>";
			div.innerHTML += "<h4><strong>Wednesday "+wedDate+"/"+wedMonth+"</strong></h4>";
			div.innerHTML += "<div id='"+wedDate+"/"+wedMonth+"'  class='well'>No Events</div>";
			div.innerHTML += "<h4 ><strong>Thursday "+thuDate+"/"+thuMonth+"</strong></h4>";
			div.innerHTML += "<div id='"+thuDate+"/"+thuMonth+"'  class='well'>No Events</div>";
			div.innerHTML += "<h4><strong>Friday "+friDate+"/"+friMonth+"</strong></h4>";
			div.innerHTML += "<div id='"+friDate+"/"+friMonth+"'  class='well'>No Events</div>";
			div.innerHTML += "<h4><strong>Saturday "+satDate+"/"+satMonth+"</strong></h4>";
			div.innerHTML += "<div id='"+satDate+"/"+satMonth+"'  class='well'>No Events</div>";
			div.innerHTML += "<h4><strong>Sunday "+sunDate+"/"+sunMonth+"</strong></h4>";
			div.innerHTML += "<div id='"+sunDate+"/"+sunMonth+"'  class='well'>No Events</div>";
			
			div.innerHTML += "<div id='eventData'></div>";
			getEvents();
			}
			
			
			function hasEvent(date){
				var thisDay = date +"/"+month+"";
				var dayToAdd = document.getElementById(thisDay);
				if(dayToAdd){
				dayToAdd.innerHTML = showEventsByDate(thisDay);
			}
			}
			
			function getEvents(){
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

						var return_data = xmlhttp.responseText;
						//decodes JSON file
						var parsed = JSON.parse(return_data);
						//console.log(parsed);
						
						for (var x = 0; x < parsed.length; x++){
							//console.log(parsed[x].date_time_start);
							var str = parsed[x].date_time_start;
							var useMonth;
							
							if( month.toString().length == 1){
								var useMonth = "0"+month;
								//console.log("true");
							}
							else{
								var useMonth = month;
								//console.log("False");
								//console.log(useMonth);
								//console.log(useMonth.toString().length);
							}
							
							if (str.indexOf("2016-"+useMonth+"") >= 0){
								var res = str.substr(8, 2);
								
								var s = res;
								while(s.charAt(0) === '0'){
									s = s.substr(1);
								}
								//console.log(s);
								hasEvent(s);
								
							}
						}						
						
					}
					};
				xmlhttp.open("GET", "calendarMonthAPI.php" , true);
				xmlhttp.send();
			}
						
			
			
	function showEventsByDate(date) {
	  var xhttp;    
	  if (date == "") {
		document.getElementById(date).innerHTML = "";
		return;
	  }
	  //console.log(date);
	  xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
		  document.getElementById(date).innerHTML = xhttp.responseText;
		}
	  };
	  var tDate = date.substr(0, month.toString().length +1);
		if( tDate.length == 1){
		tDate = "0"+tDate;
		}
		
		var useMonth;
							
		if( month.toString().length == 1){
			var useMonth = "0"+month;
			//console.log("true");
		}
		else{
			var useMonth = month;
			//console.log("False");
		}
		
		var newDate= "2016-"+useMonth+"-"+tDate;
		//console.log(newDate);
		xhttp.open("GET", "showEventsWeek.php?task="+newDate, true);
		xhttp.send();
	}