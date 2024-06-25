<?php
include('../../connect/connect2db.php');

$Crsquery = "SELECT * FROM tesdacourse";
$Crsdisplay = mysqli_query($connect2db, $Crsquery);

$CrsCounter = 1;
?>
<!DOCTYPE html>
<html lang="en">

<body>
    <table class="Crstable">
        <tr class="trFirstCrs">
            <td></td>
            <td>Courses</td>
            <td>Duration</td>
            <td>Actions</td>
        </tr>
        <?php
        while ($Crsgetrow = mysqli_fetch_assoc($Crsdisplay)) {
            $CourseID = $Crsgetrow['CourseID'];
            $CourseName = $Crsgetrow['CourseName'];
            $CourseDescription = $Crsgetrow['CourseDescription'];
            $CourseDuration = $Crsgetrow['CourseDuration'];

            ?>
                        <tr>
                            <td>
                                <?php echo $CrsCounter++; ?>
                            </td>
                            <td>
                                <?php echo $CourseName; ?>
                            </td>
                            <td>
                                <?php echo $CourseDuration; ?>
                            </td>
                            <td>
                   
                                <button class="DeleteCrs" dataSYid="<?php ?>"><img src="../../../../images/trash-2 (3).svg"
                                        alt=""></button>
                            </td>
                        </tr>

        <?php } ?>
    </table>
</body>

</html>