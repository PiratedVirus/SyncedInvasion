<?php
//	error_reporting(E_ERROR);
	ob_start();
	// server should keep session data for AT LEAST 1 hour
	ini_set('session.gc_maxlifetime', 7200);

	// each client should remember their session id for EXACTLY 1 hour
	session_set_cookie_params(7200);
	session_start();


	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: ../user_auth/login");
		exit;
	}

	// SESSIONS variables
	$id = $_SESSION['user'];

	$url  = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
	$url .= $_SERVER['SERVER_NAME'];
	$url .= $_SERVER['REQUEST_URI'];

	global $dir;
	$dir =  dirname(dirname($url));




 ?>

