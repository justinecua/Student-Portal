<?php
include('../../connect/connect2db.php');

$Strquery = "SELECT * FROM strand";
$Strdisplay = mysqli_query($connect2db, $Strquery);

$StrCounter = 1;
?>
<!DOCTYPE html>
<html lang="en">

<body>
    <table class="Strtable">
        <tr class="trFirstStr">
            <td></td>
            <td>Strand</td>
            <td>Description</td>
            <td>Actions</td>
        </tr>
        <?php
        while ($Strgetrow = mysqli_fetch_assoc($Strdisplay)) {
            $Strand_ID = $Strgetrow['Strand_ID'];
            $StrandName = $Strgetrow['StrandName'];
            $StrandDescription = $Strgetrow['StrandDescription'];

            ?>
            <tr>
                <td>
                    <?php echo $StrCounter++; ?>
                </td>
                <td>
                    <?php echo $StrandName; ?>
                </td>
                <td>
                    <?php echo $StrandDescription; ?>
                </td>
                <td>
                    <button class="DeleteStr" dataSYid="<?php ?>"><img src="../../images/trash-2 (3).svg"
                            alt=""></button>
                </td>
            </tr>

        <?php } ?>
    </table>
</body>

</html>