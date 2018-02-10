<!DOCTYPE html>
<html>
<head>
    <title>Vishwachinmya Online Test</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.6.6/jquery.fullPage.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<!--    <link rel="stylesheet"  href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css" type="text/css">-->

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-89329415-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-89329415-3');
    </script>
</head>
<body>
<nav style="z-index: 999;" class="navbar navbar-default navbar-fixed-top no-b-margin">
    <div class="container-fluid">
        <div class="navbar-header viewDesktop">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" target="_blank" href="https://vishwachinmayayurved.com/"><img src="assets/img/logo.png"></a>
        </div>

        <div class="collapse navbar-collapse viewDesktop" id="myNavbar">
            <ul class="nav navbar-nav viewDesktop navbar-right">
                <li id="home">
                    <a href="#dashboardNav">Home</a>
                </li>
                <li id="home">
                    <a href="#testNav">Test</a>
                </li>
                <li id="result" >
                    <a href="#resultNav">Result & Analysis</a>
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

     <div class="navbar-header removeJQ viewMobile">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbarMobile">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" target="_blank" href="https://vishwachinmayayurved.com/"><img src="assets/img/logo.png"></a>
        </div>

        <div class="collapse navbar-collapse viewMobile"  id="myNavbarMobile">
            <ul class="nav navbar-nav viewMobile navbar-right">
                <li id="home">
                    <a href="#mobileHome">Home</a>
                </li>
                <li id="home">
                    <a href="#test">Test</a>
                </li>
                <li id="result" >
                    <a href="#mobileResult">Result & Analysis</a>
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
