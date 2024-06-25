<?php
include('../../connect/connect2db.php');

if (isset($_POST['queryInfo'])) {
    $query = $_POST['queryInfo'];

    $Secquery = "SELECT * FROM student
WHERE student.FirstName LIKE '%" . $query . "%' OR student.LastName LIKE '%" . $query . "%'";

    $fetchEnrollees = mysqli_query($connect2db, $Secquery);
    $EnrollCounter = 1;
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <body>
        <table class="Enrolltable2">
            <div class="actionsBox2">
                <div class="StudEnrollActions">
                    <div class="ConfirmEnroll"><img src="../../images/edit.svg">Confirm</div>
                    <div class="DeclineEnroll"><img src="../../images/trash-2.svg">Decline</div>
                </div>
            </div>
            <tr class="trFirstEnroll2">
                <td></td>
                <td>Date</td>
                <td>Profile</td>
                <td>Full Name</td>
                <td>Grade Level</td>
                <td>Status</td>
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

                $G1UserFullName = ucfirst($G1UserFName) . " " . ucfirst($G1UserMName) . " " . ucfirst($G1UserLName);

                ?>

                    <tr>
                        <td>
                            <?php echo $EnrollCounter++; ?>
                        </td>
                        <td>
                            <?php echo $G1UserEnrollDate; ?>
                        </td>
                        <td>
                            <div class="TeacherProfile"><img src="../../<?php echo $G1UserStudPicSize ?>"></div>
                        </td>

                        <td>
                            <?php echo $G1UserFullName; ?>
                        </td>
                        <td>
                            <?php echo $G1UserIncLevel . $Course; ?>
                        </td>
                        <td>
                            <div class="StatusFalse">
                                <span>
                                    <?php echo $G1UserEnrollStat; ?>
                                </span>
                            </div>
                        </td>

                        <td>
                        <button class="MoreInfoStudentBtn" dbG1UserId="<?php echo $G1Enrollment_ID; ?>">More Info</button>
                            <div class="MoreActStudBtn" dbG1UserId="<?php echo $G1Enrollment_ID; ?>" onclick="MoreActStudEnroll(this, event)"  ><img
                                    src="../../images/more-vertical.svg"> </div>
                        </td>

                    </tr>

                    </tr>
            <?php }
} ?>
        
    </table>
</body>

</html>