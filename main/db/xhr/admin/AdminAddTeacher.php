<?php
include('../../connect/connect2db.php');
$QueryNotif = "";

if (
    isset($_FILES['TFProfilePic'], $_POST["TFFirstName"], $_POST["TFMiddleName"], $_POST["TFLastName"], $_POST["TFAge"], $_POST["TFBirthday"],
    $_POST["TFContNum"], $_POST["TFHomeAd"], $_POST["TFEmailAd"], $_POST["TFPassword"])
) {
    $TFFirstName = $_POST["TFFirstName"];
    $TFMiddleName = $_POST["TFMiddleName"];
    $TFLastName = $_POST["TFLastName"];
    $TFAge = $_POST["TFAge"];
    $TFBirthday = $_POST["TFBirthday"];
    $TFContNum = $_POST["TFContNum"];
    $TFHomeAd = $_POST["TFHomeAd"];
    $TFEmailAd = $_POST["TFEmailAd"];
    $TFPassword = $_POST["TFPassword"];
    $AccTypeTeacher = "4";

    $TFProfilePic = $_FILES["TFProfilePic"];
    $TFProfilePicName = uniqid() . "_TFProfilePic.jpg";
    $uploadDir = "TeacherUploads/";
    $TFProfilePicPath = $uploadDir . $TFProfilePicName;

    if (
        !empty($TFFirstName) && !empty($TFMiddleName) && !empty($TFLastName) && !empty($TFAge) && !empty($TFBirthday)
        && !empty($TFContNum) && !empty($TFHomeAd) && !empty($TFEmailAd) && !empty($TFPassword) && $TFProfilePic
    ) {
        if (move_uploaded_file($TFProfilePic['tmp_name'], $TFProfilePicPath)) {
            $tquery = "SELECT MAX(ID_Number) as tmaxSchoolID FROM accounts WHERE AccountType_ID='4'";
            $tresult = mysqli_query($connect2db, $tquery);
            $trow = mysqli_fetch_assoc($tresult);
            $tmaxSchoolID = $trow['tmaxSchoolID'];

            $tnum = (int) substr($tmaxSchoolID, 7) + 1;
            while ($tnum <= 1000) {
                $tSchoolID = "CHST-" . sprintf("%03d", $tnum);

                $checkQuery = "SELECT * FROM accounts WHERE ID_Number='$tSchoolID'";
                $checkResult = mysqli_query($connect2db, $checkQuery);

                if (mysqli_num_rows($checkResult) == 0) {
                    break;
                }

                $tnum++;
            }

            $sqlInsertTeacher = "INSERT INTO teachers 
                VALUES(NULL, '$TFProfilePicPath', '$TFFirstName', '$TFMiddleName', '$TFLastName', '$TFAge', '$TFBirthday', '$TFContNum', '$TFHomeAd', '$TFEmailAd')";

            if (mysqli_query($connect2db, $sqlInsertTeacher)) {
                $teacherID = mysqli_insert_id($connect2db);

                $sqlInsertAccount = "INSERT INTO accounts 
                    VALUES('', NULL, '$teacherID', '$tSchoolID', '$TFPassword', NOW(), '$AccTypeTeacher')";

                if (!mysqli_query($connect2db, $sqlInsertAccount)) {
                    echo "Error creating account: " . mysqli_error($connect2db);
                } else {
                    echo $QueryNotif = "Teacher Added Successfully";
                }
            } else {
                echo "Error: " . mysqli_error($connect2db);
            }
        } else {
            echo "Error moving uploaded file.";
        }
    } else {
        echo "Error: Please fill in all required fields.";
    }
}
?>
