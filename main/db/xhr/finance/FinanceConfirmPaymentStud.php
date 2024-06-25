<?php
include('connect2db.php');

$PaymentStat = "Approved";
$PaymentID = $_POST['PaymentID'];

$Bquery = mysqli_query($connect2db, " SELECT student.Student_ID AS student_id, student.*, payments.*, accounts.*
FROM payments
LEFT JOIN student ON payments.Student_ID = student.Student_ID
LEFT JOIN accounts ON student.Student_Id = accounts.Student_ID
WHERE payment_id = '$PaymentID'");

$row2 = mysqli_fetch_assoc($Bquery);
$PaymentAmount2 = $row2["payment_amount"];
$paymentDate2 = $row2["paymentDate"];
$studentIdFromQuery = $row2['student_id'];

$timestamp = strtotime($paymentDate2);
$formattedDate = date("M d, Y", $timestamp);
$formattedTime = date("g:i a", $timestamp);

$Aquery = mysqli_query($connect2db, "UPDATE payments SET payment_stat='$PaymentStat' WHERE payment_id = '$PaymentID'");

$currentTime = date('Y-m-d H:i:s');
$NotifTitle = "Payment Confirmed";
$NotifStat = "Unread";
$NotifContent = "We would like to inform you that your payment on $formattedDate at $formattedTime has been successfully confirmed by the school.";

$insertNotif = mysqli_query($connect2db, "INSERT into notifications VALUES('', '$NotifTitle', '$NotifContent', '$currentTime', 
'$NotifStat', '$studentIdFromQuery', null)");

echo "Transaction Confirmed";
?>