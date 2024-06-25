<?php
include('connect2db.php');

if (
    isset($_POST['UserStudentID'], $_POST['PFFName'], $_POST["PFMName"], $_POST["PFLName"], $_POST["PFGender"],
    $_POST["PFBplace"], $_POST["PFReligion"], $_POST['PFLastSchool'], $_POST['PFContNum'], $_POST["PFEmail"],
    $_POST["PFFathersName"], $_POST["PFFathOccu"], $_POST["PFMothersName"], $_POST["PFMothOccu"], $_POST["PFEmergPers"],
    $_POST["PFEmergCont"], $_POST['PFHomeAd'])
) {
    $UserStudentID = $_POST['UserStudentID'];
    $PFFName = $_POST['PFFName'];
    $PFMName = $_POST["PFMName"];
    $PFLName = $_POST["PFLName"];
    $PFGender = $_POST["PFGender"];
    $PFBplace = $_POST["PFBplace"];
    $PFReligion = $_POST["PFReligion"];
    $PFHomeAd = $_POST['PFHomeAd'];
    $PFLastSchool = $_POST['PFLastSchool'];
    $PFContNum = $_POST['PFContNum'];
    $PFEmail = $_POST["PFEmail"];
    $PFFathersName = $_POST["PFFathersName"];
    $PFFathOccu = $_POST["PFFathOccu"];
    $PFMothersName = $_POST["PFMothersName"];
    $PFMothOccu = $_POST["PFMothOccu"];
    $PFEmergPers = $_POST["PFEmergPers"];
    $PFEmergCont = $_POST["PFEmergCont"];

    $insertStudSec = "UPDATE student SET 
    FirstName='$PFFName', MiddleName ='$PFMName', LastName = '$PFLName', Gender = '$PFGender', BirthPlace='$PFBplace',
    Religion='$PFReligion', ContactNumber = '$PFContNum', HomeAddress = '$PFHomeAd', Last_School_Attended = '$PFLastSchool', EmailAddress = '$PFEmail',
     Fathers_Full_Name='$PFFathersName', Fathers_Occupation = '$PFFathOccu', Mothers_Full_Name = '$PFMothersName',
    Mothers_Occupation = '$PFMothOccu', Emergency_ContactPerson = '$PFEmergPers', Emergency_ContactNumber = '$PFEmergCont'
    WHERE Student_ID = '$UserStudentID'";
    mysqli_query($connect2db, $insertStudSec);

    echo "Updated Successfully";
}
?>
