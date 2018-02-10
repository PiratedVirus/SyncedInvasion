
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
                        $name = $row['userName'];

                        if( $count == 1 ) {

                            $value = $email;
                            $subject = 'Vishwachinmay Ayurved | Recover your Account';
                            $message = 'The combination of secret letters that you forget is' .$pass;
                            $body = '<head>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    @media screen and (max-width: 720px) {
      body .c-v84rpm {
        width: 100% !important;
        max-width: 720px !important;
      }
      body .c-v84rpm .c-7bgiy1 .c-1c86scm {
        display: none !important;
      }
      body .c-v84rpm .c-7bgiy1 .c-f1bud4 .c-pekv9n .c-1qv5bbj,
      body .c-v84rpm .c-7bgiy1 .c-f1bud4 .c-1c9o9ex .c-1qv5bbj,
      body .c-v84rpm .c-7bgiy1 .c-f1bud4 .c-90qmnj .c-1qv5bbj {
        border-width: 1px 0 0 !important;
      }
      body .c-v84rpm .c-7bgiy1 .c-f1bud4 .c-183lp8j .c-1qv5bbj {
        border-width: 1px 0 !important;
      }
      body .c-v84rpm .c-7bgiy1 .c-f1bud4 .c-pekv9n .c-1qv5bbj {
        padding-left: 12px !important;
        padding-right: 12px !important;
      }
      body .c-v84rpm .c-7bgiy1 .c-f1bud4 .c-1c9o9ex .c-1qv5bbj,
      body .c-v84rpm .c-7bgiy1 .c-f1bud4 .c-90qmnj .c-1qv5bbj {
        padding-left: 8px !important;
        padding-right: 8px !important;
      }
      body .c-v84rpm .c-ry4gth .c-1dhsbqv {
        display: none !important;
      }
    }


    @media screen and (max-width: 720px) {
      body .c-v84rpm .c-ry4gth .c-1vld4cz {
        padding-bottom: 10px !important;
      }
    }
  </style>
  <title>Recover your Vishwachinmay password</title>
</head>

