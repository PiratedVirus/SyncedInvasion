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
            <div class="col-md-12">
                <div class="selectTest">
                    <div class="flexCenter">
                        <div class="theEnd">
                            <h1>Select a test to view details!</h1>
                            <select class="form-control selectpicker drpDwn" id="selectTestName" style="color: #FFFFFF;" title="Choose one of the following..."">
                            <?php getTestNames($conn) ?>
                            </select>
                            <div class="col-md-offset-4 margin-top-half">
                                <button class="btn btn-primary selectTestToggle col-md-offset-3"><i class="fa fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                        <button class="btn btn-info matchAns">Match Answers</button>
                        <button class="btn btn-info genAutoRes">Generate Auto Results </button>
                        <p class="genResultStatus"></p>
                        <div style="display: none" class="selectTest resultHolder">
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
    $('#viewtest').addClass('active');
    $('.selectpicker').selectpicker({
        style: 'btn-primary',
        size: 6
    });
</script>
