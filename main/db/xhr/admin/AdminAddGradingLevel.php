<?php

include('../../connect/connect2db.php');

if (isset($_POST['GLGradingLevel'], $_POST['GLCurrSchoolYearID'])) {
    $GLGradingLevel = $_POST['GLGradingLevel'];
    $GLCurrSchoolYearID = $_POST['GLCurrSchoolYearID'];

    $insertQuery = "INSERT INTO gradelevel VALUES ('', '$GLGradingLevel', '$GLCurrSchoolYearID')";

    if ($sql = mysqli_query($connect2db, $insertQuery)) {
        echo "Grading Level Added";
    } else {
        echo "Error: " . mysqli_error($connect2db);
    }
}


?>