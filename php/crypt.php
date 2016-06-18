<?php

function get_hash($pass) {
    $bytes = openssl_random_pseudo_bytes(30);
    $random_data = substr(base64_encode($bytes), 0, 22);
    $random_data = strtr($random_data, '+', '.');

    $local_salt = "$2y$12$" . $random_data;
    return crypt($pass, $local_salt);
}

function user_password_checking()
{
	if (isset($_POST['txtUser']) && isset($_POST['txtPwd']))
	{
		$txtUser = $_POST['txtUser'];
		$txtPwd = $_POST['txtPwd'];
		
		$password = 'password123';
		$guestPassword = 'guest';

		$hash = get_hash($password);
		$guestHash = get_hash($guestPassword);

		if ($txtUser === 'admin'  && password_verify($txtPwd, $hash))
		{
			login($txtUser);
			header('Location: calendar.php');
			exit;
		}
		else if ($txtUser !== 'admin' && password_verify($txtPwd, $guestHash))
		{
			login($txtUser);
			header('Location: calendar.php');
			exit;
		}
		else
		{
			echo "<error>Invalid password!</error>";
		}
	}
}

?>