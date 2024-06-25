<?php
include('../../connect/connect2db.php');

$Secquery = "SELECT schoolfees.SchoolFee_ID, schoolfees.SchoolFee_Name, schoolfees.SchoolFee_Price, gradelevel.GradeLevel
FROM schoolfees 
INNER JOIN gradelevel ON schoolfees.Gradelevel_ID = gradelevel.Gradelevel_ID
ORDER BY schoolfees.SchoolFee_Name ASC
LIMIT 12";

$Secdisplay = mysqli_query($connect2db, $Secquery);
$SecCounter = 1;
?>
<!DOCTYPE html>
<html lang="en">

<body>
    <table class="Sectable">
        <tr class="trFirstSec">
            <td></td>
            <td>School Fee</td>
            <td>School Fee Price</td>
            <td>Grade Level</td>
            <td>Actions</td>
         </tr>
        <?php

        while ($Secgetrow = mysqli_fetch_assoc($Secdisplay)) {
            $SchoolFeeName = $Secgetrow['SchoolFee_Name'];
            $SchoolFee_Price = $Secgetrow['SchoolFee_Price'];
            $GradeLevel = $Secgetrow['GradeLevel'];

            ?>
                    <tr>
                        <td>
                            <?php echo $SecCounter++; ?>
                        </td>
                        <td>
                            <?php echo $SchoolFeeName; ?>
                        </td>
                        <td>
                            <?php echo $SchoolFee_Price; ?>
                        </td>
                        <td>
                            <?php echo $GradeLevel; ?>
                        </td>
                        <td>
                            <button class="DeleteSec" dataSYid="<?php ?>"><img src="../../../../images/trash-2 (3).svg" alt=""></button>
                        </td>
                    </tr>

        <?php } ?>
        
    </table>
</body>

</html>