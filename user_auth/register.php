<?php
ob_start();
session_start();
if( isset($_SESSION['user'])!="" ){
    header("Location: ../user/user_home");
}
include_once '../dbconnect.php';
include '../user/helpers/helper_functions.php';

$error = false;

if ( isset($_POST['btn-signup']) ) {

    // clean user inputs to prevent sql injections
    $name = trim($_POST['name']);
    $name = strip_tags($name);
    $name = htmlspecialchars($name);

    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $college = trim($_POST['college']);
    $college = strip_tags($college);
    $college = htmlspecialchars($college);
    $college = addslashes($college);

    $city = trim($_POST['city']);
    $city = strip_tags($city);
    $city = htmlspecialchars($city);
    $city = addslashes($city);


    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    $mobile = trim($_POST['mobile']);
    $mobile = strip_tags($mobile);
    $mobile = htmlspecialchars($mobile);

    $gender = trim($_POST['gender']);
    $gender = strip_tags($gender);
    $gender = htmlspecialchars($gender);

    // basic name validation
    if (empty($name)) {
        $error = true;
        $nameError = "Please enter your full name.";
    } else if (strlen($name) < 3) {
        $error = true;
        $nameError = "Name must have atleat 3 characters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
        $error = true;
        $nameError = "Name must contain alphabets and space.";
    }

    //basic email validation
    if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
        $error = true;
        $emailError = "Please enter valid email address.";
    } else {
        // check email exist or not
        $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
        $result = mysqli_query($query);
        $count = mysqli_num_rows($result);
        if($count!=0){
            $error = true;
            $emailError = "Provided Email is already in use.";
        }
    }
    // password validation
    if (empty($pass)){
        $error = true;
        $passError = "Please enter password.";
    } else if(strlen($pass) < 6) {
        $error = true;
        $passError = "Password must have atleast 6 characters.";
    }

    // mobile number validation
    if (empty($mobile)){
        $error = true;
        $mobError = "Please enter mobile.";
    } else if(strlen($pass) < 6) {
        $error = true;
        $mobError = "Password must have atleast 10 integers.";
    }



    // password encrypt using SHA256();
//		$password = hash('sha256', $pass);
    $password = encryptIt( $pass );


    // if there's no error, continue to signup
    if( !$error ) {

        $query = "INSERT INTO users(userName, userEmail, userCollege, userCity, userPass, userMobile, userGender) VALUES('$name','$email', '$college', '$city', '$password','$mobile','$gender')";
        $res = mysqli_query($conn,$query);

        if ($res) {
            $errTyp = "success";
            $errMSG = "Successfully registered, you may login now with " .$email;
//            unset($name);
//            unset($email);
//            unset($pass);
                $res=mysqli_query($conn,"SELECT userId, userName, userPass FROM users WHERE userEmail='$email'");
                $row=mysqli_fetch_array($res);
                $_SESSION['user'] = $row['userId'];
                header("Location: ../user/user_home");

        } else {
            $errTyp = "danger";
            $errMSG = "Something went wrong, try again later...";
        }

    }


}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Register | Vishwachinmay Online Test Series</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
    <link rel="stylesheet" href="assets/css/material-kit.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCyw2_wy58Vs_Hy7nlcFdPAlDmOTzaS-Q&libraries=places"></script>
    <style>*{font-family: 'Hind', sans-serif;}</style>
<!--    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCyw2_wy58Vs_Hy7nlcFdPAlDmOTzaS-Q&libraries=places"></script>-->
<!--    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>-->
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
                        <div class="input-group">
                            <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
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
                            <p style="margin-bottom: 30px; margin-top: 60px;" class="text-divider loginText margin-bottom">Register</p>
                            <div class="content">


                                <div class="input-group  col-md-12 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="material-icons">person</i></span>
                                        <input type="text" required id="inputName" name="name" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" />
                                    </div>
                                    <span id="e-name" class="text-danger"><?php echo $nameError; ?></span>
                                </div>

                                <div class="input-group col-md-12 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="material-icons">email</i></span>
                                        <input type="email" required id="inputMail" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
                                    </div>
                                    <span id="e-mail" class="text-danger text-left"><?php echo $emailError; ?></span>
                                </div>

                                <div class="input-group col-md-12 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="material-icons">account_balance</i></span>
                                        <input type="text" required id="inputClg" name="college" class="form-control" placeholder="Enter Your College" maxlength="100" value="<?php echo $college ?>" />
                                    </div>
                                    <span id="e-mail" class="text-danger text-left"><?php echo $emailError; ?></span>
                                </div>


                                <div class="input-group col-md-12 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="material-icons">location_city</i></span>
                                        <input type="text" required id="inputCity" name="city" class="form-control"  placeholder="Enter Your City" maxlength="40" value="<?php echo $city ?>" />
                                    </div>
                                    <span id="e-mail" class="text-danger text-left"><?php echo $emailError; ?></span>
                                </div>


                                <div class="input-group col-md-12 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="material-icons">lock</i></span>
                                        <input type="password" required id="inputPass"  name="pass" class="form-control" placeholder="Set a new Password" maxlength="15" />
                                    </div>
                                    <span id="e-pass" class="text-danger"><?php echo $passError; ?></span>
                                </div>

                                <div class="input-group col-md-12 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="material-icons">lock</i></span>
                                        <input type="password" required id="cnfPass" name="pass" class="form-control" placeholder="Confirm Password" maxlength="15" />
                                    </div>
                                    <span id="e-cnf-pass" class="text-danger"><?php echo $passError; ?></span>
                                </div>


                                <div class="input-group col-md-12 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="material-icons">smartphone</i></span>
                                        <input type="int" required id="inputMobile" name="mobile" class="form-control" placeholder="Enter Mobile number" maxlength="10" />
                                    </div>
                                    <span id="e-mobile" class="text-danger"><?php echo $mobError; ?></span>
                                </div>

                                <div class="input-group col-md-12 col-md-offset-2 gender">
                <span id="male-radio">
                    <input type="radio" name="gender" value="Male" required class="with-gap" id="male"/>
                    <label for="male">Male</label>
                    &nbsp;
                    <span>
                    <input type="radio" name="gender" value="Female" required class="with-gap" id="female" />
                    <label for="female">Female</label>
                </span>
                    <span id="e-gender" class="text-danger"><?php echo $genderError; ?></span>

                                </div>



                                <div class="footer text-center">
                                    <button  id="submit-btn" type="submit" name="btn-signup" class="btn btn-simple btn-primary newBtn btn-lg">SIGN UP</button>
                                </div>



                            </div>

                        </form>
                    </div>
                    <a href="login" class="col-md-offset-3 btn btn-simple btn-primary btn-lg newBtn">Already have an account?</a>

                </div>

</body>
</html>
<?php ob_end_flush(); ?>
<script>
    var input = document.getElementById('inputCity');
    var autocomplete = new google.maps.places.Autocomplete(input);
    function initialize() {
        var input = document.getElementById('inputCity');
        new google.maps.places.Autocomplete(input);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<script src="assets/js/jquery-1.11.3-jquery.min.js"></script>
<script src="assets/js/bootstrap.js" type="text/javascript"></script>
<script src="assets/js/material.min.js"></script>
<script src="assets/js/material-kit.js"></script>
<script src="assets/js/validation.js"></script>
