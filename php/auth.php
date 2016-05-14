<?php
function login($username) {
	$_SESSION['username'] = $username;
}

function logout() {
	unset($_SESSION['username']);
}

function is_logged_in() {
	return isset($_SESSION['username']);
}

function is_admin() {
	return is_logged_in() && logged_in_user() === 'admin';
}

function logged_in_user() {
	if (isset($_SESSION['username'])) {
		return $_SESSION['username'];
	}
}

function current_user_login_text() {
	if (logged_in_user()) {
		return "Current User: " . logged_in_user() . "";
	}
}

function require_login() {
	if(!is_logged_in()) {
		header('Location: login.php');
	}
}

function require_login_admin() {
	if(!is_logged_in() || !is_admin()) {
		header('Location: login.php');
	}
}

?>