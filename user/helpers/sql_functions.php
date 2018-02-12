<?php 

	include '../dbconnect.php';

	// Get the userName
	function getUserName($conn, $user_id){
		$sql = mysqli_query($conn,"SELECT * FROM users WHERE userId='$user_id'");
		$arr = mysqli_fetch_array($sql);
		return $arr['userName'];
	}
	// Get user Mail address A UNIQUE + PRIMARY key
	function getUserEmail($conn, $user_id){
		$sql = mysqli_query($conn,"SELECT * FROM users WHERE userId='$user_id'");
		$arr = mysqli_fetch_array($sql);
		return $arr['userEmail'];
	}

	function getUserMobile($conn, $user_id){
        $sql = mysqli_query($conn,"SELECT * FROM users WHERE userId='$user_id'");
        $arr = mysqli_fetch_array($sql);
        return $arr['userMobile'];
    }

    function getUserPassword($conn, $user_id){
        $sql = mysqli_query($conn,"SELECT * FROM users WHERE userId='$user_id'");
        $arr = mysqli_fetch_array($sql);
        return $arr['userPass'];
    }

    function updateUserPassword($conn, $user_id, $password){
        $sql = mysqli_query($conn,"UPDATE users SET userPass = '$password' WHERE userId='$user_id'");
        if($sql){
            echo "<span class='text-success'>Successfully Updated! </span>";
        } else {
            echo "<span class='text-danger'>Failed!</span>";
        }
    }

	// Get subscription plan 
	function getUserSubscription($conn, $user_id){
		$sql = mysqli_query($conn,"SELECT * FROM users WHERE userId='$user_id'");
		$arr = mysqli_fetch_array($sql);
		return $arr['subsType'];
	}

    // Get subscription
	function getUserSubscriptionName($conn, $user_id){
		$sql = mysqli_query($conn,"SELECT * FROM users WHERE userId='$user_id'");
		$arr = mysqli_fetch_array($sql);
		return $arr['userSubscription'];
	}

	// Get total number of questions for particular test
	function getQuestionsCount($conn, $testTitle){
		$grabQuestion = mysqli_query($conn, "SELECT * FROM questions WHERE test_title ='$testTitle'");
		$questionCount = mysqli_num_rows($grabQuestion);
		return $questionCount;
	}

	function getLatestExamDate($conn){
	    $sortTest = mysqli_query($conn, "SELECT * FROM tests WHERE test_start_date >= CURRENT_DATE ORDER BY test_start_date ASC LIMIT 1");
        $arr = mysqli_fetch_array($sortTest);
        $startFullDate =  $arr['test_start_date'];
        $pieces = explode("-", $startFullDate);
        $exactDate = $pieces[2];
        return $exactDate;
    }

    function getExamEndDate($conn){
        $sortTest = mysqli_query($conn, "SELECT * FROM tests WHERE test_start_date >= CURRENT_DATE ORDER BY test_start_date ASC LIMIT 1");
        $arr = mysqli_fetch_array($sortTest);
        $endFullDate =  $arr['test_end_date'];
        return $endFullDate;
    }

    function getStartDateFull($conn){
        $sortTest = mysqli_query($conn, "SELECT * FROM tests WHERE test_start_date >= CURRENT_DATE ORDER BY test_start_date ASC LIMIT 1");
        $arr = mysqli_fetch_array($sortTest);
        $startFullDate =  $arr['test_start_date'];
        return $startFullDate;
    }

    function getStartTime($conn){
        $sortTest = mysqli_query($conn, "SELECT * FROM tests WHERE test_start_date >= CURRENT_DATE ORDER BY test_start_date ASC LIMIT 1");
        $arr = mysqli_fetch_array($sortTest);
        $startTime =  $arr['start_time'];
        return $startTime;
    }

    function getEndTime($conn){
        $sortTest = mysqli_query($conn, "SELECT * FROM tests WHERE test_start_date >= CURRENT_DATE ORDER BY test_start_date ASC LIMIT 1");
        $arr = mysqli_fetch_array($sortTest);
        $endTime =  $arr['end_time'];
        return $endTime;
    }

    function getMaxAttemptNum($conn, $user_id){
        $sql = mysqli_query($conn,"SELECT * FROM users WHERE userId='$user_id'");
        $arr = mysqli_fetch_array($sql);
        return $arr['attempts'];
    }

    function changeToEnterprise($conn, $user_id){
        $currentDate =  date("Y-m-d");
        $endDate = date('Y-m-d', strtotime('+1 years'));
	    $upgrade = mysqli_query($conn,"UPDATE users SET userSubscription='Enterprise', attempts='infinite', subsType='1', amountPaid='5000', subStartDate='$currentDate', subEndDate='$endDate', attempts='999', freeFlag = '1' WHERE userId = '$user_id'");
    }

    function changeToPrimum($conn, $user_id){
        $currentDate =  date("Y-m-d");
        $endDate = date('Y-m-d', strtotime('+1 months'));
        $upgrade = mysqli_query($conn,"UPDATE users SET userSubscription='Premium', attempts='1', subsType='2', amountPaid='300', subStartDate='$currentDate', subEndDate='$endDate', attempts='1', freeFlag = '1' WHERE userId = '$user_id'");
    }

    function useFreeTrial($conn, $user_id){
        $currentDate =  date("Y-m-d");
        $endDate = date('Y-m-d', strtotime('+1 months'));
        $upgrade = mysqli_query($conn,"UPDATE users SET userSubscription='Free Trial', attempts='1', subsType='3', amountPaid='0', subStartDate='$currentDate', subEndDate='$endDate', attempts='1', freeFlag = '1' WHERE userId = '$user_id'");
        if($upgrade){
            echo "Trial Started";
        } else {
            echo "Error occured";
        }
    }

    function checkTrialStatus($conn, $user_id){
        $sql = mysqli_query($conn,"SELECT * FROM users WHERE userId='$user_id'");
        $arr = mysqli_fetch_array($sql);
        return $arr['freeFlag'];
    }

    function checkExpiry($conn, $user_id){
        $sql = mysqli_query($conn,"SELECT * FROM users WHERE userId='$user_id'");
        $arr = mysqli_fetch_array($sql);
        $expiryDate =  $arr['subEndDate'];
        $currentDate =  date("Y-m-d");
        if($expiryDate < $currentDate){
            $upgrade = mysqli_query($conn,"UPDATE users SET userSubscription='Plan Expired', subsType='0', subStartDate='', subEndDate='', freeFlag = '0' WHERE userId = '$user_id'");
        }
    }

    function getMMYYYY($conn){
        $sortTest = mysqli_query($conn, "SELECT * FROM tests WHERE test_start_date >= CURRENT_DATE ORDER BY test_start_date ASC LIMIT 1");
        $arr = mysqli_fetch_array($sortTest);
        $startFullDate =  $arr['test_start_date'];
        $pieces = explode("-", $startFullDate);
        $exactYear = $pieces[0];
        $exactMonth = $pieces[1];
        $monthName = $monthName = date("F", mktime(0, 0, 0, $exactMonth, 10));
        $mmYY = $monthName. " ".$exactYear. ", ";
        return $mmYY;
    }

    function getHighestScore($conn, $mail){
	    $getScore = mysqli_query($conn, "SELECT * FROM result WHERE userMail = '$mail' ORDER BY final_score DESC LIMIT 1");
        $arr = mysqli_fetch_array($getScore);
        $highScore =  $arr['final_score'];
        return $highScore;
    }

    function getHighScoreDate($conn, $mail){
        $getScore = mysqli_query($conn, "SELECT * FROM result WHERE userMail = '$mail' ORDER BY final_score DESC LIMIT 1");
        $arr = mysqli_fetch_array($getScore);
        $highScoreDate =  $arr['test_date'];
        $pieces = explode("-", $highScoreDate);
        $exactYear = $pieces[0];
        $exactMonth = $pieces[1];
        $exactDay = $pieces[2];
        $monthName = $monthName = date("F", mktime(0, 0, 0, $exactMonth, 10));
        $DDmmYY =$exactDay." ".$monthName. " ".$exactYear. ".";
        return $DDmmYY;

    }

    function getLatestTestName($conn){
        $getTestName = mysqli_query($conn, "SELECT * FROM tests WHERE test_start_date >= CURRENT_DATE ORDER BY test_start_date ASC LIMIT 1");
        $arr = mysqli_fetch_array($getTestName);
        $testTitle =  $arr['test_name'];
        setcookie("TestName", $testTitle);
        $_SESSION['TestTitle'] = $testTitle;
        return $testTitle;
    }

    function getLatestTestDuration($conn){
        $getTestName = mysqli_query($conn, "SELECT * FROM tests WHERE test_start_date >= CURRENT_DATE ORDER BY test_start_date ASC LIMIT 1");
        $arr = mysqli_fetch_array($getTestName);
        $duration =  $arr['duration'];
        return $duration;
    }

    function fillResultTable($conn, $mail, $testDate, $testTitle){
        $fillResults = mysqli_query($conn, "INSERT INTO result(userMail, test_title, test_date, answer_key, submitted_ans, final_score) VALUES ('$mail', '$testTitle', '$testDate', '', '', '')");
	    $updateAnswerKey = mysqli_query($conn,"UPDATE result SET answer_key=(SELECT test_ans_key FROM tests WHERE tests.test_name='$testTitle' ) WHERE result.test_title = '$testTitle'");
        $sql = mysqli_query($conn,"SELECT * FROM users WHERE userEmail='$mail'");
        $arr = mysqli_fetch_array($sql);
        $attempt = $arr['attempts'];
        $attempt--;
	    $updateAttempts = mysqli_query($conn,"UPDATE users SET attempts= '$attempt' WHERE userEmail = '$mail'");
    }

    function genrateUserResult($conn, $mail, $testTitle){
	    $getRow = mysqli_query($conn, "SELECT * FROM result WHERE userMail = '$mail' AND test_title = '$testTitle'");
        $getMarks = mysqli_query($conn, "SELECT * FROM tests WHERE test_name = '$testTitle'");
	    $arr = mysqli_fetch_array($getRow);
	    $testArr = mysqli_fetch_array($getMarks);

//        Setting session variable if results are generated
        $_SESSION['user_result'] = 'done';

        $answer_key =  $arr['answer_key'];
        $user_ans = $arr['submitted_ans'];
        $posMark = $testArr['positive_mark'];
        $negMark = $testArr['negative_mark'];

        $user_ans_sep = explode(";", $user_ans);
        $seprate_ans = explode(";", $answer_key);
        $totalQuestions = count($seprate_ans);

        $positiveScore = 0; $negativeScore = 0; $finalScore = 0;
        $correctRes = 0; $attempted = 0;
        $incorrectRes = 0; $unAttempted = 0;

        for($cnt = 0; $cnt < ($totalQuestions-1); $cnt++){

            if( $seprate_ans[$cnt] == $user_ans_sep[$cnt] ){
                $correctRes++;
            }
            if ($user_ans_sep[$cnt] == 'null'){
                $unAttempted++;
            }
        }

        $attempted = $totalQuestions - $unAttempted;
        $incorrectRes = $attempted - $correctRes;
//        echo "The correct responses are " .($correctRes-1). " and  incorrect responses are ".($incorrectRes). "unattempted are " .($unAttempted-1);



        $positiveScore = ($correctRes-1) * $posMark;
        $negativeScore = $incorrectRes * $negMark;

//        echo "Positive scrore is " .$positiveScore;
//        echo "Neg scrore is " .$negativeScore;
//        echo "incorrect responses are " .$incorrectRes;
        $finalScore = ($positiveScore - $negativeScore);

        $unAttempted = $unAttempted-1;
        $correctRes = $correctRes-1;
        $attempted = $attempted-1;

        $updateResult = mysqli_query($conn, "UPDATE result SET  final_score='$finalScore', attem_ques='$attempted', unattem_ques='$unAttempted', correct_res='$correctRes', incorrect_res='$incorrectRes' WHERE userMail = '$mail' AND test_title = '$testTitle'");
        echo $finalScore;
        echo '<p class="homeSubHeader"><span class="text-info">Attempted Questions : </span><b>'. $attempted .'</b> <span style="margin-left: 20px;" class="text-info"> Unttempted Questions : </span><b>'. $unAttempted .'</b></p>';
        echo '<p class="homeSubHeader"><span class="text-info">Correct Responses : </span><b>'. $correctRes .'</b> <span style="margin-left: 20px;" class="text-info"> Incorrect Responses : </span><b>'. $incorrectRes .'</b></p>';
    }

    function printAnswekey($conn, $mail, $testTitle){
//	    echo "The mail address is " .$mail. " with Test name " .$testTitle;
	    $getQuesAns = mysqli_query($conn, "SELECT * FROM questions WHERE test_title = '$testTitle'");
	    $getCorrectAns = mysqli_query($conn, "SELECT * FROM tests WHERE test_name = '$testTitle'");
	    $arr = mysqli_fetch_array($getCorrectAns);
	    $getUserAns = mysqli_query($conn, "SELECT * FROM result WHERE (test_title = '$testTitle' AND userMail = '$mail') ");
	    $arrUser = mysqli_fetch_array($getUserAns);

	    $test_anskey = $arr['test_ans_key'];
        $ans_sep = explode(';',$test_anskey);
        $user_anskey = $arrUser['submitted_ans'];
        $user_ans = explode(';',$user_anskey);
        $i = 1;


        if (mysqli_num_rows($getQuesAns) > -1) {
            while ($row = mysqli_fetch_assoc($getQuesAns)) {

                echo '<a href="#" class="col-md-12  thumbnail qCards">
                    <div class="qNumb">
                        <h2 class="theCell">'.$row[sr_no].'</h2> 
                    </div>
                    <div class="qHolder">                   
                        <p class="qText"> '.nl2br($row[question_title]).' </p>
                        <div class="optHolder clearfix text-center">
                            <div class="col-md-3 text-right">
                                <p class="optTitle"><b>OPTION  &nbsp;A</b></p>
                                <p class="optText '.($ans_sep[$i] == "A" ? "crctOpt" : "").'  '.($user_ans[$i] == "A" ? ($user_ans[$i] != $ans_sep[$i] ? "incrtOpt" : "") : ""). ' "> '.nl2br($row[opt_A]).' </p>
                                <p class="cMsg  '.($ans_sep[$i] == "A" ? "" : "hidden").'  ">Correct Answer</p>
                                <p class="eMsg  '.($user_ans[$i] == "A" ? "" : "hidden").'  ">Your Answer</p>
                            </div>
                            <div class="col-md-3 text-right"> 
                                <p class="optTitle"><b>OPTION  &nbsp;B</b></p>
                                <p class="optText '.($ans_sep[$i] == "B" ? "crctOpt" : "").'  '.($user_ans[$i] == "B" ? ($user_ans[$i] != $ans_sep[$i] ? "incrtOpt" : "") : ""). ' "> '.nl2br($row[opt_B]).' </p>
                                <p class="cMsg  '.($ans_sep[$i] == "B" ? "" : "hidden").'  ">Correct Answer</p>
                                <p class="eMsg  '.($user_ans[$i] == "B" ? "" : "hidden").'  ">Your Answer</p>

                            </div>
                            <div class="col-md-3 text-right">
                                <p class="optTitle"><b>OPTION  &nbsp;C</b></p>
                                <p class="optText '.($ans_sep[$i] == "C" ? "crctOpt" : "").'  '.($user_ans[$i] == "C" ? ($user_ans[$i] != $ans_sep[$i] ? "incrtOpt" : "") : ""). ' "> '.nl2br($row[opt_C]).' </p>
                                <p class="cMsg  '.($ans_sep[$i] == "C" ? "" : "hidden").'  ">Correct Answer</p>
                                <p class="eMsg  '.($user_ans[$i] == "C" ? "" : "hidden").'  ">Your Answer</p>

                            </div>
                            <div class="col-md-3 text-right">
                                <p class="optTitle"><b>OPTION  &nbsp;D</b></p>
                                <p class="optText '.($ans_sep[$i] == "D" ? "crctOpt" : "").'  '.($user_ans[$i] == "D" ? ($user_ans[$i] != $ans_sep[$i] ? "incrtOpt" : "") : ""). ' "> '.nl2br($row[opt_D]).' </p>
                                <p class="cMsg  '.($ans_sep[$i] == "D" ? "" : "hidden").'  ">Correct Answer</p>
                                <p class="eMsg  '.($user_ans[$i] == "D" ? "" : "hidden").'  ">Your Answer</p>

                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right asnDesText">
                                    <p> Answer Description : '.$row[ans_description].'</p>
                                </div>
                            </div>
                            
                        </div>
        
                    </div>
                </a>';
                $i++;
            }
        }
    }

    function printRanks($conn, $testName, $user_id){
        $getRanks = mysqli_query($conn, "SELECT * FROM result WHERE test_title = '$testName' ORDER BY final_score DESC");
        $rank = 1;
        if (mysqli_num_rows($getRanks) > -1) {
            while ($row = mysqli_fetch_assoc($getRanks)) {
                $mail = $row['userMail'];
                $sql = mysqli_query($conn,"SELECT * FROM users WHERE userEmail='$mail' ");
                $sqlID = mysqli_query($conn,"SELECT * FROM users WHERE userId='$user_id' ");
                $arr = mysqli_fetch_array($sql);
                $arrID = mysqli_fetch_array($sqlID);
                ( $mail==$arrID['userEmail'] ? $val = 'highlightUser' : $val = '');
                echo '<tr>';
                echo '<td  class="'.$val.'" >' .$rank. '</td>';
                echo '<td class="'.$val.'" >' .$arr['userName']. '</td>';
                echo '<td  class="'.$val.'" >' .$row['final_score']. '</td>';
                echo '</tr>';
                $rank++;
            }
        }
    }

    function getTestDuration($conn, $testTitle){
        $grabTestTime = mysqli_query($conn, "SELECT * FROM tests WHERE test_name ='$testTitle'");
        $testDuration = mysqli_fetch_array($grabTestTime);
        return $testDuration['duration'];
    }

    function setSessionTimer($conn, $testTitle){
        $_SESSION['test-duration'] = getTestDuration($conn, $testTitle);
        $_SESSION['test-start'] = '1';
//        echo getTestDuration($conn, $testTitle);
        date_default_timezone_set("Asia/Kolkata");
        $_SESSION['start-time'] = date("Y-m-d H:i:s");
        $endTime = date('Y-m-d H:i:s', strtotime('+'.$_SESSION['test-duration'].'minutes', strtotime($_SESSION['start-time'])));
        $_SESSION['end-time'] = $endTime;
        echo 'inside this function';
    }

    function getUserTests($conn, $mail){
        $sql = mysqli_query($conn,"SELECT * FROM result WHERE userMail = '$mail'");
        if (mysqli_num_rows($sql) >= 0) {
            while ($row = mysqli_fetch_assoc($sql)) {
//                echo '<option  data-subtext="Conducted" >'.$row['test_title'].'</option>;
                echo  ' <option data-subtext="Conducted on  '.$row['test_date'].'  ">'.$row['test_title'].'</option>';

            }
        }
    }

    function checkTestAttempt($conn, $mail, $testTitle){
        $getRow = mysqli_query($conn, "SELECT * FROM result WHERE userMail = '$mail' AND test_title = '$testTitle'");
        $arr = mysqli_fetch_array($getRow);
        $attempt = $arr['submitted_ans'];
        if(($attempt != '') || ($attempt != null)){
            return '1';
        } else {
            return false;
        }
    }

    function checkResult($conn, $mail, $testTitle){
        $getRow = mysqli_query($conn, "SELECT * FROM result WHERE userMail = '$mail'");
        $cnt = mysqli_num_rows($getRow);
        if($cnt >= 1){
            return '1';
        } else {
            return false;
        }
    }

    function getPreviousResult($conn, $mail){
        $getLatestScore = mysqli_query($conn, "SELECT * FROM result WHERE userMail = '$mail' ORDER BY test_date ASC LIMIT 1");
        $arr = mysqli_fetch_array($getLatestScore);
        $latestScore = $arr['final_score'];
        return $latestScore;
    }

	function updateUserProfile($conn, $user_id, $username, $usermobile){
	    $updatePro = mysqli_query($conn, "UPDATE users SET userName='$username', userMobile='$usermobile' WHERE userId = '$user_id'");
    }

	// Store answer to different columns as per CORRECT or WRONG response and to a common column
	function recordAns($conn,$currentQuestion, $optionNumber, $optionText, $tableName, $id) {
			// Load previous MCQ answer 
			$lastAns = getPreviousAns($conn,$currentQuestion);
			// For testing purpose
			echo "User Answer : ".$optionText;
			echo "<br>";
			echo "Correct Answer : ". $lastAns;
			// For testing purpose
			saveAnswer($conn, $tableName, $currentQuestion, $optionNumber, $id);
			// Check against correct response
			if($optionText == $lastAns){
				echo "<br> SUCCESS <br>";
				$correct_ans = 'correct_ans';
				saveAnswer($conn, $correct_ans, $currentQuestion, $optionNumber, $id);
			} else {
				echo "<br> Wrong response </br>";
				$wrong_ans = 'wrong_ans';
				saveAnswer($conn, $wrong_ans, $currentQuestion, $optionNumber, $id);
			}
	}

	function saveAnswer($conn, $tableName, $currentQuestion, $optionNumber, $id){
		// appends text to the end of all entries in specified column
		$submit_answer = mysqli_query($conn," UPDATE result SET $tableName = concat(ifnull($tableName,''), '$currentQuestion-$optionNumber;') WHERE userMail = '$id' ");
	}

	function getTestPosMarks($conn, $testTitle){
        $grabQuestion = mysqli_query($conn, "SELECT * FROM tests WHERE test_name ='$testTitle'");
        $questionCount =mysqli_fetch_array($grabQuestion);
        return $questionCount['positive_mark'];
    }



    function getTestNegMarks($conn, $testTitle){
        $grabQuestion = mysqli_query($conn, "SELECT * FROM tests WHERE test_name ='$testTitle'");
        $questionCount =mysqli_fetch_array($grabQuestion);
        return $questionCount['negative_mark'];
    }

	// Used to print next or previous OR any question upon entry of given parameters
	function printQuestion($conn, $newQuestionNumber, $testName){
//        setSessionTimer($conn, $testName);

        // Get stored value from cookie with questionNumber
		$quescookie = $_COOKIE['Ques'.($newQuestionNumber)];
        $testName = $_SESSION['TestTitle'];

		// Fetch question and its options from Database
		$result = mysqli_query($conn,"SELECT * FROM questions WHERE (sr_no = '$newQuestionNumber' AND test_title = '$testName') ORDER BY test_title ASC ");

		// Loop the questions until last question is triggered
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
			    echo "<div class=\"col-md-12\">";
			    echo  "<h3 class=\"questionText\"><span class=\"quesNumb\">Q.".$row['sr_no']."</span> ".nl2br($row['question_title'])." </h3>";
			    echo "<div class=\"radioOptionHolder\">";
			    echo "<div class=\"r\"><input type='radio' name='mcq_ques' id='opt-1' value='A' " .($quescookie == 'A' ? 'checked=checked' : ''). "><span class=\"radioOption\"> ".nl2br($row['opt_A'])." </span> <br></div>";
			    echo "<div class=\"r\"><input type='radio' name='mcq_ques' id='opt-1' value='B' " .($quescookie == 'B' ? 'checked=checked' : ''). "><span class=\"radioOption\"> ".nl2br($row['opt_B'])." </span> <br></div>";
			    echo "<div class=\"r\"><input type='radio' name='mcq_ques' id='opt-1' value='C' " .($quescookie == 'C' ? 'checked=checked' : ''). "><span class=\"radioOption\"> ".nl2br($row['opt_C'])." </span> <br></div>";
			    echo "<div class=\"r\"><input type='radio' name='mcq_ques' id='opt-1' value='C' " .($quescookie == 'D' ? 'checked=checked' : ''). "><span class=\"radioOption\"> ".nl2br($row['opt_D'])." </span> <br></div>";
				echo "</div>";
			}
		} else {
			// print submit test button, to terminate test and generate result. Link this button to JavaScript and call a callback action to store all records from cookies to Database and try to erase all cookies
//			echo "Its over";
//            echo "<button class='btn btn-deafult' id='endTest'> End Test</button>";

            ?><script>
                // $('.resultBtnHolder').toggle();
                $('#hiddenText').removeClass('hidden');
                var r ="Click on Preview button to submit test.";
                swal({
                    title: "You've reach to end of the Test!",
                    text: r,
                    icon: "info",
                    buttons: true,
                    dangerMode: true,
                })
            </script><?php

		}
	}

    function getResults($conn, $usermail){
        $results = mysqli_query($conn,"SELECT * FROM result WHERE userMail = '$usermail' ");
        $arr = mysqli_fetch_array($results);
        if (mysqli_num_rows($results) > 0) {
            while ($row = mysqli_fetch_assoc($results)) {
                echo "inside while";
                echo '<p>' .$row['userMail']. '</p>';
                echo '<p>' .$row['test_title']. '</p>';
                echo '<p>' .$row['test_date']. '</p>';
                echo '<p>' .$row['final_score']. '</p>';
                echo '<p>' .$row['attem_ques']. '</p>';
                echo '<p>' .$row['unattem_ques']. '</p>';
                echo '<p>' .$row['correct_res']. '</p>';
                echo '<p>' .$row['incorrect_res']. '</p>';
                ?>
<!--                <script>alert("This is logging inside PHP  --><?php //echo "THe row is" .$row['userMail'] ?>// "   )</script>
                <?php
            }
        }
	}

	function saveToDB($conn, $questionNumber, $selectedOption, $mail, $tableName){
		$submit_answer = mysqli_query($conn," UPDATE result SET $tableName = concat(ifnull($tableName,''), '$selectedOption;') WHERE userMail = '$mail' ");
	}

 ?>