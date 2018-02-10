<?php
    include 'helpers/sessions.php';
    include '../dbconnect.php';
    include 'helpers/sql_functions.php';
    include 'templates/header.php';
    $mail = getUserEmail($conn, $id);

    if(getUserSubscription ($conn,$id) == '1' || getUserSubscription ($conn,$id) == '2' || getUserSubscription ($conn,$id) == '3'){
        if( checkTestAttempt($conn, $mail,  $_SESSION['TestTitle']) == '1') {
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
            echo '<p class="doneMsg text-center"> Already Attempted!</p><br>';
            echo '<div class="col-md-12 col-xs-12 text-center"> <a href="user_home" class="newBtn text-center col-md-offset-3 col-xs-offset-3"> GO BACK TO HOME</a></div>';
        } else {

?>

<script>
    document.cookie = "cookieQnumber=1; expires=Thu, 18 Dec 2070 12:00:00 UTC";
</script>

        <div class="container-fluid">
            <div class="resultBtnHolder examHolder">
                <!--Mobile Timer-->
                <div class="col-sm-12 viewOnMobile">
                    <div class="row text-center">
                        <div class="timerHolder">
                            <p>TIME</p>
                            <h3 id="mobileTimer">45m: 09s</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 parentFlex">
                    <div class="row childFlex fixedHeight">
                        <div class="questionHolder">
                            <?php printQuestion($conn, '1', $_SESSION['TestTitle']); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="row text-center">
                        <div class="timerHolder hideOnMobile">
                            <p>TIME</p>
                            <h3 id="desktopTimer"></h3>
                        </div>
                        <div class="row">
                            <div class="navQuestions"></div>
                        </div>
                    </div>
                </div>
                <div class="refPurpose">
                    <p class="hidden">Attempted Questions : <span id="attemptQ"></span> </p>
                    <p class="hidden">Tagged Questions : <span id="taggedQ"></span> </p>
                    <p class="hidden">Attempted and Tagged Status: <span id="tagAT"></span></p>
                </div>
                <div class="footerStrip">
                    <hr>
                    <div class="buttons col-md-12">
                        <div id="prevQ" class="prevBtn text-center col-md-1">
                            <img src="assets/img/previous.png" width="60" height="60" alt="">
                        </div>
                        <div  class="nextBtn text-center col-md-1">
                            <img id="nextQ" class="btb" src="assets/img/next.png" width="60" height="60" alt="">
                        </div>
                        <div class="row mtMobile">
                            <div  class="tagBtn text-center col-md-1 col-xs-4 ">
                                <button id="tagQ" class="customBtn tag btn btn-default">TAG</button>
                                <button id="detagQ" style="display: none;" class="customBtn tag btn btn-default">DeTag</button>
                            </div>
                            <div hidden id="unAT"><?php  echo getQuestionsCount($conn, $_SESSION['TestTitle']) ?></div>
                            <div id="eraseQ" class=" text-center col-md-1 col-xs-4">
                                <button class="customBtn eraseBtn btn btn-default">ERASE</button>
                            </div>
                            <div id="preview" class=" text-center col-md-1 col-xs-4">
                                <button class="customBtn btn btn-default"><span class="hideOnMobile">Preview &<br>Submit</span> <span  data-toggle="tooltip" data-placement="top" title="Preview & Submit" class="viewOnMobile">P & S</span></button>
                            </div>
                            <div class="row viewMobile">
                                <div class="navQuestionsMobile"></div>
                            </div>
                            <div class="infoHolder">
                                <div class="text-center col-md-1 col-xs-6 margin-left-captions">
                                    <span class="quesCount counterNumb">0</span><br><span class="counterCaption"> Attempted</span>
                                </div>
                                <div class="text-center col-md-1  col-xs-6  margin-left-captions">
                                    <span class="tagCount counterNumb">0</span><br><span class="counterCaption"> Tagged</span>
                                </div>
                                <div class="text-center col-md-2  col-xs-6  margin-left-captions">
                                    <span class="attempTagCount counterNumb">0</span><br><span class="counterCaption text-center"> Tagged Attempted</span>
                                </div>
                                <div class="text-center col-md-1  col-xs-6  margin-left-captions">
                                    <span class="unattemptCount counterNumb"><?php  echo getQuestionsCount($conn, $_SESSION['TestTitle']) ?></span><br><span class="planSubHeader text-center">Unattempted</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div style="display: none;" class="container resultBtnHolder">
            <div class="row flexCenter">
                <div class="col-md-12 theEnd text-center">
                    <div class="hideRes hidden"></div>
                    <h2 class="tabSubHeader text-center">YOUR RESULT</h2>
                    <hr class="greenUnderLine text-center">
                    <img src="assets/img/calc.svg" height="150">
                    <h1 class="bigNumb margin-bottom resultNumber"></h1>
                    <p id="resultText">Clicked <b>Get My Result</b> to view Test score, number of Correct and Incorrect responses, attempted and unanswered questions. To get detailed graphical analysis click <b>View Graphical Analysis</b> button. All this can be access later from <b>'Results & Analysis'</b> menu. </p>
                    <button class="btn btn-default genResult resHomeToggle newBtn">Get My Result</button>
                    <a href="user_home" style="display: none;" class="btn btn-default genResult resHomeToggle newBtn">HOME</a>
                    <a href="user_results" class="btn btn-default newBtn">GRAPHICAL ANALYSIS</a>
                    <a href="view_answers" class="btn btn-default newBtn">VIEW ANSWER KEY</a>
                    <a href="view_rank" class="btn btn-default newBtn">VIEW MERIT LIST</a>
                </div>
            </div>
        </div>

        <script>

            function readCookie(name) {
                var nameEQ = name + "=";
                var ca = document.cookie.split(';');
                for(var i=0;i < ca.length;i++) {
                    var c = ca[i];
                    while (c.charAt(0)==' ') c = c.substring(1,c.length);
                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
                }
                return null;
            }
            function passAttribute(a){
                var quesNumber = arguments[0];

                quesAttr = $('.navBtn'+quesNumber).data('quesnumber');
                console.log("The data argument is " + quesNumber);
                console.log("The data attribute is " + quesAttr);

                var questionNumber = readCookie('cookieQnumber');
                console.log('the cookie is ' + questionNumber);
                document.cookie = "cookieQnumber="+quesNumber+"; expires=Thu, 18 Dec 2070 12:00:00 UTC";
                var questionNumber = readCookie('cookieQnumber');
                console.log('new cookie is ' + questionNumber);

                $('.questionHolder').load("store_ans.php", {
                    printStatus: "yes",
                    newQuestionNumber: quesNumber,
                    btnClicked: "navButton"
                });
            }
            for($i=1; $i <=  <?php  echo getQuestionsCount($conn, $_SESSION['TestTitle']) ?> ; $i++) {
                $('.navQuestions').append("<button onClick='passAttribute(this.id)' id='"+$i+"' class='quesBtn navBtn"+$i+"' data-quesnumber='"+$i+"'>"+$i+"</button>");
                $('.navQuestionsMobile').append("<button onClick='passAttribute(this.id)' id='"+$i+"' class='quesBtn navBtn"+$i+"' data-quesnumber='"+$i+"'>"+$i+"</button>");
            }
            $(document).ready( function () {
                $('.footer').remove();
            })
        </script>
        <script src="assets/js/timer.js"></script>


        <div class="container submitTest"></div>

        <?php
                    include "templates/footer.php";
                }
           } else {
                    include 'templates/free_user.php';
           }
       ?>
