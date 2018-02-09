<?php
    date_default_timezone_set("Asia/Kolkata");
    $currentTime =  date("H:i");
    $currentDate =  date("Y-m-d");
    $mail = getUserEmail($conn, $id);
    checkExpiry($conn,$id);

//  if( (getStartDateFull($conn) <= $currentDate) && ($currentTime <= getExamEndDate($conn))){
//       echo "This will be here if we are providing a gap of two days. Right no need";
//  }

    if( getMaxAttemptNum($conn, $id) == '0'){
        echo "<img class='margin-bottom' src=\"assets/img/test.svg\" width=\"100\" alt=\"\"> <br>";
        echo '<p class="doneMsg"> You\'ve reached the maximum number of Tests! Consider upgrading your subscription</p>';
        echo '<a href="browse_plans" style="margin-top: 40px;" id="startInstructions" class="btn btn-default newBtn startBtn">BROWSE PLANS</a>';

    } else {

        if( checkTestAttempt($conn, $mail,  $_SESSION['TestTitle']) == '1' || $_COOKIE['Attempted'] == '1'){

            echo "<div class=\"row\">
                            <div class=\"check_mark\">
                                <div class=\"sa-icon sa-success animate\">
                                    <span class=\"sa-line sa-tip animateSuccessTip\"></span>
                                    <span class=\"sa-line sa-long animateSuccessLong\"></span>
                                    <div class=\"sa-placeholder\"></div>
                                    <div class=\"sa-fix\"></div>
                                </div>
                            </div>
                        </div>";
            echo '<p class="doneMsg"> Already Attempted!</p>';
        } else {
            if ( $currentDate == getStartDateFull($conn)){

                if( (getStartTime($conn) < $currentTime) && ($currentTime < getEndTime($conn))){
                    echo "<img class='margin-bottom' src=\"assets/img/test.svg\" width=\"100\" alt=\"\"> <br>";
                    echo '<div class="row vertical text-center"><h1 class="homeSubHeader">Whoa! It\'s a Test Day!</h1><h1 class="homeSubHeader">Test is live now.... Attempt it before it ends!</h1><p> Once you start click the button, there is no way to go back. Make sure you\'ve an uninterrupted internet connection and sufficient power in device. Keep with a rough book and pen with you.</p></div>';
                    echo '<a href="test_instructions" style="margin-top: 40px;" id="startInstructions" class="btn btn-default newBtn startBtn">Get started</a>';
                } else {
                    echo "<img class='margin-bottom' src=\"assets/img/clock.svg\" width=\"100\" alt=\"\"> <br>";
                    echo '<div class="row vertical text-center"><h1 class="homeSubHeader">Whoa! It\'s a Test Day!</h1><h1 class="homeSubHeader">Test will be live soon. Stay tuned!</h1> <p>Make sure you\'ve an uninterrupted internet connection and sufficient power in device. Keep with a rough book and pen with you. </p></div>';
                }
            } else {
                echo "<img class='margin-bottom' src=\"assets/img/holiday.png\" width=\"100\" alt=\"\"> <br>";
                echo '<div class="row vertical text-center"><h1 class="homeSubHeader">Whoa! No Tests Today!</h1> <p class="margin-top margin-bottom">Check out complete timetable for Test series</p></div>';
                echo "<a href='timetable' class='newBtn margin-top'>View Timetable</a>";
            }
        }
    }

?>

<div hidden class="hideInst"></div>
