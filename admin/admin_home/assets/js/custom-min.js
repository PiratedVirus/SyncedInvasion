$(document).ready(function(){$questionNumber=1,$quesCounter=0,$("#questionNumber").text("_"+$questionNumber),$('[data-toggle="tooltip"]').tooltip(),$(".NameDateToggleBtn").click(function(){""==$(".testNameInput").val()?$(".testValidMsg").text("Please give me a name!"):($(".NameDateToggle").slideToggle(),$("#testName").text($(".testNameInput").val()))}),$(".testNameInput").keyup(function(){$testName=$(".testNameInput").val(),$(".testValidMsg").load("helpers/admin_backend.php",{btnClicked:"chckTestName",testName:$testName}),"Already Taken! Use different name"==$(".chkMsg").text()&&$(".NameDateToggleBtn").attr("disabled","disabled")}),$("#dd").keyup(function(){$true=$.isNumeric($("#dd").val()),1!=$true?$("#dateMonthMsg").text("Enter valid Date!"):($("#dateMonthMsg").text(""),$("#dd").val()>32||$("#dd").val()<1?$("#dateMonthMsg").text("Enter valid Date!"):$("#dateMonthMsg").text(""))}),$("#mm").keyup(function(){$true=$.isNumeric($("#mm").val()),1!=$true?$("#dateMonthMsg").text("Enter valid Month!"):($("#dateMonthMsg").text(""),$(".DateTimeCnfrm").removeClass("disabled"),$("#dd").val()>1&&$("#dd").val()<12?$("#dateMonthMsg").text("Enter valid Month between 012!"):$("#dateMonthMsg").text(""))}),$(".DayTimeToggleBtn").click(function(){$(".DayTimeToggle").slideToggle()}),$("#sTime").keyup(function(){$true=$.isNumeric($("#sTime").val()),1!=$true?$("#timeErrorMsg").text("Enter valid Time!"):($("#timeErrorMsg").text(""),$(".DateTimeCnfrm").removeClass("disabled"),$("#dd").val()>=0&&$("#dd").val()<=24?$("#timeErrorMsg").text("Enter valid Time!"):$("#timeErrorMsg").text(""))}),$("#eTime").keyup(function(){$true=$.isNumeric($("#sTime").val()),1!=$true?$("#timeErrorMsg").text("Enter valid Time!"):($("#timeErrorMsg").text(""),$(".DateTimeCnfrm").removeClass("disabled"),$("#dd").val()>=0&&$("#dd").val()<=24?$("#timeErrorMsg").text("Enter valid Time!"):$("#timeErrorMsg").text(""))}),$("#pMarks").keyup(function(){$(".posMarkBold").text($("#pMarks").val())}),$("#nMarks").keyup(function(){$(".negMarkBold").text($("#nMarks").val())}),$(".TimeConfirmToggleBtn").click(function(){var e=new Date,t=e.getFullYear();$mm=$("#mm").val(),$dd=$("#dd").val(),$testDate=$dd+"-"+$mm+"-"+t,$reverseDate=t+"-"+$mm+"-"+$dd,$startT=$("#sTime").val(),$endT=$("#eTime").val(),$testName=$(".testNameInput").val(),$(".TimeConfirmToggle").slideToggle(),$("#testname").text($testName),$("#testDate").text($testDate),$("#testTime").text($startT+" to "+$endT),document.cookie="testname="+$testName+";",document.cookie="testdate="+$testDate+";",document.cookie="testtime="+$startT+" to "+$endT+";"}),$(".confirmTestDetails").click(function(){$(".loadQues").load("helpers/admin_backend.php",{btnClicked:"confirmTestDetails",testName:$testName,testDate:$reverseDate,startTime:$startT,endTime:$endT,posMark:$("#pMarks").val(),negMark:$("#nMarks").val()})}),$("#correctOptIndex").keyup(function(){switch($userInput=$("#correctOptIndex").val(),$userInput){case"A":case"a":$("#correctOptText").text($("#optA").val());break;case"B":case"b":$("#correctOptText").text($("#optB").val());break;case"C":case"c":$("#correctOptText").text($("#optC").val());break;case"D":case"d":$("#correctOptText").text($("#optD").val());break;default:$("#correctOptText").text("")}}),$(".addNextQuestion").click(function(){$questionNumber++,console.log($questionNumber),document.cookie="questionID=_"+$questionNumber+";",$quesTitle=$("#question_title").val(),$quesId=$(".qId").val(),$optA=$("#optA").val(),$optB=$("#optB").val(),$optC=$("#optC").val(),$optD=$("#optD").val(),$crtIndx=$("#correctOptIndex").val().toUpperCase(),$crtText=$("#correctOptText").text(),$descr=$("#ans_desc").val(),$(".Qstatus").load("helpers/admin_backend.php",{btnClicked:"addNextQ",quesTitle:$quesTitle,quesId:$quesId,optA:$optA,optB:$optB,optC:$optC,optD:$optD,crtIndx:$crtIndx,crtText:$crtText,descr:$descr}),$(".qId").load("helpers/admin_backend.php",{btnClicked:"qID"}),$(".input-holder").find("input:text").val(""),$("#question_title").val(""),$("#ans_desc").val(""),$("#correctOptText").text("")}),$(".adminLogOut").click(function(){document.cookie="questionID=; expires=Thu, 01 Jan 1970 00:00:00 UTC;",document.cookie="testdate=; expires=Thu, 01 Jan 1970 00:00:00 UTC;",document.cookie="testname=; expires=Thu, 01 Jan 1970 00:00:00 UTC;",document.cookie="testtime=; expires=Thu, 01 Jan 1970 00:00:00 UTC;",document.cookie="TestName=; expires=Thu, 01 Jan 1970 00:00:00 UTC;"}),$(".unviversalSearch").keyup(function(){$searchQuery=$(".unviversalSearch").val(),console.log("The search query is : "+$searchQuery),$(".search-result-holder").load("helpers/admin_backend.php",{btnClicked:"search",searchQuery:$searchQuery})}),$(".partOneTwoToggle").click(function(){$selectedTest=$("#selectTest").val(),$(".testNameTitle").text($("#selectTest").val()),$(".selectedTestName").text($selectedTest),$(".partOneTwo").slideToggle(),$(".fetchDetails").load("helpers/admin_backend.php",{btnClicked:"fetchDetails",testName:$selectedTest}),$(".testSrNo").load("helpers/admin_backend.php",{btnClicked:"testNo",testName:$selectedTest}),$(".testDateTitle").load("helpers/admin_backend.php",{btnClicked:"testDate",testName:$selectedTest}),$(".startTimeTitle").load("helpers/admin_backend.php",{btnClicked:"testSTime",testName:$selectedTest}),$(".endTimeTitle").load("helpers/admin_backend.php",{btnClicked:"testETime",testName:$selectedTest})}),$(".saveTitles").click(function(){$sDate=$("#sDate").val(),$sTime=$("#sTime").val(),$eTime=$("#eTime").val(),$(".saveMsg").load("helpers/admin_backend.php",{btnClicked:"saveTile",testName:$selectedTest,sDate:$sDate,sTime:$sTime,eTime:$eTime})}),$(".addMoreQues").click(function(){$quesCounter++,$(".addMore").append('             <div class="col-sm-12 quesCard">\n                                <div class="card card-stats">\n                                    <div class="card-header" data-background-color="blue">\n                                        <span class="primeQuesSpot">'+$quesCounter+'</span>\n                                    </div>\n                                    <div class="card-content editQues">\n                                        <div class="form-group no-margin col-md-12 edit text-right">\n                                            <textarea  id="ques-'+$quesCounter+'" class="form-control alignR col-md-12 category ques-'+$quesCounter+'" placeholder="Add Question Text" ></textarea>\n                                        </div>\n\n                                        <div class="col-md-3 col-sm-3 optionIndex margin-20">OPTION A</div>\n                                        <div class="col-md-3 col-sm-3 optionIndex margin-20">OPTION B</div>\n                                        <div class="col-md-3 col-sm-3 optionIndex margin-20">OPTION C</div>\n                                        <div class="col-md-3 col-sm-3 optionIndex margin-20">OPTION D</div>\n\n                                        <div class="form-group no-margin col-md-3 col-sm-6 edit text-right">\n                                            <textarea id="opt_A-'+$quesCounter+'" class="form-control alignR category edit opt_A-'+$quesCounter+'"  placeholder="Option A"></textarea>\n                                        </div>\n                                        <div class="form-group no-margin col-md-3 col-sm-6 edit text-right">\n                                            <textarea id="opt_B-'+$quesCounter+'" class="form-control alignR category edit opt_B-'+$quesCounter+'"  placeholder="Option B"></textarea>\n                                        </div>\n                                        <div class="form-group no-margin col-md-3 col-sm-6 edit text-right">\n                                            <textarea id="opt_C-'+$quesCounter+'" class="form-control alignR category edit opt_C-'+$quesCounter+'"  placeholder="Option C"></textarea>\n                                        </div>\n                                        <div class="form-group no-margin col-md-3 col-sm-6 edit text-right">\n                                            <textarea id="opt_D-'+$quesCounter+'" class="form-control alignR category edit opt_C-'+$quesCounter+'"  placeholder="Option D"></textarea>\n                                        </div>\n\n                                        <div class="row">\n                                            <div class="col-md-3 optionIndex margin-20">CORRECT OPTION</div>\n                                        </div>\n                                        <div class="row">\n                                            <div class="form-group no-margin col-md-3 edit text-right">\n                                                <input id="optIndex-'+$quesCounter+'"  type="text" value="" placeholder="Correct Option Index" class="form-control optIndex alignR"/>\n                                            </div>\n\n                                            <div class="col-md-9 correctNsubmitHolder">\n                                                <span class="msg" id="msgAdd-'+$quesCounter+'"> </span>\n                                                <span  id="crctOptTxt-'+$quesCounter+'" class="correctOptionText crctOptTxt-'+$quesCounter+'"><b>  </b></span>\n                                                <button id="addBtn-'+$quesCounter+'"  class="updateBtn btn btn-primary clk col-md-offset-3">ADD QUESTION</button>\n                                            </div>\n                                        </div>\n\n                                    </div>\n\n                                </div>\n                            </div>\n')}),$(".planSelector").click(function(){$idName=$(this).attr("id"),$unique=$idName.split("-"),$val=$("#"+$idName).val();var e=new Date,t=e.getDate(),a=e.getMonth()+1,n=e.getFullYear();t<10&&(t="0"+t),a<10&&(a="0"+a);var e=t+"/"+a+"/"+n;if("Premium"==$val){a++,a<10&&(a="0"+a);var o=n+"-"+a+"-"+t;$("#validDate-"+$unique[1]).text(o)}if("Enterprise"==$val){n++;var s=n+"-"+a+"-"+t;$("#validDate-"+$unique[1]).text(s)}if("Upgrade plan"==$val){var i="";$("#validDate-"+$unique[1]).text("")}}),$(".savePlan").click(function(){$idName=$(this).attr("id"),$unique=$idName.split(" "),$indexNum=$unique[0],$number_sep=$indexNum.split("-"),$number=$number_sep[1],$planNameID="selector-"+$number,$planName=$("#"+$planNameID).val(),$validDate=$("#validDate-"+$number).text(),$("#sub-"+$number).text($planName),$(".notifyPlan").load("helpers/admin_backend.php",{btnClicked:"savePlan",userMail:$unique[1],userPlan:$planName,validDate:$validDate})}),$(function(){$(".drpDwn").on("change",function(){var e=$('.drpDwn option:selected[value=""]');$(".partOneTwoToggle").attr("disabled",e.length>0)}).change()}),$(document).click(function(e){var t=e.target,a=e.target.id,n=a.match(/optIndex/g),o=a.match(/updateBtn/g),s=a.match(/addBtn/g);if(null==n);else{var i=a.split("-");$unique=i[1],console.log($unique),$("#"+a).keyup(function(){switch($userInput=$("#"+a).val(),console.log($("#"+a).val()),$userInput){case"A":case"a":console.log("pressed A"),$("#crctOptTxt-"+$unique).html($("#opt_A-"+$unique).val());break;case"B":case"b":$("#crctOptTxt-"+$unique).text($("#opt_B-"+$unique).val());break;case"C":case"c":$("#crctOptTxt-"+$unique).text($("#opt_C-"+$unique).val());break;case"D":case"d":$("#crctOptTxt-"+$unique).text($("#opt_D-"+$unique).val());break;default:$("#correctOptText").text("")}})}if("updateBtn"==o){var i=a.split("-");$unique=i[1],$testname=$("#selectTest").val(),$question=$("#ques-"+$unique).val(),$optA=$("#opt_A-"+$unique).val(),$optB=$("#opt_B-"+$unique).val(),$optC=$("#opt_C-"+$unique).val(),$optD=$("#opt_D-"+$unique).val(),$correctIndex=$("#optIndex-"+$unique).val().toUpperCase(),$correctText=$("#crctOptTxt-"+$unique).text(),console.log("correct text is "+$correctText),$("#msg-"+$unique).load("helpers/admin_backend.php",{btnClicked:"updateQuestion",testname:$testname,quesNumber:$unique,question:$question,optA:$optA,optB:$optB,optC:$optC,optD:$optD,correctIndex:$correctIndex,correctText:$correctText})}"addBtn"==s&&(console.log("clicked add"),$("#addBtn-"+$quesCounter).prop("disabled",!0),$testname=$("#selectTest").val(),$question=$("#ques-"+$quesCounter).val(),$optA=$("#opt_A-"+$quesCounter).val(),$optB=$("#opt_B-"+$quesCounter).val(),$optC=$("#opt_C-"+$quesCounter).val(),$optD=$("#opt_D-"+$quesCounter).val(),console.log("the question is "+$question),$correctIndex=$("#optIndex-"+$quesCounter).val().toUpperCase(),$correctText=$("#crctOptTxt-"+$quesCounter).text(),console.log("correct text is "+$correctText),$("#msgAdd-"+$quesCounter).load("helpers/admin_backend.php",{btnClicked:"addQuestion",testname:$testname,question:$question,optA:$optA,optB:$optB,optC:$optC,optD:$optD,correctIndex:$correctIndex,correctText:$correctText}))})});