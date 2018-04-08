
<?php

if( isset($_POST['sendMail']) ) {

// prevent sql injections/ clear user invalid inputs
    $email = trim($_POST['mailID']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);
    echo $email;

    $value = $email;
    $subject = 'Invitation for Beta Testing';
    $message = 'The combination of secret letters that you forget is' . $pass;
    $msg = '<head>

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width">

        <!--[if !mso]><!-->
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--<![endif]-->

        <title>Confirmed, you’re on the Twist beta waitlist!</title>


        <!-- Normalize Styles -->
        <style type="text/css">
          @import url(\'https://fonts.googleapis.com/css?family=Lato\');
          @font-face {
  font-family: "Telefon";
  src: url("https://production-assets.codepen.io/assets/telefon/black/3f32b1c9-8e26-465e-ae02-ff82a378b670-3-78992f1ed89d5cadb09702e6a0d5bbb0302e85c728c1f8d18fdc8aa56870104c.woff") format("woff"), url("https://production-assets.codepen.io/assets/telefon/black/3f32b1c9-8e26-465e-ae02-ff82a378b670-3-6435f1279663bb84d4a1d8effe0adafbf8499ff6efdd01a59be848c90d8c4c0b.woff2") format("woff2");
}

            /* What it does: Remove spaces around the email design added by some email clients. */
            /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
            html,
            body {
                margin: 0 auto !important;
                padding: 0 !important;
                height: 100% !important;
                width: 100% !important;
            }
          
          .sendBtn{
            margin-top: 12px;
            display: inline-block;
            padding: 14px 14px;
            margin-bottom: 0;
            font-size: 16px;
            line-height:20px;
            color: #fff;
            text-align: center;
            text-shadow: 0 1px 0px rgba(255, 255, 255, .125);
            vertical-align: middle;
            cursor: pointer;
            background-color: #F57C00;
            border: none;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
          }

            /* What it does: Stops WebKit and Windows mobile clients resizing small text. */
            * {
                -ms-text-size-adjust: 100%;
                -webkit-text-size-adjust: 100%;
            }

            /* What is does: Centers email on Android 4.4 */
            div[style*="margin: 16px 0"] {
                margin: 0 !important;
            }

            /* What it does: Remove spacing between tables in Outlook 2007 and up. */
            table,
            td {
                mso-table-lspace: 0pt !important;
                mso-table-rspace: 0pt !important;
            }

            /* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. */
            table {
                border-spacing: 0 !important;
                border-collapse: collapse !important;
                table-layout: fixed !important;
                margin: 0 auto !important;
            }

            /* What it does: Reset styles. */
            img {
                line-height: 100%;
                outline: none;
                text-decoration: none;
                /* Uses a smoother rendering method when resizing images in IE. */
                -ms-interpolation-mode: bicubic;
                /* Remove border when inside `a` element in IE 8/9/10. */
                border: 0;
                /* Sets a maximum width relative to the parent and auto scales the height */
                max-width: 100%;
                height: auto;
                /* Remove the gap between images and the bottom of their containers */
                vertical-align: middle;
            }

            /* What it does: Overrides styles added when Yahoo\'s auto-senses a link. */
            .yshortcuts a {
                border-bottom: none !important;
            }

            /* What it does: A work-around for iOS meddling in triggered links. */
            a[x-apple-data-detectors] {
                color: inherit !important;
                text-decoration: none !important;
                font-size: inherit !important;
                font-family: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
            }

            /* What it does: Neutralize whitespace for inline-block grids on iOS. */
            @media screen and (min-width: 600px) {
                .ios-responsive-grid {
                    display: -webkit-box !important;
                    display: flex !important;
                }
                /* Alternative method. Not needed if already using the .ios-responsive-grid flex workaround. */
                /* .ios-responsive-grid__unit class would need to be added to the inline-block <div> grid units  */
                .ios-responsive-grid__unit  {
                    float: left;
                }
            }

            

        </style>

        <!--[if gte mso 9]>
        <style type="text/css">
            /* What it does: Normalize space between bullets and text. */
            /* https://litmus.com/community/discussions/1093-bulletproof-lists-using-ul-and-li */
            li {
                text-indent: -1em;
            }
        </style>
        <![endif]-->

        <!-- Progressive Enhancements -->
        <style type="text/css">
          
          *{
            font-family: \'Lato\', sans-serif;
          }

            /* Components */

            /* What it does: Hover styles for buttons */
            .button__td,
            .button__a {
                transition: all 100ms ease;
            }

            .button__td:hover,
            .button__a:hover {
                background: #1ab77b !important;
            }

            

            /* What it does: Mobile optimized styles */
            @media screen and (max-width: 599px) {

                /* Components */

                

.tw-card { padding: 20px !important; }
.tw-h1 { font-size: 22px !important; }



                /* Utilities */

                /* Display */
                .mobile-hidden {
                    display: none !important;
                }

                .mobile-d-block {
                    display: block !important;
                }

                /* Size */
                .mobile-w-full {
                    width: 100% !important;
                }

                /* Margin */
                .mobile-m-h-auto {
                    margin: 0 auto !important;
                }

                /* Padding */
                .mobile-p-0 {
                    padding: 0 !important;
                }

                .mobile-p-t-0 {
                    padding-top: 0 !important;
                }

                /* Images */
                .mobile-img-fluid {
                    max-width: 100% !important;
                    width: 100% !important;
                    height: auto !important;
                }
            }

        </style>
    </head>


        

    

    <body style="background: #ffffff; height: 100% !important; margin: 0 auto !important; padding: 0 !important; width: 100% !important; ;">

        

            

    <div style="display: none; font-size: 1px; line-height: 1px; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all;">
        
                
            
    </div>



            

    

    <table cellpadding="0" cellspacing="0" style="background: #f2f2f2; border: 0; border-radius: 0; width: 100%;">
        <tbody><tr>
            <td align="center" class="" style="padding: 0 20px;">

                <table cellpadding="0" cellspacing="0" style="background: #f2f2f2; border: 0; border-radius: 0;">
                    <tbody><tr>
                        <td align="center" class="" style="width: 600px;">


                                        
                
    

    

    <table cellpadding="0" cellspacing="0" dir="ltr" style="border: 0; width: 100%;">

        <tbody><tr>
            <td class="" style="padding: 20px 0; text-align: center; ;">

                
        

    

    <a href="https://twistapp.com#utm_source=lc&amp;utm_medium=email&amp;utm_campaign=onboarding_admin_waitlist" style="text-decoration: none; ;" target="_blank">

      <h2 style=\'font-family: Telefon; color: #FF9800\'>iTechnoMinds</h2>

    </a>



    

            </td>
        </tr>

    </tbody></table>



                

    

    <table cellpadding="0" cellspacing="0" style="background: #ffffff; border: 0; border-radius: 4px; width: 100%;">
        <tbody><tr>
            <td align="center" class="tw-card" style="padding: 20px 50px;">


                                        
                    

    
    

    

    <table cellpadding="0" cellspacing="0" dir="ltr" style="border: 0; width: 100%;">

        <tbody><tr>
            <td class="" style="padding: 20px 0; text-align: center; ;">

                
        
        

    


        <img alt="" class=" " src="https://static.twistapp.com/eee278cf8d8222ad8c36e3fdfeeafbf5.png" style="border: 0; height: auto; max-width: 100%; vertical-align: middle; ;" width="337">




    
    

            </td>
        </tr>

    </tbody></table>




    
    

    

    <table cellpadding="0" cellspacing="0" dir="ltr" style="border: 0; width: 100%;">

        <tbody><tr>
            <td class="" style="padding: 20px 0; text-align: left; color: #474747; font-family: sans-serif;;">

                
        
        
    

    <p style="margin: 20px 0;; font-size: 14px; mso-line-height-rule: exactly; line-height: 24px; margin: 30px 0;; ;">

        
        
            

    

    <span style="font-weight: bold;;">Hey there! Greetings from Saurabh Kulkarni on behalf of <a style=\'text-decoration: none; color: #F57C00\' href="http://piratedvirus.com/">iTechnominds.com</a></span>


        
    

    </p>



        
    

    <p style="margin: 20px 0;; font-size: 14px; mso-line-height-rule: exactly; line-height: 24px; margin: 30px 0;; ;">

        
        
            You are receiving this mail because, somehow you are involved in the growth of <a style=\'text-decoration: none; color: #F57C00\' href="http://piratedvirus.com/">iTechnominds</a>. Today, we are very pleased to announce one of our recent <b><a style=\'text-decoration: none\' color = \'#2196F3\' href="https://test.vishwachinmayayurved.com">web application</a> which aims to conduct online test series</b>, goes to private beta. You\'ve been selected to be one of the our first users. To activate your account, please follow <br>
      <a style=\'text-decoration: none\' href="https://test.vishwachinmayayurved.com/user_auth/register" class=\'sendBtn\' >Click Here to activate your account</a>
        
    

    </p>



        
    

    <p style="margin: 20px 0;; font-size: 14px; mso-line-height-rule: exactly; line-height: 24px; margin: 30px 0;; ;">

        
        
        
    

    </p>



        
    

    <p style="margin: 20px 0;; font-size: 14px; mso-line-height-rule: exactly; line-height: 24px; margin: 30px 0;; ;">

        
        
            During the private beta, we will be working hard for improving the service, implementing new integrations and providing best application design. <b>We would love, if you enroll for a any plan and complete one test. Please feel free to \'scan\' all pages in search of bugs.</b>  Your feedback is very valuable, so please share it! Have questions about the Beta? We’d love to help! Just click here to reply <a href="mailto:saurabhk201@gmail.com?Subject=About%20Beta%20Testing" target="_top">saurabhk201@gmail.com</a>
        
    

    </p>



        
    
    

    <p style="margin: 20px 0;; font-size: 14px; mso-line-height-rule: exactly; line-height: 24px; margin: 30px 0;; margin: 45px 0 0; ;">

        
        Our Best, <br> 

    

    <span style="font-weight: bold;;">Saurabh and iTechnominds Team.</span>


    

    </p>



    
    

            </td>
        </tr>

    </tbody></table>





                


            </td>
        </tr>
    </tbody></table>


                
    

    

    <table cellpadding="0" cellspacing="0" dir="ltr" style="border: 0; width: 100%;">

        <tbody><tr>
            <td class="" style="padding: 20px 0; text-align: center; color: #8f8f8f; font-family: sans-serif; font-size: 12px; mso-line-height-rule: exactly; line-height: 20px;;">

                
        

    <p style="margin: 20px 0;; margin: 0;;">

        
            Made with ♡ by <a href="http://piratedvirus.com/" style="color: #316fea; text-decoration: none;" target="_blank">Pirated Virus.</a> 
        

    </p>


    

            </td>
        </tr>

    </tbody></table>



            



                        </td>
                    </tr>
                </tbody></table>

            </td>
        </tr>
    </tbody></table>
    
</body>';


    $from = 'admin@piratedvirus.com';
    $reply = 'admin@piratedvirus.com';

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: Saurabh Kulkarni<".$from.">\r\n";
    $headers .= "Reply-To: ".$reply."";
    echo $msg;
    if (mail($value, $subject, $msg, $headers)) {
        echo 'Sent';

    } else {
        echo "No email send!";

    }
}
        ?>

<form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
<input type="text" name="mailID" placeholder="Mail Id here...">
    <input type="submit" name="sendMail" value="send">
</form>