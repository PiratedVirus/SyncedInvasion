<?php
    include '../dbconnect.php';
    include 'helpers/sessions.php';
    include 'helpers/sql_functions.php';
    include 'templates/header.php';
    getLatestTestName($conn);
?>
<style>
    .graphs{
        /*width: 800px;*/
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
<script src="assets/js/graphs.js"></script>
<script>
    $(document).ready( function () {
        if(screen.width < 480) {
            // do any 480 width stuff here, or simply do nothing
            return;
        } else {
            $('.footer').remove();
            $('#fullpage').fullpage({
                anchors:['dashboardNav', 'testNav', 'resultNav'],
                css3: true,
                scrollingSpeed: 700,
                autoScrolling: true,
                fitToSection: true,
                fitToSectionDelay: 1000,
                scrollBar: false,
                easing: 'easeInOutCubic',
                easingcss3: 'ease',
                loopBottom: false,
                loopTop: false,
                loopHorizontal: true,
                continuousVertical: false,
                continuousHorizontal: false,
                scrollHorizontally: false,
                interlockedSlides: false,
                dragAndMove: false,
                offsetSections: false,
                resetSliders: false,
                fadingEffect: false,
                normalScrollElements: '#element1, .element2',
                scrollOverflow: true,
                scrollOverflowReset: true,
                scrollOverflowOptions: null,
                touchSensitivity: 5,
                normalScrollElementTouchThreshold: 5,
                bigSectionsDestination: null,
            });
        }
    })
</script>
<script>
    $(document).ready( function () {
        $('.footer').remove();
        $('#result').addClass('active');
    })
</script>

<?php include 'templates/footer.php' ?>

