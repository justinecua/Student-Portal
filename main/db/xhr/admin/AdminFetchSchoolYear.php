<?php
include('../../connect/connect2db.php');

$SYquery = "SELECT * FROM schoolyear";
$SFdisplay = mysqli_query($connect2db, $SYquery);
?>
<!DOCTYPE html>
<html lang="en">

<body>
    <table class="SYtable">
        <tr class="trFirstSY">
            <td>School Year</td>
            <td>Status</td>
            <td>Actions</td>
        </tr>
        <?php
        while ($SFgetrow = mysqli_fetch_assoc($SFdisplay)) {
            $SchoolYear_ID = $SFgetrow['SchoolYear_ID'];
            $SchoolYear = $SFgetrow['SchoolYear'];
            $SchoolYearStat = $SFgetrow['SchoolYearStatus'];
            echo "<tr>";
            echo "<td> $SchoolYear </td>";
            ?>

                    <td>
                        <div class="StatusFalse">
                            <span><?php echo $SchoolYearStat ?></span>
                        </div>
                    </td>
                    <td>
                        <button class="SelectSY" dataSYid="<?php echo $SchoolYear_ID; ?>"><img src="../../images/check-circle (2).svg"
                                alt=""></button>
                        <button class="DeselectSY" dataSYid="<?php echo $SchoolYear_ID; ?>"><img src="../../images/x-circle (2).svg"
                                alt=""></button>
                        <button class="DeleteSY" dataSYid="<?php echo $SchoolYear_ID; ?>"><img src="../../images/trash-2 (3).svg"
                                alt=""></button>
                    </td>
                    </tr>

        <?php } ?>
    </table>


</body>

</html>