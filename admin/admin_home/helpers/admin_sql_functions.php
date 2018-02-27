<?php

    include "../../../dbconnect.php";

    function getAdminName($conn, $adminmail){
        $sql = mysqli_query($conn,"SELECT * FROM admin WHERE adminMail='$adminmail'");
        $arr = mysqli_fetch_array($sql);
        return $arr['adminName'];
    }

    function getTotalUserCount($conn){
        $sql = mysqli_query($conn,"SELECT * FROM users");
        $totalUser = mysqli_num_rows($sql);
        return $totalUser;
    }

    function getUserNameFromMail($conn, $user_mail){
        $sql = mysqli_query($conn,"SELECT * FROM users WHERE userEmail='$user_mail'");
        $arr = mysqli_fetch_array($sql);
        return $arr['userName'];
    }

    function getTotalRevenue($conn){
        $sql = mysqli_query($conn,"SELECT * FROM users");
        $arr = mysqli_fetch_array($sql);
        $revenue = $arr['amountPaid'];
        $netRevenue = 0;

        if (mysqli_num_rows($sql) > 0) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $revenue = $row['amountPaid'];
                $netRevenue = $netRevenue+ $revenue;
            }
        }
        return $netRevenue;
    }

    function getTotalQuestions($conn){
        $sql = mysqli_query($conn,"SELECT * FROM questions");
        $arr = mysqli_fetch_array($sql);
        $netQuestion = mysqli_num_rows($sql);
        return $netQuestion;
    }

    function getDaysDiff(){
        $endDate = new DateTime('2018-03-15');
        $currentDate =  date("Y-m-d");
        $currDate = new DateTime($currentDate);
        $interval = $currDate->diff($endDate);
        $diff = $interval->format('%a');
        echo $diff;
    }

    function getTestQuestionsEdit($conn, $testName){
    $sql = mysqli_query($conn,"SELECT * FROM questions WHERE test_title = '$testName' ORDER BY sr_no");
    if (mysqli_num_rows($sql) > -1) {
        while ($row = mysqli_fetch_assoc($sql)) {
            $unique = "-".$row['q_id'];
            echo ' <div class="col-sm-12 quesCard">
                                <div class="card card-stats">
                                    <div class="card-header" data-background-color="blue">
                                        <span class="primeQuesSpot">' .$row['q_id']. '</span>
                                    </div>
                                    <div class="card-content editQues">
                                        <div class="form-group no-margin col-md-12 edit text-right">
                                            <textarea  id="ques'.$unique.'" class="form-control alignR col-md-12 category ques'.$unique.'">' .$row['question_title']. '</textarea>
                                        </div>

                                        <div class="col-md-3 col-sm-3 optionIndex margin-20">OPTION A</div>
                                        <div class="col-md-3 col-sm-3 optionIndex margin-20">OPTION B</div>
                                        <div class="col-md-3 col-sm-3 optionIndex margin-20">OPTION C</div>
                                        <div class="col-md-3 col-sm-3 optionIndex margin-20">OPTION D</div>

                                        <div class="form-group no-margin col-md-3 col-sm-6 edit text-right">
                                            <textarea id="opt_A'.$unique.'" class="form-control alignR category edit opt_A'.$unique.'"> ' .$row['opt_A']. ' </textarea>
                                        </div>
                                        <div class="form-group no-margin col-md-3 col-sm-6 edit text-right">
                                            <textarea id="opt_B'.$unique.'" class="form-control alignR category edit opt_B'.$unique.'">' .$row['opt_B']. '</textarea>
                                        </div>
                                        <div class="form-group no-margin col-md-3 col-sm-6 edit text-right">
                                            <textarea id="opt_C'.$unique.'" class="form-control alignR category edit opt_C'.$unique.'">' .$row['opt_C']. '</textarea>
                                        </div>
                                        <div class="form-group no-margin col-md-3 col-sm-6 edit text-right">
                                            <textarea id="opt_D'.$unique.'" class="form-control alignR category edit opt_D'.$unique.'">' .$row['opt_D']. ' </textarea>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3 optionIndex margin-20">CORRECT OPTION</div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group no-margin col-md-3 edit text-right">
                                                <input id="optIndex'.$unique.'"  type="text" value="' .$row['correct_choice_index']. '" placeholder="B" class="form-control optIndex alignR"/>
                                            </div>
                                             <div class="form-group no-margin col-md-5 edit text-right">
                                                       <textarea  id="ansDesc'.$unique.'"  placeholder="No Description for this question! Click to add."  class="form-control alignR col-md-12 category ansDesc'.$unique.'">' .$row['ans_description']. '</textarea>
                                             </div>
                                           
                                            <div class="col-md-4 correctNsubmitHolder">
                                                <span class="msg" id="msg'.$unique.'"> </span>
                                                <span  id="crctOptTxt'.$unique.'" class="correctOptionText crctOptTxt'.$unique.'"><b> ' .$row['correct_choice_text']. ' </b></span>
                                                <button id="updateBtn'.$unique.'"  class="updateBtn btn btn-primary clk">UPDATE</button>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>';
        }
    }
}

    function updateQuestion($conn, $testname, $unique, $question, $optA, $optB, $optC, $optD, $correctIndex, $correctText, $ansDes){
    $updateQues = mysqli_query($conn,"UPDATE questions SET question_title = '$question', opt_A = '$optA', opt_B = '$optB', opt_C = '$optC', opt_D = '$optD', correct_choice_text = '$correctText', correct_choice_index = '$correctIndex', ans_description = '$ansDes' WHERE q_id = '$unique'");
    $getRes = mysqli_query($conn, "SELECT * FROM tests WHERE test_name = '$testname'");
    $arr = mysqli_fetch_array($getRes);
    $ansKey =  $arr['test_ans_key'];
    $prev_ans_sep = explode(";", $ansKey);
    $ques_num_sep = explode("_", $unique);
    $quesNumber = $ques_num_sep[1];
//        $answer = $prev_ans_sep[$quesNumber];
    $newArray = array();

    $prev_ans_sep[$quesNumber] = $correctIndex;
    for($i = 0; $i < count($ansKey); $i++){
        array_push($newArray,  $prev_ans_sep[$i]);
    }

    $updatedAnsKey = implode(';', $prev_ans_sep);
    $updateRes = mysqli_query($conn, "UPDATE tests SET test_ans_key = '$updatedAnsKey' WHERE test_name = '$testname'");


    if($updateQues){
        echo "<span class=\"text-success\"><b>Updated!</b></span>";
    } else {
        echo "<span class=\"text-danger\"><b>Something went wrong! Try Later</b></span>";
    }
}

    function addNewQuestion($conn, $testname, $question, $optA, $optB, $optC, $optD, $correctIndex, $correctText, $ansDes, $quesId, $sr_no){
    $addQues = mysqli_query($conn,"INSERT INTO questions(question_title, opt_A, opt_B, opt_C, opt_D, correct_choice_text, correct_choice_index, ans_description, q_id, test_title, sr_no) VALUES ('$question',  '$optA', '$optB', '$optC', '$optD', '$correctText', '$correctIndex',  '$ansDes', '$quesId', '$testname', '$sr_no')");
    if($addQues){
        echo '<span class="text-success"> Saved!</span>';
    } else {
        echo '<span class="text-danger"> Failed!</span>';
    }
}

    function getSelectedTest($conn, $testname){
        $sql = mysqli_query($conn,"SELECT * FROM questions WHERE test_title='$testname' LIMIT 1");
        $arr = mysqli_fetch_array($sql);
        $qid = $arr['q_id'];
        $qid_sep = explode('_', $qid);
        return $qid_sep[0];
    }

    function getTotalTests($conn){
        $sql = mysqli_query($conn,"SELECT * FROM tests");
        $netTest = mysqli_num_rows($sql);
        return $netTest;
    }

    function getTestNum($conn, $testname){
        $sql = mysqli_query($conn,"SELECT * FROM tests WHERE test_name = '$testname'");
        $arr = mysqli_fetch_array($sql);
//        echo $arr['sr_no'];
        echo '<input type="text" id="tDuration" class="form-control alignR col-md-12 category ques" value="'.$arr['duration'].'">';

    }

    function getTestDate($conn, $testname){
        $sql = mysqli_query($conn,"SELECT * FROM tests WHERE test_name = '$testname'");
        $arr = mysqli_fetch_array($sql);
        echo '<input type="text" id="sDate" class="form-control alignR col-md-12 category ques" value="'.$arr['test_start_date'].'">';
    }

    function getTestStartTime($conn, $testname){
        $sql = mysqli_query($conn,"SELECT * FROM tests WHERE test_name = '$testname'");
        $arr = mysqli_fetch_array($sql);
        echo '<input type="text" id="sTime" class="form-control alignR col-md-12 category ques" value="'.$arr['start_time'].'">';
    }

    function getTestEndTime($conn, $testname){
        $sql = mysqli_query($conn,"SELECT * FROM tests WHERE test_name = '$testname'");
        $arr = mysqli_fetch_array($sql);
        echo '<input type="text" id="eTime" class="form-control alignR col-md-12 category ques" value="'.$arr['end_time'].'">';
    }

    function saveTitle($conn, $sDate, $sTime, $eTime, $testname, $tDuration){
        $updateTitle = mysqli_query($conn,"UPDATE tests SET  test_start_date = '$sDate', test_end_date = '$sDate', start_time = '$sTime', end_time = '$eTime', duration = '$tDuration' WHERE  test_name = '$testname'");
        if($updateTitle){
            echo '<span class="text-success"> Saved!</span>';
        } else {
            echo '<span class="text-danger"> Failed!</span>';
        }
    }

    function getTestNames($conn){
        $sql = mysqli_query($conn,"SELECT * FROM tests");
        if (mysqli_num_rows($sql) >= 0) {
            while ($row = mysqli_fetch_assoc($sql)) {
               echo '<option data-subtext="Date:  '.$row['test_start_date'].'" >'.$row['test_name'].'</option>';
            }
        }
    }

    function chkTest($conn, $selectedTest){
        $sql = mysqli_query($conn,"SELECT * FROM tests WHERE test_name = '$selectedTest'");
        $totalMail = mysqli_num_rows($sql);
        if($totalMail == '0'){
            echo "<span class='text-success chkMsg'>Avaliable</span>";
        } else {
            echo "<span class='text-danger chkMsg'>Already Taken! Use different name</span>";
        }
    }

    function getRecentUsers($conn, $limit){
        $sql = mysqli_query($conn,"SELECT * FROM users ORDER BY userId DESC LIMIT $limit");
        if (mysqli_num_rows($sql) >= 0) {
            while ($row = mysqli_fetch_assoc($sql)) {
                echo '<tr>';
                echo '<td>' .$row['userId']. '</td>';
                echo '<td>' .$row['userName']. '</td>';
                echo '<td>' .$row['userEmail']. '</td>';
                echo '<td>' .$row['userMobile']. '</td>';
                echo '<td>' .$row['userSubscription']. '</td>';
                echo '<td>' .$row['subEndDate']. '</td>';
                echo '<td>' .$row['userCollege'].' ,' .$row['userCity']. '</td>';
                echo '</tr>';
            }
        }
    }

    function viewTestDetails($conn, $testname){
        $sql = mysqli_query($conn,"SELECT * FROM result WHERE test_title = '$testname'");
        echo '<div class="card">
                        <div class="card-header" data-background-color="blue">
                            <h4 class="title" id="selectedtestName">'.$testname.'</h4>
                            <p class="category">View Test Details</p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table table-hover">
                                <thead class="text-info">
                                <th class="text-center"><b>ID</b></th>
                                <th class="text-center"><b>USER NAME</b></th>
                                <th class="text-center"><b>MAIL ADDRESS</b></th>
                                <th class="text-center"><b>TOTAL SCORE</b></th>

                                </thead>
                                <tbody>';
        if (mysqli_num_rows($sql) >= 0) {
            $i = 0;
            while ($row = mysqli_fetch_assoc($sql)) {
                $i++;
                $mail = getUserNameFromMail($conn, $row['userMail']);
                echo '<tr>';
                echo '<td  class="text-center">' .$i. '</td>';
                echo '<td  class="text-center">' .$mail. '</td>';
                echo '<td  class="text-center">' .$row['userMail']. '</td>';
                echo '<td  class="text-center">' .$row['final_score']. '</td>';
                echo '</tr>';
            }
        }
    }

    function getAllQuestions($conn, $limit){
        $sql = mysqli_query($conn,"SELECT * FROM questions ORDER BY test_title LIMIT $limit");
//        $arr = mysqli_fetch_array($sql);
        if (mysqli_num_rows($sql) > -1) {
            while ($row = mysqli_fetch_assoc($sql)) {
                echo '<tr>';
                echo '<td>' .$row['q_id']. '</td>';
                echo '<td>' .$row['question_title']. '</td>';
                echo '<td>' .$row['correct_choice_text']. '</td>';
                echo '<td>' .$row['test_title']. '</td>';
                echo '</tr>';
            }
        }
    }

    function getTotalPremiumCount($conn){
        $count = 0;
        $sql = mysqli_query($conn,"SELECT * FROM users");
        if (mysqli_num_rows($sql) > -1) {
            while ($row = mysqli_fetch_assoc($sql)) {
                if(($row['userSubscription'] == 'Premium')){
                    $count++;
                }
            }
        }
        return $count;
    }

    function getPremiumCount($conn){
            $count = 0;
            $sql = mysqli_query($conn,"SELECT * FROM users");
            if (mysqli_num_rows($sql) > -1) {
                    while ($row = mysqli_fetch_assoc($sql)) {
                        if(($row['userSubscription'] == 'Premium') && ($row['amountPaid'] != '0')){
                            $count++;
                        }
                    }
                }
            return $count;
        }

    function getEnterpriseCount($conn){
        $count = 0;
        $sql = mysqli_query($conn,"SELECT * FROM users");
        if (mysqli_num_rows($sql) > -1) {
                while ($row = mysqli_fetch_assoc($sql)) {
                    if(($row['userSubscription'] == 'Enterprise') && ($row['amountPaid'] != '0')){
                        $count++;
                    }
                }
            }
        return $count;
    }

    function getTotalEnterpriseCount($conn){
        $count = 0;
        $sql = mysqli_query($conn,"SELECT * FROM users");
        if (mysqli_num_rows($sql) > -1) {
            while ($row = mysqli_fetch_assoc($sql)) {
                if(($row['userSubscription'] == 'Enterprise')){
                    $count++;
                }
            }
        }
        return $count;
    }

    function matchAnswerKey($conn, $testname){
        $getQuestions = mysqli_query($conn,"SELECT * FROM questions WHERE test_title = '$testname'");
        $getGenratedAnswerKey = mysqli_query($conn,"SELECT * FROM tests WHERE test_name = '$testname'");
        $getGenratedAnswerKeyArr = mysqli_fetch_array($getGenratedAnswerKey);
        $genratedAnswerKey = $getGenratedAnswerKeyArr['test_ans_key'];
        $seprateAnswer = explode(';', $genratedAnswerKey);
        echo '<div class="card">
                        <div class="card-header" data-background-color="blue">
                            <h4 class="title" id="selectedtestName">'.$testname.'</h4>
                            <p class="category">Match Answer Keys</p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table table-hover">
                                <thead class="text-info">
                                <th class="text-center"><b>ID</b></th>
                                <th class="text-center"><b>Question</b></th>
                                <th class="text-center"><b>Correct Text</b></th>
                                <th class="text-center"><b>Correct Option Number</b></th>
                                <th class="text-center"><b>Saved Option Number</b></th>

                                </thead>
                                <tbody>';

        if (mysqli_num_rows($getQuestions) > -1) {
            while ($row = mysqli_fetch_assoc($getQuestions)) {

                echo '<tr>';
                echo '<td>' .$row['q_id']. '</td>';
                echo '<td>' .$row['question_title']. '</td>';
                echo '<td>' .$row['correct_choice_text']. '</td>';
                echo '<td>' .$row['correct_choice_index']. '</td>';
//                echo '<td>' .$row['correct_chice_index']. '</td>';
                echo '<td>' .$seprateAnswer[$row['sr_no']]. '</td>';
                echo '</tr>';
            }
        }
    }

    function getUnpaidPremiumCount($conn){
        $count = 0;
        $sql = mysqli_query($conn,"SELECT * FROM users");
        if (mysqli_num_rows($sql) > -1) {
                while ($row = mysqli_fetch_assoc($sql)) {
                    if(($row['userSubscription'] == 'Premium') && ($row['amountPaid'] == '0')){
                        $count++;
                    }
                }
            }
        return $count;
    }

    function getUnpaidEnterpriseCount($conn){
        $count = 0;
        $sql = mysqli_query($conn,"SELECT * FROM users");
        if (mysqli_num_rows($sql) > -1) {
                while ($row = mysqli_fetch_assoc($sql)) {
                    if(($row['userSubscription'] == 'Enterprise') && ($row['amountPaid'] == '0')){
                        $count++;
                    }
                }
            }
        return $count;
    }

    function getPlans($conn, $limit){
        $sql = mysqli_query($conn,"SELECT * FROM users ORDER BY userId LIMIT $limit");
    //        $arr = mysqli_fetch_array($sql);
        $unique = 1;
        if (mysqli_num_rows($sql) > -1) {
            while ($row = mysqli_fetch_assoc($sql)) {
                echo '<tr>';
                echo '<td class="text-center">' .$row['userId']. '</td>';
                echo '<td class="text-center">' .$row['userName']. '</td>';
                echo '<td class="text-center">' .$row['userMobile']. '</td>';
                echo '<td class="text-center">' .$row['userEmail']. '</td>';
                if($row['amountPaid'] == ''  || ($row['amountPaid'] == '0')){ $row['amountPaid'] = 'UNPAID'; }

                echo '<td class="text-center">' .$row['amountPaid']. '</td>';

                if(($row['userSubscription'] == '')){ $row['userSubscription'] = 'No Plan'; }

                echo '<td class="text-center" id="sub-'.$unique.'" >' .$row['userSubscription']. '</td>';

                if($row['subsType'] == '1'){ $selected  = 'selected'; } else { $selected  = ''; }
                if($row['subsType'] == '2'){ $enterSubs  = 'selected'; } else { $enterSubs  = ''; }
                if($row['subEndDate'] == '' || $row['subEndDate']=='0000-00-00'){ $placeholder  = 'Not subscribed'; }

                echo '<td  class="text-center"><select id="selector-'.$unique.'" class="selectpickerr planSelector">
                            <option  >Upgrade plan</option>
                            <option '.$selected.' value="Premium" >Premium</option>
                            <option '.$enterSubs.' value="Enterprise">Enterprise</option>
                           </select>
                    </td>';
                echo '<td  class="text-center"> <p id="validDate-'.$unique.'">' .$row['subEndDate']. '</p></td>';
                echo '<td class="text-center"><p class="savePlan" id="savePlan-'.$unique.' '.$row['userEmail'].'"  href=""><i class="material-icons text-info">save</i></p></td>';
                echo '</tr>';
            $unique++;
            }
        }
    }

    function updatePlans($conn, $mail, $plan, $validDate){
        if($plan == 'Enterprise'){$subType = '2'; $attempts = '999';}
        if($plan == 'Premium'){$subType = '1'; $attempts = '1';}
        if($plan == 'Upgrade plan'){$plan = 'No Plan'; $validDate = '0000-00-00';}

        date_default_timezone_set("Asia/Kolkata");
        $currentDate =  date("Y-m-d");

        $updateValues = mysqli_query($conn,"UPDATE users SET userSubscription = '$plan', amountPaid = '0', subsType = '$subType', subStartDate = '$currentDate', subEndDate = '$validDate', attempts='$attempts' WHERE userEmail = '$mail'");
        if($updateValues){
            echo '<div class="row"><div class="col-sm-6"></div> <div class="alert alert-success animated fadeIn ">
                    <div class="container-fluid">
                      <div class="alert-icon">
                        <i class="material-icons">check</i>
                      </div>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="material-icons">clear</i></span>
                      </button>
                      <b>Saved:</b> Subscription for the user "<b>'.$mail.'</b>" changed to "<b>'.$plan.' &nbsp;</b>"
                    </div>
                </div></div></div>';
        }
    }

    function getTestQuestions($conn, $testTitle){
        $sql = mysqli_query($conn,"SELECT * FROM questions WHERE test_title='$testTitle'");
        $arr = mysqli_fetch_array($sql);
        if (mysqli_num_rows($sql) > 0) {
            while ($row = mysqli_fetch_assoc($sql)) {
                echo '<tr>';
                echo '<td>' .$row['q_id']. '</td>';
                echo '<td>' .$row['question_title']. '</td>';
                echo '<td>' .$row['correct_choice_text']. '</td>';
                echo '<td>' .$row['test_title']. '</td>';
                echo '</tr>';
            }
        }
    }

    function saveTestDetials($conn, $testDate, $testName, $startTime, $endTime, $posMark, $negMark, $testTime){
        $savetest = mysqli_query($conn,"INSERT INTO tests(test_name, test_start_date, test_end_date, start_time, end_time, positive_mark, negative_mark, duration) VALUES ('$testName', '$testDate', '$testDate', '$startTime', '$endTime','$posMark', '$negMark', '$testTime')");

    }

    function addQuestion($conn, $sr_no, $quesTitle, $quesId, $optA, $optB, $optC, $optD, $crtIndx, $crtText, $descr, $testName){
        $saveQues = mysqli_query($conn,"INSERT INTO questions(question_title, opt_A, opt_B, opt_C, opt_D, correct_choice_text, correct_choice_index, ans_description, q_id, test_title, sr_no) VALUES ('$quesTitle',  '$optA', '$optB', '$optC', '$optD',  '$crtText', '$crtIndx', '$descr', '$quesId', '$testName', '$sr_no')");
        if($saveQues){
            echo '<h3 class="title" style="color: #1c9b2b"> Question Saved! Add another auestion...</h3>';
        } else{
            echo ' <h3 class="title" style="color: #f44336"> Unable to save question! Try again later...</h3>';
        }
    }

    // Get total number of questions for particular test
    function getQuestionsCountAdmin($conn, $testTitle){
        $grabQuestion = mysqli_query($conn, "SELECT * FROM questions WHERE test_title ='$testTitle'");
        $questionCount = mysqli_num_rows($grabQuestion);
        return $questionCount;
    }

    function saveAnsKey($conn, $correctOption, $tableName, $testName){
        $submit_answer = mysqli_query($conn," UPDATE tests SET $tableName = concat(ifnull($tableName,''), ';$correctOption') WHERE test_name = '$testName' ");
    }

    function searchDatabase($conn, $query){
        $searchDB = mysqli_query($conn,"SELECT questions.*, users.* FROM questions, users WHERE (questions.question_title LIKE '%".$query."%' OR users.userName LIKE '%".$query."%') ");
        $arr = mysqli_fetch_array($searchDB);
        if (mysqli_num_rows($searchDB) > 0) {
            while ($row = mysqli_fetch_assoc($searchDB)) {
                echo '<tr>';
                echo '<td>' .$row['q_id']. '</td>';
                echo '<td>' .$row['question_title']. '</td>';
                echo '<td>' .$row['correct_choice_text']. '</td>';
                echo '<td>' .$row['test_title']. '</td>';
                echo '</tr>';
            }
        }
    }



?>