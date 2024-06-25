<?php
include('../../connect/connect2db.php');

$SecDrquery = "SELECT section.SectionID, section.SectionName, strand.StrandName, section.Gradelevel_ID, section.Strand_ID,  
gradelevel.GradeLevel FROM section 
LEFT JOIN gradelevel ON section.Gradelevel_ID = gradelevel.Gradelevel_ID
LEFT JOIN strand ON section.Strand_ID = strand.Strand_ID
ORDER BY gradelevel.GradeLevel ASC, section.SectionName ASC";

$SecDrdisplay = mysqli_query($connect2db, $SecDrquery);

?>

<!DOCTYPE html>
<html lang="en">

<body>

    <?php
    while ($SecDrgetrow = mysqli_fetch_assoc($SecDrdisplay)) {
        $SectionID = $SecDrgetrow['SectionID'];
        $SectionName = $SecDrgetrow['SectionName'];
        $Gradelevel_ID = $SecDrgetrow['Gradelevel_ID'];
        $Strand_ID = $SecDrgetrow['Strand_ID'];
        $GradeLevelName = $SecDrgetrow['GradeLevel'];
        $StrandName = $SecDrgetrow['StrandName'];

        //All Id from Section
        $SectionAllID = $SectionID . ',' . $Gradelevel_ID . ',' . $Strand_ID;
        if ($StrandName == '') {
            $GrdeLvlANDSec = $GradeLevelName . ' - ' . $SectionName . ' ' . $StrandName;
        } else {
            $GrdeLvlANDSec = $GradeLevelName . ' - ' . $SectionName . ' ' . '(' . $StrandName . ')';
        }


        echo "<option value='$SectionAllID'>$GrdeLvlANDSec</option>";
    }
    ?>
</body>

</html>