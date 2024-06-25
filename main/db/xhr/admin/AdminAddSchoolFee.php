<?php

include('../../connect/connect2db.php');

if (isset($_POST['SFName'], $_POST['SFPrice'], $_POST['SFType'])) {
    $SFName = $_POST['SFName'];
    $SFPrice = $_POST['SFPrice'];
    $SFType = $_POST['SFType'];

    $insertSF = "INSERT INTO schoolfees VALUES ('', '$SFName', '$SFPrice','$SFType')";

    if ($sql2 = mysqli_query($connect2db, $insertSF)) {
        echo "School Fee Added";
    } else {
        echo "Error: " . mysqli_error($connect2db);
    }
}


?>