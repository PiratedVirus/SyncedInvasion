<?php
include '../../dbconnect.php';
include 'helpers/sessions.php';
include 'helpers/sql_functions.php';
include 'helpers/admin_sql_functions.php';
include 'templates/header.php';
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 NameDateToggle">
                    <div class="flexCenter">
                        <div class="theEnd">
                            <h1 class="title">Give your Test a name!</h1>
                            <div class="form-group label-floating ">
                                <label class="control-label">Test Name</label>
                                <h1><input type="text" class="form-control testNameInput"></h1>
                                <p class="text-danger testValidMsg"></p>
                            </div>
                            <div class="col-md-offset-4">
                                <button class="btn btn-primary NameDateToggleBtn col-md-offset-3"><i class="fa fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
            </div>
            <div style="display: none;" class="col-md-6 col-md-offset-3 NameDateToggle mobilePadding TimeConfirmToggle">
                <div class="flexCenter">
                    <div class="theEnd">
                        <h1 class="title">Cool! Let's select a Date & Time for '<b><span id="testName"></span>'</b>.</h1>

                        <div class="DayTimeToggle">
                            <div class="row col-md-offset-3">
                                <div class="form-group label-floating col-md-3">
                                    <label class="control-label">DD</label>
                                    <h1><input type="int" id="dd" class="form-control"> </h1>
                                </div>
                                <div class="col-md-1">
                                    <h4 class="seprater">-</h4>
                                </div>

                                <div class="form-group label-floating col-md-3">
                                    <label class="control-label">MM</label>
                                    <h1><input type="text" id="mm" class="form-control"></h1>
                                </div>

                            </div>
                            <div class="row col-md-offset-3">
                                <p class="text-danger" id="dateMonthMsg"></p>
                            </div>
                            <div class="row">
                                <div class="col-md-offset-4">
                                    <button type="submit" class="btn btn-primary col-md-offset-3 NameDateToggleBtn"><i class="fa fa-arrow-left"></i></button>
                                    <button class="btn btn-primary disabled DateTimeCnfrm DayTimeToggleBtn col-md-offset-3"><i class="fa fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>

                        <div style="display: none;" class="DayTimeToggle TimeConfirmToggle">
                            <div class="row col-md-offset-3 ">
                                <div class="form-group label-floating col-md-3">
                                    <label class="control-label">Start Time</label>
                                    <h1><input type="text" id="sTime" class="form-control" value="07:00"> </h1>
                                </div>
                                <div class="col-md-1">
                                    <h4 class="seprater">-</h4>
                                </div>

                                <div class="form-group label-floating col-md-3">
                                    <label class="control-label">End Time</label>
                                    <h1><input type="text" id="eTime" class="form-control" value="23:00"></h1>
                                </div>
                            </div>
                            <div class="row col-md-offset-3">
                                <p class="text-danger" id="timeErrorMsg"></p>
                            </div>
                            <div class="row">
                                <div class="col-md-offset-4">
                                    <button class="btn btn-primary col-md-offset-3 DayTimeToggleBtn"><i class="fa fa-arrow-left"></i></button>
                                    <button class="btn btn-primary col-md-offset-3 TimeConfirmToggleBtn"><i class="fa fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div style="display: none;" class="col-md-12 text-center mobilePadding TimeConfirmToggle">
                <div class="flexCenter">
                    <div class="theEnd">
                        <h1 class="title">Whoa! All set! Here's a review</h1><br>
                        <h2 class="title"> <b><span id="testname"></span></b> will be conducted on <b><span id="testDate"></span></b> from <b><span id="testTime"></span></b>. <br> with marking scheme as  <b>+</b><b class="posMarkBold">2</b> and <b>-</b><b class="negMarkBold">1.</b> </h2>
                        <div class="row col-md-offset-3 ">
                            <div class="form-group label-floating col-md-3">
                                <label class="control-label">Positive Marks per question</label>
                                <h1><input type="text" id="pMarks" class="form-control" value="2"> </h1>
                            </div>
                            <div class="col-md-1">
                                <h4 class="seprater"></h4>
                            </div>

                            <div class="form-group label-floating col-md-3">
                                <label class="control-label">Negative Marks per question</label>
                                <h1><input type="text" id="nMarks" class="form-control" value="1"></h1>
                            </div>
                        </div>
                        <div class="row">
                            <p class="loadQues"></p>
                            <button class="btn btn-primary col-md-offset-3 TimeConfirmToggleBtn"><i class="fa fa-arrow-left"></i></button>
                            <a href="add_questions" class="btn btn-primary col-md-offset-3 confirmTestDetails"><i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<?php include 'templates/footer.php'; ?>
<script>
    $('#test').addClass('active');

    $(document).ready( function () {
        if(screen.width < 960){
            $('.footer').remove();
            $('.mobilePadding').css('padding-top','350px');
        }
    })

</script>
