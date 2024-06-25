<?php
include('../../connect/connect2db.php');

$GLquery = "SELECT * FROM gradelevel";
$GLdisplay = mysqli_query($connect2db, $GLquery);

?>

<!DOCTYPE html>
<html lang="en">

<body>
    <option value="">Filter By</option>
    <?php
    if (mysqli_num_rows($GLdisplay) > 0) {
        while ($GLgetrow = mysqli_fetch_assoc($GLdisplay)) {
            $Gradelevel_ID = $GLgetrow['Gradelevel_ID'];
            $GradeLevel = $GLgetrow['GradeLevel'];

            echo "<option value='$Gradelevel_ID'>$GradeLevel</option>";
        }
    } else {
        echo "No Grade Level Found";
    }
    ?>
</body>

</html>