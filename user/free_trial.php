<?php
include '../dbconnect.php';
include 'helpers/sessions.php';
include 'helpers/sql_functions.php';
include 'templates/header.php';
?>
    <div class="container">
        <div class="col-md-12 text-center">
            <h2 class="tabSubHeader text-center margin-top" style="color: #40A653;" >SUCCESS</h2>
            <hr class="greenUnderLine text-center">
            <div class="row">
                <div class="check_mark">
                    <div class="sa-icon sa-success animate">
                        <span class="sa-line sa-tip animateSuccessTip"></span>
                        <span class="sa-line sa-long animateSuccessLong"></span>
                        <div class="sa-placeholder"></div>
                        <div class="sa-fix"></div>
                    </div>
                </div>
            </div>
            <h2 class="tabSubHeader text-center margin-top" style="color: #40A653;" >Your free plan has been started. You can attempt upcoming test for free.</h2>
<!--            <a href="user_home" class="text-center newBtn freeTrial">TAKE ME TO HOME</a>-->

            <p>You will be redirected in <span id="counter">10</span> second(s).</p>
            <script type="text/javascript">
                function countdown() {
                    var i = document.getElementById('counter');
                    if (parseInt(i.innerHTML)<=0) {
                        location.href = 'user_home';
                    }
                    i.innerHTML = parseInt(i.innerHTML)-1;
                }
                setInterval(function(){ countdown(); },1000);

                $(".sa-success").addClass("hide");
                setTimeout(function() {
                    $(".sa-success").removeClass("hide");
                }, 10);
            </script>
        </div>
    </div>
<?php include 'templates/footer.php' ?>