<?php

include("connect2db.php");

$getSHStoSHS0PE = mysqli_query($connect2db, "SELECT * FROM student WHERE Enrollment_Status = 'Pending' AND Incoming_Level IN
                     ('Grade 11', 'Grade 12')");
while ($row = mysqli_fetch_assoc($getSHStoSHS0PE)) {
    $SHSEnrollment_ID = $row["Student_ID"];
    $SHSUserEnrollDate = $row["Enrollment_Date"];
    $SHSUserEnrollStat = $row["Enrollment_Status"];
    $SHSUserSY = $row["School_year"];
    $SHSUserStat = $row["Status"];
    $SHSUserLRN = $row["LRN"];
    $SHSUserIncLevel = $row["Incoming_Level"];
    $SHSUserStudPicSize = $row["Student_PicturePath"];
    $SHSUserFName = $row["FirstName"];
    $SHSUserMName = $row["MiddleName"];
    $SHSUserLName = $row["LastName"];
    $SHSUserGender = $row["Gender"];
    $SHSUserBPlace = $row["BirthPlace"];
    $SHSUserBirthday = $row["Birthday"];
    $SHSUserReligion = $row["Religion"];
    $SHSUserContNum = $row["ContactNumber"];
    $SHSUserHomeAddress = $row["HomeAddress"];
    $SHSUserLastSchool = $row["Last_School_Attended"];
    $SHSUserEmailad = $row["EmailAddress"];
    $SHSUserFathersName = $row["Fathers_Full_Name"];
    $SHSUserFOccupation = $row["Fathers_Occupation"];
    $SHSUserMothersName = $row["Mothers_Full_Name"];
    $SHSUserMOccupation = $row["Mothers_Occupation"];
    $SHSUserEmergCont = $row["Emergency_ContactPerson"];
    $SHSUserEmergNum = $row["Emergency_ContactNumber"];

    $SHSUserFullName = ucfirst($SHSUserFName) . " " . ucfirst($SHSUserMName) . " " . ucfirst($SHSUserLName);

    ?>
    <?php echo " 
                        <tr>
                            <td>$SHSUserEnrollDate</td> " ?>
       <td><div><img class="g1UserStudPic" src="<?php echo $SHSUserStudPicSize; ?>" </div></td>; 
    <?php echo "
                            <td>$SHSUserFullName</td>
                            <td>$SHSUserLastSchool</td>
                            <td>$SHSUserEnrollStat</td>
                            
                    " ?>
    <td>
        <button class="SHSMoreInfo" dbSHSUserId="<?php echo $SHSEnrollment_ID; ?>">More Info</button>
        <!--ang id sa ge click ni user kay ge butang sa button attribute -->
        <button class="SHSApprove" dbSHSAUserId="<?php echo $SHSEnrollment_ID; ?>">Approve</button>

    </td>
    </tr>
<?php } ?>