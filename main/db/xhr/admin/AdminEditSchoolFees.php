<?php

include('../../connect/connect2db.php');

if (isset($_POST['SFEName'], $_POST['SFEPrice'], $_POST['SFEType'])) {
    $SchoolFeeIDSFE = $_POST['SchoolFeeIDSFE'];
    $SFEName = $_POST['SFEName'];
    $SFEPrice = $_POST['SFEPrice'];
    $SFEType = $_POST['SFEType'];

    $editSF = "UPDATE schoolfees SET SchoolFee_Name='$SFEName', SchoolFee_Price='$SFEPrice', SchoolFee_Type='$SFEType' 
    WHERE SchoolFee_ID='$SchoolFeeIDSFE'";

    if ($sql2 = mysqli_query($connect2db, $editSF)) {
        echo "Edited Successfully";
    } else {
        echo "Error: " . mysqli_error($connect2db);
    }
}


?>