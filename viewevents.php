<?php
	require_once "php/conf.php";
?>
<html>

<head>
	<title>View Events</title>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php
	session_start();
	require_once "php/auth.php";
	require_login();
	?>
	<div class="container">
		<?php
			require_once "php/nav.php";
		?>
		<form action='' method='post'><label>Select task:</label><select name='selectEvent' class='form-control' onchange='this.form.submit();'>
		<option value='0'>Select a task:</option>
		<?php
			$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
			
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
		
			$sql = "SELECT task_id, description FROM Task";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<option value='" . $row['task_id'] . "'>" . $row['description'] . "</option>";
				}
			} else {
				echo "No task found.";
			}
			
			echo "</select></form>";
			
			if (isset($_POST['selectEvent']))
			{
				$selected = mysqli_real_escape_string($conn ,$_POST['selectEvent']);
				$sql = "SELECT event_id, title, description, location, date_time_start, date_time_end FROM Event WHERE task_id = '" . $selected . "'";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					$counter = 1;
					
					echo "<table class='table table-hover'>
								<tr>
									<td width='1%'><strong><input type='checkbox' value='All'></strong></td>
									<td width='5%'><strong>Event Number</strong></td>
									<td width='10%'><strong>Event Name</strong></td>
									<td width='39%'><strong>Description</strong></td>
									<td width='10%'><strong>Venue</strong></td>
									<td width='15%'><strong>Start Date</strong></td>
									<td width='15%'><strong>Finish Date</strong></td>
									<td width='5%'><strong>Settings</strong></td>
								<tr>";
					
					while($row = $result->fetch_assoc()) {
						$start_date = date_create($row['date_time_start']);
						$end_date = date_create($row['date_time_end']);
						
						echo "<tr>
								<td width='1%'><label><input type='checkbox' value='" . $row['event_id'] . "'></label></td>
								<td width='5%'><p>Event " . $counter .  "</p></td>
								<td width='10%'><p>" . $row['title'] . "</p></td>
								<td width='39%'><p>" . $row['description'] . "</p></td>
								<td width='10%'><p>" . $row['location'] . "</p></td>
								<td width='15%'><p>" . date_format($start_date, 'l jS F Y h:i a') . "</p></td>
								<td width='15%'><p>" . date_format($end_date, 'l jS F Y h:i a') . "</p></td>
								<td width='5%'><p><a><span class='glyphicon glyphicon-search'></span></a>
										<a><span class='glyphicon glyphicon-pencil'></span></a>
										<a><span class='glyphicon glyphicon-trash'></span></a></p></td>
								</tr>";
									
						$counter++;
					}
				} else {
					echo "No events found.";
				}
			}
			echo "</table>";
			$conn->close();
		?>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script>
	function doSomething()
	{
		alert(1);
	}
	</script>
</body>

</html>