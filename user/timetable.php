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
                            <th>Test Name</th>
                            <th>Test Date</th>
                            <th>Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Ayurved Itihas and Padartha Vijnana</td>
                            <td>February 2018, 17</td>
                            <td>07:00 - 23:00</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Sharir Rachana</td>
                            <td>February 2018, 25</td>
                            <td>07:00 - 23:00</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Sharir Kriya</td>
                            <td>March 2018, 4</td>
                            <td>07:00 - 23:00</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Ras & Bhaishajya</td>
                            <td>March 2018, 11</td>
                            <td>07:00 - 23:00</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Drawaya Guna</td>
                            <td>March 2018, 18</td>
                            <td>07:00 - 23:00</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Aagad & Swastha</td>
                            <td>March 2018, 25</td>
                            <td>07:00 - 23:00</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Shakalyatantra</td>
                            <td>April 2018, 01</td>
                            <td>07:00 - 23:00</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Shalyatantra</td>
                            <td>April 2018, 08</td>
                            <td>07:00 - 23:00</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Stri Prastuti</td>
                            <td>April 2018, 15</td>
                            <td>07:00 - 23:00</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Balrog</td>
                            <td>April 2018, 22</td>
                            <td>07:00 - 23:00</td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Nidan-Chikitsa</td>
                            <td>April 2018, 29</td>
                            <td>07:00 - 23:00</td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>चरक पूर्वार्ध </td>
                            <td>May 2018, 06</td>
                            <td>07:00 - 23:00</td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td>चरक उत्तरार्ध </td>
                            <td>May 2018, 13</td>
                            <td>07:00 - 23:00</td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td>Sushrut Sahita वैशिट्य </td>
                            <td>May 2018, 20</td>
                            <td>07:00 - 23:00</td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td>Ashtang Hridhay वैशिट्य</td>
                            <td>May 2018, 27</td>
                            <td>07:00 - 23:00</td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td>Set 1</td>
                            <td>June 2018, 03</td>
                            <td>07:00 - 23:00</td>
                        </tr>
                        <tr>
                            <td>17</td>
                            <td>Set 2</td>
                            <td>June 2018, 10</td>
                            <td>07:00 - 23:00</td>
                        </tr>
                        <tr>
                            <td>18</td>
                            <td>Set 3</td>
                            <td>June 2018, 17</td>
                            <td>07:00 - 23:00</td>
                        </tr>
                        <tr>
                            <td>19</td>
                            <td>Set 4</td>
                            <td>June 2018, 24</td>
                            <td>07:00 - 23:00</td>
                        </tr>
                        <tr>
                            <td>20</td>
                            <td>Set 5</td>
                            <td>July 2018, 01</td>
                            <td>07:00 - 23:00</td>
                        </tr>
                        <tr>
                            <td>21</td>
                            <td>Set 6</td>
                            <td>July 2018, 08</td>
                            <td>07:00 - 23:00</td>
                        </tr>
                        <tr>
                            <td>22</td>
                            <td>Set 7</td>
                            <td>July 2018, 15</td>
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
