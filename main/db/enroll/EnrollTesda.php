<?php

if (isset($_POST["TsubmitEnrollG1toG10"])) {
    $TEnrollmentDate = $_POST["TEnrollmentDate"];
    $TEnrollmenStatus = "Not Enrolled";
    $TSchoolYear = $_POST["TSchoolYear"];
    $TStatus = $_POST["TStatus"];
    $TEducAttain = $_POST["TEducAttain"];
    $TNameofCourse = $_POST["TNameofCourse"];
    $TFirstName = $_POST["TFirstName"];
    $TMiddleName = $_POST["TMiddleName"];
    $TLastName = $_POST["TLastName"];
    $TGender = $_POST["TGender"];
    $TBirthPlace = $_POST["TBirthPlace"];
    $TBirthDay = $_POST["TBirthDay"];
    $TReligion = $_POST["TReligion"];
    $TContactNumber = $_POST["TContactNumber"];
    $THomeAddress = $_POST["THomeAddress"];
    $TLastSchool = $_POST["TLastSchool"];
    $TEmailAddress = $_POST["TEmailAddress"];
    $TPassword = $_POST["TPassword"];
    $TFathersName = $_POST["TFathersName"];
    $TFathersOcupation = $_POST["TFathersOcupation"];
    $TMothersName = $_POST["TMothersName"];
    $TMothersOcupation = $_POST["TMothersOcupation"];
    $TEmergPerson = $_POST["TEmergPerson"];
    $TEmergNumber = $_POST["TEmergNumber"];

    $TIdPic = addslashes(file_get_contents($_FILES['TIdPic']['tmp_name']));
    $TTransRec = addslashes(file_get_contents($_FILES['TTransRec']['tmp_name']));
    $TPSA = addslashes(file_get_contents($_FILES['TPSA']['tmp_name']));
    $TGoodMoral = addslashes(file_get_contents($_FILES['TGoodMoral']['tmp_name']));

    if (
        !empty($TEnrollmentDate && $TEnrollmenStatus && $TSchoolYear && $TStatus && $TEducAttain && $TNameofCourse && $TFirstName && 
        $TMiddleName && $TLastName 
        && $TGender && $TBirthPlace && $TBirthDay && $TReligion && $TContactNumber && $THomeAddress && $TLastSchool && $TEmailAddress
        && $TPassword && $TFathersName && $TFathersOcupation && $TMothersName && $TMothersOcupation && $TEmergPerson && $TEmergNumber)
    ) {
        $uploadDir = "UserUploadsT/";
        
        $TIdPicName = uniqid() . "_TstudentPicture.jpg";
        $TTransRecName = uniqid() . "_TForm138.jpg";
        $TPSAName = uniqid() . "_TPSA.jpg";
        $TGoodMoralName = uniqid() . "_TGoodMoral.jpg";
        
        $TIdPicPath = $uploadDir . $TIdPicName;
        $TTransRecPath = $uploadDir . $TTransRecName;
        $TPSAPath = $uploadDir . $TPSAName;
        $TGoodMoralPath = $uploadDir . $TGoodMoralName;

        move_uploaded_file($_FILES['TIdPic']['tmp_name'], $TIdPicPath);
        move_uploaded_file($_FILES['TTransRec']['tmp_name'],  $TTransRecPath);
        move_uploaded_file($_FILES['TPSA']['tmp_name'], $TPSAPath);
        move_uploaded_file($_FILES['TGoodMoral']['tmp_name'], $TGoodMoralPath);

        $sqlInsertStudent = ("INSERT INTO student VALUES('', NOW(), '$TEnrollmenStatus', '$TSchoolYear', 
        '$TStatus', '', '', '$TEducAttain', '$TNameofCourse', '', '$TIdPicPath', '$TTransRecPath','',
        '$TPSAPath','$TGoodMoralPath','','$TFirstName', '$TMiddleName', '$TLastName',
        '$TGender', '$TBirthPlace', '$TBirthDay', '$TReligion', '$TContactNumber', '$THomeAddress', '$TLastSchool', '$TEmailAddress',
        '$TPassword', '$TFathersName', '$TFathersOcupation', '$TMothersName', '$TMothersOcupation', '$TEmergPerson', '$TEmergNumber', null)");

        if (mysqli_query($connect2db, $sqlInsertStudent)) {
            $TenrollmentSuccessful = true;
        } else {
            $TenrollmentSuccessful = false;
        }
    } else {
        $TenrollmentSuccessful = false;
    }
}

?>