<?php
include('../../connect/connect2db.php');

if (isset($_POST['SubjectIDDel'])) {
    $SubjectIDDel = $_POST['SubjectIDDel'];

    $del = "DELETE FROM subjects WHERE Subject_ID = '$SubjectIDDel'";

    if ($run = mysqli_query($connect2db, $del)) {
        echo "Subject Deleted Successfully";
    } else {
        echo "Cant Delete Subject, Error";
    }

}


?>