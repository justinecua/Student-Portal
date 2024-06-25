<?php

include("connect2db.php");

$getTtoT0PE = mysqli_query($connect2db, "SELECT * FROM student WHERE Enrollment_Status = 'Pending' AND Course IN
                     ('Bread and Pastry Production NC II', 'Cookery NC II', 'Housekeeping NC II','Trainers Methodology II',
                      'Electrical Installation and Maintenance NC II', 'Food and Beverage services NC II')");
while ($row = mysqli_fetch_assoc($getTtoT0PE)) {
    $TEnrollment_ID = $row["Student_ID"];
    $TUserEnrollDate = $row["Enrollment_Date"];
    $TUserEnrollStat = $row["Enrollment_Status"];
    $TUserSY = $row["School_year"];
    $TUserStat = $row["Status"];
    $TUserLRN = $row["LRN"];
    $TUserIncLevel = $row["Incoming_Level"];
    $TUserStudPicSize = $row["Student_PicturePath"];
    $TUserFName = $row["FirstName"];
    $TUserMName = $row["MiddleName"];
    $TUserLName = $row["LastName"];
    $TUserGender = $row["Gender"];
    $TUserBPlace = $row["BirthPlace"];
    $TUserBirthday = $row["Birthday"];
    $TUserReligion = $row["Religion"];
    $TUserContNum = $row["ContactNumber"];
    $TUserHomeAddress = $row["HomeAddress"];
    $TUserLastSchool = $row["Last_School_Attended"];
    $TUserEmailad = $row["EmailAddress"];
    $TUserFathersName = $row["Fathers_Full_Name"];
    $TUserFOccupation = $row["Fathers_Occupation"];
    $TUserMothersName = $row["Mothers_Full_Name"];
    $TUserMOccupation = $row["Mothers_Occupation"];
    $TUserEmergCont = $row["Emergency_ContactPerson"];
    $TUserEmergNum = $row["Emergency_ContactNumber"];

    $TUserFullName = ucfirst($TUserFName) . " " . ucfirst($TUserMName) . " " . ucfirst($TUserLName);

    ?>
    <?php echo " 
                        <tr>
                            <td>$TUserEnrollDate</td> " ?>
    <td>
        <div><img class="g1UserStudPic" src="<?php echo $TUserStudPicSize; ?>" </div>
    </td>;
    <?php echo "
                            <td>$TUserFullName</td>
                            <td>$TUserLastSchool</td>
                            <td>$TUserEnrollStat</td>
                           
                            " ?>

    <td>
        <button class="TMoreInfo" dbTUserId="<?php echo $TEnrollment_ID; ?>">More Info</button>
        <!--ang id sa ge click ni user kay ge butang sa button attribute -->
        <button class="TApprove" dbTAUserId="<?php echo $TEnrollment_ID; ?>">Approve</button>

    </td>
    </tr>
<?php } ?>