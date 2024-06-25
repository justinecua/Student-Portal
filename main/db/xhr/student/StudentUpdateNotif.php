<?php
include('connect2db.php');

$NotifIDs = explode(',', $_POST['NotifIDs']);
$timestamps = explode(',', $_POST['timestamps']);
$NotifStat = "Read"; 

for ($i = 0; $i < count($NotifIDs); $i++) {
    $timestamp = $timestamps[$i];
    $formattedDate = date("Y-m-d H:i:s", $timestamp);

    $insertStudSec = "UPDATE notifications SET NotifStat='$NotifStat', NotifDateTime='$formattedDate' WHERE notif_id = {$NotifIDs[$i]}";
    mysqli_query($connect2db, $insertStudSec);
}

echo "updated successfully";
?>
