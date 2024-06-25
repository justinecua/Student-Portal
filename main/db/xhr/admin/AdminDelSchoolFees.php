<?php
include('../../connect/connect2db.php');

if (isset($_POST['SFDelSchoolID'])) {
    $SFDelSchoolID = $_POST['SFDelSchoolID'];

    $del = "DELETE FROM schoolfees WHERE SchoolFee_ID = '$SFDelSchoolID'";

    if ($run = mysqli_query($connect2db, $del)) {
        echo "School Fee Deleted Successfully";
    } else {
        echo "Error" . mysqli_error($connect2db);
    }

}


?>