<?php
	include '../dbconnect.php';
	include 'helpers/sessions.php';
	include 'helpers/sql_functions.php';
    include 'templates/header.php';
?>

	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
                <div class="row">
                    <h2 class="tabSubHeader text-center margin-top">USER PROFILE</h2>
                    <hr class="greenUnderLine text-center">
                </div>
                <div class="chip col-md-offset-9">
                    <img src="assets/img/medal.png" alt="Person" width="96" height="96">
                    <b><?php echo getUserSubscriptionName($conn, $id) ?></b>
                </div>
                <div class="row profile-holder margin-top margin-bottom">
                    <div class="viewmode pro viewPassToggle">
                        <img src="assets/img/doctor.png" height="150" alt="">
                        <br>

                        <h2 class="profileName margin-top"> <?php echo getUserName($conn, $id) ?> </h2>
                        <h2 class="profileMobile"> <?php echo getUserMobile($conn, $id) ?> </h2>
                        <h2 style="margin-top: -5px;" class="profileEmail "> <?php echo getUserEmail($conn, $id) ?> </h2>
                        <button class="btn btn-default editProBtn newBtn">Edit Profile</button>
                        <a href="browse_plans" class="btn btn-default editProBtn newBtn">Change Subscription</a>
                        <button class="btn btn-default changePassBtn newBtn">Change Password</button>

                    </div>
                    <div style="display: none;" class="editmode pro text-center">

                        <div class="lost hidden"></div>
                        <img src="assets/img/doctor.png" height="150" alt="">
                        <br>
                        <p><input type="text" class="profileNameInput customInput margin-top" id="userName" name="userName" value=" <?php echo getUserName($conn, $id) ?> "></p>
                        <p><input type="text" class="profileMobileInput margin-top-half customInput" id="userMob" name="userMob" value=" <?php echo getUserMobile($conn, $id) ?>"></p>
                        <h2 class="profileEmail margin-top-half"> <?php echo getUserEmail($conn, $id) ?> </h2>
                        <button class="btn btn-default updateProBtn editProBtn newBtn">Update Profile</button>

                    </div>
                    <div style="display: none;"  class="text-center viewPassToggle">
                        <p><input type="password" class="profileNameInput customInput margin-top" id="curPassword" name="curPassword" placeholder="Current Password"></p>
                        <span id="passwordStatus"></span>
                        <a href="user_home" class="btn btn-default newBtn">HOME</a>

                    </div>
                    <h3><a href="https://vishwachinmayayurved.com/contact.html">Contact Us</a></h3>
                </div>

			</div>
		</div>

    </div>


<?php include 'templates/footer.php'; ?>
<script>
    $('#profile').addClass('active');
</script>
