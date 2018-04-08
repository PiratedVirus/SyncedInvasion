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




            <?php
//            header( "refresh:10;url=http://localhost:8888/TheInvasion/user/user_home" );
            $status=$_POST["status"];
            $firstname=$_POST["firstname"];
            $amount=$_POST["amount"];
            $txnid=$_POST["txnid"];
            $posted_hash=$_POST["hash"];
            $key=$_POST["key"];
            $productinfo=$_POST["productinfo"];
            $email=$_POST["email"];
            $salt="BObuebfjDo";

            // Salt should be same Post Request

            If (isset($_POST["additionalCharges"])) {
                $additionalCharges=$_POST["additionalCharges"];
                $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
            } else {
                $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
            }
            $hash = hash("sha512", $retHashSeq);
            if ($hash != $posted_hash) {
                echo "Invalid Transaction. Please try again";
            } else {
                echo "<h3>Thank You. Your order status is ". $status .".</h3>";
                echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
                echo "<h4>We have received a payment of Rs. " . $amount . ". Welcome to the online test series of Vishwyachinmay Classes.</h4>";
                changeToEnterprise($conn, $id);
            }
            ?>
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