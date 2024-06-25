<?php

include("connect2db.php");

$getG1toG10PE = mysqli_query($connect2db, "SELECT student.*, payments.*
FROM student
LEFT JOIN payments ON student.Student_ID = payments.Student_ID
WHERE Enrollment_Status = 'In Progress'");

while ($row = mysqli_fetch_assoc($getG1toG10PE)) {
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
    $PaymentAmount = $row["payment_amount"];

    $G1UserFullName = ucfirst($G1UserFName) . " " . ucfirst($G1UserMName) . " " . ucfirst($G1UserLName);

    ?>
    <?php echo " 
                        <tr>
                            <td>$G1UserEnrollDate</td> " ?>
    <td>
        <div><img class="g1UserStudPic" src="<?php echo $G1UserStudPicSize; ?>" </div>
    </td>
    <?php echo "
                            <td>$G1UserFullName</td>
                            <td>$PaymentAmount</td>
                            <td>$G1UserEnrollStat</td>

                            " ?>
    <td>
        <button class="G1MoreInfo" dbG1UserId="<?php echo $G1Enrollment_ID; ?>">More Info</button>
        <!--ang id sa ge click ni user kay ge butang sa button attribute -->

        <button class="G1Approve" dbG1AUserId="<?php echo $G1Enrollment_ID; ?>">Approve</button>

    </td>
    </tr>

    </tr>
<?php } ?>