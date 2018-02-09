<?php
include '../dbconnect.php';
include 'helpers/sessions.php';
include 'helpers/sql_functions.php';
include 'templates/header.php';
?>
    <script>
        var a;
        function popitup(a)
        {
            window.open(a,
                'open_window',
                'menubar=no, toolbar=no, location=no, directories=no, status=no, scrollbars=yes, resizable=no, dependent, width=800, height=620, left=0, top=0')
        }
    </script>
    <div class="container">
        <div class="col-md-12 text-center">

            <h2 class="tabSubHeader text-center margin-top">INSTRUCTIONS</h2>
            <hr class="greenUnderLine text-left">
            <img class="margin-bottom-half" src="assets/img/inst.svg" height="100">
            <p class="margin-bottom">Please read all instruction carefully before taking Test. Instructions are provided in English & Hindi.</p>


            <div hidden class="hideInst"></div>
            <div class="qCards">
                <p style="position: relative; top:10px" class="homeSubHeader margin-top">TEST DETAILS</p>
                <h2 class="tabSubHeader text-center"><?php echo getLatestTestName($conn) ?></h2>
                <p class="text-center testdatesmall"><?php  echo getMMYYYY($conn); echo getLatestExamDate($conn);?></p>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 testDetailText margin-bottom-half">Total Question: <span class="dynamicDetails test-questions"><?php  echo getQuestionsCount($conn, $_SESSION['TestTitle']) ?></span></div>
                        <div class="col-md-3 testDetailText margin-bottom-half">Time: <span class="dynamicDetails test-duration"><?php echo getLatestTestDuration($conn) ?></span> minutes</div>
                        <div class="col-md-3 testDetailText margin-bottom-half">Positive Marks: <span class="dynamicDetails test-questions">+<?php  echo getTestPosMarks($conn, $_SESSION['TestTitle']) ?></span></div>
                        <div class="col-md-3 testDetailText margin-bottom-half">Negative Marks: <span class="dynamicDetails test-duration">-<?php echo getTestNegMarks($conn,  $_SESSION['TestTitle']) ?></span> </div>
                    </div>
                    <div class="row">
                    </div>
                </div>
            </div>

            <div class="text-left margin-top qCards instHolder">
                <h3 class="text-center" style="padding-top: 50px" >हिंदी </h3>
                <ul style="text-decoration: none; list-style: none">
                    <li>1) यह अभ्‍यास परीक्षण आपके अभ्‍यास हेतु और आपको कंप्‍यूटर आधारित परीक्षा से परिचित कराने के लिए केवल एक प्रदर्शन है । इस अभ्‍यास परीक्षण में दिए हुवे प्रश्‍न हैं निर्धारित समय में हल करना होगा।
                    </li>
                    <br><li>2) परीक्षा के लिए वास्तविक प्रश्नपत्र में 100 प्रश्न होंगे जिन्हें 90 मिनट के समय में हल करना होगा।</li>
                    <li class="text-center"><b>प्रश्‍नपत्र के बारे में:</b></li>
                    <br><li>1) इस प्रश्‍नपत्र में बहु-विकल्पीय वस्तुनिष्ठ प्रश्‍न हैं जिसमें 4 विकल्प दिए गए हैं, जिसमें से केवल 1 विकल्प सही है ।</li>
                    <br><li>2) कंप्‍यूटर आधारित परीक्षा द्विभाषी अर्थात अंग्रेजी एवं हिन्‍दी भाषा में होगी । प्रश्‍न और उत्‍तर के विकल्‍प दोनों भाषाओं में दिखाई देंगे।
                    </li>
                    <br><li>3) स्क्रीन के शीर्ष दाएं कोने में टाइमर (घड़ी) उपलब्ध है; आपसे अनुरोध है कि परीक्षा पूरी करने के लिए शेष समय की जानकारी हेतु इसे देखते रहें। टाइमर का रंग समय कम होते जाने पर बदलता जाएगा। लाल रंग अंतिम समय सूचित करेगा।
                    </li>
                    <br><li>4) प्रत्येक प्रश्न के लिए 1 अंक निर्धारित हैं।
                    </li>
                    <br><li>5) प्रत्येक सही जवाब के लिए 1 अंक मिलेंगे। प्रत्येक गलत उत्तर के लिए 0.25 अंकों की कटौती की जाएगी। अनुत्तरित प्रश्नों के लिए अंकों की कटौती नहीं की जाएगी।
                    </li>
                    <br><li>6) एक बार में कंप्यूटर स्क्रीन पर केवल एक प्रश्‍न प्रदर्शित किया जाएगा । अभ्यर्थियों को अगले प्रश्‍न पर जाने के लिए स्क्रीन के नीचे दिए गए <img height="30" src="https://test.vishwachinmayayurved.com/user/assets/img/next.png"> बटन पर क्लिक करना चाहिए अथवा पिछले प्रश्‍न पर जाने के लिए <img height="30" src="https://test.vishwachinmayayurved.com/user/assets/img/previous.png"> पर क्लिक करना चाहिए ।
                    </li>
                    <br><li>7) प्रश्‍नों को दी गई समय सीमा के भीतर किसी भी क्रम में हल किया जा सकता है । अभ्‍यर्थी को 4 विकल्पों में से सही विकल्प पर माउस से क्लिक करना होगा । यदि अभ्यर्थी प्रश्‍न का उत्तर नही देना चाहता है तो वह उस प्रश्‍न को खाली छोड़ सकता है ।
                    </li>
                    <br><li>8) अभ्यर्थी यदि चाहता है तो वह नए विकल्प का चयन कर किसी प्रश्‍न के विकल्प को बदल सकता है । यदि अभ्यर्थी प्रश्‍न का उत्तर नही देना चाहता है तो वह प्रश्‍न के सामने दिए गए <img height="30" src="https://test.vishwachinmayayurved.com/user/assets/img/erase.png"> को क्लिक कर उत्‍तर को अचयनित कर सकता है ।
                    <br><li>9) प्रश्‍नों में आगे और पीछे जाने के लिए, अभ्यर्थियों को <img height="30" src="https://test.vishwachinmayayurved.com/user/assets/img/next.png"> या <img height="30" src="https://test.vishwachinmayayurved.com/user/assets/img/previous.png"> बटन का इस्तेमाल करना चाहिए अथवा कंप्यूटर स्क्रीन के दाएं हाथ की ओर दी गई प्रश्‍न संख्या पर क्लिक करना चाहिए जहां पर प्रश्‍न संख्याओं को `किए गए` या `न किए गए` की स्थिति के साथ प्रदर्शित किया जाएगा।</li>
                    <br><li>10) जब भी अभ्यर्थी <img height="30"src="https://test.vishwachinmayayurved.com/user/assets/img/next.png"> या <img height="30" src="https://test.vishwachinmayayurved.com/user/assets/img/previous.png">  बटन पर क्लिक करके अगले प्रश्‍न पर जाता है तो उत्तरों को सहेज लिया जाएगा ।</li>
                    <br><li>11) अभ्यर्थियों के पास स्क्रीन के निचले हिस्से में उपलब्ध. <img height="30" src="https://test.vishwachinmayayurved.com/user/assets/img/tag.png"> बटन पर क्लिक करके किसी प्रश्‍न को बुकमार्क करने का विकल्प है, अगर वे बाद में उसकी समीक्षा करने की इच्छा रखते हैं । एक विशेष प्रश्‍न पर मौजूद बुकमार्क को <img height="30" src="https://test.vishwachinmayayurved.com/user/assets/img/detag.png">  पर क्लिक करके हटाया जा सकता है ।</li>
                    <br><li><br>12) स्क्रीन के दायीं ओर प्रश्‍न पैलेट में प्रत्येक संख्यांकित प्रश्‍न की निम्नलिखित स्थिति दिखाई देती है ।  <br> <br> <img height="25" src="https://test.vishwachinmayayurved.com/user/assets/img/attempted.png" >   आपने प्रश्‍न का उत्तर दिया है।  <br> <br> <img height="25" src="https://test.vishwachinmayayurved.com/user/assets/img/tagged.png" >   आपने प्रश्‍न का उत्तर नहीं दिया है और समीक्षा के लिए चिन्हित किया है। <br> <br> <img height="25" src="https://test.vishwachinmayayurved.com/user/assets/img/attempted_tagged.png" >   आपने प्रश्‍न का उत्तर दिया है लेकिन समीक्षा के लिए चिन्हित किया है।  <br> <br> <img height="25" src="https://test.vishwachinmayayurved.com/user/assets/img/unanswered.png" >   आपने प्रश्‍न का उत्तर नहीं दिया है।<b> <br><br> कृपया ध्यान दें: जिन प्रश्‍नों का उत्तर दिया गया है और समीक्षा के लिए चिन्हित किया गया है उन प्रश्‍नों को केवल तभी तक उत्तर दिया गया प्रश्‍न माना जाएगा जब तक अभ्यर्थी चयनित विकल्प को <img height="30" src="https://test.vishwachinmayayurved.com/user/assets/img/erase.png" > नहीं करता है।</b></li>
                    <br><li>13) परीक्षा की अवधि पूर्ण होने पर, यदि अभ्‍यर्थी उत्‍तर पर क्लिक नहीं करता है अथवा <img height="30" src="https://test.vishwachinmayayurved.com/user/assets/img/preview.png"> बटन पर क्लिक नहीं करता है तो कंप्‍यूटर द्वारा स्‍वत: शून्‍य परिणाम सहेज लिया जाएगा ।</li><br>
                    <br><li>14) अभ्‍यर्थी निर्धारित 90 मिनट के पूर्ण होने पर ही परीक्षा को submit करने में समर्थ होंगें। </li>
                </ul>
                <ul>
                    <h3 class="text-center">English</h3>
                    1) This Practice Test is a demo for a "Computer Based Examination" for your practice and familiarization purpose only. This "Practice test" consist of 20 questions to be attempted in 15 Minutes.<br />
                    <br>2) The actual question paper for the examination consist of 100 questions to be attempted in 90 minutes time.</span><br /><br />
                    <ul class="text-center"><b>About Examination</b></ul>
                     1) The Question Paper consists of multiple choice objective type questions with 4 options out of which only 1 is correct.<br /><br />
                    2) The computer based exam will be in bilingual i.e. English & Hindi Languages. Questions and Answer options will appear in both the languages for all streams except for Homeopathy.<br />
                    <br>3) There is a TIMER (Clock) available on the TOP RIGHT HAND CORNER of the Screen; you are requested to keep an eye on it for knowing the time remaining for the completion of the exam.<br /><br /><span style="line-height: 107%;">
    4) Each question carry 1 mark<br />
