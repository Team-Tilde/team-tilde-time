<?php
	require_once "php/conf.php";
?>
<html>

<head>
	<title>Dashboard</title>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/nav.css" rel="stylesheet" type="text/css">
	<link href="css/font.css" rel="stylesheet" type="text/css">
	<link href="css/dashboard.css" rel="stylesheet" type="text/css">
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
		
		<!-- Creates the Upcoming Events that are due in 5 days -->
		<?php
			$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
			
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
		
			$sql = "SELECT event_id, title, date_time_end FROM Event 
					WHERE date_time_end BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 5 DAY)
					ORDER BY date_time_end DESC 
					LIMIT 10";
			$result = $conn->query($sql);
			
			echo "<div id='upcomingEvent' class='well'>";
			
			if ($result->num_rows > 0) {
				echo "<p class='warningDue'>You have " . $result->num_rows . " events due soon in 5 days! Please complete the following:</p>";
				while($row = $result->fetch_assoc()) {
					echo "<p><a href='#' title='"  . $row['event_id'] . "' onclick='showEventDetails(this.title)'>" . $row['title'] . "</a></p>";
					echo "<p>" . date_format(date_create($row['date_time_end'], timezone_open("Australia/Sydney")), 'l jS F Y h:iA') . "</p>";
				}
				echo "</p>";
			} else {;
				echo "<p class='noneDue'>You have no current events upcoming that are due. Yay!</p>";
			}
			
			echo "</div>";
			
			$conn->close();
		?>
		
		<!-- Creates the Messages that you have -->
		<?php
			$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
			
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			
			$sql = "SELECT m.id as message_id, m.subject as subject FROM message as m, recipient_message as rm WHERE m.id = rm.message_id AND rm.state = 'Unread'";
			$result = $conn->query($sql);
			
			echo "<div id='unreadMessage' class='well'>";
			
			if ($result->num_rows > 0) {
				echo "<p class='warningUnread'>You have " . $result->num_rows . " messages that have not been read!</p>";
				while($row = $result->fetch_assoc()) {
					echo "<p><a href='#' title='"  . $row['message_id'] . "'>" . $row['subject'] . "</a></p>";
				}
				echo "</p>";
			} else {;
				echo "<p class='noneDue'>You have no current events upcoming that are due. Yay!</p>";
			}
			
			echo "</div>";
			
			$conn->close();
		?>
		
	</div>
	
	<?php require_once "php/modal.php";?>
	
	<script src="scripts/jquery-1.9.1.min.js"></script>
    <script src="scripts/bootstrap.min.js"></script>
    <script src="scripts/task.js"></script>
    <script src="scripts/event.js"></script>

</body>

</html>