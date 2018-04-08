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

    function fillResultTable($conn, $mail, $testDate, $testTitle){
        $fillResults = mysqli_query($conn, "INSERT INTO result(userMail, test_title, test_date, answer_key, submitted_ans, final_score) VALUES ('$mail', '$testTitle', '$testDate', '', '', '')");
    }

    function genrateUserResult($conn, $mail, $testTitle){
	    $getRow = mysqli_query($conn, "SELECT * FROM result WHERE userMail = '$mail' AND test_title = '$testTitle'");
        $arr = mysqli_fetch_array($getRow);

        $answer_key =  $arr['answer_key'];
        $user_ans = $arr['submitted_ans'];

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

        $positiveScore = $correctRes * 1;
        $negativeScore = $incorrectRes * 0.25;
        $finalScore = ($positiveScore - $negativeScore) - 1;

//        echo '<h1 class="bigNumb">' .$finalScore. '</h1>';
        $unAttempted = $unAttempted - 1;
        $correctRes = $correctRes - 1;
        $attempted = $attempted - 1;

        $updateResult = mysqli_query($conn, "UPDATE result SET  final_score='$finalScore', attem_ques='$attempted', unattem_ques='$unAttempted', correct_res='$correctRes', incorrect_res='$incorrectRes' WHERE userMail = '$mail' AND test_title = '$testTitle'");
        return $finalScore;
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

	// Used to print next or previous OR any question upon entry of given parameters
	function printQuestion($conn, $newQuestionNumber, $testName){

		// Get stored value from cookie with questionNumber
		$quescookie = $_COOKIE['Ques'.($newQuestionNumber)];
        $testName = $_SESSION['TestTitle'];

		// Fetch question and its options from Database
		$result = mysqli_query($conn,"SELECT * FROM questions WHERE (sr_no = '$newQuestionNumber' AND test_title = '$testName') ORDER BY test_title ASC ");

		// Loop the questions until last question is triggered
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
			    echo  "<h3 class=\"questionText\"><span class=\"quesNumb\">Q.".$row['sr_no']."</span> ".$row['question_title']." </h3>";
			    echo "<div class=\"radioOptionHolder\">";
			    echo "<div class=\"r\"><input type='radio' name='mcq_ques' id='opt-1' value='A' " .($quescookie == 'A' ? 'checked=checked' : ''). "><span class=\"radioOption\"> ".$row['opt_A']." </span> <br></div>";
			    echo "<div class=\"r\"><input type='radio' name='mcq_ques' id='opt-1' value='B' " .($quescookie == 'B' ? 'checked=checked' : ''). "><span class=\"radioOption\"> ".$row['opt_B']." </span> <br></div>";
			    echo "<div class=\"r\"><input type='radio' name='mcq_ques' id='opt-1' value='C' " .($quescookie == 'C' ? 'checked=checked' : ''). "><span class=\"radioOption\"> ".$row['opt_C']." </span> <br></div>";
			    echo "<div class=\"r\"><input type='radio' name='mcq_ques' id='opt-1' value='C' " .($quescookie == 'D' ? 'checked=checked' : ''). "><span class=\"radioOption\"> ".$row['opt_D']." </span> <br></div>";
				
			}
		} else {
			// print submit test button, to terminate test and generate result. Link this button to JavaScript and call a callback action to store all records from cookies to Database and try to erase all cookies
			echo "Its over";
            echo "<button class='btn btn-deafult' id='endTest'> End Test</button>";
		}
	}


	function saveToDB($conn, $questionNumber, $selectedOption, $mail, $tableName){
		$submit_answer = mysqli_query($conn," UPDATE result SET $tableName = concat(ifnull($tableName,''), '$selectedOption;') WHERE userMail = '$mail' ");
	}

 ?>