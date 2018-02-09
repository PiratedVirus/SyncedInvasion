<?php
ob_start();
session_start();
require_once '../../dbconnect.php';
include '../admin_home/helpers/helper_functions.php';

// it will never let you open index(login) page if session is set
if ( isset($_SESSION['admin'])!="" ) {
    header("Location: ../admin_home/admin_home");
    exit;
}


// include './invasion/user_home.php';
$error = false;

if( isset($_POST['btn-login']) ) {

    // prevent sql injections/ clear user invalid inputs
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);
    // prevent sql injections / clear user invalid inputs

    if(empty($email)){
        $error = true;
        $emailError = "Please enter your email address.";
    } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
        $error = true;
        $emailError = "Please enter valid email address.";
    }

    if(empty($pass)){
        $error = true;
        $passError = "Please enter your password.";
    }

    // if there's no error, continue to login
    if (!$error) {

//			$password = hash('sha256', $pass); // password hashing using SHA256
        $password = encryptIt( $pass );
        $res=mysqli_query($conn,"SELECT * FROM admin WHERE adminMail='$email'");
        $row=mysqli_fetch_array($res);
        $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

        if( $count == 1 && $row['adminPass']==$password ) {
            $_SESSION['admin'] = $row['adminMail'];
            header("Location: ../admin_home/admin_home");
        } else {
            $errMSG = "Incorrect Credentials, Try again...";
        }

    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Admin | Vishwachinmya</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
    <link rel="stylesheet" href="assets/css/material-kit.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body class="signup-page">

<div class="wrapper">
    <div class="header header-filter" style="background-image: url('assets/img/panel-bg.png'); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">



                <div class="col-md-5 col-md-offset-4 col-sm-6 col-sm-offset-3 margin-top">
                    <?php
                    if ( isset($errMSG) ) {

                        ?>
                        <div class="form-group">
                            <div class="alert alert-danger">
                                <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                    <div class="card card-signup">
                        <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                            <div class="header header-primary text-center">
                                <div class="social-line">
                                    <img class="img-logo" src="assets/img/logo_white.png" width="250" alt="">
                                </div>
                                <h3>Online Test Series</h3>
                            </div>
                            <p style="margin-bottom: 30px; margin-top: 60px;" class="text-divider loginText margin-bottom">Log in to your account</p>
                            <div class="content">

                                <div class="input-group">
                                    <span class="input-group-addon"><i class="material-icons">email</i></span>
                                    <input type="email" name="email"  value="<?php echo $email; ?>" maxlength="40"  class="form-control" placeholder="Email...">
                                    <span class="text-danger"><?php echo $emailError; ?></span>
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon"><i class="material-icons">lock_outline</i></span>
                                    <input type="password"  name="pass"  placeholder="Password..." class="form-control" />
                                    <span class="text-danger"><?php echo $passError; ?></span>
                                </div>
                            </div>

                            <div class="footer text-center">
                                <button  type="submit" name="btn-login" class="btn btn-simple btn-primary newBtn btn-lg">LOG IN</button>
                            </div>
                            <div class="text-right">
                                <a class="forgetPass" href="#">Forget Password?</a>
                            </div>
                        </form>
                    </div>
                    <a href="register" class="col-md-offset-3 btn btn-simple btn-primary btn-lg newBtn">Register</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<?php ob_end_flush(); ?>
<script src="assets/js/jquery-1.11.3-jquery.min.js"></script>
<script src="assets/js/bootstrap.js" type="text/javascript"></script>
<script src="assets/js/material.min.js"></script>
<script src="assets/js/material-kit.js"></script>

