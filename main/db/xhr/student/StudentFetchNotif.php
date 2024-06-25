<?php
include('connect2db.php');
session_start();

$notifications = array();
$dbStudid = $_SESSION["dbStudid"];

$runsql = mysqli_query($connect2db, "SELECT student.*, notifications.*
FROM notifications
LEFT JOIN student ON notifications.Student_ID = student.Student_ID
WHERE notifications.Student_ID='$dbStudid'
ORDER BY notifications.NotifDateTime DESC"); 

while ($row = mysqli_fetch_assoc($runsql)) {

    $UserFName = $row["FirstName"];
    $UserEnrollStat = $row["Enrollment_Status"];
    $notifID = $row["notif_id"];
    $NotifTitle = $row["NotifTitle"];
    $notifContent = $row["notifContent"];
    $NotifStat = $row["NotifStat"];
    $timestamp = strtotime($row["NotifDateTime"]);

    $timeDifference = time() - $timestamp;
    $timeAgo = getTimeAgo($timeDifference); 

    if($NotifStat == "Unread"){
        $Message = '
        <div class="NotifCont" id="Notif_' . $notifID . '">
            <div class="NotifLeftSide" NotifID=' . $notifID . ' timestamp=' . $timestamp . '>
                <img src="images/CHS Logo1.png">
            </div>
            <div class="NotifRightSide">
                <div class="NotifTitle">' . $NotifTitle . '  </div>
                <span class="NotifSubTitle">' . $notifContent . '</span>
                <div class="NotifTimeSide">
                    <span>' . $timeAgo . '</span>
                </div>
            </div>
            <div class="NotifStatCircle">
                <div class="NotifCircle"></div>
            </div>
        </div>
        ';
    }
    else if ($NotifStat == "Read"){
        $Message = '
        <div class="NotifCont" id="Notif_' . $notifID . '">
            <div class="NotifLeftSide" NotifID=' . $notifID . ' timestamp=' . $timestamp . '>
                <img src="images/CHS Logo1.png">
            </div>
            <div class="NotifRightSide">
                <div class="NotifTitle">' . $NotifTitle . '  </div>
                <span class="NotifSubTitle">' . $notifContent . '</span>
                <div class="NotifTimeSide">
                    <span>' . $timeAgo . '</span>
                </div>
            </div>
            
        </div>
        ';
    }


    $notifications[] = $Message;
}
echo implode('', $notifications);
function getTimeAgo($timeDifference)
{
    $seconds = $timeDifference;
    $minutes = round($seconds / 60); // value 60 is seconds
    $hours = round($seconds / 3600); // value 3600 is 60 minutes * 60 sec
    $days = round($seconds / 86400); // value 86400 is 24 hours * 60 minutes * 60 sec

    if ($seconds <= 60) {
        return "Just now";
    } elseif ($minutes == 1) {
        return "1 min ago";
    } elseif ($minutes <= 60) {
        return "$minutes mins ago";
    } elseif ($hours == 1) {
        return "1 hr ago";
    } elseif ($hours <= 24) {
        return "$hours hrs ago";
    } elseif ($days == 1) {
        return "1 day ago";
    } else {
        return "$days days ago";
    }
}
?>
