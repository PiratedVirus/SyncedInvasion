<?php

include "../../../dbconnect.php";
include "sessions.php";
include "admin_sql_functions.php";

// POSTED variables
$status = $_POST['btnClicked'];

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
    saveTitle($conn, $sDate, $sTime, $eTime, $selectedTest);
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
    updateQuestion($conn, $testname, $unique, $question, $optA, $optB, $optC, $optD, $correctIndex, $correctText);
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
    $quesId = getSelectedTest($conn, $testname)."_".( getQuestionsCountAdmin($conn, $testname) + 1);
    $sr_no = ( getQuestionsCountAdmin($conn, $testname) + 1 );
    addNewQuestion($conn, $testname, $question, $optA, $optB, $optC, $optD, $correctIndex, $correctText, $quesId, $sr_no);
}

if($status == 'savePlan'){
    $mail = $_POST['userMail'];
    $plan = $_POST['userPlan'];
    $validDate = $_POST['validDate'];
    updatePlans($conn, $mail, $plan, $validDate);
}


?>