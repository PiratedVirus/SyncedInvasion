<?php
include 'helpers/sessions.php';
include '../dbconnect.php';
include 'helpers/sql_functions.php';
include 'templates/header.php';
$mail = getUserEmail($conn, $id);
?>





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
                    <a href="user_results" class="btn btn-default newBtn">VIEW GRAPHICAL ANALYSIS</a>
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
        </script>
        <script src="assets/js/timer.js"></script>
        <script src="assets/js/graphs.js"></script>

        <div class="container submitTest"></div>

        <?php
        include "templates/footer.php";
    }
} else {
    include 'templates/free_user.php';
}
?>

