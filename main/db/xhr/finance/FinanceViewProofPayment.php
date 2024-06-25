<?php
include('connect2db.php');

if (isset($_POST['userId']) && isset($_POST['paymentId'])) {
    $userId = $_POST['userId'];
    $paymentId = $_POST['paymentId'];

    $query = "SELECT student.*, payments.*, accounts.*
              FROM payments
              LEFT JOIN student ON payments.Student_ID = student.Student_ID
              LEFT JOIN accounts ON student.Student_Id = accounts.Student_ID
              WHERE payments.payment_stat = 'Pending' 
              AND payments.payment_id = $paymentId";

    $display = mysqli_query($connect2db, $query);

    $row = mysqli_fetch_assoc($display);

    $MG1UserEnrollDate = $row["Enrollment_Date"];
    $MG1UserEnrollStat = $row["Enrollment_Status"];
    $MG1UserSY = $row["School_year"];
    $MG1UserStat = $row["Status"];
    $MG1UserLRN = $row["LRN"];
    $MG1UserIncLevel = $row["Incoming_Level"];
    $MG1UserStudPicSize = $row["Student_PicturePath"];
    $MG1UserGoodMoral_Size = $row["GoodMoralPath"];
    $MG1UserFName = $row["FirstName"];
    $MG1UserMName = $row["MiddleName"];
    $MG1UserLName = $row["LastName"];
    $MG1UserGender = $row["Gender"];
    $MG1UserBPlace = $row["BirthPlace"];
    $MG1UserBirthday = $row["Birthday"];
    $MG1UserReligion = $row["Religion"];
    $MG1UserContNum = $row["ContactNumber"];
    $StudEmail = $row['EmailAddress'];
    $payment_proof = $row['payment_proof'];
    $ID_Number = $row["ID_Number"];

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
    echo '<div class="MainStudCont" ><div class="StudInfoTitle">Grade Level:</div><div class="StudContent"><span>' . $MG1UserIncLevel . '</span></div></div>';
    echo '<br>';
    echo '<div class="MainStudCont" ><div class="StudInfoTitle">Contact Number:</div><div class="StudContent"><span>' . $MG1UserContNum . '</span></div></div>';
    echo '<br>';
    echo '<div class="MainStudCont" ><div class="StudInfoTitle">ID Number:</div><div class="StudContent"><span>' . $ID_Number . '</span></div></div>';
    echo '<br>';
    echo '</div>';
    echo '</div>';

    echo '<div class="StudentInfoContainerBottom">';

    echo '<div class="InformationLineCont">';
    echo '<div class="InformationLine"></div>';
    echo '<h5>Attached Receipt</h5>';
    echo '<div class="InformationLine"></div>';
    echo '</div>';
    echo '</div>';
    echo '<div class="StudentInfoDocuments2">';
    
    echo '<div class="DocStudEnroll"><a href="' . $payment_proof . '" target="_blank"><img src="' . $payment_proof . '"></a><span>Receipt</span></div>';
    
    ?>
    <?php 
   
    echo '</div>'; ?>
<?php } else {

    echo "User ID not received.";
}


?>