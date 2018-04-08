<?php

header('Content-Type: application/json');

    include '../../dbconnect.php';
    include '../helpers/sessions.php';
    include '../helpers/sql_functions.php';

    $mail = getUserEmail($conn, $id);

    $result = mysqli_query($conn,"SELECT * FROM result WHERE userMail = '$mail' ");



//loop through the returned data
    $data = array();
    foreach ($result as $row) {
        $data[] = $row;
    }


    //now print the data
    print json_encode($data);

?>