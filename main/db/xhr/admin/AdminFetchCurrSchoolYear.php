<?php
include('../../connect/connect2db.php');

$AAFetchSY = "SELECT * FROM schoolyear WHERE SchoolYearStatus ='Selected'";
$AAFetchSYconn = mysqli_query($connect2db, $AAFetchSY);
$AARowSY = mysqli_fetch_assoc($AAFetchSYconn);
$AASBSchoolYear_ID = $AARowSY["SchoolYear_ID"];
$AASchoolYear = $AARowSY["SchoolYear"];

$response = $AASBSchoolYear_ID . ',' . $AASchoolYear;
echo $response;
?>
