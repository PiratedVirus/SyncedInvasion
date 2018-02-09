<?php
include '../dbconnect.php';
include 'helpers/sessions.php';
include 'helpers/sql_functions.php';
include 'templates/header.php';
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

<div class="container-fluid">
    <div class="col-md-12">
        <div class="testTimetable">
            <div class="flesxCenter">
                <div class="theEsnd">
                    <div class="row">
                        <h2 class="tabSubHeader text-center margin-top">TIMETABLE</h2>
                        <hr class="greenUnderLine text-center">

                    </div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Test No.</th>
                            <th>Test Date</th>
                            <th>Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>February 2018, 13</td>
                            <td>07:00 - 23:00</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>February 2018, 18</td>
                            <td>07:00 - 23:00</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>February 2018, 25</td>
                            <td>07:00 - 23:00</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>March 2018, 4</td>
                            <td>07:00 - 23:00</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>March 2018, 11</td>
                            <td>07:00 - 23:00</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>March 2018, 11</td>
                            <td>07:00 - 23:00</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>March 2018, 11</td>
                            <td>07:00 - 23:00</td>
                        </tr><tr>
                            <td>6</td>
                            <td>March 2018, 11</td>
                            <td>07:00 - 23:00</td>
                        </tr><tr>
                            <td>6</td>
                            <td>March 2018, 11</td>
                            <td>07:00 - 23:00</td>
                        </tr><tr>
                            <td>6</td>
                            <td>March 2018, 11</td>
                            <td>07:00 - 23:00</td>
                        </tr><tr>
                            <td>6</td>
                            <td>March 2018, 11</td>
                            <td>07:00 - 23:00</td>
                        </tr><tr>
                            <td>6</td>
                            <td>March 2018, 11</td>
                            <td>07:00 - 23:00</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>March 2018, 11</td>
                            <td>07:00 - 23:00</td>
                        </tr>






                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div style="display: none" class="testRankToggle">
            <div class="row">
                <h2 class="tabSubHeader text-center">TIMETABLE FOR TEST SERIES</h2>
                <hr class="greenUnderLine text-center">
                <h3 class="tabSubHeader testName text-center"></h3>
            </div>
            <div class="seconLoad"></div>
            <div class="rankHolder"></div>
        </div>

    </div>
</div>

<?php include 'templates/footer.php' ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script>
    $(document).ready( function () {
        $('#timetable').addClass('active');
    })
</script>
