<?php

	error_reporting(E_ERROR);
	ob_start();
	session_start();

	// if session is not set this will redirect to login page
	if( !isset($_SESSION['admin']) ) {
		header("Location: ../admin_auth/login");
		exit;
	}

	// SESSIONS variables
	$adminMail = $_SESSION['admin'];



 ?>

