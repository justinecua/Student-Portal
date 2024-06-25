<?php
include('../../connect/connect2db.php');

$Tchrquery = "SELECT * FROM teachers WHERE NOT EXISTS (SELECT 1 FROM section WHERE section.Teacher_ID = teachers.TeacherID)";
$Tchrdisplay = mysqli_query($connect2db, $Tchrquery);

?>

<!DOCTYPE html>
<html lang="en">

<body>
    <?php
    while ($Tchrgetrow = mysqli_fetch_assoc($Tchrdisplay)) {
        $TeacherID = $Tchrgetrow['TeacherID'];
        $TchrProfilePath = $Tchrgetrow['ProfilePath'];
        $TchrFirstName = $Tchrgetrow['FirstName'];
        $TchrLastName = $Tchrgetrow['LastName'];
        $TchrFullName = $TchrFirstName . ' ' . $TchrLastName;

        echo "<option value='$TeacherID'>$TchrFullName</option>";
    }
    ?>

</body>

</html>