<br />
5) Every correct answer will get 1 mark. 0.25 mark will be deducted for each wrong answer. No marks will be deducted for unanswered questions.</span><br />
                    <br>6) Only one question will be displayed on the computer screen at a time. To attempt next question the candidates should click on
                    <img height="30" src="https://test.vishwachinmayayurved.com/user/assets/img/next.png"> or to go back click on
                    <img height="30" src="https://test.vishwachinmayayurved.com/user/assets/img/previous.png" > button provided at the bottom of the screen<br /><br />
                    7) The questions can be answered in any order within the given time frame. The candidate should click with the mouse on the correct choice, from 4 options given. In case, the candidate does not wish to attempt any question, it can be left blank.<br /><br />
                    8) The candidate can change the option of a question later by selecting a new option in case he/she wishes to. In casedoes not want to answer the question, he/she can deselect the answer by clicking
                    <img height="30" src="https://test.vishwachinmayayurved.com/user/assets/img/erase.png"> provided against the question.<br /><br />
                    9) To move back and forth between questions, candidates should use the
                    <img height="30" src="https://test.vishwachinmayayurved.com/user/assets/img/next.png"> OR
                    <img height="30" src="https://test.vishwachinmayayurved.com/user/assets/img/previous.png"> button or click on the question number on the right hand side of the computer screen where question numbers would be displayed along with the `attempted` and `not attempted` status<br /><br />
                    10) The answers will be saved whenever the candidate goes for next question, by clicking on
                    <img height="30" src="https://test.vishwachinmayayurved.com/user/assets/img/next.png"> OR
                    <img height="30" src="https://test.vishwachinmayayurved.com/user/assets/img/previous.png"> button.<br /><br />
                    11) Candidates have the option to bookmark a question in case they want to review it at a later stage by clicking on the
                    <img height="30" src="https://test.vishwachinmayayurved.com/user/assets/img/tag.png"> button available at the bottom of the screen. The Bookmark on a particular question can be removed by clicking on
                    <img height="30" src="https://test.vishwachinmayayurved.com/user/assets/img/detag.png"><br /><br />
                    12) The question palette at the right of the screen shows the following status of each of the questions numbered<br /><br />
                    <img height="30" src="https://test.vishwachinmayayurved.com/user/assets/img/attempted.png"> You have answered the question<br /><br>
                    <img height="30" src="https://test.vishwachinmayayurved.com/user/assets/img/tagged.png"> You have not answered the question and marked for review<br /><br>
                    <img height="30" src="https://test.vishwachinmayayurved.com/user/assets/img/attempted_tagged.png"> You have answered the question but marked for review<br /><br>
                    <img height="30" src="https://test.vishwachinmayayurved.com/user/assets/img/unanswered.png"> You have not answered the question<br /><br /><b>PS: Questions which are attempted and marked for review would be treated as attempted questions only as long as the candidate does not
                        <img height="30" src="https://test.vishwachinmayayurved.com/user/assets/img/erase.png"> the option selected.</b><br /><br />
                    13) On the completion of the test duration, even if the candidate does not click on an answer or does not click on the
                    <img height="30" src="https://test.vishwachinmayayurved.com/user/assets/img/preview.png"> button, a NIL result will be saved automatically by</g> the computer.<br /><br />
                    14) The candidate will only be able to submit the test on completion of the stipulated 90 Minutes. Candidate must have to submit test after time completion.<br /><br>
                </ul>
            </div>

            <a href="start_test" id="starttest" style="margin-top: 50px; font-weight: lighter" class="btn btn-default margin-top margin-bottom newBtn startBtn col-xs-12">I have read the instructions <br>मैंने अनुदेशों को पढ़ लिया </a>


        </div>
    </div>
<script>
    $(document).ready( function () {
        $('.footer').remove();
    })
</script>
<?php include 'templates/footer.php' ?>

