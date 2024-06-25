<?php
include('../../connect/connect2db.php');

$GLquery = "SELECT * FROM gradelevel";
$GLdisplay = mysqli_query($connect2db, $GLquery);

$GLCounter = 1;
?>
<!DOCTYPE html>
<html lang="en">

<body>
    <table class="GLtable">
        <tr class="trFirstGL">
            <td></td>
            <td>Grade Level</td>
            <td>Actions</td>
        </tr>
        <?php
        while ($GLgetrow = mysqli_fetch_assoc($GLdisplay)) {
            $Gradelevel_ID = $GLgetrow['Gradelevel_ID'];
            $GradeLevel = $GLgetrow['GradeLevel'];

            ?>
                    <tr>
                        <td>
                            <?php echo $GLCounter++; ?>
                        </td>
                        <td>
                            <?php echo $GradeLevel; ?>
                        </td>
                        <td>
                 
                            <button class="DeleteGL" dataSYid="<?php ?>"><img src="../../../../images/trash-2 (3).svg"
                                    alt=""></button>
                        </td>
                    </tr>

        <?php } ?>
    </table>
</body>

</html>