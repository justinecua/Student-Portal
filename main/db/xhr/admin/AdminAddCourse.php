<?php

include('../../connect/connect2db.php');

if (isset($_POST['CrsCourse'], $_POST['CrsDesc'], $_POST['CrsDuration'])) {

    $CrsCourse = $_POST['CrsCourse'];
    $CrsDesc = $_POST['CrsDesc'];
    $CrsDuration = $_POST['CrsDuration'];

    $insertQuery = "INSERT INTO tesdacourse VALUES ('', '$CrsCourse', '$CrsDesc', '$CrsDuration')";

    if ($sql = mysqli_query($connect2db, $insertQuery)) {
        echo "Course Added";
    } else {
        echo "Error: " . mysqli_error($connect2db);
    }
}


?>