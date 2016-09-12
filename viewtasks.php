<?php
	require_once "php/conf.php";
?>
<html>

<head>
	<title>View Tasks</title>
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
		<label>Filter Tasks:</label><select id="selectorTask" class='form-control' onchange='showTasksByFilter(this.value)'>
		<option value='0'>All Tasks</option>
		<?php
			$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
			
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
		
			$sql = "SELECT task_category_id, description FROM TaskCategory";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<option value='" . $row['task_category_id'] . "'>" . $row['description'] . "</option>";
				}
			} else {
				require_once "showtasks.php"; // static
			}
			
			echo "</select>";
			
			$conn->close();
		?>
		<div id="taskData"></div>
	</div>
	
	<?php require_once "php/modal.php";?>
	
	<script src="scripts/jquery-1.9.1.min.js"></script>
    <script src="scripts/bootstrap.min.js"></script>
    <script src="scripts/task.js"></script>
    <script src="scripts/event.js"></script>

</body>

</html>
