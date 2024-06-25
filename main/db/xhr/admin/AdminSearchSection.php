<?php
include('../../connect/connect2db.php');

if (isset($_POST['queryInfo'])) {
    $query = $_POST['queryInfo'];

    $Secquery = "SELECT section.SectionName, gradelevel.GradeLevel, teachers.FirstName, teachers.LastName, strand.StrandName
    FROM section 
    LEFT JOIN gradelevel ON section.Gradelevel_ID = gradelevel.Gradelevel_ID
    LEFT JOIN strand ON section.Strand_ID = strand.Strand_ID
    LEFT JOIN teachers ON section.Teacher_ID = teachers.TeacherID
    WHERE section.SectionName LIKE '%" . $query . "%' OR strand.StrandName LIKE '%" . $query . "%'";


    $Secdisplay = mysqli_query($connect2db, $Secquery);

    $SecCounter = 1;
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <body>
    <table class="Sectable">
        <tr class="trFirstSec">
            <td></td>
            <td>Section</td>
            <td>Grade Level</td>
            <td>Strand</td>
            <td>Adviser</td>
            <td>Actions</td>
        </tr>
        <?php
        while ($Secgetrow = mysqli_fetch_assoc($Secdisplay)) {
            $SectionName = $Secgetrow['SectionName'];
            $StrandName = $Secgetrow['StrandName'];

            if ($StrandName == NULL) {
                $StrandName = "None";
            }
            $GradeLevel = $Secgetrow['GradeLevel'];
            $TchrFirstName = $Secgetrow['FirstName'];
            $TchrLastName = $Secgetrow['LastName'];
            $TchrFullName = $TchrFirstName . ' ' . $TchrLastName;

            ?>
                        <tr>
                            <td>
                                <?php echo $SecCounter++; ?>
                            </td>
                            <td>
                                <?php echo $SectionName; ?>
                            </td>
                            <td>
                                <?php echo $GradeLevel; ?>
                            </td>
                            <td>
                                <?php echo $StrandName; ?>
                            </td>
                            <td>
                                <?php echo $TchrFullName; ?>
                            </td>
                            <td>
                                <button class="EditSec" dataSYid="<?php ?>"><img src="../../images/edit.svg" alt=""></button>
                                <button class="DeleteSec" dataSYid="<?php ?>"><img src="../../images/trash-2 (3).svg" alt=""></button>
                            </td>
                        </tr>

        <?php }
} ?>
    </table>
</body>

</html>