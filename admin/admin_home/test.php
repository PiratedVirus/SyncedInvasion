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
            <div class="col-lg-12 col-md-12">
              <button class="btn btn-info createUser">Add new User</button><div class="response"></div>
              <button class="btn btn-info createTest">Add new Test</button><div class="TestResponse"></div>
            </div>
        </div>
    </div>
</div>

<?php include 'templates/footer.php'; ?>
<script>
    $('#debug').addClass('active');
</script>
