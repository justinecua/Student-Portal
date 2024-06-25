<?php
include('connect2db.php');

$EnrollmentStat = "Enrolled";
$StudentID = $_POST['StudentID']; 
$Aquery = mysqli_query($connect2db, "UPDATE student SET Enrollment_Status='$EnrollmentStat' WHERE Student_ID = '$StudentID'");


//------------------------------------------------------------------
$GetData2 = ("SELECT * FROM schoolyear WHERE SchoolYearStatus='Selected'");
$pass2 = mysqli_query($connect2db, $GetData2);
$getrow2 = mysqli_fetch_assoc($pass2);
$SchoolYear_ID = $getrow2['SchoolYear_ID'];

//---------------------------------------------------------------------
$currentTime = date('Y-m-d H:i:s');
$NotifTitle = "Enrollment Successful";
$NotifStat = "Unread";
$NotifContent = "Welcome to Christian Horizon School! You can now use your new School ID that has been sent to you via email";
$insertNotif = mysqli_query($connect2db, "INSERT into notifications VALUES('', '$NotifTitle', '$NotifContent', '$currentTime', '$NotifStat', '$StudentID', null)");

//---------------------------------------------------------

$GetData = ("SELECT * FROM student WHERE Student_ID = '$StudentID'");
$pass = mysqli_query($connect2db, $GetData);
$getrow = mysqli_fetch_assoc($pass);

$Student_ID = $getrow['Student_ID'];
$userPassword = $getrow['Password'];
$userType = "2";

//--------------------------------------------------------------------
$query = "SELECT MAX(ID_Number) as maxSchoolID FROM accounts WHERE AccountType_ID='2'";
$result = mysqli_query($connect2db, $query);
$row = mysqli_fetch_assoc($result);
$maxSchoolID = $row['maxSchoolID'];

$num = (int) substr($maxSchoolID, 7) + 1;
while ($num <= 1000) {
    $SchoolID = "CHS-" . sprintf("%03d", $num);
    $checkQuery = "SELECT * FROM accounts WHERE ID_Number='$SchoolID'";
    $checkResult = mysqli_query($connect2db, $checkQuery);

    if (mysqli_num_rows($checkResult) == 0) {
        break;
    }
    $num++;
}

//------------------------------------------------------------------------
$insert2 = ("INSERT INTO accounts VALUES('', '$Student_ID', NULL, '$SchoolID','$userPassword', NOW(), null, '$SchoolYear_ID', '$userType')");
$sql = mysqli_query($connect2db, $insert2);

//---------------------------------------------------------

$GetData2 = "SELECT accounts.*, student.FirstName, student.EmailAddress, student.Password, accounts.ID_Number
           FROM accounts
           INNER JOIN student ON student.Student_ID = accounts.Student_ID 
           WHERE student.Student_ID='$StudentID'";

$pass2 = mysqli_query($connect2db, $GetData2);
$getrow2 = mysqli_fetch_assoc($pass2);

$AccSchoolID = $getrow2['ID_Number'];
$AccFName = $getrow2['FirstName'];
$AccEmail = $getrow2['EmailAddress'];
$AccPass = $getrow2['Password'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//absolute paths
require __DIR__ . '/PHPMailer-master/src/PHPMailer.php';
require __DIR__ . '/PHPMailer-master/src/SMTP.php';
require __DIR__ . '/PHPMailer-master/src/Exception.php';

$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = "samplechsiemail@gmail.com";
$mail->Password = "wvpj ojxu fdep zhfy";
$mail->Port = "465"; // SSl port for Gmail
$mail->SMTPSecure = 'ssl';

$mail->setFrom('samplechsiemail@gmail.com');
$mail->addAddress($AccEmail); //email from the user that was selected
$mail->isHTML(true);
$mail->Subject = 'Enrollment Confirmation';

$mailBody = "
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 10px;
            background-color: #ffffff;
        }

        p {
            color: #666;
            font-size: 13px;
        }
    </style>
</head>
<body>
  
    <h4>Christian Horizon School</h4>
    <p>Dear $AccFName,</p>
    <p>Your enrollment has been confirmed. We are proud that you have chosen Christian Horizon School. You can now log in to our school's Student Portal. <a href='www.facebook.com'>Click Here to Visit</a></p>
    <p>Use your School ID to log in, which is $AccSchoolID and the password you created from the enrollment form. Have A Good Day!</p>
   
</body>
</html>

";
$mail->Body = $mailBody;

if ($mail->send()) {
    echo 'Enrollment Successful';
} else {
    // Echo an error message and log the error
    echo 'Error in sending email: ' . $mail->ErrorInfo;
    trigger_error('Error in sending email: ' . $mail->ErrorInfo, E_USER_ERROR);
}

?>
