<?php
include('connect2db.php');

function ShowSchoolYear($connect2db)
{
    $SchoolYearArr = array();
    $sql = mysqli_query($connect2db, "SELECT * FROM schoolyear");

    while ($getrow = mysqli_fetch_assoc($sql)) {
        $SchoolYear_ID = $getrow["SchoolYear_ID"];
        $SchoolYear = $getrow["SchoolYear"];

        $SchoolYearArr[] = [
            'SchoolYearID' => $SchoolYear_ID,
            'SchoolYear' => $SchoolYear,
        ];
    }
    return $SchoolYearArr;
}

$SchoolYearList = ShowSchoolYear($connect2db);

foreach ($SchoolYearList as $SYGrade) {
    echo '
    <option value=" '. $SYGrade["SchoolYearID"] . '">SY ' . $SYGrade["SchoolYear"].'</option>
    ';
}


?>

