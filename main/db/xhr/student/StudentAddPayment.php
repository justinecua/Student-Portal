<?php
include('connect2db.php');
date_default_timezone_set('Asia/Manila');

if (
    isset($_POST['PCPaymentMethod'], $_POST["PCSendersName"], $_POST["PCReceiversName"], $_POST["PCPaymentAmount"], $_POST["PCPaymentDate"],
    $_FILES["PCPScreenshot"], $_POST["PCRefNum"], $_POST['CheckStudentID'])
) {
    $PCPaymentMethod = $_POST['PCPaymentMethod'];
    $PCSendersName = $_POST["PCSendersName"];
    $PCReceiversName = $_POST["PCReceiversName"];
    $PCPaymentAmount = $_POST["PCPaymentAmount"];
    $PCPaymentDate = $_POST["PCPaymentDate"];
    $PCRefNum = $_POST["PCRefNum"];
    $CheckStudentID = $_POST['CheckStudentID'];
    $PaymentStat = "Pending";
    $EnrollmentStat = "In Progress";

    $PCPScreenshot = $_FILES["PCPScreenshot"];
    $PCPScreenshotName = uniqid() . "_PaymentImage.jpg";
    $uploadDir = "UserPayments/";
    $PCPScreenshotNamePath = $uploadDir . $PCPScreenshotName;

    move_uploaded_file($PCPScreenshot['tmp_name'], $PCPScreenshotNamePath);

    $sqlInsertPayment = "INSERT INTO payments VALUES('', '$PCSendersName','$PCReceiversName','$PCPaymentMethod', NOW(), '$PCPaymentAmount', 
    '$PCRefNum', '$PCPScreenshotNamePath', '$PaymentStat', '$CheckStudentID')";

    if (mysqli_query($connect2db, $sqlInsertPayment)) {
        echo "Payment Transaction Added";
    }

    $updateEnrollStat = "UPDATE student SET Enrollment_Status='$EnrollmentStat' WHERE Student_ID='$CheckStudentID'";
    mysqli_query($connect2db, $updateEnrollStat);
}


?>