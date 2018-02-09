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
                            <h1 class="text-success">Test Saved successfully!</h1>
                            <div class="col-md-6 text-center">
                                <a href="admin_home" class="btn btn-primary">Go back to Dashboard</a>
                            </div>
                            <div class="col-md-6 text-center">
                                <a href="all_tests" class="btn btn-primary">View Test</a>
                            </div>
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
</script>