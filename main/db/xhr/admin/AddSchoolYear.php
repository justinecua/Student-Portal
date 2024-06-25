<?php

include('../../connect/connect2db.php');

if (isset($_POST['SchoolYear'])) {
    $SchoolYear = $_POST['SchoolYear'];
    $SchoolYearStat = "";

    $insertSF = "INSERT INTO schoolyear VALUES ('', '$SchoolYear','$SchoolYearStat')";

    if ($sql2 = mysqli_query($connect2db, $insertSF)) {
        echo "School Year Added";
    } else {
        echo "Error: " . mysqli_error($connect2db);
    }
}


?>