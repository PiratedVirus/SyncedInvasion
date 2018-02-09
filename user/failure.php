<?php
include '../dbconnect.php';
include 'helpers/sessions.php';
include 'helpers/sql_functions.php';
include 'templates/header.php';
?>
    <div class="container">
        <div class="col-md-12 text-center">

                    <h2 class="tabSubHeader text-center margin-top" style="color: #f44336;" >FAILURE</h2>
                    <hr class="greenUnderLine text-center">
                    <div class="row text-center">
                        <div class="sa col-md-offset-5">
                            <div class="sa-error">
                                <div class="sa-error-x">
                                    <div class="sa-error-left"></div>
                                    <div class="sa-error-right"></div>
                                </div>
                                <div class="sa-error-placeholder"></div>
                                <div class="sa-error-fix"></div>
                            </div>
                        </div>

                    </div>


            <?php
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
                echo "<h3>Your order status is ". $status .".</h3>";
                echo "<h4>Your transaction id for this transaction is ".$txnid.". You may try again from the home page.</h4>";
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


            </script>

        </div>
    </div>
<?php include 'templates/footer.php' ?>