<?php

	session_start();
	
	if (!isset($_SESSION['admin'])) {
		header("Location: login");
	} else if(isset($_SESSION['admin'])!="") {
		header("Location: .../admin_home/admin_home");
	}
	
	if (isset($_GET['logout'])) {
		unset($_SESSION['admin']);
		session_unset();
		session_destroy();
		header("Location: login");
		exit;
	}
?>