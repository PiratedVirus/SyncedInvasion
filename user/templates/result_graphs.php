<?php
$mail = getUserEmail($conn, $id);
    if( checkResult($conn, $mail,  $_SESSION['TestTitle']) != '1'){
        echo "<div class='container text-center'> <div class='flexCenter'><div class='theEnd'>";
        echo "<img class='margin-bottom' src=\"assets/img/results.svg\" width=\"80\" alt=\"\"> <br>";
        echo '<h1 class="homeSubHeader">You haven\'t appear to any test till now. Attempt a test to see your result.</h1> <p>You can view your graphical analysis of result from this section. Along with this, Answer key and Merit List both can be accessed from this section. </p>';
        echo "</div></div></div>";
    } else {
?>

<div id="fullpage">
    <div class="section">
        <div class="fullscreen home margin-bottom">
            <div class="row">
                <h2 class="tabSubHeader text-center">SCORES</h2>
                <hr class="greenUnderLine text-center">
            </div>
            <div class="row">
                <div class="graphs" id="chart-container">
                    <canvas id="mycanvas"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="section" id="test">
        <div class="fullscreen res">
            <div class="row">
                <h2 class="tabSubHeader text-center margin-top">CORRECT & INCORRECT RESPONSES</h2>
                <hr class="greenUnderLine text-center">
            </div>
            <div class="row text-center">
                <div class="graphs" id="chart-container">
                    <canvas id="correct-in"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="fullscreen test">
            <div class="row">
                <h2 class="tabSubHeader text-center margin-top">ATTEMPTED & UNATTEMPTED QUESTIONS</h2>
                <hr class="greenUnderLine text-center">
            </div>
            <div class="row  text-center">
                <div class="graphs" id="chart-container">
                    <canvas id="attempt-un"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
</div>
<?php } ?>