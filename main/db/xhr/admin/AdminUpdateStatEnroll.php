<?php
include('../../connect/connect2db.php');

if (isset($_POST['StudentID'])) {
    $StudentID = $_POST['StudentID'];
    $NotifTitle = "Pending Enrollment";
    $NotifContent = "Your Enrollment is Pending. Please pay a minimum of ₱1000 to be officially enrolled";
    $NotifStat = "Unread";

    $currentTime = date('Y-m-d H:i:s');

    $update = mysqli_query($connect2db, "UPDATE student SET Enrollment_Status ='Pending' WHERE Student_ID='$StudentID'");
    $insertNotif = mysqli_query($connect2db, "INSERT into notifications VALUES('', '$NotifTitle', '$NotifContent', '$currentTime', '$NotifStat',
    '$StudentID', null)");

    echo "Updated Successfully";
}


?>