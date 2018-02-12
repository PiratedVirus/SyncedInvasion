$(document).ready( function(){
    var questionAttempted = [];
    var taggedQuestion = [];
    var AttemptedTagged = [];
    var sortedArray = [];
    var now = new Date();
    var firstAttempt = 0;
    var firstTag = 0;
    // var submitFlag = 0;
    var pathArray = window.location.pathname.split( '/' );
    var secondLevelLocation = pathArray[1]
    var baseurl = window.location.protocol+window.location.host+"/"+secondLevelLocation;

    $('#loadingDiv').hide().ajaxStart( function() {
        $(this).show();  // show Loading Div
        console.log('AJAX started');
    } ).ajaxStop ( function(){
        $(this).hide(); // hide loading div
        console.log('AJAX ended');
    });

    $( document ).ajaxStart(function() {
        console.log( "Triggered ajaxStart handler." );
    });

    // Function to read cookie
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
    var questionNumber = readCookie('cookieQnumber');
    var questionNumber = Number(questionNumber)

    function highlightTab(){
        var url  = window.location.href;
        var dashboard = url.match(/#dashboardNav/g);
        var test = url.match(/#testNav/g);
        var result = url.match(/#resultNav/g);
        console.log(url);
        console.log(test);
        if(dashboard=='#dashboardNav'){
            console.log('Its dash');
        }
        if(test=='#testNav'){
            console.log('Its test   ');
        }

    }
    highlightTab();





    now.setTime(now.getTime() + 1 * 3600 * 1000);
    console.log(now);


    // Function for deleting Duplicates from array
    function unique(list) {
        var result = [];
        $.each(list, function(i, e) {
            if ($.inArray(e, result) == -1) result.push(e);
        });
        return result;
    }

    // Update Functions
    function updateTagPrint(){
        $('#taggedQ').html(taggedQuestion);
        $('.tagCount').text(taggedQuestion.length);
    }
    function updateTags(questionNumber){
        taggedQuestion.push(questionNumber);
        taggedQuestion.sort();
        updateTagPrint();
        $('.navBtn'+(questionNumber)).css('background','#FFC107');
        $('.navBtn'+(questionNumber)).css('color','white');
    }

    function updateAttemptPrint(){
        questionAttempted = unique(questionAttempted);
        $('.quesCount').text(questionAttempted.length);
        $('#attemptQ').html(questionAttempted); // for Reference purpose
    }
    function updateAttempted(questionNumber) {
        questionAttempted.push((questionNumber));
        // Change color in QuesNavBar
        $('.navBtn'+(questionNumber)).css('background','#4CAF50');
        $('.navBtn'+(questionNumber)).css('color','white');

        updateAttemptPrint();
    }

    function updateUnAttempted() {
        $TotalQuestion = $('#unAT').text();
        $('.unattemptCount').html(($TotalQuestion-(questionAttempted.length+AttemptedTagged.length)));
        $('.countT').html(taggedQuestion.length);
    }

    function updateTagAttemptPrint(){
        AttemptedTagged = unique(AttemptedTagged);
        $('.attempTagCount').text(AttemptedTagged.length);

        $('#tagAT').html(AttemptedTagged); // for Reference purpose
    }
    function updateTagAttempt(questionNumber){
        AttemptedTagged.push(questionNumber);

        $('.navBtn'+(questionNumber)).css('background','#9C27B0');
        $('.navBtn'+(questionNumber)).css('color','white');

        updateTagAttemptPrint();
    }

    function removeTag(questionNumber){
        var index = taggedQuestion.indexOf(questionNumber);
        if (index > -1) {
            taggedQuestion.splice(index, 1);
            console.log('Now the updated Tagged Question array is '+taggedQuestion);
            updateTagPrint();
        }
    }
    function removeQuestion(questionNumber){
        var indexAttempt = questionAttempted.indexOf(questionNumber);
        if ( indexAttempt > -1) {
            questionAttempted.splice(indexAttempt, 1);
            updateAttemptPrint();
        }
    }
    function removeAttemptTagArray(questionNumber){
        var indexAttemptTag = AttemptedTagged.indexOf(questionNumber);
        if ( indexAttemptTag > -1) {
            AttemptedTagged.splice(indexAttemptTag, 1);
            updateTagAttemptPrint();
        }
    }

    function removeFromAttemptsTags(questionNumber){
        removeTag(questionNumber)
        removeQuestion(questionNumber)
    }

    // Toggle Tag Buttons
    function changeToggleButtonDetag(questionNumber) {
        $TotalQuestion = $('#unAT').text();
        // Toggle Tag n DeTag button
        for($i=0;$i<$TotalQuestion;$i++){
            if ((questionNumber) == taggedQuestion[$i]){
                $('#detagQ').css('display','inline-block');
                $('#tagQ').css('display','none');
            }
            if ((questionNumber) == AttemptedTagged[$i]){
                console.log("Both ateempted and Tagged" + questionNumber + ' with array ' +AttemptedTagged[$i]);
                $('#detagQ').css('display','inline-block');
                $('#tagQ').css('display','none');
            }

        }
    }

    function changeToggleButtonTag(questionNumber) {
        // Toggle Tag n DeTag button
        for($i=0;$i<taggedQuestion.length;$i++){
            if ((questionNumber) != taggedQuestion[$i]){
                $('#detagQ').css('display','none');
                $('#tagQ').css('display','inline-block');
            }
            if ((questionNumber) != AttemptedTagged[$i]){
                console.log("Both ateempted and Tagged" + questionNumber + ' with array ' +AttemptedTagged[$i]);
                $('#detagQ').css('display','none');
                $('#tagQ').css('display','inline-block');
            }

        }
    }

    // Start Test and load first question (Serve same function as nextQ)
    $('#startT').click( function(){
        questionNumber = questionNumber + 1;
        // console.log("Current Question is "+questionNumber);

        $('.questionHolder').load("store_ans.php", {
            newQuestionNumber: questionNumber,
            btnClicked: "startT"
        });
    })

    $('#startInstructions').click( function(){
        $('.hideInst').load("store_ans.php", {
            newQuestionNumber: questionNumber,
            btnClicked: "startInst"
        });
    })

    $('#sampleTest').click( function(){
        $('.hideInst').load("store_ans.php", {
            newQuestionNumber: questionNumber,
            btnClicked: "startSample"
        });
    })

    // Delete cookies upon LogOut
    $('.logCookie').click( function () {
        document.cookie = "Attempted =; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
        document.cookie = "cookieQnumber =; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
        document.cookie = "selectedRankTest =; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
        document.cookie = "TestName=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
        document.cookie = "submitFlag=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
        for($i=0;$i<1000;$i++){
            document.cookie = "Ques"+$i+"=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
        }
    })

    // set a cookie and load next question by passing value to php
    $('#nextQ').click( function(){

        var questionNumber = readCookie('cookieQnumber');
        var questionNumber = Number(questionNumber);

        $('#detagQ').css('display','none');
        $('#tagQ').css('display','inline-block');

        questionNumber = questionNumber + 1;
        changeToggleButtonDetag(questionNumber);
        // printButtons(questionNumber);
        // Get the selected radio option and if nothing is selected, set it to 'null'
        var radioValue = $("input[name='mcq_ques']:checked").val();
        if(radioValue == undefined){ radioValue = 'null'; }

        // Set cookie with question number and answer
        document.cookie = "Ques" +(questionNumber-1)+ " =" +radioValue+ "; expires=" +now.toUTCString()+ ";"
        document.cookie = "cookieQnumber="+questionNumber+"; expires=Thu, 18 Dec 2070 12:00:00 UTC";

        document.cookie = "Attempted=1";

        // Increment No. of attempted questions upon next click
        if (radioValue !== 'null'){
            // Any one question is answered
            firstAttempt++;
            // Attempted
            updateAttempted(questionNumber-1);
            // Unsolved
            updateUnAttempted();
            // Tagged & Solved
            for($i=0;$i<questionAttempted.length;$i++) {
                for ($j = 0; $j < taggedQuestion.length; $j++) {
                    if ((questionAttempted[$i]) == taggedQuestion[$j]) {
                            updateTagAttempt(taggedQuestion[$j]);
                            removeFromAttemptsTags(taggedQuestion[$j]);
                    }
                }
            }
            // Toggle buttons
        }
        $('.questionHolder').html('<div class="section">\n' +
            '        <div class="fullscreen text-center">\n' +
            '            <div class="row">\n' +
            '                <div style="color: #1c9b2b" class="la-ball-scale-ripple col-md-offset-6 col-xs-offset-6">\n' +
            '                    <div></div>\n' +
            '                </div>\n' +
            '                <h5 style="color: #01711A" class="text-center margin-top">We are preparing new question for you..Please wait!</h5>\n' +
            '            </div>\n' +
            '        </div>\n' +
            '    </div>');

        // Load next question
        $('.questionHolder').load("store_ans.php", {
            printStatus: "yes",
            newQuestionNumber: questionNumber,
            btnClicked: "next"
        });
    })


    // Doesn't set any kind of cookie, SOLE purpose is to pass previous index and to load question
    $('#prevQ').click( function(){
        $('#detagQ').css('display','none');
        $('#tagQ').css('display','inline-block');

        var questionNumber = readCookie('cookieQnumber');
        var questionNumber = Number(questionNumber);
        questionNumber = questionNumber - 1;

        changeToggleButtonDetag(questionNumber);

        var radioValue = $("input[name='mcq_ques']:checked").val();
        if(radioValue == undefined){ radioValue = 'null'; }
        // // Set cookie with question number and answer
        document.cookie = "Ques" +(questionNumber+1)+ " =" +radioValue+ "; expires=" +now.toUTCString()+ ";"

        if (radioValue !== 'null'){
            updateAttempted(questionNumber+1);
            // Unsolved
            updateUnAttempted();
            // Tagged & Solved
            for($i=0;$i<questionAttempted.length;$i++) {
                for ($j = 0; $j < taggedQuestion.length; $j++) {
                    if ((questionAttempted[$i]) == taggedQuestion[$j]) {
                        updateTagAttempt(taggedQuestion[$j]);
                        removeFromAttemptsTags(taggedQuestion[$j]);
                    }
                }
            }
            // Toggle buttons
            changeToggleButtonDetag(questionNumber+1);
        }


        console.log('prev question is'+questionNumber);
        document.cookie = "cookieQnumber="+questionNumber+"; expires=Thu, 18 Dec 2070 12:00:00 UTC";

        $('.questionHolder').html('<div class="section">\n' +
            '        <div class="fullscreen text-center">\n' +
            '            <div class="row">\n' +
            '                <div style="color: #1c9b2b" class="la-ball-scale-ripple col-md-offset-6 col-xs-offset-6">\n' +
            '                    <div></div>\n' +
            '                </div>\n' +
            '                <h5 style="color: #01711A" class="text-center margin-top">We are preparing new question for you... Please wait!</h5>\n' +
            '            </div>\n' +
            '        </div>\n' +
            '    </div>');


        $('.questionHolder').load("store_ans.php", {
            printStatus: "yes",
            newQuestionNumber: questionNumber,
            btnClicked: "previous"
        });

        for($i=0;$i<taggedQuestion.length;$i++){
            if ((questionNumber) == taggedQuestion[$i]){
                $('#detagQ').css('display','inline-block');
                $('#tagQ').css('display','none');
            }
        }

    })


    $('.quesBtn').click( function () {
        var questionNumber = readCookie('cookieQnumber');
        var questionNumber = Number(questionNumber);
        // changeToggleButtonTag(questionNumber);
        changeToggleButtonDetag(questionNumber);
    })

    $('#preview').click( function(){
        $numAttemptedQues = questionAttempted.length;
        $taggedQuestion = taggedQuestion.length;
        $time = $('#mobileTimer').text();
        $TotalQuestion = $('#unAT').text();
        var r ="You have "+$time+" to answer " +($TotalQuestion-$numAttemptedQues)+ " questions, "+$taggedQuestion+" tagged questions. Do you still want to procced with your submit?";
        swal({
            title: "Are you sure?",
            text: r,
            icon: "info",
            buttons: ["Cancel",'Submit Test'],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                // $('.examHolder').css('display','none');
                // $('.resultBtnHolder').css('display','flex');

                document.cookie = "submitFlag=one;"
                document.cookie = "startTimer=zero";
                $('.resultBtnHolder').toggle('fade');
                $('.questionHolder').load("store_ans.php", {
                    btnClicked: "endTest"
                });
                swal("Successfully submitted!", {
                    icon: "success",
                });


            }
        });
    })

    // Called upon final submission, the value passed btnClicked is checked in if case and if==1 then sends values to database
    $('#endTest').click( function(){
        alert('Test completed !');

        $('.questionHolder').load("store_ans.php", {
            btnClicked: "endTest"
        });

    })

    // Delete user response and update cookie
    $('#eraseQ').click( function(){
        var questionNumber = readCookie('cookieQnumber');
        var questionNumber = Number(questionNumber);
        // Deselect selected radio option
        $('input[name="mcq_ques"]').prop('checked', false);
        // Delete answer from cookies
        document.cookie = "Ques" +(questionNumber)+ " = null; expires=" +now.toUTCString()+ ";"
        // Change color to normal background
        $('.navBtn'+(questionNumber)).css('background',' #D8D8D8');
        $('.navBtn'+(questionNumber)).css('color','#9B9B9B');

        removeFromAttemptsTags(questionNumber);

    })


    // Push QuesNumber value to array & toggle TAG button
    $('#tagQ').click( function(){

        firstTag++; // Unknown Yet
        var questionNumber = readCookie('cookieQnumber');
        var questionNumber = Number(questionNumber);

        updateTags(questionNumber);

        $('.tag').toggle();

    })

    // Pop/ Delete questionNumber from array and toggle button
    $('#detagQ').click( function(){
        var questionNumber = readCookie('cookieQnumber');
        var questionNumber = Number(questionNumber);
        $('.tag').toggle();

        removeTag(questionNumber);
        updateTagPrint();
        $('.navBtn'+(questionNumber)).css('background','#D8D8D8');
        $('.navBtn'+(questionNumber)).css('color','#9B9B9B');

        for($i=0;$i<AttemptedTagged.length;$i++) {
                if (questionNumber == AttemptedTagged[$i]) {
                    removeAttemptTagArray(questionNumber);
                    updateAttempted(questionNumber);
                }
        }
    })

    $('.editProBtn').click( function(){
        $('.pro').toggle('fade-in');
    })

    $('.updateProBtn').click( function () {
        $updatedName = $('.profileNameInput').val();
        $updatedMobile = $('.profileMobileInput').val();
        $('.profileName').text($updatedName);
        $('.navUserName').text($updatedName + " | LOGOUT");
        $('.profileMobile').text($updatedMobile);
        $('.lost').load("store_ans.php", {
            btnClicked: "updateProBtn",
            userName: $updatedName,
            userMobile: $updatedMobile
        });
    })

    $('#starttest').click( function(){
        document.cookie ="startTimer=one";
        console.log('Logging from cokkie');


        $.ajax({
            type: "POST",
            url: "store_ans.php",
            data: { btnClicked: "starttest" },
            success:function(data)
            {
                // alert(data);
                location.href = 'start_test';
            }
        })
    })

    // Hide menu on clicking any link from the drop-down list on mobiles
    $('#myNavbarMobile').on('click', 'a:not(.dropdown-toggle)', function(e) {
        console.log('Clicked on me');
        $('#myNavbarMobile.in').collapse('hide');
    })

    $('.genResult').click( function () {
        $('.resHomeToggle').toggle();
        $('#resultText').css('display','none');
        $('.resultNumber').load("store_ans.php", {
            btnClicked: "getResult"
        });
    })

    $('.changePassBtn').click( function () {
        $('.viewPassToggle').toggle('fade');
    })

    $('#curPassword').keyup( function () {
        var userPass = $('#curPassword').val();
        console.log(userPass);
        $('#passwordStatus').load("helpers/ajax_password_check.php", {
            enteredPass: userPass
        })
    })

    $('.freeTrial').click( function(){

        $.ajax({
            type: "POST",
            url: "store_ans.php",
            data: { btnClicked: "loadTrial" },
            success:function(data)
            {
                // alert(data);
                location.href = 'free_trial';
            }
        })
    })

    $('.updatePassBtn').click( function(){
        console.log('cliked update btn');
        var newPass = $('#newPassword').val();
        $('#passwordStatus').load("helpers/ajax_password_check.php", {
            btnClicked: "updatePassword",
            newPassword: newPass
        })
    })

    $('.testQuesViewToggleBtn').click( function () {
        $('.testQuesViewToggle').slideToggle();
        $testName = $('#selectTest').val();
        $('.testName').text($testName);
        $('.quesAns').load("store_ans.php", {
            btnClicked: "getAnsKey",
            testName: $testName
        });
    })

    $('.testRankToggleBtn').click( function () {
        $('.testRankToggle').slideToggle();
        $testName = $('#selectTest').val();
        document.cookie = "selectedRankTest=" +$testName;
        $('.testName').text($testName);
        $(".seconLoad").load("../user/templates/rank_loader");


    })

    // Graph for total score
    $.ajax({
        url: "../user/templates/total_score",
        method: "GET",
        success: function(data) {
            console.log(data);

            var player = [];
            var score = [];

            for(var i in data) {
                player.push("Test  " + data[i].test_date);
                score.push(data[i].final_score);
            }
            // console.log("THe players are :" + player);
            var chartdata = {
                labels: player,
                datasets: [{
                    label: 'Total Score',
                    data: score,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }],

            }

            var ctx = $("#mycanvas");

            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata,
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        },
        error: function(data) {
            console.log(data);
        }
    });

    // Graph for Correct and Incorrect score
    $.ajax({
        url: "../user/templates/total_score",
        method: "GET",
        success: function(data) {
            console.log(data);

            var testDate = [];
            var correct = [];
            var incorrect = [];

            for(var i in data) {
                testDate.push("Test  " + data[i].test_date);
                correct.push(data[i].correct_res);
                incorrect.push(data[i].incorrect_res);
            }
            // console.log("THe players are :" + player);
            var chartdata = {
                labels: testDate,
                datasets: [
                    {
                        label: 'Correct',
                        data: correct,
                        backgroundColor: [
                            'rgb(76, 175, 80,0.6)',
                            'rgb(76, 175, 80,0.6)',
                            'rgb(76, 175, 80,0.6)',
                            'rgb(76, 175, 80,0.6)',
                            'rgb(76, 175, 80,0.6)',
                            'rgb(76, 175, 80,0.6)',
                            'rgb(76, 175, 80,0.6)',
                            'rgb(76, 175, 80,0.6)',
                            'rgb(76, 175, 80,0.6)',
                            'rgb(76, 175, 80,0.6)',
                            'rgb(76, 175, 80,0.6)',
                            'rgb(76, 175, 80,0.6)',
                            'rgb(76, 175, 80,0.6)',
                            'rgb(76, 175, 80)'
                        ],
                        borderColor: [
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Incorrect',
                        data: incorrect,
                        backgroundColor: [
                            'rgb(244, 67, 54, 0.6)',
                            'rgb(244, 67, 54, 0.6)',
                            'rgb(244, 67, 54, 0.6)',
                            'rgb(244, 67, 54, 0.6)',
                            'rgb(244, 67, 54, 0.6)',
                            'rgb(244, 67, 54, 0.6)',
                            'rgb(244, 67, 54, 0.6)',
                            'rgb(244, 67, 54, 0.6)',
                            'rgb(244, 67, 54, 0.6)',
                            'rgb(244, 67, 54, 0.6)',
                            'rgb(244, 67, 54, 0.6)'
                        ],
                        borderColor: [
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)'
                        ],
                        borderWidth: 1
                    }

                ],

            }

            var ctx = $("#correct-in");

            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata,
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        },
        error: function(data) {
            console.log(data);
        }
    });

    // Graph for Attempted and Unattempted
    $.ajax({
        url: "../user/templates/total_score",
        method: "GET",
        success: function(data) {
            console.log(data);

            var testDate = [];
            var correct = [];
            var incorrect = [];

            for(var i in data) {
                testDate.push("Test  " + data[i].test_date);
                correct.push(data[i].attem_ques);
                incorrect.push(data[i].unattem_ques);
            }
            // console.log("THe players are :" + player);
            var chartdata = {
                labels: testDate,
                datasets: [
                    {
                        label: 'Attempted',
                        data: correct,
                        backgroundColor: [
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)'
                        ],
                        borderColor: [
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                            'rgb(76, 175, 80)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Unattempted',
                        data: incorrect,
                        backgroundColor: [
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)'
                        ],
                        borderColor: [
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)',
                            'rgb(244, 67, 54)'
                        ],
                        borderWidth: 1
                    }

                ],

            }

            var ctx = $("#attempt-un");

            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata,
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        },
        error: function(data) {
            console.log(data);
        }
    });

})