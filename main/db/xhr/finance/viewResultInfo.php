<?php
include('connect2db.php');

if (isset($_POST['FinStudent_ID'])) {
    $FinStudent_ID = $_POST['FinStudent_ID'];

    $sql3 = "SELECT * FROM student WHERE Student_ID = '$FinStudent_ID'";
    $result3 = mysqli_query($connect2db, $sql3);
    $getinfo = mysqli_fetch_assoc($result3);

    $FStudent_ID = $getinfo['Student_ID'];
    $Fname = $getinfo['FirstName'];
    $Mname = $getinfo['MiddleName'];
    $Lname = $getinfo['LastName'];
    $Date = date("Y-m-d");;
    $FullN = $Fname .' '. $Mname . ' ' . $Lname; 

    echo '
   
    <div class="ReceiptDiv"><label for="">Full Name:</label><span>' . $FullN . '</span></div>
   
    <div class="ReceiptDiv"><label for="">Date:</label> <span>' . $Date . '</span></div>
    
    ';
    
}
?>

