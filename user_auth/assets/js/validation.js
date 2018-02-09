$(document).ready( function () {

    // Validating User name
    $('#inputName').keyup( function () {
        $username = $('#inputName').val();
        var alpha = /^[a-zA-Z ]+$/.test($username);
        if(alpha == true){

            if(($username != '')){
                $('#e-name').text("");
                $('#submit-btn').removeAttr('disabled');
            } else {
                $('#e-name').text("This field is required");
                $('#submit-btn').attr("disabled", "disabled");
            }

            if( $username.length > '4') {
                $('#e-name').text("");
                $('#submit-btn').removeAttr('disabled');

            } else {
                $('#e-name').text("Please enter your full name.");
                $('#submit-btn').attr("disabled", "disabled");
            }
        } else {
            $('#e-name').text("Please enter valid name.");
            $('#submit-btn').attr("disabled", "disabled");
        }
    })

    // Validating and checking for email address
    $('#inputMail').keyup( function(){
        $usermail = $('#inputMail').val();
        console.log($usermail);
        function validateEmail(email) {
            var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }
        console.log(validateEmail($usermail));
        if (validateEmail($usermail)) {
            console.log("INto the ifs");
            $('#e-mail').load("mail-verify.php", {
                usermail: $usermail,
                textval: "textval"
            });
        }

    })

    $('#inputPass').keyup( function () {
        $userpass = $('#inputPass').val();


            if(($userpass != '')){
                $('#e-pass').text("");
                $('#submit-btn').removeAttr('disabled');

            } else {
                $('#e-pass').text("This field is required");
                $('#submit-btn').attr("disabled", "disabled");
            }

            if( $userpass.length > '5') {
                $('#e-pass').text("");
                $('#submit-btn').removeAttr('disabled');

            } else {
                $('#e-pass').text("Please enter at least six characters.");
                $('#submit-btn').attr("disabled", "disabled");
            }

    })

    $('#cnfPass').keyup( function(){
        $userpass = $('#inputPass').val();
        $cnfpass = $('#cnfPass').val();
        if($cnfpass == $userpass) {
            $('#e-cnf-pass').text("");
            $('#submit-btn').removeAttr('disabled');

        } else {
            $('#e-cnf-pass').text("Password not matched");
            $('#submit-btn').attr("disabled", "disabled");
        }
    })

    $('#inputMobile').keyup( function(){
        $usermobile = $('#inputMobile').val();
        if($usermobile.length == '10'){
            $('#e-mobile').text('');
            $('#submit-btn').removeAttr('disabled');

        } else {
            $('#e-mobile').text('Enter valid mobile number');
            $('#submit-btn').attr("disabled", "disabled");
        }
    })


})