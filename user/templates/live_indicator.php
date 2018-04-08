<?php
    date_default_timezone_set("Asia/Kolkata");
    $currentTime =  date("H:i");
    $currentDate =  date("Y-m-d");

    if ( $currentDate == getStartDateFull($conn)) {
        if( (getStartTime($conn) < $currentTime) && ($currentTime < getEndTime($conn))){
            echo '<h4 class="liveText"><b>LIVE</b></h4>';
        }
    }

?>
