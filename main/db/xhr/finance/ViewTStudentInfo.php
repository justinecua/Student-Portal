<?php
include('connect2db.php');

if (isset($_POST['TuserId'])) {
    $TuserId = $_POST['TuserId']; //id that was passed using ajax, then the id that we will use for comparison

    $query = ("SELECT * FROM student WHERE Student_ID = '$TuserId'");
    $display = mysqli_query($connect2db, $query);

    $row = mysqli_fetch_assoc($display);
    $MTUserEnrollDate = $row["Enrollment_Date"];
    $MTUserEnrollStat = $row["Enrollment_Status"];
    $MTUserSY = $row["School_year"];
    $MTUserStat = $row["Status"];
    $MTUserLRN = $row["LRN"];
    $MTUserIncLevel = $row["Incoming_Level"];
    $MTUserStudPicSize = $row["Student_PicturePath"];
    $MTUserTOR_Size = $row["TransriptOfRecordPath"];
    $MTUserPSA_Size = $row["PSAPath"];
    $MTUserGoodMoral_Size = $row["GoodMoralPath"];
    $MTUserFName = $row["FirstName"];
    $MTUserMName = $row["MiddleName"];
    $MTUserLName = $row["LastName"];
    $MTUserGender = $row["Gender"];
    $MTUserBPlace = $row["BirthPlace"];
    $MTUserBirthday = $row["Birthday"];
    $MTUserReligion = $row["Religion"];
    $MTUserContNum = $row["ContactNumber"];
    $MTUserHomeAddress = $row["HomeAddress"];
    $MTUserLastSchool = $row["Last_School_Attended"];
    $MTUserEmailad = $row["EmailAddress"];
    $MTUserFathersName = $row["Fathers_Full_Name"];
    $MTUserFOccupation = $row["Fathers_Occupation"];
    $MTUserMothersName = $row["Mothers_Full_Name"];
    $MTUserMOccupation = $row["Mothers_Occupation"];
    $MTUserEmergCont = $row["Emergency_ContactPerson"];
    $MTUserEmergNum = $row["Emergency_ContactNumber"];

    $MTUserFullName = ucfirst($MTUserFName) . " " . ucfirst($MTUserMName) . " " . ucfirst($MTUserLName);
    echo '<h3 class="StudentTItle"> Student Information</h3>';
    echo '<div class="StudentInfoContainer">';
    
    ?>
    <div><img class="Mg1UserStudPic" src="<?php echo $MTUserStudPicSize ?>"></div>
    <?php
    echo '<div class="StudentInfoSubContainer">';
    echo '<div class="NMainStudCont" ><div class="NStudContent"><span>' . $MTUserFullName . '</span></div></div>';
    echo '<br>';
    echo '<div class="MainStudCont" ><div class="StudInfoTitle">Gender:</div><div class="StudContent"><span>' . $MTUserGender . '</span></div></div>';
    echo '<br>';
    echo '<div class="MainStudCont" ><div class="StudInfoTitle">Birthday:</div><div class="StudContent"><span>' . $MTUserBirthday . '</span></div></div>';
    echo '<br>';
    echo '<div class="MainStudCont" ><div class="StudInfoTitle">BirthPlace:</div><div class="StudContent"><span>' . $MTUserBPlace . '</span></div></div>';
    echo '<br>';
    echo '<div class="MainStudCont" ><div class="StudInfoTitle">Religion:</div><div class="StudContent"><span>' . $MTUserReligion . '</span></div></div>';
    echo '<br>';
    echo '<div class="MainStudCont" ><div class="StudInfoTitle">Contact Number:</div><div class="StudContent"><span>' . $MTUserContNum . '</span></div></div>';
    echo '<br>';
    echo '<div class="MainStudCont" ><div class="StudInfoTitle">Enrollment Status:</div><div class="StudContent"><span>' . $MTUserEnrollStat . '</span></div></div>';
    echo '<br>';
    echo '</div>';
    echo '</div>';

    echo '<div class="StudentInfoContainerBottom">';
    echo '<div class="InformationLineCont">';
    echo '<div class="InformationLine"></div>';
    echo '<h5>Other Information</h5>';
    echo '<div class="InformationLine"></div>';
    echo '</div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Enrollment Date:</div><div class="StudContent"><span>' . $MTUserEnrollDate . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Address:</div><div class="StudContent"><span>' . $MTUserHomeAddress . 'sadasdad' . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Last School:</div><div class="StudContent"><span>' . $MTUserLastSchool . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">School Year:</div><div class="StudContent"><span>' . $MTUserSY . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Student Status:</div><div class="StudContent"><span>' . $MTUserStat . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">LRN:</div><div class="StudContent"><span>' . $MTUserLRN . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Incoming Level:</div><div class="StudContent"><span>' . $MTUserIncLevel . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Father`s Name:</div><div class="StudContent"><span>' . $MTUserFathersName . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Father`s Occupation:</div><div class="StudContent"><span>' . $MTUserFOccupation . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Mother`s Name:</div><div class="StudContent"><span>' . $MTUserMName . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Mother`s Occupation:</div><div class="StudContent"><span>' . $MTUserMOccupation . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Emergency Contact Person:</div><div class="StudContent"><span>' . $MTUserEmergCont . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Emergency Number:</div><div class="StudContent"><span>' . $MTUserEmergNum . '</span></div></div>';


    echo '<div class="InformationLineCont">';
    echo '<div class="InformationLine"></div>';
    echo '<h5>Documents</h5>';
    echo '<div class="InformationLine"></div>';
    echo '</div>';
    echo '</div>';
    echo '<div class="StudentInfoDocuments">';

    echo '<a href="' . $MTUserTOR_Size . '" target="_blank"><img src="' . $MTUserTOR_Size . '"></a>';
    echo '<a href="' . $MTUserPSA_Size . '" target="_blank"><img src="' . $MTUserPSA_Size . '"></a>';
    echo '<a href="' . $MTUserGoodMoral_Size . '" target="_blank"><img src="' . $MTUserGoodMoral_Size . '"></a>';
    echo '</div>'; ?>
<?php } else {

    echo "User ID not received.";
}




?>