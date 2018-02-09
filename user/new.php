<?php
include 'helpers/sessions.php';
include '../dbconnect.php';
include 'helpers/sql_functions.php';
include 'templates/header.php';
$mail = getUserEmail($conn, $id);
?>

<script>
    document.cookie = "cookieQnumber=1; expires=Thu, 18 Dec 2070 12:00:00 UTC";
</script>
        <div class="container-fluid">
                <div class="col-md-12 col-sm-12 parentFlex">
                    <div class="row childFlex fixedHeight">
                        <div class="questionHolder">
                            <?php printQuestion($conn, '1', $_SESSION['TestTitle']); ?>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="row text-center">
                        <div class="timerHolder">
                            <p>TIME</p>
                            <h3 id="timer">45m: 09s</h3>
                        </div>
                        <div class="row">
                            <div class="navQuestions"></div>
                        </div>
                    </div>
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
                            <div class="row">
                                <div  class="tagBtn text-center col-md-1 col-xs-4 ">
                                    <button id="tagQ" class="customBtn tag btn btn-default">TAG</button>
                                    <button id="detagQ" style="display: none;" class="customBtn tag btn btn-default">DeTag</button>
                                </div>
                                <div hidden id="unAT"><?php  echo getQuestionsCount($conn, $_SESSION['TestTitle']) ?></div>
                                <div id="eraseQ" class=" text-center col-md-1 col-xs-4">
                                    <button class="customBtn eraseBtn btn btn-default">ERASE</button>
                                </div>
                                <div id="preview" class=" text-center col-md-1 col-xs-4">
                                    <button class="customBtn btn btn-default">Preview<br>Submit</button>
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


<script>
    for($i=1; $i <=  <?php  echo getQuestionsCount($conn, $_SESSION['TestTitle']) ?> ; $i++) {
        $('.navQuestions').append("<button onClick='passAttribute(this.id)' id='"+$i+"' class='quesBtn navBtn"+$i+"' data-quesnumber='"+$i+"'>"+$i+"</button>");
    }
</script>




<?php include "templates/footer.php"; ?>
