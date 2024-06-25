<?php
include('connect2db.php');

if (isset($_POST['SHSuserId'])) {
    $SHSuserId = $_POST['SHSuserId']; //id that was passed using ajax, then the id that we will use for comparison

    $query = ("SELECT * FROM student WHERE Student_ID = '$SHSuserId'");
    $display = mysqli_query($connect2db, $query);

    $row = mysqli_fetch_assoc($display);

    $MSHSUserEnrollDate = $row["Enrollment_Date"];
    $MSHSUserEnrollStat = $row["Enrollment_Status"];
    $MSHSUserSY = $row["School_year"];
    $MSHSUserStat = $row["Status"];
    $MSHSUserLRN = $row["LRN"];
    $MSHSUserIncLevel = $row["Incoming_Level"];
    $MSHSUserStudPicSize = $row["Student_PicturePath"];
    $MSHSUserForm138_Size = $row["Form138Path"];
    $MSHSUserPSA_Size = $row["PSAPath"];
    $MSHSUserGoodMoral_Size = $row["GoodMoralPath"];
    $MSHSUserCert_Size = $row["Cert_Of_CompletionPath"];
    $MSHSUserFName = $row["FirstName"];
    $MSHSUserMName = $row["MiddleName"];
    $MSHSUserLName = $row["LastName"];
    $MSHSUserGender = $row["Gender"];
    $MSHSUserBPlace = $row["BirthPlace"];
    $MSHSUserBirthday = $row["Birthday"];
    $MSHSUserReligion = $row["Religion"];
    $MSHSUserContNum = $row["ContactNumber"];
    $MSHSUserHomeAddress = $row["HomeAddress"];
    $MSHSUserLastSchool = $row["Last_School_Attended"];
    $MSHSUserEmailad = $row["EmailAddress"];
    $MSHSUserFathersName = $row["Fathers_Full_Name"];
    $MSHSUserFOccupation = $row["Fathers_Occupation"];
    $MSHSUserMothersName = $row["Mothers_Full_Name"];
    $MSHSUserMOccupation = $row["Mothers_Occupation"];
    $MSHSUserEmergCont = $row["Emergency_ContactPerson"];
    $MSHSUserEmergNum = $row["Emergency_ContactNumber"];

    $MSHSUserFullName = ucfirst($MSHSUserFName) . " " . ucfirst($MSHSUserMName) . " " . ucfirst($MSHSUserLName);
    echo '<h3 class="StudentTItle"> Student Information</h3>';
    echo '<div class="StudentInfoContainer">';

    ?>
    <div><img class="Mg1UserStudPic" src="<?php echo $MSHSUserStudPicSize ?>"></div>
    <?php
    echo '<div class="StudentInfoSubContainer">';
    echo '<div class="NMainStudCont" ><div class="NStudContent"><span>' . $MSHSUserFullName . '</span></div></div>';
    echo '<br>';
    echo '<div class="MainStudCont" ><div class="StudInfoTitle">Gender:</div><div class="StudContent"><span>' . $MSHSUserGender . '</span></div></div>';
    echo '<br>';
    echo '<div class="MainStudCont" ><div class="StudInfoTitle">Birthday:</div><div class="StudContent"><span>' . $MSHSUserBirthday . '</span></div></div>';
    echo '<br>';
    echo '<div class="MainStudCont" ><div class="StudInfoTitle">BirthPlace:</div><div class="StudContent"><span>' . $MSHSUserBPlace . '</span></div></div>';
    echo '<br>';
    echo '<div class="MainStudCont" ><div class="StudInfoTitle">Religion:</div><div class="StudContent"><span>' . $MSHSUserReligion . '</span></div></div>';
    echo '<br>';
    echo '<div class="MainStudCont" ><div class="StudInfoTitle">Contact Number:</div><div class="StudContent"><span>' . $MSHSUserContNum . '</span></div></div>';
    echo '<br>';
    echo '<div class="MainStudCont" ><div class="StudInfoTitle">Enrollment Status:</div><div class="StudContent"><span>' . $MSHSUserEnrollStat . '</span></div></div>';
    echo '<br>';
    echo '</div>';
    echo '</div>';

    echo '<div class="StudentInfoContainerBottom">';
    echo '<div class="InformationLineCont">';
    echo '<div class="InformationLine"></div>';
    echo '<h5>Other Information</h5>';
    echo '<div class="InformationLine"></div>';
    echo '</div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Enrollment Date:</div><div class="StudContent"><span>' . $MSHSUserEnrollDate . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Address:</div><div class="StudContent"><span>' . $MSHSUserHomeAddress . 'sadasdad' . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Last School:</div><div class="StudContent"><span>' . $MSHSUserLastSchool . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">School Year:</div><div class="StudContent"><span>' . $MSHSUserSY . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Student Status:</div><div class="StudContent"><span>' . $MSHSUserStat . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">LRN:</div><div class="StudContent"><span>' . $MSHSUserLRN . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Incoming Level:</div><div class="StudContent"><span>' . $MSHSUserIncLevel . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Father`s Name:</div><div class="StudContent"><span>' . $MSHSUserFathersName . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Father`s Occupation:</div><div class="StudContent"><span>' . $MSHSUserFOccupation . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Mother`s Name:</div><div class="StudContent"><span>' . $MSHSUserMName . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Mother`s Occupation:</div><div class="StudContent"><span>' . $MSHSUserMOccupation . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Emergency Contact Person:</div><div class="StudContent"><span>' . $MSHSUserEmergCont . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Emergency Number:</div><div class="StudContent"><span>' . $MSHSUserEmergNum . '</span></div></div>';


    echo '<div class="InformationLineCont">';
    echo '<div class="InformationLine"></div>';
    echo '<h5>Documents</h5>';
    echo '<div class="InformationLine"></div>';
    echo '</div>';
    echo '</div>';
    echo '<div class="StudentInfoDocuments">';

    echo '<a href="' . $MSHSUserForm138_Size . '" target="_blank"><img src="' . $MSHSUserForm138_Size . '"></a>';
    echo '<a href="' . $MSHSUserPSA_Size . '" target="_blank"><img src="' . $MSHSUserPSA_Size . '"></a>';
    echo '<a href="' . $MSHSUserGoodMoral_Size . '" target="_blank"><img src="' . $MSHSUserGoodMoral_Size . '"></a>';
    echo '<a href="' . $MSHSUserCert_Size . '" target="_blank"><img src="' . $MSHSUserCert_Size . '"></a>';
    echo '</div>'; ?>
<?php } else {

    echo "User ID not received.";
}

?>