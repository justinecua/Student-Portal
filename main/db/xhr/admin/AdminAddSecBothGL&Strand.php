<?php

include('../../connect/connect2db.php');

if (isset($_POST['SecSection'], $_POST['SecGradeLevel'], $_POST['SecStrand'], $_POST['SecAdviser'], $_POST['SecCurrSchoolYearID'])) {
    $SecSection = $_POST['SecSection'];
    $SecGradeLevel = $_POST['SecGradeLevel'];
    $SecStrand = $_POST['SecStrand'];
    $SecAdviser = $_POST['SecAdviser'];
    $SecCurrSchoolYearID = $_POST['SecCurrSchoolYearID'];

    $insertQuery = "INSERT INTO section VALUES ('', '$SecSection', '$SecGradeLevel', '$SecStrand', '$SecAdviser','$SecCurrSchoolYearID')";

    if ($sql = mysqli_query($connect2db, $insertQuery)) {
        $lastSectionID = mysqli_insert_id($connect2db);

        $insertGroupChat = "INSERT INTO groupchats VALUES ('', null, '$lastSectionID')";
        $sql2 = mysqli_query($connect2db, $insertGroupChat);
        echo "Section Added";
    } else {
        echo "Error: " . mysqli_error($connect2db);
    }
}


?>