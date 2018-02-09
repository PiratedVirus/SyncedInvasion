<?php
include '../dbconnect.php';
include 'helpers/sessions.php';
include 'helpers/sql_functions.php';
include 'templates/header.php';
?>
    <div class="container">
        <div class="col-md-12 text-center">

            <h2 class="tabSubHeader text-center margin-top">SELECT A PASS</h2>
            <hr class="greenUnderLine text-center">
            <br/>
            <p class="margin-bottom" style="font-size: 16px; color: #8E9AAE" >Subscribe to courses at throw away prices and access all the tests for all the upcoming exams. Select the best plan for your exams below and get going.</p>

            <?php if(checkTrialStatus($conn, $id) == '1'){?>

                <div class="text-center margin-bottom col-md-6">
                    <h3 class="planHeader pro">Pro</h3>
                    <img class="margin-bottom-half margin-top-half" src="assets/img/cycle.jpg" height="150" alt="">
                    <p class="pro planPice">₹ 250/ <span class="smsz">one test</span></p>
                    <hr class="pro halfHR">
                    <p class="pro planSubHeader">Enjoy all these Features</p>
                    <div class="pro text-left featuresList">
                        <p><i class="pro icons fa fa-check-circle"></i> <span class="features">Only One Test access</span></p>
                        <p><i class="pro icons fa fa-check-circle"></i> <span class="features">Graphical Analysis of all Test results</span></p>
                        <p><i class="pro icons fa fa-check-circle"></i> <span class="features">Detailed answer key with answer reference</span></p>
                        <p><i class="pro icons fa fa-check-circle"></i> <span class="features">Live Ranking Facility</span></p>
                        <p><i class="pro icons fa fa-check-circle"></i> <span class="features">Email & Call Support</span></p>
                    </div>
                    <a href="one_month" class="text-center payBtn proBg">PAY INR 250</a>
                    <h1 style="color: transparent" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum quam quis vitae.</h1>
                </div>

                <div class="text-center margin-bottom col-md-6">
                    <h3 class="planHeader enterP">Enterprise</h3>
                    <img class="margin-bottom-half margin-top-half" src="assets/img/car.jpg" height="150" alt="">
                    <p class="enterP planPice">₹ 4000/ <span class="smsz">complete Test Series</span></p>
                    <hr class="enterP halfHR">
                    <p class="enterP planSubHeader">Enjoy all these Features</p>
                    <div class="enterP text-left featuresList">
                        <p><i class="enterP icons fa fa-check-circle"></i> <span class="features">Complete Test Series access</span></p>
                        <p><i class="enterP icons fa fa-check-circle"></i> <span class="features">Graphical Analysis of all Test results</span></p>
                        <p><i class="enterP icons fa fa-check-circle"></i> <span class="features">Detailed answer key with answer reference</span></p>
                        <p><i class="enterP icons fa fa-check-circle"></i> <span class="features">Live Ranking Facility</span></p>
                        <p><i class="enterP icons fa fa-check-circle"></i> <span class="features">Email & Call Support</span></p>
                    </div>
                    <a href="one_year" class="text-center payBtn enterPBG">PAY INR 4000</a>
                    <h1 style="color: transparent" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum quam quis vitae.</h1>

                </div>

           <?php } else{ ?>

            <div class="text-center margin-bottom col-md-4">
                <h3 class="planHeader pro">Free</h3>
                <img class="margin-bottom-half margin-top-half" src="assets/img/cycle.jpg" height="150" alt="">
                <p class="pro planPice">₹ 0/ <span class="smsz">one test</span></p>
                <hr class="pro halfHR">
                <p class="pro planSubHeader">Enjoy all these Features</p>
                <div class="pro text-left featuresList">
                    <p><i class="pro icons fa fa-check-circle"></i> <span class="features">One time one Test access</span></p>
                    <p><i class="pro icons fa fa-check-circle"></i> <span class="features">Graphical Analysis of all Test results</span></p>
                    <p><i class="pro icons fa fa-check-circle"></i> <span class="features">Detailed answer key with answer reference</span></p>
                    <p><i class="pro icons fa fa-check-circle"></i> <span class="features">Live Ranking Facility</span></p>
                    <p><i class="pro icons fa fa-check-circle"></i> <span class="features">Email & Call Support</span></p>
                </div>
                <div class="load-free-trial"></div>
                <a href="free_trial" class="text-center payBtn proBg freeTrial">TRY ONCE FOR FREE</a>
                <h1 style="color: transparent" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum quam quis vitae.</h1>
            </div>

            <div class="text-center margin-bottom col-md-4">
                <h3 class="planHeader enterP">Pro</h3>
                <img class="margin-bottom-half margin-top-half" src="assets/img/car.jpg" height="150" alt="">
                <p class="enterP planPice">₹ 250/ <span class="smsz">one test</span></p>
                <hr class="enterP halfHR">
                <p class="enterP planSubHeader">Enjoy all these Features</p>
                <div class="enterP text-left featuresList">
                    <p><i class="enterP icons fa fa-check-circle"></i> <span class="features">Only One Test access</span></p>
                    <p><i class="enterP icons fa fa-check-circle"></i> <span class="features">Graphical Analysis of all Test results</span></p>
                    <p><i class="enterP icons fa fa-check-circle"></i> <span class="features">Detailed answer key with answer reference</span></p>
                    <p><i class="enterP icons fa fa-check-circle"></i> <span class="features">Live Ranking Facility</span></p>
                    <p><i class="enterP icons fa fa-check-circle"></i> <span class="features">Email & Call Support</span></p>
                </div>
                <a href="one_month" class="text-center payBtn enterPBG">PAY INR 250</a>
                <h1 style="color: transparent" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum quam quis vitae.</h1>
            </div>

            <div class="text-center margin-bottom col-md-4">
                <h3 class="planHeader highest">Enterprise</h3>
                <img class="margin-bottom-half margin-top-half" src="assets/img/plane.jpg" height="150" alt="">
                <p class="highest planPice">₹ 4000/ <span class="smsz">complete Test Series</span></p>
                <hr class="highest halfHR">
                <p class="highest planSubHeader">Enjoy all these Features</p>
                <div class="highest text-left featuresList">
                    <p><i class="highest icons fa fa-check-circle"></i> <span class="features">Complete Test Series access</span></p>
                    <p><i class="highest icons fa fa-check-circle"></i> <span class="features">Graphical Analysis of all Test results</span></p>
                    <p><i class="highest icons fa fa-check-circle"></i> <span class="features">Detailed answer key with answer reference</span></p>
                    <p><i class="highest icons fa fa-check-circle"></i> <span class="features">Live Ranking Facility</span></p>
                    <p><i class="highest icons fa fa-check-circle"></i> <span class="features">Email & Call Support</span></p>
                </div>
                <a href="one_year" class="text-center payBtn highestBG">PAY INR 4000</a>
                <h1 style="color: transparent" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum quam quis vitae.</h1>

            </div>

            <?php } ?>


        </div>
    </div>
<?php include 'templates/footer.php' ?>
<script>
    $('#profile').addClass('active');
</script>
