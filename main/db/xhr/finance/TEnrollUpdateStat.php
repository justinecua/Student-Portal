<?php
include('connect2db.php');
$EnrollmentStat = "Enrolled";

$TAuserId = $_POST['TAuserId']; // User ID passed via AJAX

$Aquery = mysqli_query($connect2db, "UPDATE g1_to_g10_enrollment SET Enrollment_Status='$EnrollmentStat' WHERE Enrollment_ID = '$TAuserId'");

$GetData = ("SELECT * FROM g1_to_g10_enrollment WHERE Enrollment_ID = '$TAuserId'");
$pass = mysqli_query($connect2db, $GetData);
$getrow = mysqli_fetch_assoc($pass);

$userFname = $getrow['FirstName'];
$userMname = $getrow["MiddleName"];
$userLname = $getrow["LastName"];
$userYearLevel = $getrow["Incoming_Level"];
$userEmail = $getrow["EmailAddress"];
$userPassword = $getrow['Password'];
$userType = "Student";


$query = "SELECT MAX(School_ID) as maxSchoolID FROM accounts";
$result = mysqli_query($connect2db, $query);
$row = mysqli_fetch_assoc($result);
$maxSchoolID = $row['maxSchoolID'];


$num = (int) substr($maxSchoolID, 6) + 1;

$SchoolID = "CHS-23" . $num;

$insert2 = ("INSERT INTO accounts VALUES('', '$SchoolID', '$userFname', '$userMname', '$userLname', '$userEmail', '$userYearLevel', '$userPassword', '$userType')");
$sql = mysqli_query($connect2db, $insert2);

$GetData2 = ("SELECT * FROM accounts WHERE EmailAddress = '$userEmail'");
$pass2 = mysqli_query($connect2db, $GetData2);
$getrow2 = mysqli_fetch_assoc($pass2);

$AccSchoolID = $getrow2['School_ID'];
$AccFName = $getrow2['FirstName'];
$AccEmail = $getrow2['EmailAddress'];
$AccPass = $getrow2['Password'];


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\Portal_beta\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\htdocs\Portal_beta\PHPMailer-master\src\SMTP.php';
require 'C:\xampp\htdocs\Portal_beta\PHPMailer-master\src\Exception.php';

$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = "samplechsiemail@gmail.com";
$mail->Password = "wvpj ojxu fdep zhfy";
$mail->SMTPSecure = "tls";
$mail->Port = 587; // TLS port for Gmail

$mail->SMTPDebug = SMTP::DEBUG_SERVER; // Set the debugging level
$mail->Debugoutput = 'html'; // Display the debugging output in HTML format
$mail->setFrom('christianhorizonschoolinc00@gmail.com');
$mail->addAddress($userEmail); //email from the user that was selected
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