<?php

include('connect2db.php');

if (isset($_POST['queryInfo'])) {
    $query = $_POST['queryInfo'];

$Squery = "SELECT subjects.*, section.SectionName,
gradelevel.GradeLevel, strand.StrandName, teachers.FirstName, teachers.LastName
FROM subjects 
LEFT JOIN section ON subjects.SectionID = section.SectionID
LEFT JOIN gradelevel ON subjects.GradeLevel_ID = gradelevel.GradeLevel_ID
LEFT JOIN strand ON subjects.Strand_ID = strand.Strand_ID
LEFT JOIN teachers ON subjects.Teacher_ID = teachers.TeacherID
WHERE subjects.Subject_Name LIKE '%" . $query . "%' OR subjects.Subject_Code LIKE '%" . $query . "%'";

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
            if($DBStrandName == null){
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
            echo '<td><button class="SubjAssignBtn">More Info</button> <div class="MoreActionsSubj" onclick="toggleActionsBox(this, event)"><img src="images/more-vertical.svg"> </div> </td>';
            echo "</tr>";
        }
    }
        ?>

        <table>

</body>

</html>