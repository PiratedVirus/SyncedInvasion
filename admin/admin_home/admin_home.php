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
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">people</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total Users</p>
                        <h3 class="title"> <?php echo getTotalUserCount($conn); ?>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">remove_red_eye</i>
                            <a  href="user_list">View all users...</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="fa fa-inr" aria-hidden="true"></i>

                    </div>
                    <div class="card-content">
                        <p class="category">Revenue</p>
                        <h3 class="title">₹<?php echo getTotalRevenue($conn); ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">update</i> Just Updated
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                        <i class="material-icons">info_outline</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total Questions</p>
                        <h3 class="title"> <?php echo getTotalQuestions($conn); ?> </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">local_offer</i> From all tests
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="red">
                        <i class="fa fa-calendar-o"></i>
                    </div>
                    <div class="card-content">
                        <p class="category">Remaining Days</p>
                        <h3 class="title">
                            <?php getDaysDiff() ?>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">date_range</i> For 15<sup>th</sup> March 2018
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-chart" data-background-color="green">
                        <div class="ct-chart" id="dailySalesChart"></div>
                    </div>
                    <div class="card-content">
                        <h4 class="title">Present Students</h4>
                        <p class="category">
                            <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in students.</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">access_time</i> updated 4 minutes ago
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-chart" data-background-color="orange">
                        <div class="ct-chart" id="completedTasksChart"></div>
                    </div>
                    <div class="card-content">
                        <h4 class="title">Total Students</h4>
                        <p class="category">From the start</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">access_time</i>  sent 2 days ago
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">content_paste</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Tests</p>
                        <h3 class="title"> <a href="admin_test"> Create new Test</a>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">info</i>
                            <span><?php echo getTotalTests($conn);?> tests created till now</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                        <i class="material-icons">info_outline</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Questions</p>
                        <h3 class="title"> <a href="questions">View all questions</a> </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">info</i>
                            <span><?php echo getTotalQuestions($conn);?> questions set</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="orange">
                        <h4 class="title">Recent users</h4>
                        <p class="category">Latest users subscribed to Vishwachinmay</p>
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
                            <?php getRecentUsers($conn,5); ?>
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
    $('#dashboard').addClass('active');
    var arr = $('#arr').text();
    console.log("the arr  ddd is " + arr);
</script>
