<?php
include('connect2db.php');

if (isset($_POST['userId'])) {
    $userId = $_POST['userId']; //id that was passed using ajax, then the id that we will use for comparison

    $query = ("SELECT * FROM student WHERE Student_ID = '$userId'");
    $display = mysqli_query($connect2db, $query);

    $row = mysqli_fetch_assoc($display);

    $MG1UserEnrollDate = $row["Enrollment_Date"];
    $MG1UserEnrollStat = $row["Enrollment_Status"];
    $MG1UserSY = $row["School_year"];
    $MG1UserStat = $row["Status"];
    $MG1UserLRN = $row["LRN"];
    $MG1UserIncLevel = $row["Incoming_Level"];
    $MG1UserStudPicSize = $row["Student_PicturePath"];
    $MG1UserForm138_Size = $row["Form138Path"];
    $MG1UserPSA_Size = $row["PSAPath"];
    $MG1UserGoodMoral_Size = $row["GoodMoralPath"];
    $MG1UserFName = $row["FirstName"];
    $MG1UserMName = $row["MiddleName"];
    $MG1UserLName = $row["LastName"];
    $MG1UserGender = $row["Gender"];
    $MG1UserBPlace = $row["BirthPlace"];
    $MG1UserBirthday = $row["Birthday"];
    $MG1UserReligion = $row["Religion"];
    $MG1UserContNum = $row["ContactNumber"];
    $MG1UserHomeAddress = $row["HomeAddress"];
    $MG1UserLastSchool = $row["Last_School_Attended"];
    $MG1UserEmailad = $row["EmailAddress"];
    $MG1UserFathersName = $row["Fathers_Full_Name"];
    $MG1UserFOccupation = $row["Fathers_Occupation"];
    $MG1UserMothersName = $row["Mothers_Full_Name"];
    $MG1UserMOccupation = $row["Mothers_Occupation"];
    $MG1UserEmergCont = $row["Emergency_ContactPerson"];
    $MG1UserEmergNum = $row["Emergency_ContactNumber"];

    $MG1UserFullName = ucfirst($MG1UserFName) . " " . ucfirst($MG1UserMName) . " " . ucfirst($MG1UserLName);
    echo '<h3 class="StudentTItle"> Student Information</h3>';
    echo '<div class="StudentInfoContainer">';

    ?>
    <div><img class="Mg1UserStudPic" src="<?php echo $MG1UserStudPicSize ?>"></div>
    
    <?php
    echo '<div class="StudentInfoSubContainer">';
    echo '<div class="NMainStudCont" ><div class="NStudContent"><span>' . $MG1UserFullName . '</span></div></div>';
    echo '<br>';
    echo '<div class="MainStudCont" ><div class="StudInfoTitle">Gender:</div><div class="StudContent"><span>' . $MG1UserGender . '</span></div></div>';
    echo '<br>';
    echo '<div class="MainStudCont" ><div class="StudInfoTitle">Birthday:</div><div class="StudContent"><span>' . $MG1UserBirthday . '</span></div></div>';
    echo '<br>';
    echo '<div class="MainStudCont" ><div class="StudInfoTitle">BirthPlace:</div><div class="StudContent"><span>' . $MG1UserBPlace . '</span></div></div>';
    echo '<br>';
    echo '<div class="MainStudCont" ><div class="StudInfoTitle">Religion:</div><div class="StudContent"><span>' . $MG1UserReligion . '</span></div></div>';
    echo '<br>';
    echo '<div class="MainStudCont" ><div class="StudInfoTitle">Contact Number:</div><div class="StudContent"><span>' . $MG1UserContNum . '</span></div></div>';
    echo '<br>';
    echo '<div class="MainStudCont" ><div class="StudInfoTitle">Enrollment Status:</div><div class="StudContent"><span>' . $MG1UserEnrollStat . '</span></div></div>';
    echo '<br>';
    echo '</div>';
    echo '</div>';

    echo '<div class="StudentInfoContainerBottom">';
    echo '<div class="InformationLineCont">';
    echo '<div class="InformationLine"></div>';
    echo '<h5>Other Information</h5>';
    echo '<div class="InformationLine"></div>';
    echo '</div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Enrollment Date:</div><div class="StudContent"><span>' . $MG1UserEnrollDate . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Address:</div><div class="StudContent"><span>' . $MG1UserHomeAddress . 'sadasdad' . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Last School:</div><div class="StudContent"><span>' . $MG1UserLastSchool . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">School Year:</div><div class="StudContent"><span>' . $MG1UserSY . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Student Status:</div><div class="StudContent"><span>' . $MG1UserStat . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">LRN:</div><div class="StudContent"><span>' . $MG1UserLRN . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Incoming Level:</div><div class="StudContent"><span>' . $MG1UserIncLevel . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Father`s Name:</div><div class="StudContent"><span>' . $MG1UserFathersName . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Father`s Occupation:</div><div class="StudContent"><span>' . $MG1UserFOccupation . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Mother`s Name:</div><div class="StudContent"><span>' . $MG1UserMName . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Mother`s Occupation:</div><div class="StudContent"><span>' . $MG1UserMOccupation . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Emergency Contact Person:</div><div class="StudContent"><span>' . $MG1UserEmergCont . '</span></div></div>';
    echo '<div class="BMainStudCont" ><div class="BStudInfoTitle">Emergency Number:</div><div class="StudContent"><span>' . $MG1UserEmergNum . '</span></div></div>';


    echo '<div class="InformationLineCont">';
    echo '<div class="InformationLine"></div>';
    echo '<h5>Documents</h5>';
    echo '<div class="InformationLine"></div>';
    echo '</div>';
    echo '</div>';
    echo '<div class="StudentInfoDocuments">';

    echo '<a href="' . $MG1UserForm138_Size . '" target="_blank"><img src="' . $MG1UserForm138_Size . '"></a>';
    echo '<a href="' . $MG1UserPSA_Size . '" target="_blank"><img src="' . $MG1UserPSA_Size . '"></a>';
    echo '<a href="' . $MG1UserGoodMoral_Size . '" target="_blank"><img src="' . $MG1UserGoodMoral_Size . '"></a>';
    echo '</div>'; ?>
<?php } else {

    echo "User ID not received.";
}


?>