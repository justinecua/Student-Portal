<?php
include('../../connect/connect2db.php');

if (isset($_POST['DBSchoolYearID'])) {
    $DBSchoolYearID = $_POST['DBSchoolYearID'];
    $SelectedStat = "Selected";

    $checkSelectedQuery = "SELECT COUNT(*) as selectedCount FROM schoolyear WHERE SchoolYearStatus='$SelectedStat'";

    if ($checkResult = mysqli_query($connect2db, $checkSelectedQuery)) {
        $selectedCount = mysqli_fetch_assoc($checkResult)['selectedCount'];

        if ($selectedCount < 1) {
            $UpdateSYStat = "UPDATE schoolyear SET SchoolYearStatus='$SelectedStat' WHERE SchoolYear_ID='$DBSchoolYearID'";

            if ($sql2 = mysqli_query($connect2db, $UpdateSYStat)) {
                echo '<img src="images/check-circle (1).svg">';
                echo "School Year Successfully Selected";
            } else {
                echo "Error: " . mysqli_error($connect2db);
            }
        } else {
            echo '<img src="images/x-circle (1).svg">';
            echo "Only One School Year Allowed";
        }
    } else {
        echo "Error: " . mysqli_error($connect2db);
    }
}
?>
