<?php
date_default_timezone_set("Asia/Kolkata");
$currentTime =  date("H:i");
$currentDate =  date("Y-m-d");
$mail = getUserEmail($conn, $id);

//  if( (getStartDateFull($conn) <= $currentDate) && ($currentTime <= getExamEndDate($conn))){
//       echo "This will be here if we are providing a gap of two days. Right no need";
//  }


if( checkResult($conn, $mail,  $_SESSION['TestTitle']) == '1'){
    echo "<p class='doneMsg'>Already attempted! Your recent score is </p><br>";
    echo '<h1 class="bigNumb">'.getPreviousResult($conn, $mail).'</h1>';
    echo '<a href="user_results" class="btn btn-default viewResult newBtn">VIEW ALL RESULTS</a>';
    echo '<a href="view_answers" class="btn btn-default newBtn">VIEW ANSWER KEY</a>';
    echo '<a href="view_rank" class="btn btn-default newBtn">VIEW MERIT LIST</a> ';

} else {
    echo "<img class='margin-bottom' src=\"assets/img/results.svg\" width=\"80\" alt=\"\"> <br>";
    echo '<h1 class="homeSubHeader">You haven\'t appear to any test till now. Attempt a test to see your result.</h1> <p>You can view your graphical analysis of result from this section. Along with this, Answer key and Merit List both can be accessed from this section. </p>';
}


?>
<p class="text-center margin-top">
    <img height="40" class="bounce animated" src="assets/img/arrows-up.png" alt="">
</p>
