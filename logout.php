<?php
	session_start();
	require_once "php/auth.php";
	require_login();
	logout();
	header('Location: login.php');
?>