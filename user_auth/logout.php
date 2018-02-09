<?php

	session_start();
	
	if (!isset($_SESSION['user'])) {
		header("Location: login");
	} else if(isset($_SESSION['user'])!="") {
		header("Location: ../user/user_home");
	}
	
	if (isset($_GET['logout'])) {
		unset($_SESSION['user']);
		unset($_SESSION['user_result']);
		session_unset();
		session_destroy();
		header("Location: login");
		exit;
	}
?>