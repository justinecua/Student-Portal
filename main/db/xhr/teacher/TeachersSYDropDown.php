<?php
include('connect2db.php');

function ShowSY($connect2db)
{
    $runsql = mysqli_query($connect2db, "SELECT * FROM schoolyear ");
    $SYArr = array();

    while ($row = mysqli_fetch_assoc($runsql)) {
        $SchoolYearID = $row["SchoolYear_ID"];
        $SchoolYear = $row["SchoolYear"];

        $SYArr[] = [
            'SchoolYearID' => $SchoolYearID,
            'SchoolYearName' => $SchoolYear
        ];
    }
    return $SYArr;
}

$SYList= ShowSY($connect2db); //stored a function in a variable;
echo '<option value="">Select School Year</option>';

foreach ($SYList as $SchoolYear) {
    echo '<option value="' . $SchoolYear['SchoolYearID'] . '"> SY ' . $SchoolYear['SchoolYearName'] . '</option>';
}

?>