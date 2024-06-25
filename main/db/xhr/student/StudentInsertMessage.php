<?php
include('connect2db.php');

if (
    isset($_POST['Message'], $_POST["StudentID"], $_POST["GCID"])
) {
    $Message = $_POST['Message'];
    $StudentID = $_POST["StudentID"];
    $GCID = $_POST["GCID"];

    $sqlInsertPayment = "INSERT INTO messages VALUES('', '$Message', NOW(), '$StudentID', '$GCID')";

    if (mysqli_query($connect2db, $sqlInsertPayment)) {
        echo "Sent";
    }
}


?>