<body style="margin: 0; padding: 0; font-family: &quot; HelveticaNeueLight&quot;,&quot;HelveticaNeue-Light&quot;,&quot;HelveticaNeueLight&quot;,&quot;HelveticaNeue&quot;,&quot;HelveticaNeue&quot;,Helvetica,Arial,&quot;LucidaGrande&quot;,sans-serif;font-weight: 300; font-stretch: normal; font-size: 14px; letter-spacing: .35px; background: #EFF3F6; color: #333333;">
  <table border="1" cellpadding="0" cellspacing="0" align="center" class="c-v84rpm" style="border: 0 none; border-collapse: separate; width: 720px;" width="720">
    <tbody>
      <tr class="c-1syf3pb" style="border: 0 none; border-collapse: separate; height: 114px;">
        <td style="border: 0 none; border-collapse: separate; vertical-align: middle;" valign="middle">
          <table align="center" border="1" cellpadding="0" cellspacing="0" class="c-f1bud4" style="border: 0 none; border-collapse: separate;">
            <tbody>
              <tr align="center" class="c-1p7a68j" style="border: 0 none; border-collapse: separate; padding: 16px 0 15px;">
                <td style="border: 0 none; border-collapse: separate; vertical-align: middle;" valign="middle"><a href="https://vishwachinmayayurved.com/"><img alt="" src="https://vishwachinmayayurved.com/assets/img/vishwa_ayurved.png" class="c-1shuxio" style="border: 0 none; line-height: 100%; outline: none; text-decoration: none;  width: 300px;" width="300"></a></td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
      <tr class="c-7bgiy1" style="border: 0 none; border-collapse: separate; -webkit-box-shadow: 0 3px 5px rgba(0,0,0,0.04); -moz-box-shadow: 0 3px 5px rgba(0,0,0,0.04); box-shadow: 0 3px 5px rgba(0,0,0,0.04);">
        <td style="border: 0 none; border-collapse: separate; vertical-align: middle;" valign="middle">
          <table align="center" border="1" cellpadding="0" cellspacing="0" class="c-f1bud4" style="border: 0 none; border-collapse: separate; width: 100%;" width="100%">
            <tbody>
              <tr class="c-pekv9n" style="border: 0 none; border-collapse: separate; text-align: center;" align="center">
                <td style="border: 0 none; border-collapse: separate; vertical-align: middle;" valign="middle">
                  <table border="1" cellpadding="0" cellspacing="0" width="100%" class="c-1qv5bbj" style="border: 0 none; border-collapse: separate; border-color: #E3E3E3; border-style: solid; width: 100%; border-width: 1px 1px 0; background: #FBFCFC; padding: 40px 54px 42px;">
                    <tbody>
                      <tr style="border: 0 none; border-collapse: separate;">
                        <td class="c-1m9emfx c-zjwfhk" style="border: 0 none; border-collapse: separate; vertical-align: middle; font-family: &quot; HelveticaNeueLight&quot;,&quot;HelveticaNeue-Light&quot;,&quot;HelveticaNeueLight&quot;,&quot;HelveticaNeue&quot;,&quot;HelveticaNeue&quot;,Helvetica,Arial,&quot;LucidaGrande&quot;,sans-serif;font-weight: 300; color: #1D2531; font-size: 25.45455px;"
                          valign="middle">Dear '.$name.', recover your password.</td>
                      </tr>
                      <tr style="border: 0 none; border-collapse: separate;">
                        <td class="c-46vhq4 c-4w6eli" style="border: 0 none; border-collapse: separate; vertical-align: middle; font-family: &quot; HelveticaNeue&quot;,&quot;HelveticaNeue&quot;,&quot;HelveticaNeueRoman&quot;,&quot;HelveticaNeue-Roman&quot;,&quot;HelveticaNeueRoman&quot;,&quot;HelveticaNeue-Regular&quot;,&quot;HelveticaNeueRegular&quot;,Helvetica,Arial,&quot;LucidaGrande&quot;,sans-serif;font-weight: 400; color: #7F8FA4; font-size: 15.45455px; padding-top: 20px;"
                          valign="middle">Looks like you lost your password?</td>
                      </tr>
                      <tr style="border: 0 none; border-collapse: separate;">
                        <td class="c-eitm3s c-16v5f34" style="border: 0 none; border-collapse: separate; vertical-align: middle; font-family: &quot; HelveticaNeueMedium&quot;,&quot;HelveticaNeue-Medium&quot;,&quot;HelveticaNeueMedium&quot;,&quot;HelveticaNeue&quot;,&quot;HelveticaNeue&quot;,sans-serif;font-weight: 500; font-size: 13.63636px; padding-top: 12px;"
                            valign="middle">We’re here to help. Your current password is <b>'.$pass.'</b>. Click on the button to login agian.</td>
                      </tr>
                      <tr style="border: 0 none; border-collapse: separate;">
                        <td class="c-rdekwa" style="border: 0 none; border-collapse: separate; vertical-align: middle; padding-top: 38px;" valign="middle"><a href="https://test.vishwachinmayayurved.com/user_auth/login" target="_blank"
                            class="c-1eb43lc c-1sypu9p c-16v5f34" style="color: #000000; -webkit-border-radius: 4px; font-family: &quot; HelveticaNeueMedium&quot;,&quot;HelveticaNeue-Medium&quot;,&quot;HelveticaNeueMedium&quot;,&quot;HelveticaNeue&quot;,&quot;HelveticaNeue&quot;,sans-serif;font-weight: 500; font-size: 13.63636px; line-height: 15px; display: inline-block; letter-spacing: .7px; text-decoration: none; -moz-border-radius: 4px; -ms-border-radius: 4px; -o-border-radius: 4px; border-radius: 4px; background-color: #40A653; background-image: url(&quot;https://mail.crisp.chat/images/linear-gradient(-1deg,#137ECE2%,#288BD598%)&quot; );color: #ffffff; padding: 12px 24px;">Login now</a></td>
                      </tr>
                      <tr style="border: 0 none; border-collapse: separate;">
                        <td class="c-ryskht c-zjwfhk" style="border: 0 none; border-collapse: separate; vertical-align: middle; font-family: &quot; HelveticaNeueLight&quot;,&quot;HelveticaNeue-Light&quot;,&quot;HelveticaNeueLight&quot;,&quot;HelveticaNeue&quot;,&quot;HelveticaNeue&quot;,Helvetica,Arial,&quot;LucidaGrande&quot;,sans-serif;font-weight: 300; font-size: 12.72727px; font-style: italic; padding-top: 52px;"
                          valign="middle">If you didn’t ask to recover your password, please ignore this email.</td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
              <tr class="c-1c9o9ex c-1c86scm" style="border: 0 none; border-collapse: separate;">
                <td style="border: 0 none; border-collapse: separate; vertical-align: middle;" valign="middle">
                  <table border="1" cellpadding="0" cellspacing="0" width="100%" class="c-1qv5bbj" style="border: 0 none; border-collapse: separate; border-color: #E3E3E3; border-style: solid; width: 100%; border-width: 1px 1px 0; background: #FFFFFF; padding: 32px 40px 40px; padding-top: 30px; padding-bottom: 40px;">
                    <tbody>
                      <tr style="border: 0 none; border-collapse: separate;">
                        <td class="c-kjgl4z c-zjwfhk" style="border: 0 none; border-collapse: separate; vertical-align: middle; font-family: &quot; HelveticaNeueLight&quot;,&quot;HelveticaNeue-Light&quot;,&quot;HelveticaNeueLight&quot;,&quot;HelveticaNeue&quot;,&quot;HelveticaNeue&quot;,Helvetica,Arial,&quot;LucidaGrande&quot;,sans-serif;font-weight: 300; text-align: center; color: #7F8FA4; font-size: 20px; line-height: 22px;"
                          valign="middle" align="center">Tired of forgetting your password?</td>
                      </tr>
                      <tr style="border: 0 none; border-collapse: separate;">
                        <td class="c-1izzcs5 c-1gcznrt c-188skwt c-4w6eli" style="border: 0 none; border-collapse: separate; vertical-align: middle; font-family: &quot; HelveticaNeue&quot;,&quot;HelveticaNeue&quot;,&quot;HelveticaNeueRoman&quot;,&quot;HelveticaNeue-Roman&quot;,&quot;HelveticaNeueRoman&quot;,&quot;HelveticaNeue-Regular&quot;,&quot;HelveticaNeueRegular&quot;,Helvetica,Arial,&quot;LucidaGrande&quot;,sans-serif;font-weight: 400; text-align: center; font-size: 13.63636px; padding: 14px 0; line-height: 22px; padding-top: 16px;"
                          valign="middle" align="center">Why wouldn’t you try using a password manager? Here are the best ones.</td>
                      </tr>
                      <tr style="border: 0 none; border-collapse: separate;">
                        <td style="border: 0 none; border-collapse: separate; vertical-align: middle;" valign="middle">
                          <table border="1" cellpadding="0" cellspacing="0" width="100%" class="c-hji185" style="border: 0 none; border-collapse: separate; padding: 36px 30px 4px;">
                            <tbody>
                              <tr style="border: 0 none; border-collapse: separate;">
                                <td width="33%" class="c-iwjxo3" style="border: 0 none; border-collapse: separate; vertical-align: middle;" valign="middle">
                                  <table border="1" cellpadding="0" cellspacing="0" width="100%" style="border: 0 none; border-collapse: separate;">
                                    <tbody>
                                      <tr style="border: 0 none; border-collapse: separate;">
                                        <td width="33%" class="c-1ypse9w" style="border: 0 none; border-collapse: separate; vertical-align: middle; text-align: right;" valign="middle" align="right"><span class="c-1r5mseh"><img alt="" src="https://mail.crisp.chat/images/content/account_recovery/icon_1password.png" class="c-g98bj3" style="border: 0 none; line-height: 100%; outline: none; text-decoration: none; height: 64px; width: 64px;" width="64" height="64"></span></td>
                                        <td
                                          width="67%" class="c-1a7tcod" style="border: 0 none; border-collapse: separate; vertical-align: middle; text-align: center; padding-right: 24px;" valign="middle" align="center">
                                          <table border="1" cellpadding="0" cellspacing="0" width="100%" style="border: 0 none; border-collapse: separate;">
                                            <tbody>
                                              <tr class="c-1dvf7hf c-zjwfhk" style="border: 0 none; border-collapse: separate; font-family: &quot; HelveticaNeueLight&quot;,&quot;HelveticaNeue-Light&quot;,&quot;HelveticaNeueLight&quot;,&quot;HelveticaNeue&quot;,&quot;HelveticaNeue&quot;,Helvetica,Arial,&quot;LucidaGrande&quot;,sans-serif;font-weight: 300; color: #000000; font-size: 14.54545px; line-height: 35px;">
                                                <td style="border: 0 none; border-collapse: separate; vertical-align: middle;" valign="middle">1Password</td>
                                              </tr>
                                              <tr class="c-1jl6f0y" style="border: 0 none; border-collapse: separate; height: 32px; display: inline-block;">
                                                <td style="border: 0 none; border-collapse: separate; vertical-align: middle;" valign="middle"><a href="https://1password.com/" target="_blank" style="text-decoration: none; letter-spacing: .7px; HelveticaNeue&quot;,&quot;HelveticaNeue&quot;,&quot;HelveticaNeueRoman&quot;,&quot;HelveticaNeue-Roman&quot;,&quot;HelveticaNeueRoman&quot;,&quot;HelveticaNeue-Regular&quot;,&quot;HelveticaNeueRegular&quot;,Helvetica,Arial,&quot;LucidaGrande&quot;,sans-serif;font-weight: 400; line-height: 15px; display: inline-block; font-family: &quot; -webkit-border-radius: 4px; -moz-border-radius: 4px; -ms-border-radius: 4px; -o-border-radius: 4px; border-radius: 4px; background: transparent; text-transform: lowercase; font-size: 10.90909px; padding: 3px 10px; color: #377FEA; border: 1px solid #377FEA;"
                                                    class="c-1eb43lc c-1v4o8f0 c-1eb43lc c-1h6ae2o c-4w6eli">Learn more</a></td>
                                              </tr>
                                            </tbody>
                                          </table>
                                </td>
                                </tr>
                                </tbody>
                                </table>
                        </td>
                        <td width="33%" class="c-iwjxo3" style="border: 0 none; border-collapse: separate; vertical-align: middle;" valign="middle">
                          <table border="1" cellpadding="0" cellspacing="0" width="100%" style="border: 0 none; border-collapse: separate;">
                            <tbody>
                              <tr style="border: 0 none; border-collapse: separate;">
                                <td width="33%" class="c-1ypse9w" style="border: 0 none; border-collapse: separate; vertical-align: middle; text-align: right;" valign="middle" align="right"><span class="c-1r5mseh"><img alt="" src="https://mail.crisp.chat/images/content/account_recovery/icon_dashlane.png" class="c-wk31m1" style="border: 0 none; line-height: 100%; outline: none; text-decoration: none; height: 64px; width: 64px;" width="64" height="64"></span></td>
                                <td
                                  width="67%" class="c-1a7tcod" style="border: 0 none; border-collapse: separate; vertical-align: middle; text-align: center; padding-right: 24px;" valign="middle" align="center">
                                  <table border="1" cellpadding="0" cellspacing="0" width="100%" style="border: 0 none; border-collapse: separate;">
                                    <tbody>
                                      <tr class="c-1dvf7hf c-zjwfhk" style="border: 0 none; border-collapse: separate; font-family: &quot; HelveticaNeueLight&quot;,&quot;HelveticaNeue-Light&quot;,&quot;HelveticaNeueLight&quot;,&quot;HelveticaNeue&quot;,&quot;HelveticaNeue&quot;,Helvetica,Arial,&quot;LucidaGrande&quot;,sans-serif;font-weight: 300; color: #000000; font-size: 14.54545px; line-height: 35px;">
                                        <td style="border: 0 none; border-collapse: separate; vertical-align: middle;" valign="middle">Dashlane</td>
                                      </tr>
                                      <tr class="c-1jl6f0y" style="border: 0 none; border-collapse: separate; height: 32px; display: inline-block;">
                                        <td style="border: 0 none; border-collapse: separate; vertical-align: middle;" valign="middle"><a href="https://www.dashlane.com/" target="_blank" style="text-decoration: none; letter-spacing: .7px; HelveticaNeue&quot;,&quot;HelveticaNeue&quot;,&quot;HelveticaNeueRoman&quot;,&quot;HelveticaNeue-Roman&quot;,&quot;HelveticaNeueRoman&quot;,&quot;HelveticaNeue-Regular&quot;,&quot;HelveticaNeueRegular&quot;,Helvetica,Arial,&quot;LucidaGrande&quot;,sans-serif;font-weight: 400; line-height: 15px; display: inline-block; font-family: &quot; -webkit-border-radius: 4px; -moz-border-radius: 4px; -ms-border-radius: 4px; -o-border-radius: 4px; border-radius: 4px; background: transparent; text-transform: lowercase; font-size: 10.90909px; padding: 3px 10px; color: #377FEA; border: 1px solid #377FEA;"
                                            class="c-1eb43lc c-1v4o8f0 c-1eb43lc c-1h6ae2o c-4w6eli">Learn more</a></td>
                                      </tr>
                                    </tbody>
                                  </table>
                        </td>
                        </tr>
                        </tbody>
                        </table>
                </td>
                <td width="33%" class="c-iwjxo3" style="border: 0 none; border-collapse: separate; vertical-align: middle;" valign="middle">
                  <table border="1" cellpadding="0" cellspacing="0" width="100%" style="border: 0 none; border-collapse: separate;">
                    <tbody>
                      <tr style="border: 0 none; border-collapse: separate;">
                        <td width="33%" class="c-1ypse9w" style="border: 0 none; border-collapse: separate; vertical-align: middle; text-align: right;" valign="middle" align="right"><span class="c-1r5mseh"><img alt="" src="https://mail.crisp.chat/images/content/account_recovery/icon_lastpass.png" class="c-1seagrh" style="border: 0 none; line-height: 100%; outline: none; text-decoration: none; height: 64px; width: 64px;" width="64" height="64"></span></td>
                        <td
                          width="67%" class="c-1a7tcod" style="border: 0 none; border-collapse: separate; vertical-align: middle; text-align: center; padding-right: 24px;" valign="middle" align="center">
                          <table border="1" cellpadding="0" cellspacing="0" width="100%" style="border: 0 none; border-collapse: separate;">
                            <tbody>
                              <tr class="c-1dvf7hf c-zjwfhk" style="border: 0 none; border-collapse: separate; font-family: &quot; HelveticaNeueLight&quot;,&quot;HelveticaNeue-Light&quot;,&quot;HelveticaNeueLight&quot;,&quot;HelveticaNeue&quot;,&quot;HelveticaNeue&quot;,Helvetica,Arial,&quot;LucidaGrande&quot;,sans-serif;font-weight: 300; color: #000000; font-size: 14.54545px; line-height: 35px;">
                                <td style="border: 0 none; border-collapse: separate; vertical-align: middle;" valign="middle">LastPass</td>
                              </tr>
                              <tr class="c-1jl6f0y" style="border: 0 none; border-collapse: separate; height: 32px; display: inline-block;">
                                <td style="border: 0 none; border-collapse: separate; vertical-align: middle;" valign="middle"><a href="https://www.lastpass.com/" target="_blank" style="text-decoration: none; letter-spacing: .7px; HelveticaNeue&quot;,&quot;HelveticaNeue&quot;,&quot;HelveticaNeueRoman&quot;,&quot;HelveticaNeue-Roman&quot;,&quot;HelveticaNeueRoman&quot;,&quot;HelveticaNeue-Regular&quot;,&quot;HelveticaNeueRegular&quot;,Helvetica,Arial,&quot;LucidaGrande&quot;,sans-serif;font-weight: 400; line-height: 15px; display: inline-block; font-family: &quot; -webkit-border-radius: 4px; -moz-border-radius: 4px; -ms-border-radius: 4px; -o-border-radius: 4px; border-radius: 4px; background: transparent; text-transform: lowercase; font-size: 10.90909px; padding: 3px 10px; color: #377FEA; border: 1px solid #377FEA;"
                                    class="c-1eb43lc c-1v4o8f0 c-1eb43lc c-1h6ae2o c-4w6eli">Learn more</a></td>
                              </tr>
                            </tbody>
                          </table>
                </td>
                </tr>
                </tbody>
                </table>
        </td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        <tr class="c-183lp8j" style="border: 0 none; border-collapse: separate;">
          <td style="border: 0 none; border-collapse: separate; vertical-align: middle;" valign="middle">
            <table border="1" cellpadding="0" cellspacing="0" width="100%" class="c-1qv5bbj" style="border: 0 none; border-collapse: separate; border-color: #E3E3E3; border-style: solid; width: 100%; background: #FFFFFF; border-width: 1px; font-size: 11.81818px; text-align: center; padding: 18px 40px 20px;"
              align="center">
              <tbody>
                <tr style="border: 0 none; border-collapse: separate;">
                  <td style="border: 0 none; border-collapse: separate; vertical-align: middle;" valign="middle"><span class="c-1w4lcwx">You receive this email because you or someone initiated a password recovery operation on your <b>Vishwachinmay</b> account.</span></td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        </tbody>
        </table>
        </td>
      </tr>
      <tr class="c-ry4gth" style="border: 0 none; border-collapse: separate;">
        <td style="border: 0 none; border-collapse: separate; vertical-align: middle;" valign="middle">
          <table border="1" cellpadding="0" cellspacing="0" width="100%" class="c-1vld4cz" style="border: 0 none; border-collapse: separate; padding-top: 26px; padding-bottom: 26px;">
            <tbody>
              <tr style="border: 0 none; border-collapse: separate;">
                <td style="border: 0 none; border-collapse: separate; vertical-align: middle;" valign="middle">
                  <table border="1" cellpadding="0" cellspacing="0" width="55%" align="center" class="c-jfe37" style="border: 0 none; border-collapse: separate; font-size: 10.90909px; text-align: center;">
                    <tbody>
                      <tr style="border: 0 none; border-collapse: separate;">
                        <td style="border: 0 none; border-collapse: separate; vertical-align: middle;" valign="middle"><a href="https://vishwachinmayayurved.com/" target="_blank" class="c-1cmrz5j" style="text-decoration: underline; color: #7F8FA4;">Vishwachinmay Clinic</a></td>
                        <td style="border: 0 none; border-collapse: separate; vertical-align: middle;" valign="middle"><a href="https://test.vishwachinmayayurved.com/" target="_blank" class="c-1cmrz5j" style="text-decoration: underline; color: #7F8FA4;">Vishwachinmay Test Series</a></td>
                        
                      </tr>
                    </tbody>
                  </table>
                  <table border="1" cellpadding="0" cellspacing="0" width="100%" class="c-15u37ze" style="border: 0 none; border-collapse: separate; font-size: 10.90909px; text-align: center; color: #7F8FA4; padding-top: 22px;" align="center">
                    <tbody>
                      <tr style="border: 0 none; border-collapse: separate;">
                        <td style="border: 0 none; border-collapse: separate; vertical-align: middle;" valign="middle">© 2018 Vishwachinmay Ayurved - All rights reserved.</td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
          <table border="1" cellpadding="0" cellspacing="0" width="100%" class="c-154w5of" style="border: 0 none; border-collapse: separate;">
            <tbody>
              <tr class="c-1dhsbqv" style="border: 0 none; border-collapse: separate; text-align: center;" align="center">
                <td class="c-1l1fguz" style="border: 0 none; border-collapse: separate; vertical-align: middle;" valign="middle"><img alt="" src="https://mail.crisp.chat/images/footer/common/separator.png" class="c-y3y5wk" style="border: 0 none; line-height: 100%; outline: none; text-decoration: none; height: 2px; width: 719px;" width="719" height="2"></td>
              </tr>
              <tr class="c-19hn9rj" style="border: 0 none; border-collapse: separate;">
                <td align="center" class="c-172hpk9" style="border: 0 none; border-collapse: separate; vertical-align: middle; padding-top: 15px; padding-bottom: 22px;" valign="middle">
                  <a href="https://crisp.chat/en/" target="_blank" class="c-1td7ar" style="color: #000000; text-decoration: none;">
                    <table border="1" cellpadding="0" cellspacing="0" style="border: 0 none; border-collapse: separate;">
                      <tbody>
                        <tr style="border: 0 none; border-collapse: separate;">
                          <td class="c-r0h1s c-4w6eli" style="border: 0 none; border-collapse: separate; vertical-align: middle; font-family: &quot; HelveticaNeue&quot;,&quot;HelveticaNeue&quot;,&quot;HelveticaNeueRoman&quot;,&quot;HelveticaNeue-Roman&quot;,&quot;HelveticaNeueRoman&quot;,&quot;HelveticaNeue-Regular&quot;,&quot;HelveticaNeueRegular&quot;,Helvetica,Arial,&quot;LucidaGrande&quot;,sans-serif;font-weight: 400; color: #b3b6b8; font-size: 12.5px;"
                            valign="middle">Made with ♡ by <a href="http://piratedvirus.com/" style="color: #2196F3; text-decoration: none;" target="_blank">Pirated Virus.</a> 
</td>
                          
                        </tr>
                      </tbody>
                    </table>
                  </a>
                </td>
              </tr>
            </tbody>
          </table>

        </td>
      </tr>
    </tbody>
  </table>
</body>';
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
                    <a href="login" class="col-md-offset-3 btn btn-simple btn-primary btn-lg newBtn">LOGIN</a>
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

