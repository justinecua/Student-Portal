<?php

if (isset($_POST["SHSsubmitEnrollG1toG10"])) {
    $SHSEnrollmentDate = $_POST["SHSEnrollmentDate"];
    $SHSEnrollmenStatus = "Not Enrolled";
    $SHSSchoolYear = $_POST["SHSSchoolYear"];
    $SHSStatus = $_POST["SHSStatus"];
    $SHSLrn = $_POST["SHSLrn"];
    $SHSIncomingLevel = $_POST["SHSIncomingLevel"];
    $SHSStrand = $_POST["SHSStrand"];
    $SHSFirstName = $_POST["SHSFirstName"];
    $SHSMiddleName = $_POST["SHSMiddleName"];
    $SHSLastName = $_POST["SHSLastName"];
    $SHSGender = $_POST["SHSGender"];
    $SHSBirthPlace = $_POST["SHSBirthPlace"];
    $SHSBirthDay = $_POST["SHSBirthDay"];
    $SHSReligion = $_POST["SHSReligion"];
    $SHSContactNumber = $_POST["SHSContactNumber"];
    $SHSHomeAddress = $_POST["SHSHomeAddress"];
    $SHSLastSchool = $_POST["SHSLastSchool"];
    $SHSEmailAddress = $_POST["SHSEmailAddress"];
    $SHSPassword = $_POST["SHSPassword"];
    $SHSFathersName = $_POST["SHSFathersName"];
    $SHSFathersOcupation = $_POST["SHSFathersOcupation"];
    $SHSMothersName = $_POST["SHSMothersName"];
    $SHSMothersOcupation = $_POST["SHSMothersOcupation"];
    $SHSEmergPerson = $_POST["SHSEmergPerson"];
    $SHSEmergNumber = $_POST["SHSEmergNumber"];

    $SHSstudentPicture = addslashes(file_get_contents($_FILES['SHSstudentPicture']['tmp_name']));
    $SHSForm138 = addslashes(file_get_contents($_FILES['SHSForm138']['tmp_name']));
    $SHSPSA = addslashes(file_get_contents($_FILES['SHSPSA']['tmp_name']));
    $SHSGoodMoral = addslashes(file_get_contents($_FILES['SHSGoodMoral']['tmp_name']));
    $SHSCertCompl = addslashes(file_get_contents($_FILES['SHSCertCompl']['tmp_name']));
    
    
    if (
        !empty($SHSEnrollmentDate && $SHSEnrollmenStatus && $SHSSchoolYear && $SHSStatus && $SHSLrn && $SHSIncomingLevel && $SHSFirstName && $SHSMiddleName && $SHSLastName
        && $SHSGender && $SHSBirthPlace && $SHSBirthDay && $SHSReligion && $SHSContactNumber && $SHSHomeAddress && $SHSLastSchool && $SHSEmailAddress
        && $SHSPassword && $SHSFathersName && $SHSFathersOcupation && $SHSMothersName && $SHSMothersOcupation && $SHSEmergPerson && $SHSEmergNumber)
    ) {
        $uploadDir = "UserUploadsSHS/";
        
        $SHSstudentPictureName = uniqid() . "_SHSstudentPicture.jpg";
        $SHSForm138Name = uniqid() . "_SHSForm138.jpg";
        $SHSPSAName = uniqid() . "_SHSPSA.jpg";
        $SHSGoodMoralName = uniqid() . "_SHSGoodMoral.jpg";
        $SHSCertComplName = uniqid() . "_SHSCertCompl.jpg";
        
        $SHSstudentPicturePath = $uploadDir . $SHSstudentPictureName;
        $SHSForm138Path = $uploadDir . $SHSForm138Name;
        $SHSPSAPath = $uploadDir . $SHSPSAName;
        $SHSGoodMoralPath = $uploadDir . $SHSGoodMoralName;
        $SHSCertComplPath = $uploadDir . $SHSCertComplName;

        move_uploaded_file($_FILES['SHSstudentPicture']['tmp_name'], $SHSstudentPicturePath);
        move_uploaded_file($_FILES['SHSForm138']['tmp_name'], $SHSForm138Path);
        move_uploaded_file($_FILES['SHSPSA']['tmp_name'], $SHSPSAPath);
        move_uploaded_file($_FILES['SHSGoodMoral']['tmp_name'], $SHSGoodMoralPath);
        move_uploaded_file($_FILES['SHSCertCompl']['tmp_name'], $SHSCertComplPath);

        $sqlInsertStudent = ("INSERT INTO student VALUES('', NOW(), '$SHSEnrollmenStatus', '$SHSSchoolYear', 
        '$SHSStatus', '$SHSLrn', '$SHSIncomingLevel', '', '', '', '$SHSstudentPicturePath','', '$SHSForm138Path', '$SHSPSAPath', 
        '$SHSGoodMoralPath', '$SHSCertComplPath', '$SHSFirstName', '$SHSMiddleName', '$SHSLastName',
        '$SHSGender', '$SHSBirthPlace', '$SHSBirthDay', '$SHSReligion', '$SHSContactNumber', '$SHSHomeAddress', '$SHSLastSchool', '$SHSEmailAddress',
        '$SHSPassword', '$SHSFathersName', '$SHSFathersOcupation', '$SHSMothersName', '$SHSMothersOcupation', '$SHSEmergPerson', '$SHSEmergNumber', null)");

        if (mysqli_query($connect2db, $sqlInsertStudent)) {
            $SHSenrollmentSuccessful = true;
        } else {
            $SHSenrollmentSuccessful = false;
        }
    } else {
        $SHSenrollmentSuccessful = false;
    }
}

?>