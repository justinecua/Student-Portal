<?php
include('../../connect/connect2db.php');

$SYquery = "SELECT * FROM gradingperiod";
$GPdisplay = mysqli_query($connect2db, $SYquery);
?>
<!DOCTYPE html>
<html lang="en">

<body>
    <table class="GPtable">
        <tr class="trFirstGP">
            <td>Grading Period</td>
            <td>Actions</td>
        </tr>
        <?php
        while ($GPgetrow = mysqli_fetch_assoc($GPdisplay)) {
            $GradingPeriod_ID = $GPgetrow['GradingPeriod_ID'];
            $GradingType = $GPgetrow['GradingType'];

            echo "<tr>";
            echo "<td> $GradingType </td>";
            ?>
                    <td>
                        <button class="DeleteGP" dataSYid="<?php echo $GradingPeriod_ID; ?>"><img src="../../../../images/trash-2 (3).svg"
                                alt=""></button>
                    </td>
                    </tr>

        <?php } ?>
        <table>

</body>

</html>