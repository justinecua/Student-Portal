<?php
include('connect2db.php');
$EnrollmentStat = "Enrolled";

$SHSAuserId = $_POST['SHSAuserId']; // User ID passed via AJAX

$Aquery = mysqli_query($connect2db, "UPDATE student SET Enrollment_Status='$EnrollmentStat' WHERE Student_ID = '$SHSAuserId'");

$GetData = ("SELECT * FROM student WHERE Student_ID = '$SHSAuserId'");
$pass = mysqli_query($connect2db, $GetData);
$getrow = mysqli_fetch_assoc($pass);

$Student_ID = $getrow['Student_ID'];
$userPassword = $getrow['Password'];
$userType = "2";

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

$insert2 = ("INSERT INTO accounts VALUES('', '$Student_ID', NULL, '$SchoolID','$userPassword', NOW(), '$userType')");
$sql = mysqli_query($connect2db, $insert2);

$GetData2 = "SELECT accounts.*, student.FirstName, student.EmailAddress, student.Password, accounts.ID_Number
           FROM accounts
           INNER JOIN student ON student.Student_ID = accounts.Student_ID 
           WHERE student.Student_ID='$SHSAuserId'";
           
$pass2 = mysqli_query($connect2db, $GetData2);
$getrow2 = mysqli_fetch_assoc($pass2);

$AccSchoolID = $getrow2['ID_Number'];
$AccFName = $getrow2['FirstName'];
$AccEmail = $getrow2['EmailAddress'];
$AccPass = $getrow2['Password'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\Portal_beta\Portal_beta\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\htdocs\Portal_beta\Portal_beta\PHPMailer-master\src\SMTP.php';
require 'C:\xampp\htdocs\Portal_beta\Portal_beta\PHPMailer-master\src\Exception.php';
$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = "samplechsiemail@gmail.com";
$mail->Password = "wvpj ojxu fdep zhfy";
$mail->SMTPSecure = "tls";
$mail->Port = 587; // TLS port for Gmail

$mail->SMTPDebug = SMTP::DEBUG_SERVER; 
$mail->Debugoutput = 'html'; 
$mail->setFrom('samplechsiemail@gmail.com');
$mail->addAddress($AccEmail); 
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
    <p>Your enrollment has been confirmed. We are proud that you have chosen Christian Horizon School. You can now log in to our school`s Student Portal. <a href='www.facebook.com'>Click Here to Visit</a></p>
    <p>Use your School ID to log in, which is $AccSchoolID and the password you created from the enrollment form. Have A Good Day!</p>
   
</body>
</html>

";
$mail->Body = $mailBody;

if ($mail->send()) {
    echo 'Mail is Sent';
} else {
    echo 'Error: ' . $mail->ErrorInfo;
}
?>