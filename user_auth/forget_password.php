
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Log In | Vishwachinmya</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
    <link rel="stylesheet" href="assets/css/material-kit.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <style>*{font-family: 'Lato', sans-serif;}</style>
</head>
<body class="signup-page">

<div class="wrapper">
    <div class="header header-filter" style="background-image: url('assets/img/panel-bg.png'); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <?php
                ob_start();
                session_start();
                require_once '../dbconnect.php';
                include '../user/helpers/helper_functions.php';

                // it will never let you open index(login) page if session is set
                if ( isset($_SESSION['user'])!="" ) {
                    header("Location: ../user/user_home");
                    exit;
                }

                // include './invasion/user_home.php';
                $error = false;

                if( isset($_POST['btn-login']) ) {

                    // prevent sql injections/ clear user invalid inputs
                    $email = trim($_POST['email']);
                    $email = strip_tags($email);
                    $email = htmlspecialchars($email);



                    if(empty($email)){
                        $error = true;
                        $emailError = "Please enter your email address.";
                    } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
                        $error = true;
                        $emailError = "Please enter valid email address.";
                    }



                    // if there's no error, continue to login
                    if (!$error) {

//			$password = hash('sha256', $pass); // password hashing using SHA256


                        $res=mysqli_query($conn,"SELECT * FROM users WHERE userEmail='$email'");
                        $row=mysqli_fetch_array($res);
                        $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

                        $pass = decryptIt($row['userPass']);

                        if( $count == 1 ) {

                            $value = $email;
                            $subject = 'Vishwachinmay Ayurved | Recover your Account';
                            $message = 'The combination of secret letters that you forget is' .$pass;
                            $body = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="http://www.agatyacaterers.com/theInvasion/user_auth/assets/css/app.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width">
    <title>My Password Email Template Subject</title>
    <!-- <style> -->
  </head>
  <body>
    <span class="preheader"></span>
    <table class="body">
      <tr>
        <td class="center" align="center" valign="top">
          <center data-parsed="">
            
            <table align="center" class="container float-center"><tbody><tr><td>
            
              <table class="row header"><tbody><tr>
                <th class="small-12 large-12 columns first last"><table><tr><th>
            
                  <table class="spacer"><tbody><tr><td height="16px" style="font-size:16px;line-height:16px;">&#xA0;</td></tr></tbody></table> 
                  
                  <h4 class="text-center">Vishwyachinmay Ayurved Classes</h4>
                </th>
<th class="expander"></th></tr></table></th>
              </tr></tbody></table>
              <table class="row"><tbody><tr>
                <th class="small-12 large-12 columns first last"><table><tr><th>
            
                  <table class="spacer"><tbody><tr><td height="32px" style="font-size:32px;line-height:32px;">&#xA0;</td></tr></tbody></table> 
            
                  <center data-parsed="">
                    <img src="http://www.agatyacaterers.com/theInvasion/user_auth/assets/img/logo.png" width="250px" align="center" class="float-center">
                  </center>
            
                  <table class="spacer"><tbody><tr><td height="16px" style="font-size:16px;line-height:16px;">&#xA0;</td></tr></tbody></table> 
            
                  <h1 class="text-center">Forgot Your Password?</h1>
                  
                  <table class="spacer"><tbody><tr><td height="16px" style="font-size:16px;line-height:16px;">&#xA0;</td></tr></tbody></table> 
            
                  <p class="text-center">It happens. Here\'s your forgotten password : '.$pass.' .</p>
                  <div class="text-center"><button class="large"><a href="http://www.agatyacaterers.com/theInvasion/user_auth/login" align="center" class="float-center">Login Now</a></button></div>
                  <table class="button large expand"><tr><td><table><tr><td><center data-parsed=""><a href="http://www.agatyacaterers.com/theInvasion/user_auth/login" align="center" class="float-center">Login Now</a></center></td></tr></table></td>
<td class="expander"></td></tr></table>
            
                  <hr>
            
                  <p><small>You\'re getting this email because someone requested for account recovery with your mail address.</small></p>
                </th>
<th class="expander"></th></tr></table></th>
              </tr></tbody></table>
            
              <table class="spacer"><tbody><tr><td height="16px" style="font-size:16px;line-height:16px;">&#xA0;</td></tr></tbody></table> 
            </td></tr></tbody></table>
            
          </center>
        </td>
      </tr>
    </table>
    <!-- prevent Gmail on iOS font size manipulation -->
   <div style="display:none; white-space:nowrap; font:15px courier; line-height:0;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </div>
  </body>
</html>

';
                            $from = 'admin@Vishwachinmayayurved.com';
                            $reply = 'admin@Vishwachinmayayurved.com';

                            $headers = "MIME-Version: 1.0" . "\r\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                            $headers .= "From: Vishwachinmay Ayurved<".$from.">\r\n";
                            $headers .= "Reply-To: ".$reply."";

                            if(mail($value,$subject,$body,$headers))
                            {
                                echo '<div class="alert alert-success">
                                        <div class="container-fluid">
                                          <div class="alert-icon">
                                            <i class="material-icons">check</i>
                                          </div>
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                          </button>
                                          <b>Success Alert:</b> A mail has been sent to  <b>'.$value.'.</b>
                                        </div>
                                    </div>';
                            }
                            else{
                                echo "No email send!";
                                echo '<div class="alert alert-danger">
                                        <div class="container-fluid">
                                          <div class="alert-icon">
                                            <i class="material-icons">error_outline</i>
                                          </div>
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                          </button>
                                          <b>Error Alert:</b> No Mail Sent! Something went wrong!
                                        </div>
                                    </div>';
                            }
                            unset($email);
                        } else {
                            $errMSG = "Incorrect Credentials, Try again...";
                        }

                    }

                }
                ?>


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
                            <p style="margin-bottom: 30px; margin-top: 60px;" class="text-divider loginText margin-bottom">RECOVER YOUR ACCOUNT</p>

                            <div class="content">

                                <div class="input-group">
                                    <span class="input-group-addon"><i class="material-icons">email</i></span>
                                    <input type="email" name="email"  value="<?php echo $email; ?>" maxlength="40"  class="form-control" placeholder="Email...">
                                    <span class="text-danger"><?php echo $emailError; ?></span>
                                </div>


                            </div>

                            <div class="footer text-center">
                                <button  type="submit" name="btn-login" class="btn btn-simple btn-primary newBtn btn-lg">SEND MAIL</button>
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

