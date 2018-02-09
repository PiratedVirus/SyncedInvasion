<?php
include '../../dbconnect.php';
include 'helpers/sessions.php';
include 'helpers/sql_functions.php';
include 'helpers/admin_sql_functions.php';
include 'templates/header.php';
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

<div class="content">


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">trending_up</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Premium</p>
                        <h3 class="title"> <?php echo getPremiumCount($conn); ?>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">info</i> Total Premium users: <?php echo getTotalPremiumCount($conn)?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">trending_up</i>

                    </div>
                    <div class="card-content">
                        <p class="category">Enterprise</p>
                        <h3 class="title"><?php echo getEnterpriseCount($conn) ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">info</i> Total Enterprise users: <?php echo getTotalEnterpriseCount($conn)?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="red">
                        <i class="material-icons">trending_down</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Unpaid Premium</p>
                        <h3 class="title"> <?php echo getUnpaidPremiumCount($conn); ?> </h3>
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
                    <div class="card-header" data-background-color="red">
                        <i class="material-icons">trending_down</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Unpaid Enterprise</p>
                        <h3 class="title">
                            <?php echo getUnpaidEnterpriseCount($conn); ?>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">update</i> Just Updated
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="notifyPlan"></div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="blue">
                        <h4 class="title">Manage Subscriptions</h4>
                        <p class="category">Change user subscriptions. Be careful!</p>
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table table-hover">
                            <thead class="text-info">
                            <th class="text-center"><b>ID</b></th>
                            <th class="text-center"><b>USER NAME</b></th>
                            <th class="text-center"><b>MOBILE NUMBER</b></th>
                            <th class="text-center"><b>MAIL ADDRESS</b></th>
                            <th class="text-center"><b>AMOUNT PAID</b></th>
                            <th class="text-center"><b>SUBSCRIPTION</b></th>
                            <th class="text-center"><b>STATUS</b></th>
                            <th class="text-center"><b>VALIDITY</b></th>
                            <th class="text-center"><b>SAVE</b></th>
                            </thead>
                            <tbody>
                                <?php getPlans($conn,5000); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'templates/footer.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

<script>
    $('#editPlans').addClass('active');
    $('[data-toggle="tooltip"]').tooltip();
    $('.selectpicker').selectpicker({
        style: 'btn-info',
        size: 4
    });
</script>
