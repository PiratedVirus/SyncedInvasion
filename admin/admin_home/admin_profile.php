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
                    
                    <div class="col-md-4 col-md-offset-4 text-center">
                        <div class="card card-profile">
                            <div class="card-avatar">
                                <a href="#pablo">
                                    <img class="img" src="assets/img/doctor.png" />
                                </a>
                            </div>
                            <div class="content">
                                <h6 class="category text-gray">ADMIN</h6>
                                <h4 class="card-title"><?php echo getAdminName($conn,$adminMail) ?></h4>
                                <p class="card-content">
                                    Dr. Paresh Deshmukh is a Ayurveda in Samarthnagar, Aurangabad and has an experience of 9 years in this field. Dr. Paresh Deshmukh practices at Shree Vishwachinmay Ayurved and Panchkarma Clinic in Samarthnagar, Aurangabad. He completed BAMS from Shree Ayurvedic College, Nagpur in 2006 and MD - Ayurveda from Government Medical College and Hospital, Nagpur in 2009.

                                    He is a member of Ayurveda Medical Association of India (AMAI). Some of the services provided by the doctor are: Peptic / Gastric Ulcer Treatment,Spondylosis,Arthritis Management,Skin Diseases and Migrane Problem etc.                                 </p>
                                <a href="../admin_auth/logout.php?logout" class="btn btn-primary btn-round adminLogOut">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include 'templates/footer.php'; ?>
<script>
    $('#profile').addClass('active');
</script>
