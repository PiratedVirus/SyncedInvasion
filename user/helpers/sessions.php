<?php
//	error_reporting(E_ERROR);
	ob_start();
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

