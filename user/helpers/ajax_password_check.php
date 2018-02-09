<?php

    include 'sessions.php';
    include '../../dbconnect.php';
    include 'sql_functions.php';
    include 'helper_functions.php';

    $enteredPass = $_POST['enteredPass'];
    $status = $_POST['btnClicked'];

    $savedEncryptedPass = getUserPassword($conn, $id);

//  Encrypt entered password
    $userEncryptedPass = encryptIt($enteredPass);


    if($savedEncryptedPass == $userEncryptedPass){
        echo "Password matched";
        echo '<p><input type="password" required minlength="6" class="profileNameInput customInput margin-top" id="newPassword" name="newPassword" placeholder="New Password"></p>';
        echo '<p><input type="password"  class="profileNameInput customInput margin-top" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password"></p>';
        echo '<button class="btn btn-default updatePassBtn newBtn">Update Password</button>';
    } else {
        echo "No match found";
        echo '<p><input type="password" disabled class="profileNameInput customInput margin-top" id="newPassword" name="newPassword" placeholder="New Password"></p>';
        echo '<p><input type="password" disabled class="profileNameInput customInput margin-top" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password"></p>';

    }

    if($status == 'updatePassword'){
        $newPassword = $_POST['newPassword'];
        //    Encrypt new password
        $newPassword = encryptIt($newPassword);

        updateUserPassword($conn, $id, $newPassword);

    }




?>

<div id="passwordStatus"></div>
<script>
    $('.updatePassBtn').click( function(){
        console.log('cliked update btn');
        var newPass = $('#newPassword').val();
        $('#passwordStatus').load("helpers/ajax_password_check.php", {
            btnClicked: "updatePassword",
            newPassword: newPass
        })
    })
</script>
