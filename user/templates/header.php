<!DOCTYPE html>
<html>
<head>
	<title>Vishwachinmay Online Test</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.6.6/jquery.fullPage.css">
	<link rel="stylesheet" href="assets/css/main.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/loader-min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body>
	<nav style="z-index: 999;" class="navbar navbar-default no-b-margin">
	    <div class="container-fluid">
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	            <a class="navbar-brand" target="_blank" href="https://vishwachinmayayurved.com/"><img src="assets/img/logo.png"></a>
	        </div>
	        <div class="collapse navbar-collapse" id="myNavbar">
	            <ul class="nav navbar-nav navbar-right">
	                <li id="home">
	                    <a href="user_home">Home</a>
	                </li>
                    <li id="home">
                        <a href="user_home#testNav">Test</a>
                    </li>
                    <li id="result" >
                        <a href="user_results">Result & Analysis</a>
                    </li>
                    <li id="timetable" >
                        <a href="timetable">Timetable</a>
                    </li>
	                <li id="profile" >
	                    <a href="user_profile">Profile</a>
	                </li>
                    <li id="" >
                        <a href="https://vishwachinmayayurved.com/contact.html">Contact Us</a>
                    </li>

	                <li>
	                    <a class="logCookie navUserName" href="../user_auth/logout.php?logout"> <?php echo getUserName($conn, $id); ?>  |<span class="text-danger"> Logout</span> </a>
	                </li>

	            </ul>
	        </div>
	    </div>
	</nav>
