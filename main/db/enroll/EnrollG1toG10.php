<?php

if (isset($_POST["submitEnrollG1toG10"])) {
    $KEnrollmentDate = $_POST["KEnrollmentDate"];
    $KEnrollmenStatus = "Not Enrolled";
    $KSchoolYear = $_POST["KSchoolYear"];
    $KStatus = $_POST["KStatus"];
    $KLrn = $_POST["KLrn"];
    $KIncomingLevel = $_POST["KIncomingLevel"];
    $KFirstName = $_POST["KFirstName"];
    $KMiddleName = $_POST["KMiddleName"];
    $KLastName = $_POST["KLastName"];
    $KGender = $_POST["KGender"];
    $KBirthPlace = $_POST["KBirthPlace"];
    $KBirthDay = $_POST["KBirthDay"];
    $KReligion = $_POST["KReligion"];
    $KContactNumber = $_POST["KContactNumber"];
    $KHomeAddress = $_POST["KHomeAddress"];
    $KLastSchool = $_POST["KLastSchool"];
    $KEmailAddress = $_POST["KEmailAddress"];
    $KPassword = $_POST["KPassword"];
    $KFathersName = $_POST["KFathersName"];
    $KFathersOcupation = $_POST["KFathersOcupation"];
    $KMothersName = $_POST["KMothersName"];
    $KMothersOcupation = $_POST["KMothersOcupation"];
    $KEmergPerson = $_POST["KEmergPerson"];
    $KEmergNumber = $_POST["KEmergNumber"];

    $KstudentPicture = addslashes(file_get_contents($_FILES['KstudentPicture']['tmp_name']));
    $KForm138 = addslashes(file_get_contents($_FILES['KForm138']['tmp_name']));
    $KPSA = addslashes(file_get_contents($_FILES['KPSA']['tmp_name']));
    $KGoodMoral = addslashes(file_get_contents($_FILES['KGoodMoral']['tmp_name']));

    if (
        !empty($KEnrollmentDate && $KEnrollmenStatus && $KSchoolYear && $KStatus && $KLrn && $KIncomingLevel && $KFirstName && $KMiddleName && $KLastName
        && $KGender && $KBirthPlace && $KBirthDay && $KReligion && $KContactNumber && $KHomeAddress && $KLastSchool && $KEmailAddress
        && $KPassword && $KFathersName && $KFathersOcupation && $KMothersName && $KMothersOcupation && $KEmergPerson && $KEmergNumber)
    ) {
        $uploadDir = "UserUploads/";

        //unique names
        $KstudentPictureName = uniqid() . "_KstudentPicture.jpg";
        $KForm138Name = uniqid() . "_KForm138.jpg";
        $KPSAName = uniqid() . "_KPSA.jpg";
        $KGoodMoralName = uniqid() . "_KGoodMoral.jpg";

        //file path
        $KstudentPicturePath = $uploadDir . $KstudentPictureName;
        $KForm138Path = $uploadDir . $KForm138Name;
        $KPSAPath = $uploadDir . $KPSAName;
        $KGoodMoralPath = $uploadDir . $KGoodMoralName;

        // Move the uploaded files to the specified directory
        move_uploaded_file($_FILES['KstudentPicture']['tmp_name'], $KstudentPicturePath);
        move_uploaded_file($_FILES['KForm138']['tmp_name'], $KForm138Path);
        move_uploaded_file($_FILES['KPSA']['tmp_name'], $KPSAPath);
        move_uploaded_file($_FILES['KGoodMoral']['tmp_name'], $KGoodMoralPath);

        $sqlInsertStudent = ("INSERT INTO student VALUES('', NOW(), '$KEnrollmenStatus', '$KSchoolYear', 
        '$KStatus', '$KLrn', '$KIncomingLevel', '', '', '','$KstudentPicturePath','', '$KForm138Path',
        '$KPSAPath','$KGoodMoralPath','','$KFirstName', '$KMiddleName', '$KLastName',
        '$KGender', '$KBirthPlace', '$KBirthDay', '$KReligion', '$KContactNumber', '$KHomeAddress', '$KLastSchool', '$KEmailAddress',
        '$KPassword', '$KFathersName', '$KFathersOcupation', '$KMothersName', '$KMothersOcupation', '$KEmergPerson', '$KEmergNumber', null)");

        if (mysqli_query($connect2db, $sqlInsertStudent)) {
            $KenrollmentSuccessful = true;

        } else {
            $KenrollmentSuccessful = false;
        }
    } else {
        $KenrollmentSuccessful = false;
    }
}

?>