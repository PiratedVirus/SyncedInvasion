<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="favicon.ico" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin Dashboard | Vishwachinmay Ayurved</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
<!--    <link rel="stylesheet" href="assets/css/material-kit.css">-->
    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a href="http://localhost:5757/Piece%20of%20Peace/" target="_blank" class="simple-text">
                    Vishwachinmay
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li id="dashboard">
                        <a href="admin_home">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li id="profile" >
                        <a href="admin_profile">
                            <i class="material-icons">person_outline</i>
                            <p>Admin Profile</p>
                        </a>
                    </li>
                    <li id="test" >
                        <a href="admin_test">
                            <i class="material-icons">content_paste</i>
                            <p>Create new Test</p>
                        </a>
                    </li>
                    <li id="alltests" >
                        <a href="all_tests">
                            <i class="material-icons">assignment</i>
                            <p>Edit Test</p>
                        </a>
                    </li>
                    <li id="viewtest" >
                        <a href="view_test">
                            <i class="material-icons">pageview</i>
                            <p>View Test Details</p>
                        </a>
                    </li>
                    <li id="editPlans" >
                        <a href="edit_plans">
                            <i class="material-icons">attach_money</i>
                            <p>Edit Subscriptions</p>
                        </a>
                    </li>
                    <li id="userList" >
                        <a href="user_list">
                            <i class="material-icons">list</i>
                            <p>User List</p>
                        </a>
                    </li>
                    <li id="questions" >
                        <a href="questions">
                            <i class="material-icons">info_outline</i>
                            <p>All Questions</p>
                        </a>
                    </li>

                    <li id="debug" >
                        <a href="test">
                            <i class="material-icons">info_outline</i>
                            <p>Debugging</p>
                        </a>
                    </li>

                    <li>
                        <a href="../admin_auth/logout.php?logout">
                            <i class="material-icons">power_settings_new</i>
                            <p>Log out</p>
                        </a>
                    </li>


                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> Admin Dashboard </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
  

                            <li>
                                <a href="admin_profile">
                                    <i class="material-icons">person</i>
                                    <p class="hidden-lg hidden-md">Profile</p>
                                </a>
                            </li>
                        </ul>
<!--                        <form class="navbar-form navbar-right" role="search">-->
<!--                            <div class="form-group  is-empty">-->
<!--                                <input type="text" class="form-control unviversalSearch" placeholder="Search">-->
<!--                                <span class="material-input"></span>-->
<!--                            </div>-->
<!--                            <button type="submit" class="btn btn-white btn-round btn-just-icon">-->
<!--                                <i class="material-icons">search</i>-->
<!--                                <div class="ripple-container"></div>-->
<!--                            </button>-->
<!--                        </form>-->
                    </div>
                </div>
            </nav>