<?php
include('connect2db.php');
session_start();
$dbStudid = $_SESSION["dbStudid"];

$runsql = mysqli_query($connect2db, "SELECT student.*, notifications.*
FROM notifications
LEFT JOIN student ON notifications.Student_ID = student.Student_ID
WHERE notifications.Student_ID='$dbStudid' AND NotifStat ='Unread'
ORDER BY notifications.NotifDateTime DESC");

if ($runsql) {
    $notifCount = mysqli_num_rows($runsql);
    echo $notifCount;
} else {

    echo "Error executing query: " . mysqli_error($connect2db);
}


?>