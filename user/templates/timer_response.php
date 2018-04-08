<?php

//header('Content-Type: application/json');

include '../../dbconnect.php';
include '../helpers/sessions.php';
//include '../helpers/sql_functions.php';
    date_default_timezone_set("Asia/Kolkata");

    $from_time = date('Y-m-d H:i:s');
    $to_time = $_SESSION['end-time'];


    $timeFirst = strtotime($from_time);
    $timeSecond = strtotime($to_time);


    $diffInSec = $timeSecond - $timeFirst;
//    echo 'the diff right now is :' .$diffInSec;

//    echo gmdate("H:i:s", $diffInSec);

//    sleep(5);
    if ($diffInSec > 0){
            echo gmdate("H:i:s", $diffInSec);
        } elseif ($diffInSec < 0) {
            echo '00:00';
        } elseif ($diffInSec == ''){
            echo '1';
    }
?>