<html>

<head>
	<link href="css/signin.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<title>Login</title>
</head>

<body>

	<?php
	session_start();
	require_once "php/auth.php";
	require_once "php/crypt.php";
	?>

    <div class="container">
		<?php
			require_once "php/nav.php";
		?>
		<form name="loginForm" action="" method="post" class="form-signin">
			<h2 class="form-signin-heading">Please sign in</h2>
			<label for="inputEmail" class="sr-only">Email address</label>
			<input name="txtUser" type="text" class="form-control" placeholder="Username" required autofocus>
			<label for="inputPassword" class="sr-only">Password</label>
			<input name="txtPwd" type="password" class="form-control" placeholder="Password" required>
			<div class="checkbox">
				<label>
					<input type="checkbox" value="remember-me"> Remember me
				</label>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
			<?php
			if (!is_logged_in())
			{
				echo "<p id='loginMessage'>Want to log in as guest? <br/>
					Just type your desired name and the password is 'guest'.
					</p>";
			}
			user_password_checking();
			?>
		</form>
		
    </div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>