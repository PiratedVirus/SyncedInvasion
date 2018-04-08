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
                <div class="card">
                    <div class="card-header" data-background-color="red">
                        <h4 class="title"><?php echo $_COOKIE['testname'] ?></h4>
                        <p class="category">List of all questions with correct choice, with corresponding Tests</p>
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table table-hover">
                            <thead class="text-danger">
                            <th>Q_ID</th>
                            <th>Question</th>
                            <th>Correct Response</th>
                            <th>Test Title</th>
                            </thead>
                            <tbody>
                            <?php getTestQuestions($conn, $_COOKIE['testname']); ?>
                            </tbody>
                        </table>
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
