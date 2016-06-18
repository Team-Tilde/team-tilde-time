<?php
	require_once "php/conf.php";
?>
<html>

<head>
	<title>View Events</title>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/nav.css" rel="stylesheet" type="text/css">
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
		<label>Select task:</label><select id="selectorTask" class='form-control' onchange='showEventsByTask(this.value)'>
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
			
			echo "</select>";
			
			$conn->close();
		?>
		<div id="eventData"></div>
	</div>
	
	<?php require_once "php/modal.php";?>
	
	<script src="scripts/jquery-1.9.1.min.js"></script>
    <script src="scripts/bootstrap.min.js"></script>
    <script src="scripts/task.js"></script>
    <script src="scripts/event.js"></script>

</body>

</html>
