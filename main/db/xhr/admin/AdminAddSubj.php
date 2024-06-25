<?php

include('../../connect/connect2db.php');

if (isset($_POST['SubjectCode'], $_POST['SubjectName'], $_POST['SubjectDescription'], $_POST['SubjectGradeLevel'], $_POST['CurrSchoolYear'])) {
    $SubjectCode = $_POST['SubjectCode'];
    $SubjectName = $_POST['SubjectName'];
    $SubjectDescription = $_POST['SubjectDescription'];
    $SubjectGradeLevel = $_POST['SubjectGradeLevel'];
    $CurrSchoolYear = $_POST['CurrSchoolYear'];

    $insertQuery = "INSERT INTO subjects VALUES ('', '$SubjectCode', '$SubjectName', '$SubjectDescription', '$SubjectGradeLevel', '$CurrSchoolYear', NULL)";

    if ($sql = mysqli_query($connect2db, $insertQuery)) {
        echo "Subject Added";
    } else {
        echo "Error: " . mysqli_error($connect2db);
    }
}


?>