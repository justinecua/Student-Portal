<?php

include('../../connect/connect2db.php');

$Squery = "CALL `GetAllSubjects`();";
$Sdisplay = mysqli_query($connect2db, $Squery);

$SubjCounter = 1;
?>
<!DOCTYPE html>
<html lang="en">

<body>
    <table class="TableFetchSubj">
        <div class="actionsBox">
            <div class="MASubjCont">
                <div class="ViewInfoSubj"><img src="images/eye (1).svg" alt="">View Info</div>
                <div class="EditSubj"><img src="images/edit.svg" alt="">Edit</div>
                <div class="DelSubj"><img src="images/trash-2.svg" alt="">Delete</div>
            </div>
        </div>

        <tr class="trFirstSubj">
            <td class="SubjCode"></td>
            <td class="SubjCode">Subject Code</td>
            <td class="SubjName">Subject Name</td>
            <td class="SubjTime">Time</td>
            <td class="SubjCode">Section</td>
            <td class="SubjCode">Grade Level</td>
            <td class="SubjCode">Strand</td>
            <td class="SubjName">Teacher</td>
            <td class="SubjOptions">Actions</td>
        </tr>

        <?php
        while ($getrow = mysqli_fetch_assoc($Sdisplay)) {
            $DBSubject_Code = $getrow['Subject_Code'];
            $DBSubject_Name = $getrow['Subject_Name'];
            $DBSubject_StTime = $getrow['StartTime'];
            $DBSubject_EndTime = $getrow['EndTime'];
            $DBSectionName = $getrow['SectionName'];
            $DBGradeLevel = $getrow['GradeLevel'];
            $DBStrandName = $getrow['StrandName'];
            $DBTFirstName = $getrow['FirstName'];
            $DBTLastName = $getrow['LastName'];
            $DBTFullName = $DBTFirstName . ' ' . $DBTLastName;

            $DBSubjTime = $DBSubject_StTime . ' - ' . $DBSubject_EndTime;
            if ($DBStrandName == null) {
                $DBStrandName = "None";
            }
            echo "<tr>";
            echo '';
            ?>
                <td>
                    <?php echo $SubjCounter++; ?>
                </td>
                <?php
                echo "<td>$DBSubject_Code</td>";
                echo "<td>$DBSubject_Name</td>";
                echo "<td>$DBSubjTime</td>";
                echo "<td>$DBSectionName</td>";
                echo "<td>$DBGradeLevel</td>";
                echo "<td>$DBStrandName</td>";
                echo "<td>$DBTFullName</td>";
                echo '<td> <button class="EditSec" dataSYid="<?php ?>"><img src="../../images/edit.svg" alt=""></button>';
                echo '<button class="DeleteSec" dataSYid="<?php ?>"><img src="../../images/trash-2 (3).svg" alt=""></button></td>';
                echo "</tr>";
        }
        ?>

        <table>

</body>

</html>