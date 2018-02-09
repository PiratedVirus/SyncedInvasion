<?php
    include '../dbconnect.php';
    include 'helpers/sessions.php';
    include 'helpers/sql_functions.php';
    include 'templates/header.php';
    getLatestTestName($conn);
?>
<style>
    .graphs{
        width: 800px;
        margin-left: 50%;
        position: relative;
        right: 400px;
    }
</style>


<div class="container">
    <div class="col-md-12 text-center">
        <?php
            include "templates/result_graphs.php";
        ?>
    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.6.6/jquery.fullPage.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script>
    $(document).ready( function () {
        $('.footer').remove();

        $('#fullpage').fullpage();
        $('#result').addClass('active');
    })
</script>

<?php include 'templates/footer.php' ?>

