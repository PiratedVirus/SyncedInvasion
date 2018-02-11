$(document).ready( function () {

    $questionNumber = 1;
    $quesCounter = 0;
    $('#questionNumber').text("_"+$questionNumber);

    $('[data-toggle="tooltip"]').tooltip();

    $('.NameDateToggleBtn').click( function () {
        if($('.testNameInput').val() == ''){
            $('.testValidMsg').text('Please give me a name!');
        } else {
            $('.NameDateToggle').slideToggle();
            $('#testName').text($('.testNameInput').val());
        }
    })

    $('.selectTestToggle').click( function () {
            $('.selectTest').slideToggle();
            $('#selectedtestName').text($('#selectTestName').val());
        $('.resultHolder').load("helpers/admin_backend.php", {
            btnClicked: "viewTest",
            testName: $('#selectTestName').val(),
        })

    })

    $('.testNameInput').keyup( function(){
        $testName = $('.testNameInput').val();
        $('.testValidMsg').load("helpers/admin_backend.php", {
            btnClicked: "chckTestName",
            testName: $testName,
        })
        if($('.chkMsg').text() == 'Already Taken! Use different name'){
            $('.NameDateToggleBtn').attr("disabled", "disabled");
        }
    })


    $('#dd').keyup( function () {
        $true = $.isNumeric( $('#dd').val() );
        if($true != true){
            $('#dateMonthMsg').text('Enter valid Date!');
        } else {
            $('#dateMonthMsg').text('');
            if($('#dd').val() > 32 || $('#dd').val() < 1){
                $('#dateMonthMsg').text('Enter valid Date!');
            } else{
                $('#dateMonthMsg').text('');
            }
        }
    })

    $('#mm').keyup( function () {
        $true = $.isNumeric( $('#mm').val() );
        if($true != true){
            $('#dateMonthMsg').text('Enter valid Month!');
        } else {
            $('#dateMonthMsg').text('');
            $('.DateTimeCnfrm').removeClass('disabled');
            if($('#dd').val() > 1 &&  $('#dd').val() < 12){
                $('#dateMonthMsg').text('Enter valid Month between 012!');
            } else{
                $('#dateMonthMsg').text('');
            }
        }
    })

    $('.DayTimeToggleBtn').click( function () {
        $('.DayTimeToggle').slideToggle();
    })

    $('#sTime').keyup( function () {
        $true = $.isNumeric( $('#sTime').val() );
        if($true != true){
            $('#timeErrorMsg').text('Enter valid Time!');
        } else {
            $('#timeErrorMsg').text('');
            $('.DateTimeCnfrm').removeClass('disabled');
            if($('#dd').val() >= 0 &&  $('#dd').val() <= 24){
                $('#timeErrorMsg').text('Enter valid Time!');
            } else{
                $('#timeErrorMsg').text('');
            }
        }
    })

    $('#eTime').keyup( function () {
        $true = $.isNumeric( $('#sTime').val() );
        if($true != true){
            $('#timeErrorMsg').text('Enter valid Time!');
        } else {
            $('#timeErrorMsg').text('');
            $('.DateTimeCnfrm').removeClass('disabled');
            if($('#dd').val() >= 0 &&  $('#dd').val() <= 24){
                $('#timeErrorMsg').text('Enter valid Time!');
            } else{
                $('#timeErrorMsg').text('');
            }
        }
    })

    $('#pMarks').keyup( function () {
        $('.posMarkBold').text($('#pMarks').val());
    })

    $('#nMarks').keyup( function () {
        $('.negMarkBold').text($('#nMarks').val());
    })

    $('#tTime').keyup( function () {
        $('.testTimeBold').text($('#tTime').val());
    })

    $('.TimeConfirmToggleBtn').click( function () {
        var d = new Date();
        var n = d.getFullYear();
        $mm = $('#mm').val();
        $dd = $('#dd').val();
        $testDate = $dd+"-"+$mm+"-"+n;
        $reverseDate = n+"-"+$mm+"-"+$dd;
        $startT = $('#sTime').val();
        $endT = $('#eTime').val();
        $testName = $('.testNameInput').val();
        $('.TimeConfirmToggle').slideToggle();
        $('#testname').text($testName);
        $('#testDate').text($testDate);
        $('#testTime').text($startT+" to "+ $endT);

        document.cookie = "testname="+$testName+";"
        document.cookie = "testdate="+$testDate+";"
        document.cookie = "testtime="+$startT+" to "+ $endT+";"

    })

    $('.confirmTestDetails').click( function () {
        $('.loadQuesTest').load("helpers/admin_backend.php", {
            btnClicked: "confirmTestDetails",
            testName: $testName,
            testDate: $reverseDate,
            startTime: $startT,
            endTime: $endT,
            posMark: $('#pMarks').val(),
            negMark: $('#nMarks').val(),
            testTime: $('#tTime').val()
        });
    })

    $('#correctOptIndex').keyup( function () {
        $userInput = $('#correctOptIndex').val();
        switch ($userInput){
            case 'A':
            case 'a':
                $('#correctOptText').text($('#optA').val());
                break;
            case 'B':
            case 'b':
                $('#correctOptText').text($('#optB').val());
                break;
            case 'C':
            case 'c':
                $('#correctOptText').text($('#optC').val());
                break;
            case 'D':
            case 'd':
                $('#correctOptText').text($('#optD').val());
                break;
            default:
                $('#correctOptText').text('');
        }
    })

    $('.addNextQuestion').click( function () {
        $questionNumber++;
        console.log($questionNumber);
        document.cookie = "questionID=_"+$questionNumber+";"
        $quesTitle = $('#question_title').val();
        $quesId = $('.qId').val();
        $optA = $('#optA').val();
        $optB = $('#optB').val();
        $optC = $('#optC').val();
        $optD = $('#optD').val();
        $crtIndx = $('#correctOptIndex').val().toUpperCase();
        $crtText = $('#correctOptText').text();
        $descr = $('#ans_desc').val();
        $('.Qstatus').load('helpers/admin_backend.php', {
            btnClicked: "addNextQ",
            quesTitle: $quesTitle,
            quesId: $quesId,
            optA: $optA,
            optB: $optB,
            optC: $optC,
            optD: $optD,
            crtIndx: $crtIndx,
            crtText: $crtText,
            descr: $descr

        });

        $('.qId').load('helpers/admin_backend.php', {
            btnClicked: "qID"
        });
        $('.input-holder').find('input:text').val('');
        $('#question_title').val('');
        $('#ans_desc').val('');
        $('#correctOptText').text('');
        // location.reload();
        // $('#questionNumber').text('_'+$questionNumber);
    })

    $('.adminLogOut').click( function () {
            document.cookie = "questionID=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
            document.cookie = "testdate=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
            document.cookie = "testname=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
            document.cookie = "testtime=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
            document.cookie = "TestName=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
    })

    $('.unviversalSearch').keyup( function () {
        $searchQuery = $('.unviversalSearch').val();
        console.log("The search query is : " +$searchQuery);
        $('.search-result-holder').load('helpers/admin_backend.php', {
            btnClicked: "search",
            searchQuery: $searchQuery


        });
    })

    $('.partOneTwoToggle').click( function(){
        $selectedTest = $('#selectTest').val();
        $('.testNameTitle').text($('#selectTest').val());
        $('.selectedTestName').text($selectedTest);
        $('.partOneTwo').slideToggle();
        $('.fetchDetails').load("helpers/admin_backend.php", {
            btnClicked: "fetchDetails",
            testName: $selectedTest
        })
        $('.testSrNo').load('helpers/admin_backend.php', {
            btnClicked: "testNo",
            testName: $selectedTest
        })
        $('.testDateTitle').load('helpers/admin_backend.php', {
            btnClicked: "testDate",
            testName: $selectedTest
        })
        $('.startTimeTitle').load('helpers/admin_backend.php', {
            btnClicked: "testSTime",
            testName: $selectedTest
        })
        $('.endTimeTitle').load('helpers/admin_backend.php', {
            btnClicked: "testETime",
            testName: $selectedTest
        })
    })

    $('.saveTitles').click( function () {
        $sDate = $('#sDate').val();
        $sTime = $('#sTime').val();
        $eTime = $('#eTime').val();
        $('.saveMsg').load("helpers/admin_backend.php", {
            btnClicked: "saveTile",
            testName: $selectedTest,
            sDate: $sDate,
            sTime: $sTime,
            eTime: $eTime
        })

    })

    $('.addMoreQues').click( function(){
        $quesCounter++;
        $('.addMore').append('             <div class="col-sm-12 quesCard">\n' +
            '                                <div class="card card-stats">\n' +
            '                                    <div class="card-header" data-background-color="blue">\n' +
            '                                        <span class="primeQuesSpot">'+$quesCounter+'</span>\n' +
            '                                    </div>\n' +
            '                                    <div class="card-content editQues">\n' +
            '                                        <div class="form-group no-margin col-md-12 edit text-right">\n' +
            '                                            <textarea  id="ques-'+$quesCounter+'" class="form-control alignR col-md-12 category ques-'+$quesCounter+'" placeholder="Add Question Text" ></textarea>\n' +
            '                                        </div>\n' +
            '\n' +
            '                                        <div class="col-md-3 col-sm-3 optionIndex margin-20">OPTION A</div>\n' +
            '                                        <div class="col-md-3 col-sm-3 optionIndex margin-20">OPTION B</div>\n' +
            '                                        <div class="col-md-3 col-sm-3 optionIndex margin-20">OPTION C</div>\n' +
            '                                        <div class="col-md-3 col-sm-3 optionIndex margin-20">OPTION D</div>\n' +
            '\n' +
            '                                        <div class="form-group no-margin col-md-3 col-sm-6 edit text-right">\n' +
            '                                            <textarea id="opt_A-'+$quesCounter+'" class="form-control alignR category edit opt_A-'+$quesCounter+'"  placeholder="Option A"></textarea>\n' +
            '                                        </div>\n' +
            '                                        <div class="form-group no-margin col-md-3 col-sm-6 edit text-right">\n' +
            '                                            <textarea id="opt_B-'+$quesCounter+'" class="form-control alignR category edit opt_B-'+$quesCounter+'"  placeholder="Option B"></textarea>\n' +
            '                                        </div>\n' +
            '                                        <div class="form-group no-margin col-md-3 col-sm-6 edit text-right">\n' +
            '                                            <textarea id="opt_C-'+$quesCounter+'" class="form-control alignR category edit opt_C-'+$quesCounter+'"  placeholder="Option C"></textarea>\n' +
            '                                        </div>\n' +
            '                                        <div class="form-group no-margin col-md-3 col-sm-6 edit text-right">\n' +
            '                                            <textarea id="opt_D-'+$quesCounter+'" class="form-control alignR category edit opt_C-'+$quesCounter+'"  placeholder="Option D"></textarea>\n' +
            '                                        </div>\n' +
            '\n' +
            '                                        <div class="row">\n' +
            '                                            <div class="col-md-3 optionIndex margin-20">CORRECT OPTION</div>\n' +
            '                                        </div>\n' +
            '                                        <div class="row">\n' +
            '                                            <div class="form-group no-margin col-md-3 edit text-right">\n' +
            '                                                <input id="optIndex-'+$quesCounter+'"  type="text" value="" placeholder="Correct Option Index" class="form-control optIndex alignR"/>\n' +
            '                                            </div>\n' +
            '\n' +
            '                                            <div class="col-md-9 correctNsubmitHolder">\n' +
            '                                                <span class="msg" id="msgAdd-'+$quesCounter+'"> </span>\n' +
            '                                                <span  id="crctOptTxt-'+$quesCounter+'" class="correctOptionText crctOptTxt-'+$quesCounter+'"><b>  </b></span>\n' +
            '                                                <button id="addBtn-'+$quesCounter+'"  class="updateBtn btn btn-primary clk col-md-offset-3">ADD QUESTION</button>\n' +
            '                                            </div>\n' +
            '                                        </div>\n' +
            '\n' +
            '                                    </div>\n' +
            '\n' +
            '                                </div>\n' +
            '                            </div>\n');
    })


    $('.planSelector').click( function () {
        $idName = $(this).attr('id');
        $unique = $idName.split('-');
        $val = $('#'+$idName).val();
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!

        var yyyy = today.getFullYear();
        if(dd<10){ dd='0'+dd; }
        if(mm<10){ mm='0'+mm;}
        var today = dd+'/'+mm+'/'+yyyy;

        if($val == 'Premium'){
            mm++;
            if(mm<10){
                mm='0'+mm;
            }
            var nextMonth = yyyy+"-"+mm+"-"+dd;
            $('#validDate-'+$unique[1]).text(nextMonth);
        }

        if($val == 'Enterprise'){
            yyyy++;
            var nextYear= yyyy+"-"+mm+"-"+dd;
            $('#validDate-'+$unique[1]).text(nextYear);
        }

        if($val == 'Upgrade plan'){
            var blank = '';
            $('#validDate-'+$unique[1]).text(blank);
        }

    })

    $('.savePlan').click( function () {
        $idName = $(this).attr('id');
        $unique = $idName.split(' ');
        $indexNum = $unique[0];
        $number_sep = $indexNum.split('-');
        $number = $number_sep[1];
        $planNameID = 'selector-' + $number;
        $planName = $('#'+$planNameID).val();
        $validDate = $('#validDate-'+$number).text();
        $('#sub-'+$number).text($planName);
        $('.notifyPlan').load("helpers/admin_backend.php", {
            btnClicked: "savePlan",
            userMail: $unique[1],
            userPlan: $planName,
            validDate: $validDate
        })
    })

    $(function() {
        $('.drpDwn').on('change', function() {
            var $sels = $('.drpDwn option:selected[value=""]');
            $(".partOneTwoToggle").attr("disabled", $sels.length > 0);
        }).change();
    });



    $(document).click(function(e){
        var clickElement = e.target;  // get the dom element clicked.
        var idName = e.target.id;  // get the classname of the element clicked
        var chk = idName.match(/optIndex/g);
        var update = idName.match(/updateBtn/g);
        var add = idName.match(/addBtn/g);
        if(chk == null){
        } else {
            var splitter = idName.split('-');
            $unique = splitter[1];
            console.log($unique);
            $('#'+idName).keyup( function () {
                $userInput = $('#'+idName).val();
                console.log($('#'+idName).val());
                switch ($userInput){
                    case 'A':
                    case 'a':
                        console.log('pressed A');
                        $('#crctOptTxt-'+$unique).html($('#opt_A-'+$unique).val());
                        break;
                    case 'B':
                    case 'b':
                        $('#crctOptTxt-'+$unique).text($('#opt_B-'+$unique).val());
                        break;
                    case 'C':
                    case 'c':
                        $('#crctOptTxt-'+$unique).text($('#opt_C-'+$unique).val());
                        break;
                    case 'D':
                    case 'd':
                        $('#crctOptTxt-'+$unique).text($('#opt_D-'+$unique).val());
                        break;
                    default:
                        $('#correctOptText').text('');
                }
            })
        }

        if(update == 'updateBtn'){
            var splitter = idName.split('-');
            $unique = splitter[1];

            $testname = $('#selectTest').val();
            $question = $('#ques-'+$unique).val();
            $optA = $('#opt_A-'+$unique).val();
            $optB = $('#opt_B-'+$unique).val();
            $optC = $('#opt_C-'+$unique).val();
            $optD = $('#opt_D-'+$unique).val();
            $correctIndex = $('#optIndex-'+$unique).val().toUpperCase();
            $correctText = $('#crctOptTxt-'+$unique).text();
            console.log("correct text is " + $correctText);
            $('#msg-'+$unique).load("helpers/admin_backend.php", {
                btnClicked: "updateQuestion",
                testname: $testname,
                quesNumber: $unique,
                question: $question,
                optA: $optA,
                optB: $optB,
                optC: $optC,
                optD: $optD,
                correctIndex: $correctIndex,
                correctText: $correctText
            })

        }
        if(add == 'addBtn'){
            console.log('clicked add');
            $('#addBtn-'+$quesCounter).prop('disabled', true);
            $testname = $('#selectTest').val();
            $question = $('#ques-'+$quesCounter).val();
            $optA = $('#opt_A-'+$quesCounter).val();
            $optB = $('#opt_B-'+$quesCounter).val();
            $optC = $('#opt_C-'+$quesCounter).val();
            $optD = $('#opt_D-'+$quesCounter).val();
            console.log("the question is " + $question);
            $correctIndex = $('#optIndex-'+$quesCounter).val().toUpperCase();

            $correctText = $('#crctOptTxt-'+$quesCounter).text();
            console.log("correct text is " + $correctText);
            $('#msgAdd-'+$quesCounter).load("helpers/admin_backend.php", {
                btnClicked: "addQuestion",
                testname: $testname,
                question: $question,
                optA: $optA,
                optB: $optB,
                optC: $optC,
                optD: $optD,
                correctIndex: $correctIndex,
                correctText: $correctText
            })

        }
    });





})