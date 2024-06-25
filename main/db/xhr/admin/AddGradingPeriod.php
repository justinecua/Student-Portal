<?php

include('../../connect/connect2db.php');

if (isset($_POST['GradingPeriod'])) {
    $GradingPeriod = $_POST['GradingPeriod'];

    $insertGP = "INSERT INTO gradingperiod VALUES ('', '$GradingPeriod')";

    if ($sql2 = mysqli_query($connect2db, $insertGP)) {
        echo "Grading Period Added";
    } else {
        echo "Error: " . mysqli_error($connect2db);
    }
}


?>