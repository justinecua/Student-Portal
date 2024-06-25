<?php
include('../../connect/connect2db.php');

$Crsquery = "SELECT * FROM strand";
$Crsdisplay = mysqli_query($connect2db, $Crsquery);


?>

<!DOCTYPE html>
<html lang="en">

<body>
    <option value="">None</option>
    <?php
    while ($Crsgetrow = mysqli_fetch_assoc($Crsdisplay)) {
        $Strand_ID = $Crsgetrow['Strand_ID'];
        $StrandName = $Crsgetrow['StrandName'];

        echo "<option value='$Strand_ID'>$StrandName</option>";
    }
    ?>
</body>

</html>