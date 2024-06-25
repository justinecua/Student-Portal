<?php
include('../../connect/connect2db.php');

//use when updating multiple rows
$studIDs = explode(',', $_POST['studIDs']);
$sectionID = $_POST['sectionID'];

$insertStudSec = "UPDATE accounts SET SectionID='$sectionID' WHERE Student_ID IN (" . implode(',', $studIDs) . ")";
mysqli_query($connect2db, $insertStudSec);

echo "Student Assigned Successfully";
?>
