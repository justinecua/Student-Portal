<?php
include('../../connect/connect2db.php');
if (isset($_POST['DDBSchoolYearID'])) {
    $DDBSchoolYearID = $_POST['DDBSchoolYearID'];
    $DSelectedStat = "";

    $DUpdateSYStat = "UPDATE schoolyear SET SchoolYearStatus='$DSelectedStat' WHERE SchoolYear_ID='$DDBSchoolYearID'";

    if ($sql2 = mysqli_query($connect2db, $DUpdateSYStat)) {
        echo '<img src="../../images/check-circle (1).svg">';
        echo "Successfully Unselected";
    } else {
        echo "Error: " . mysqli_error($connect2db);
    }
}

?>