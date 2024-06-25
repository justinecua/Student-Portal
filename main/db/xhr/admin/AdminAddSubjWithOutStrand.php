<?php

include('../../connect/connect2db.php');

if (
    isset($_POST['SubjectCode'], $_POST['SubjectName'], $_POST['SubjectDescription'], $_POST['StartTime'], $_POST['EndTime'],
    $_POST['SubjSection'], $_POST['SubjGradeLevel'], $_POST['SubjStrand'], $_POST['SubjectTeacher'],
    $_POST['CurrSchoolYear'])
) {

    $SubjectCode = $_POST['SubjectCode'];
    $SubjectName = $_POST['SubjectName'];
    $SubjectDescription = $_POST['SubjectDescription'];
    $StartTime = $_POST['StartTime'];
    $EndTime = $_POST['EndTime'];
    $SubjSection = $_POST['SubjSection'];
    $SubjGradeLevel = $_POST['SubjGradeLevel'];
    $SubjStrand = $_POST['SubjStrand'];
    $SubjectTeacher = $_POST['SubjectTeacher'];
    $CurrSchoolYear = $_POST['CurrSchoolYear'];

    $insertQuery = "INSERT INTO subjects VALUES ('', '$SubjectCode', '$SubjectName', '$SubjectDescription', '$StartTime', '$EndTime', '$SubjSection', 
    '$SubjGradeLevel', NULL, '$SubjectTeacher', '$CurrSchoolYear')";

    if ($sql = mysqli_query($connect2db, $insertQuery)) {
        echo "Subject Added";
    } else {
        echo "Error: " . mysqli_error($connect2db);
    }
}


?>