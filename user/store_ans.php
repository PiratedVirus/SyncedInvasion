
<?php
	include 'helpers/sessions.php';
	include '../dbconnect.php';
	include 'helpers/sql_functions.php';


	// POSTED variables
	$status = $_POST['btnClicked'];
	$userAnswer = $_POST['userAnswerValue'];
	$newQuestionNumber = $_POST['newQuestionNumber'];
	$printStatus = $_POST['printStatus'];
	$setArray = $_COOKIE['setarray'];
	$mail = getUserEmail($conn, $id);
	$testStartDate = getStartDateFull($conn);
	$questionCount = getQuestionsCount($conn,$_SESSION['TestTitle']);



    // When test is finally submitted
    if($status == 'endTest'){
        $userAnswers = $_COOKIE['userAnswer'];
        $sepratedAnswers = explode(',', $userAnswers);
        for($i=0; $i<($questionCount+1); $i++){

            // Get saved responses
            $submit_ques_cookie = $sepratedAnswers[$i];
            $_SESSION['test-start'] = '0';

            // null all blank entries
            if($submit_ques_cookie == ''){ $submit_ques_cookie = 'null'; }
//             pass stored values to Database

            saveToDB($conn, $i, $submit_ques_cookie, $mail, 'submitted_ans');

        }
    }


	if($status == 'updateProBtn'){
	    $userName = $_POST['userName'];
	    $usermobile = $_POST['userMobile'];
	    echo 'the mobile' .$usermobile;
	    updateUserProfile($conn, $id, $userName, $usermobile);
    }

    if($status == 'starttest'){
        setSessionTimer($conn, $_SESSION['TestTitle']);
        getLatestTestName($conn);
        fillResultTable($conn, $mail, $testStartDate, $_SESSION['TestTitle']);
    }

    if($status == 'loadTrial'){
	    useFreeTrial($conn, $id);
    }

    if($status == 'startInst'){
//        getLatestTestName($conn);
//        fillResultTable($conn, $mail, $testStartDate, $_SESSION['TestTitle']);
    }

    if($status == 'getResult'){
	    echo genrateUserResult($conn, $mail, $_SESSION['TestTitle']);
    }

    if($status == 'startSample'){
        printQuestion($conn, $newQuestionNumber, 'Sample Test One');
    }

    if($status == 'getAnsKey'){
	    $testName = $_POST['testName'];
        printAnswekey($conn, $mail, $testName);
    }
    if($status == 'nextBtn'){
        printNavButtons($newQuestionNumber);
    }


    if($status == 'getRanks'){
        $testName = $_POST['testName'];
        printRanks($conn,$testName);
    }


    if($printStatus == 'yes') {
        // print question and all options
        printQuestion($conn, $newQuestionNumber, $_SESSION['TestTitle']);
    }

 ?>
