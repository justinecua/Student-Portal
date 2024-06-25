<?php

include('../../connect/connect2db.php');

if (isset($_POST['queryInfo'])) {
    $query = $_POST['queryInfo'];

    $TFquery = "SELECT teachers.*, COUNT(subjects.Subject_ID) AS subject_count 
            FROM teachers 
            LEFT JOIN subjects ON teachers.TeacherID = subjects.Teacher_ID 
            WHERE teachers.FirstName LIKE '%" . $query . "%' OR teachers.LastName LIKE '%" . $query . "%'
            GROUP BY teachers.TeacherID";

    $TFdisplay = mysqli_query($connect2db, $TFquery);
    $fetchCount = 1;
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <body>

        <table class="TableFetchTeachers">
            <div class="actionsBox">
                <div class="MASubjCont">
                    <div class="ViewInfoTeacher"><img src="../../images/eye (1).svg" alt="">View Info</div>
                    <div class="EditTeacher"><img src="../../images/edit.svg" alt="">Edit</div>
                    <div class="DelTeacher"><img src="../../images/trash-2.svg" alt="">Delete</div>
                </div>
            </div>

            <tr class="trFirstTeacher">
                <td class="TFID">ID</td>
                <td class="TFProfile">Profile</td>
                <td class="TFTeacher Name">Teacher Name</td>
                <td class="TFTeacher Name">Age</td>
                <td class="TFTeacher Name">Subject</td>
                <td class="TFTeacher Name">Email</td>
                <td class="TFActions">Actions</td>
            </tr>

            <?php
            while ($TFgetrow = mysqli_fetch_assoc($TFdisplay)) {
                $TeacherID = $TFgetrow['TeacherID'];
                $ProfilePath = $TFgetrow['ProfilePath'];
                $FirstName = $TFgetrow['FirstName'];
                $LastName = $TFgetrow['LastName'];
                $Age = $TFgetrow['Age'];
                $EmailAddress = $TFgetrow['EmailAddress'];
                $subjectCount = $TFgetrow['subject_count'];
                $TFFullName = $FirstName . ' ' . $LastName;

                echo '<tr class="TecContTable">';
                ?>
          
                    <td>
                        <?php echo $fetchCount++ ?>
                    </td>
                    <td>
                        <div class="TeacherProfile"><img src="../../<?php echo $ProfilePath ?>"></div>
                    </td>
                    <?php
                    echo "<td>$TFFullName</td>";
                    echo "<td>$Age</td>";
                    echo "<td>$subjectCount</td>";
                    echo "<td>$EmailAddress</td>";
                    echo '<td><button class="SubjAssignBtn" onclick="toggleCheckboxVisibility(this)">More Info</button> <div class="MoreActionsSubj" onclick="toggleActionsBox(this, event)"><img src="../../images/more-vertical.svg"> </div> </td>';
                    echo "</tr>";
            }
}
?>


    </table>

</body>

</html>