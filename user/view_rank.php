<?php
include '../dbconnect.php';
include 'helpers/sessions.php';
include 'helpers/sql_functions.php';
include 'templates/header.php';
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

<div class="container-fluid">
    <div class="col-md-12">
        <div class="testRankToggle">
            <div class="flexCenter">
                <div class="theEnd">
                    <h1>Select a test!</h1>
                    <select class="form-control selectpicker drpDwn" id="selectTest"  title="Choose any one from the following..."">
                    <?php
                    $mail = getUserEmail($conn, $id);
                    getUserTests($conn, $mail) ?>
                    </select>
                    <div class="col-md-offset-4 margin-top-half">
                        <button class="btn btn-primary testRankToggleBtn col-md-offset-3 newBtn"><i class="fa fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div style="display: none" class="testRankToggle">
            <div class="row">
                <h2 class="tabSubHeader text-center">RANK/ MERIT LIST</h2>
                <hr class="greenUnderLine text-center">
                <h3 class="tabSubHeader testName text-center"></h3>
            </div>
            <div class="seconLoad"></div>
            <div class="rankHolder"></div>
        </div>

    </div>
</div>

<?php include 'templates/footer.php' ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script>
    $('.selectpicker').selectpicker({
        style: '',
        size: 4
    });
    $('#result').addClass('active');

</script>
