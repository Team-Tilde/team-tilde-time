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
		<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
		<link href="css/custom.css" rel="stylesheet">
		<link href="css/nav.css" rel="stylesheet">
</head>
<body>	
		<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
		<script src="scripts/bootstrap.min.js" type="text/javascript"></script>
		<script src="scripts/moment.js" type="text/javascript"></script>
		<script src="scripts/calendar_month.js" type="text/javascript"></script>
		<script src="scripts/easeljs-0.8.2.min.js" type="text/javascript"></script>
		<script src="scripts/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
		<script src="scripts/task.js"></script>
		<script src="scripts/event.js"></script>

	<div class="container">
		<?php
			require_once "php/nav.php";
		?>
	</div>

	<div class="container-fluid" id="day_container">
		<div class="row" id="day_header">
			<a href="#" onclick="dateSet(true)"><div class="col-md-1"><span class="glyphicon glyphicon-menu-left dayleft"></span></div></a>
				<div class="col-md-10">
					<a href="#" data-toggle="popover" title="Date Selector" data-placement="bottom" data-trigger="focus" data-content="">
			 		<h4 id="dateval"></h4>
					</a>
				</div>
				<a href="#" onclick="dateSet(false)"><div class="col-md-1"><span class="glyphicon glyphicon-menu-right dayright"></span></div></a>
			</div>

		<div class="row table-bordered" id="day_table">
					<script>
						loadMonthView();
						
					</script>

			<div id ="monthView">
				  
			</div>
			
			<div id="eventData" class='well'>
				
			</div>
		</div>
	</div>
	
	<script> 
		CalendarTable();

</script>
  
  	<?php require_once "php/modal.php";?>
	
</body>
</html>
