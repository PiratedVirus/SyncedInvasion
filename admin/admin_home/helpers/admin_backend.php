<?php

include "../../../dbconnect.php";
include "sessions.php";
include "admin_sql_functions.php";

// POSTED variables
$status = $_POST['btnClicked'];

if($status == 'createUser'){
    $mail = 'u' .rand(10,100).'@u.u';
    $queryAdd = mysqli_query($conn, "INSERT INTO users(userName, userEmail, userCollege, userCity, userPass, userMobile, userGender, userSubscription, subsType, amountPaid, subStartDate, subEndDate, attempts, freeFlag) VALUES('name','$mail', 'college', 'city', 'XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=','1234567890','MALE','Free Trial', '3', '0', '2018-02-14', '2019-02-14', '22', '0')");
    if($queryAdd){echo 'Success! New user created with username ' .$mail;} else {echo 'Failed';}
}

if($status == 'createTest'){
    $randTestName = 'Test-'.rand(10,100);
    $quesId = getTotalTests($conn)."_".( getQuestionsCountAdmin($conn,$randTestName) + 1);
    $sr_no = ( getQuestionsCountAdmin($conn,$randTestName) + 1 );
    $testName =$randTestName;
    $tableName = 'test_ans_key';
    $savetest = mysqli_query($conn,"INSERT INTO tests(test_name, test_start_date, test_end_date, start_time, end_time, positive_mark, negative_mark, duration) VALUES ('$testName', '2018-02-15', '2018-02-15', '00:00', '24:00','+1', '0.25', '90')");

    for($i=0;$i<251;$i++){
        $quesTitle = 'This is question number '.$i.'. It is an auto genrated question. Please do not find any logic here';
        $quesId = getTotalTests($conn)."_".( getQuestionsCountAdmin($conn,$randTestName) + 1);
        $sr_no = ( getQuestionsCountAdmin($conn,$randTestName) + 1 );
        $optA = 'OptionA-'.$i;
        $optB = 'OptionB-'.$i;
        $optC = 'OptionC-'.$i;
        $optD = 'OptionD-'.$i;
        $correctAnsArr = ['A','B','C','D'];
        $crtIndx = $correctAnsArr[rand(0,3)];
        $crtText = 'Correct Text';
        $descr = 'Answer Description for question' .$i;
        addQuestion($conn,$sr_no, $quesTitle, $quesId, $optA, $optB, $optC, $optD, $crtIndx, $crtText, $descr, $testName);
        saveAnsKey($conn, $crtIndx, $tableName, $testName);

    }

}

if($status == 'matchAns'){
    $testName = $_POST['testName'];
    matchAnswerKey($conn, $testName);
}

if($status == 'confirmTestDetails'){
    $testDate = $_POST['testDate'];
    $testName = $_POST['testName'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $testTime = $_POST['testTime'];
    $posMark = $_POST['posMark'];
    $negMark = $_POST['negMark'];
    echo 'Clicked on the buttoton';
    saveTestDetials($conn, $testDate, $testName, $startTime, $endTime, $posMark, $negMark, $testTime);

}
if($status == 'viewTest'){
    $testName = $_POST['testName'];
    viewTestDetails($conn, $testName);
}

if($status == 'addNextQ'){
    $quesTitle = $_POST['quesTitle'];
    $quesId = getTotalTests($conn)."_".( getQuestionsCountAdmin($conn,$_COOKIE['testname']) + 1);
    $sr_no = ( getQuestionsCountAdmin($conn,$_COOKIE['testname']) + 1 );
    $optA = $_POST['optA'];
    $optB = $_POST['optB'];
    $optC = $_POST['optC'];
    $optD = $_POST['optD'];
    $crtIndx = $_POST['crtIndx'];
    $crtText = $_POST['crtText'];
    $descr = $_POST['descr'];
    $testName = $_COOKIE['testname'];
    $tableName = 'test_ans_key';

    addQuestion($conn,$sr_no, $quesTitle, $quesId, $optA, $optB, $optC, $optD, $crtIndx, $crtText, $descr, $testName);
    saveAnsKey($conn, $crtIndx, $tableName, $testName);

}

if($status == 'qID'){
    echo getTotalTests($conn)."_".(getQuestionsCountAdmin($conn,$_COOKIE['testname']) + 1);
}

if($status == 'search'){
    $userQuery = $_POST['searchQuery'];
    searchDatabase($conn, $userQuery);
}

if($status == 'fetchDetails'){
    $selectedTest = $_POST['testName'];
    getTestQuestionsEdit($conn, $selectedTest);
}

if($status == 'testNo'){
    $selectedTest = $_POST['testName'];
    getTestNum($conn, $selectedTest);
}

if($status == 'chckTestName'){
    $selectedTest = $_POST['testName'];
    chkTest($conn, $selectedTest);
}

if($status == 'testDate'){
    $selectedTest = $_POST['testName'];
    getTestDate($conn, $selectedTest);
}


if($status == 'testSTime'){
    $selectedTest = $_POST['testName'];
    getTestStartTime($conn, $selectedTest);
}
if($status == 'testETime'){
    $selectedTest = $_POST['testName'];
    getTestEndTime($conn, $selectedTest);
}
if($status == 'saveTile'){
    $selectedTest = $_POST['testName'];
    $sDate = $_POST['sDate'];
    $sTime = $_POST['sTime'];
    $eTime = $_POST['eTime'];
    $tDuration = $_POST['tDuration'];
    saveTitle($conn, $sDate, $sTime, $eTime, $selectedTest, $tDuration);
}

if($status == 'genAutoRes'){
    $selectedTest = $_POST['testName'];
    genAutoResult($conn, $selectedTest);
}


if($status == 'updateQuestion'){
    $unique = $_POST['quesNumber'];
    $testname = $_POST['testname'];
    $question = $_POST['question'];
    $optA = $_POST['optA'];
    $optB = $_POST['optB'];
    $optC = $_POST['optC'];
    $optD = $_POST['optD'];
    $correctIndex = $_POST['correctIndex'];
    $correctText = $_POST['correctText'];
    $ansDes = $_POST['ansDes'];
    updateQuestion($conn, $testname, $unique, $question, $optA, $optB, $optC, $optD, $correctIndex, $correctText, $ansDes);
}

if($status == 'addQuestion'){
//        echo "in backend";
//        $unique = $_POST['quesNumber'];
    $testname = $_POST['testname'];
    $question = $_POST['question'];
    $optA = $_POST['optA'];
    $optB = $_POST['optB'];
    $optC = $_POST['optC'];
    $optD = $_POST['optD'];
    $correctIndex = $_POST['correctIndex'];
    $correctText = $_POST['correctText'];
    $ansDes = $_POST['ansDes'];
    $tableName = 'test_ans_key';
    $quesId = getSelectedTest($conn, $testname)."_".( getQuestionsCountAdmin($conn, $testname) + 1);
    $sr_no = ( getQuestionsCountAdmin($conn, $testname) + 1 );
    addNewQuestion($conn, $testname, $question, $optA, $optB, $optC, $optD, $correctIndex, $correctText, $ansDes, $quesId, $sr_no);
    saveAnsKey($conn, $correctIndex, $tableName, $testname);

}

if($status == 'savePlan'){
    $mail = $_POST['userMail'];
    $plan = $_POST['userPlan'];
    $validDate = $_POST['validDate'];
    updatePlans($conn, $mail, $plan, $validDate);
}


?>