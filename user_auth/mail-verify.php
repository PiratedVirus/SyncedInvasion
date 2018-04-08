<?php

    include '../dbconnect.php';
    // check email exist or not
    $usermail = $_POST['usermail'];

    function getTotalUserCount($conn, $mail){
        $sql = mysqli_query($conn,"SELECT * FROM users WHERE userEmail = '$mail'");
        $totalMail = mysqli_num_rows($sql);
        return $totalMail;
    }

    if(getTotalUserCount($conn, $usermail)!=0){
        echo "Provided Email is already in use.";
        ?>
    <script>
        document.getElementById("submit-btn").disabled = true;
    </script>
    <?php
    }
?>

