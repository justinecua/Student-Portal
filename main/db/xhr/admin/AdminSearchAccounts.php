<?php
include('../../connect/connect2db.php');

if (isset($_POST['queryInfo'])) {
    $query = $_POST['queryInfo'];

    $Secquery = "SELECT accounts.*, student.*, section.*, gradelevel.*, strand.*
    FROM accounts
    LEFT JOIN student ON accounts.Student_ID = student.Student_ID
    LEFT JOIN section ON accounts.SectionID =  section.SectionID
    LEFT JOIN gradelevel ON section.Gradelevel_ID = gradelevel.Gradelevel_ID
    LEFT JOIN strand ON section.Strand_ID = strand.Strand_ID
    WHERE student.FirstName LIKE '%" . $query . "%' OR accounts.ID_Number LIKE '%" . $query . "%' AND AccountType_ID ='2'";

    $fetchEnrollees = mysqli_query($connect2db, $Secquery);
    $EnrollCounter = 1;
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <body>
    <table class="Enrolltable">
        <div class="actionsBox2">
            <div class="StudEnrollActions">
                <div class="ConfirmEnroll"><img src="../../images/edit.svg">Confirm</div>
                <div class="DeclineEnroll"><img src="../../images/trash-2.svg">Decline</div>
            </div>
        </div>
        <tr class="trFirstEnroll">
            <td></td>
            <td></td>
            <td>Profile</td>
            <td>Full Name</td>
            <td>Grade Level</td>
            <td>Section</td>
            <td>Actions</td>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($fetchEnrollees)) {
            $G1Enrollment_ID = $row["Student_ID"];
            $G1UserEnrollDate = $row["Enrollment_Date"];
            $G1UserEnrollStat = $row["Enrollment_Status"];
            $G1UserSY = $row["School_year"];
            $G1UserStat = $row["Status"];
            $G1UserLRN = $row["LRN"];
            $G1UserIncLevel = $row["Incoming_Level"];
            $G1UserStudPicSize = $row["Student_PicturePath"];
            $G1UserFName = $row["FirstName"];
            $G1UserMName = $row["MiddleName"];
            $G1UserLName = $row["LastName"];
            $G1UserGender = $row["Gender"];
            $G1UserBPlace = $row["BirthPlace"];
            $G1UserBirthday = $row["Birthday"];
            $G1UserReligion = $row["Religion"];
            $G1UserContNum = $row["ContactNumber"];
            $G1UserHomeAddress = $row["HomeAddress"];
            $G1UserLastSchool = $row["Last_School_Attended"];
            $G1UserEmailad = $row["EmailAddress"];
            $G1UserFathersName = $row["Fathers_Full_Name"];
            $G1UserFOccupation = $row["Fathers_Occupation"];
            $G1UserMothersName = $row["Mothers_Full_Name"];
            $G1UserMOccupation = $row["Mothers_Occupation"];
            $G1UserEmergCont = $row["Emergency_ContactPerson"];
            $G1UserEmergNum = $row["Emergency_ContactNumber"];
            $Course = $row['Course'];
            $SectionID = $row['SectionID'];
            $SectionName = $row['SectionName'];
            $Gradelevel_ID = $row['Gradelevel_ID'];
            $Strand_ID = $row['Strand_ID'];
            $GradeLevelName = $row['GradeLevel'];
            $StrandName = $row['StrandName'];


            $SectionAllID = $SectionID . ',' . $Gradelevel_ID . ',' . $Strand_ID;
            if ($StrandName == '') {
                $GrdeLvlANDSec = $GradeLevelName . ' - ' . $SectionName . ' ' . $StrandName;
            } else {
                $GrdeLvlANDSec = $GradeLevelName . ' - ' . $SectionName . ' ' . '(' . $StrandName . ')';
            }

            $G1UserFullName = ucfirst($G1UserFName) . " " . ucfirst($G1UserMName) . " " . ucfirst($G1UserLName);

            ?>

                    <tr>
                        <td><input class="enrollmentCheckbox" type="checkbox" StudID4Sect="<?php echo $G1Enrollment_ID; ?>"></td>
                        <td>
                            <?php echo $EnrollCounter++; ?>
                        </td>
                        <td>
                            <div class="TeacherProfile"><img src="../../images/<?php echo $G1UserStudPicSize ?>"></div>
                        </td>

                        <td>
                            <?php echo $G1UserFullName; ?>
                        </td>
                        <td>
                            <?php echo $G1UserIncLevel . $Course; ?>
                        </td>
                        <td><span class="StudSectCurr"><?php echo $GrdeLvlANDSec; ?></span></td>
                        <td>
                            <button class="MoreInfoStudentBtn" dbG1UserId="<?php echo $G1Enrollment_ID; ?>">More Info</button>
                        </td>

                    </tr>

                    </tr>
        <?php }
}
?>

    </table>
</body>

</html>