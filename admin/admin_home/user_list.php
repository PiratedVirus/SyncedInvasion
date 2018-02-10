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
                    <div class="card-header" data-background-color="orange">
                        <h4 class="title">Recent users</h4>
                        <p class="category">All users registered to Vishwachinmay</p>
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table table-hover">
                            <thead class="text-warning">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Plan</th>
                            <th>Expiry Date</th>
                            <th>College & City</th>

                            </thead>
                            <tbody>
                                <?php getRecentUsers($conn,5000); ?>
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
    $('#userList').addClass('active');
</script>
