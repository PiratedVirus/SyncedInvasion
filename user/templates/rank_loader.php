<?php
    include '../../dbconnect.php';
    include '../helpers/sessions.php';
    include '../helpers/sql_functions.php';
//    include 'templates/header.php';
?>

            <table class="table table-striped">
                <thead class="darkBGc">
                <tr>
                    <th>Rank</th>
                    <th>Name</th>
                    <th>Score</th>
                </tr>
                </thead>
                <tbody>
                    <?php printRanks($conn,$_COOKIE['selectedRankTest'],$id) ?>
                </tbody>
            </table>

<?php include 'templates/footer.php' ?>

