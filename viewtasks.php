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
		<?php
			require_once "showtasks.php";
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
