<?php
include('connect2db.php');
session_start();

$AllMessages = "";
$ChatUserProf = "";
$CurrUserFName = "";
$dbStudid = $_SESSION["dbStudid"];

// Query for GroupChat Name
$runsql2 = mysqli_query($connect2db, "SELECT student.*, accounts.*, section.*, gradelevel.*, groupchats.*
FROM student
LEFT JOIN accounts ON student.Student_ID = accounts.Student_ID
LEFT JOIN section ON accounts.SectionID = section.SectionID
LEFT JOIN gradelevel ON section.Gradelevel_ID =  gradelevel.Gradelevel_ID
LEFT JOIN groupchats ON accounts.SectionID = groupchats.SectionID
WHERE student.Student_ID = '$dbStudid'");

$row = mysqli_fetch_assoc($runsql2);
$UserAccount_ID = $row["Account_ID"];
$UserStudent_ID = $row["Student_ID"];

// Function to fetch messages on the current user
function ShowMessagesByUser($connect2db, $UserAccount_ID)
{
    $MessagesArr = array();

    $runsql = mysqli_query($connect2db, "SELECT student.*, messages.*, accounts.*
    FROM messages
    LEFT JOIN accounts ON messages.Account_ID = accounts.Account_ID
    LEFT JOIN student ON accounts.Student_ID = student.Student_ID
    LEFT JOIN groupchats ON groupchats.groupchat_ID = messages.groupchat_ID
    WHERE messages.Account_ID = '$UserAccount_ID'
    ORDER BY messages.message_Date ASC");

    while ($row = mysqli_fetch_assoc($runsql)) {
        $messageContext = $row["messageContext"];
        $Student_PicturePath = $row["Student_PicturePath"];
        $FirstName = $row["FirstName"];

        $MessagesArr[] = [
            'messageContext' => $messageContext,
            'FirstName' => $FirstName,
            'Account_ID' => $row['Account_ID'],
            'Student_PicturePath' => $Student_PicturePath,
            'message_Date' => $row['message_Date'],
        ];
    }

    return $MessagesArr;
}

function ShowGCMessages($connect2db, $UserAccount_ID)
{
    $GCMessagesArr = array();

    $runsql3 = mysqli_query($connect2db, "SELECT student.*, messages.*, accounts.*
    FROM messages
    LEFT JOIN accounts ON messages.Account_ID = accounts.Account_ID
    LEFT JOIN student ON accounts.Student_ID = student.Student_ID
    LEFT JOIN groupchats ON groupchats.groupchat_ID = messages.groupchat_ID
    WHERE messages.Account_ID != '$UserAccount_ID'
    ORDER BY messages.message_Date ASC");

    while ($row = mysqli_fetch_assoc($runsql3)) {
        $messageContext = $row["messageContext"];
        $FirstName = $row["FirstName"];
        $Student_PicturePath = $row["Student_PicturePath"];

        $GCMessagesArr[] = [
            'messageContext' => $messageContext,
            'FirstName' => $FirstName,
            'Student_PicturePath' => $Student_PicturePath,
            'Account_ID' => $row['Account_ID'],
            'message_Date' => $row['message_Date'],
        ];
    }

    return $GCMessagesArr;
}

$MessageList = ShowMessagesByUser($connect2db, $UserAccount_ID);
$ShowGCMessages = ShowGCMessages($connect2db, $UserAccount_ID);
$prevUserId = null;

//Merge UserMessages and Other User messages
$AllMessagesArr = array_merge($MessageList, $ShowGCMessages);
$No_Of_Messages = count($AllMessagesArr);

usort($AllMessagesArr, function ($a, $b) {
    return strtotime($a['message_Date']) - strtotime($b['message_Date']);
});
    
    foreach ($AllMessagesArr as $Message) {
        $isCurrentUserMessage = isset($Message['Account_ID']) && ($Message['Account_ID'] == $UserAccount_ID);

        if ($isCurrentUserMessage) {
            $messageClass = 'GCMainContentDiv2';
            $profileImagePath = '';
            $CurrUserFName = '';

        } else {
            $messageClass = 'GCMainContentDiv3';
            $profileImagePath = $Message['Student_PicturePath'];
            $CurrUserFName = $Message['FirstName'];
        }
        
        
        $AllMessages .= '
            <div class="MessageOuterDiv">
                <div class="UserChatProfile"><img src="'. $profileImagePath . '"></div> 

                <div class="MessageHeader">
                <span id="ChatStudName">'. $CurrUserFName . ' </span>
                    <div class="' . $messageClass . '">
                        <span>' . $Message['messageContext'] . '</span>
                    </div>
                </div>    
            </div>
        ';
    }
    
echo $AllMessages;

?>
