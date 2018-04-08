<div id="fullpage">
    <div class="section">
        <div class="fullscreen home margin-bottom" data-anchor="dashboardNav">
            <div  id="mobileHome"  class="row">
                <h2 class="tabSubHeader text-center">OVERVIEW</h2>
                <hr class="greenUnderLine text-center">
            </div>
            <div class="row">
                <div class="col-md-offset-1 verticalAlign">
                    <a href="#" class="col-md-5 text-center paidDisplay prevHomeRes thumbnail shadowCards">
                        <h3 class="cardSubHeader">HIGHEST SCORE</h3><br>
                        <h1>
                            <?php
                                $mail = getUserEmail($conn, $id);
                                if( getHighestScore($conn, $mail) == ''){
                                    echo "<p id='notest'>  No Test attempted</p>";
                                } else {
                                    echo '<h1 id="lastScore" class="bigNumb">' .getHighestScore($conn, $mail). '</h1><br>';
//                                    echo '<h4 class="cardSubText">Test conducted on <span id="prevTestDate"> <b>' .$mail = getUserEmail($conn, $id);getHighScoreDate($conn, $mail). '</b></span></h4>';
                                }

                            ?>



                        <h4 class="cardSubText">
                            <?php
                            $mail = getUserEmail($conn, $id);
                            if( getHighestScore($conn, $mail) == ''){
                                echo "";
                            } else {
                            ?>
                            Test conducted on <span id="prevTestDate"> <b><?php
                                    $mail = getUserEmail($conn, $id);
                                    echo getHighScoreDate($conn, $mail); }
                                    ?></b></span></h4>
                    </a>
                    <a href="#testNav" class="col-md-5  text-center paidDisplay nextHomeTest thumbnail shadowCards">
                        <h3 class="cardSubHeader">NEXT TEST</h3><br>
                        <h1 id="nextTest" class="bigNumb"> <?php echo getLatestExamDate($conn); ?> </h1><br>
                        <h4 class="cardSubText"> <?php echo getMMYYYY($conn); ?> <b>7:00 AM</b> IST</h4>
                        <?php include 'live_indicator.php'?>
                    </a>
                </div>
            </div>
        </div>
        <p class="text-center">
            <img class="bounce animated" src="assets/img/down.svg" alt="">
        </p>
    </div>




    <div class="section" id="test">
            <div class="fullscreen test" id="" data-anchor="testNav">
                <div class="row">
                    <h2 class="tabSubHeader text-center margin-top">TEST</h2>
                    <hr class="greenUnderLine text-center">

                </div>

                <div class="row text-center">
                    <div class="hideInst"></div>
                    <?php include 'validate_test.php'?>

                </div>
            </div>
        <p class="text-center margin-top">
            <img class="bounce animated" src="assets/img/down.svg" alt="">
        </p>
        </div>

    <div  id="mobileResult" class="section">
            <div class="fullscreen test" data-anchor="resultNav">
                <div class="row">
                    <h2 class="tabSubHeader text-center margin-top">RESULTS & ANALYSIS</h2>
                    <hr class="greenUnderLine text-center">
                </div>
                <div class="row vertical text-center">
                    <?php include "validate_result.php"; ?>
                </div>
            </div>
        </div>

    </div>

        
    </div>
</div>

<script>
    $(".sa-success").addClass("hide");
    setTimeout(function() {
        $(".sa-success").removeClass("hide");
    }, 10);
</script>