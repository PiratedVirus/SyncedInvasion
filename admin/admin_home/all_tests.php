<?php
include '../../dbconnect.php';
include 'helpers/sessions.php';
include 'helpers/sql_functions.php';
include 'helpers/admin_sql_functions.php';
include 'templates/header.php';
?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12  NameDateToggle">
                        <div class="partOneTwo">
                            <div class="flexCenter">
                                <div class="theEnd">
                                    <h1>Select a test to edit!</h1>
                                    <select class="form-control selectpicker drpDwn" id="selectTest" style="color: #FFFFFF;" title="Choose one of the following..."">
                                    <?php getTestNames($conn) ?>
                                    </select>
                                    <div class="col-md-offset-4 margin-top-half">
                                        <button class="btn btn-primary partOneTwoToggle col-md-offset-3"><i class="fa fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div  style="display: none;" class="partOneTwo">
                            <div class="text-center"><h2 class="testNameTitle zero-top margin-bottom-half"></h2></div>
                            <div class="testDetails">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="card card-stats">
                                            <div class="card-header" data-background-color="orange">
                                                <i class="material-icons">format_list_numbered</i>
                                            </div>
                                            <div class="card-content">
                                                <p class="category">Test Duration</p>
<!--                                                        <h3 class="title testSrNo"> </h3>-->
                                                <div class="form-group no-margin testSrNo col-md-12 edit text-right"></div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="stats">
                                                    <span class="saveTitles"> <i class="material-icons">edit</i> &nbsp;Click to Save changes. </span> <span class="saveMsg"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="card card-stats">
                                            <div class="card-header" data-background-color="blue">
                                                <i class="fa fa-calendar-o"></i>
                                            </div>
                                            <div class="card-content">
                                                <p class="category">Test Date</p>
                                                <div class="form-group no-margin testDateTitle col-md-12 edit text-right"></div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="stats">
                                                    <span class="saveTitles"> <i class="material-icons">edit</i> &nbsp;Click to Save changes. </span> <span class="saveMsg"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="card card-stats">
                                            <div class="card-header" data-background-color="green">
                                                <i class="material-icons">access_time</i>
                                            </div>
                                            <div class="card-content">
                                                <p class="category">Start Time</p>
                                                <div class="form-group no-margin startTimeTitle col-md-12 edit text-right"></div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="stats">
                                                    <span class="saveTitles"> <i class="material-icons">edit</i> &nbsp;Click to Save changes. </span> <span class="saveMsg"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="card card-stats">
                                            <div class="card-header" data-background-color="red">
                                                <i class="material-icons">access_time</i>
                                            </div>
                                            <div class="card-content">
                                                <p class="category">End Time</p>
                                                <div class="form-group no-margin endTimeTitle col-md-12 edit text-right"></div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="stats">
                                                    <span class="saveTitles"> <i class="material-icons">edit</i> &nbsp;Click to Save changes. </span> <span class="saveMsg"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="fetchDetails"></div>
                            <div class="addMore"></div>
                            <div class="addMoreBtn col-md-12 text-center">

                                <button class="btn btn-primary btn-fab btn-fab-large btn-round addMoreQues" data-toggle="tooltip" data-placement="right" title="Add Questions">
                                    <i class="material-icons">add_circle</i>
                                </button>
                            </div>
                                </div>
                            </div>

                        </div>
            </div>
        </div>
    </div>
</div>


<?php include 'templates/footer.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

<script>
    $('#alltests').addClass('active');
    $('.selectpicker').selectpicker({
        style: 'btn-primary',
        size: 6
    });
</script>
