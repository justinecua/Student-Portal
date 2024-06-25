<?php

include('../../connect/connect2db.php');

if (isset($_POST['StrStrand'], $_POST['StrDesc'], $_POST['StrCurrSchoolYearID'])) {

    $StrStrand = $_POST['StrStrand'];
    $StrDesc = $_POST['StrDesc'];
    $StrCurrSchoolYearID = $_POST['StrCurrSchoolYearID'];

    $insertQuery = "INSERT INTO strand VALUES ('', '$StrStrand', '$StrDesc', '$StrCurrSchoolYearID ')";

    if ($sql = mysqli_query($connect2db, $insertQuery)) {
        echo "Strand Added";
    } else {
        echo "Error: " . mysqli_error($connect2db);
    }
}


?>