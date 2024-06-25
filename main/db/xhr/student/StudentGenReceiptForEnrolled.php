<?php

include('connect2db.php');
if (isset($_POST['CheckStudentID'])) {
    $CheckStudentID = $_POST['CheckStudentID'];

    $runsql2 = mysqli_query($connect2db, "SELECT payments.*, student.*, accounts.Student_ID, accounts.ID_Number
    FROM payments
    LEFT JOIN student ON payments.Student_ID = student.Student_ID
    LEFT JOIN accounts ON payments.Student_ID = accounts.Student_ID
    WHERE payments.Student_ID = '$CheckStudentID'
    ORDER BY payments.paymentDate DESC");

    $row2 = mysqli_fetch_assoc($runsql2);
    $FirstName = $row2["FirstName"];
    $MiddleName = $row2["MiddleName"];
    $LastName = $row2["LastName"];
    $SchoolID = $row2["ID_Number"];
    $UserFullName = $FirstName . ' ' . $LastName;

    $payment_method = $row2['payment_method'];
    $paymentDate = $row2['paymentDate'];
    $payment_amount = $row2['payment_amount'];

    echo '
    <div><label for="">ID No.:</label> <span>
    '.$SchoolID .'
    </span></div>
    <div><label for="">Student`s Name:</label> <span>
    '.$UserFullName .'
    </span></div>
    <div><label for="">Payment Method:</label> <span>
    '.$payment_method .'
    </span></div>
    <div><label for="">Amount Given:</label> <span>
    '.$payment_amount .'
    </span></div>
    <div><label for="">Date:</label> <span>
    '.$paymentDate .'
    </span></div>
    ';
}
?>