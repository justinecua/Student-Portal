<?php
include('connect2db.php');

if (isset($_POST['DBStudID'])) {
    $DBStudID = $_POST['DBStudID'];
    $payment_method = "In Person";
    $EnrollmentStat = "Enrolled";
    $Aquery = mysqli_query($connect2db, "UPDATE student SET Enrollment_Status='$EnrollmentStat' WHERE Student_ID = '$DBStudID'");

    $insertNotif = mysqli_query($connect2db, "INSERT into payments VALUES('', null, null, '$payment_method', NOW(), null, null, null, null, '$DBStudID')");
    
    $currentTime = date('Y-m-d H:i:s');
    $NotifTitle = "Enrollment Successful";
    $NotifStat = "Unread";
    $NotifContent = "Welcome to Christian Horizon School! You can now use your new School ID that has been sent to you via email";
    $insertNotif = mysqli_query($connect2db, "INSERT into notifications VALUES('', '$NotifTitle', '$NotifContent', '$currentTime', '$NotifStat', '$DBStudID', null)");
}
?>
