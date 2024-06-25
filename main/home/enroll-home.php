<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$KenrollmentSuccessful = false;
$SHSenrollmentSuccessful = false;
$TenrollmentSuccessful = false;

include ("../db/connect/connect2db.php");
include ("../db/enroll/EnrollG1toG10.php");
include ("../db/enroll/EnrollSHS.php");
include ("../db/enroll/EnrollTesda.php");
?>

<?php
$getSY = mysqli_query($connect2db, "SELECT * FROM schoolyear WHERE SchoolYearStatus = 'Selected'");
while ($row = mysqli_fetch_assoc($getSY)) {
    $SchoolYear = $row['SchoolYear'];
}

?>
      <!-------------------------------Enrollment For Kindergarten ---------------------------------------->

        <?php


        if ($KenrollmentSuccessful) {
            echo '<div class="Kpopup">
            <div class="KpopupCont">
            <img src="../../images/check.png" width="110"; height="110";></div>
            <span id="KSuccessTitle">Enrollment Form Sent!</span>
            <span id="KSuccessSubTitle">For your enrollment to be considered official, kindly pay a minimum down payment
            of &#8369;1000 to the Finance</span>
            </div>';
        }

        if ($SHSenrollmentSuccessful) {
            echo '<div class="SHSpopup">
            <div class="SHSpopupCont">
            <img src="../../images/check.png" width="110"; height="110";></div>
            <span id="SHSSuccessTitle">Enrollment Form Sent!</span>
            <span id="SHSSuccessSubTitle">For your enrollment to be considered official, kindly pay a minimum down payment
            of &#8369;1000 to the Finance</span>
            </div>';
        }

        if ($TenrollmentSuccessful) {
            echo '<div class="Tpopup">
            <div class="TpopupCont">
            <img src="../../images/check.png" width="110"; height="110";></div>
            <span id="TSuccessTitle">Enrollment Form Sent!</span>
            <span id="TSuccessSubTitle">For your enrollment to be considered official, kindly pay a minimum down payment
            of &#8369;1000 to the Finance</span>
            </div>';
        }


        ?>
    <!--pop up for images -->
    <div id="overlayStudPic">
        <div id="ModalViewImageStudPic">
            <div id="ModalViewImageStudPicSubContainer">
                <img id="imageToDisplayStudPic">
                <div id="closeModalViewImageStudPic">&times;</div>
            </div>
        </div>
    </div>

    <div id="overlayForm138">
        <div id="ModalViewImageForm138">
            <div id="ModalViewImageForm138SubContainer">
                <img id="imageToDisplayForm138">
                <button id="closeModalViewImageForm138">&times;</button>
            </div>
        </div>
    </div>

    <div id="overlayPSA">
        <div id="ModalViewImagePSA">
            <div id="ModalViewImagePSASubContainer">
                <img id="imageToDisplayPSA">
                <button id="closeModalViewImagePSA">&times;</button>
            </div>
        </div>
    </div>

    <div id="overlayGoodMoral">
        <div id="ModalViewImageGoodMoral">
            <div id="ModalViewImageGoodMoralSubContainer">
                <img id="imageToDisplayGoodMoral">
                <button id="closeModalViewImageGoodMoral">&times;</button>
            </div>
        </div>
    </div>

    <!--pop up for SHS images -->
    <div id="SHSoverlayStudPic">
        <div id="SHSModalViewImageStudPic">
            <div id="SHSModalViewImageStudPicSubContainer">
                <img id="SHSimageToDisplayStudPic">
                <div id="SHScloseModalViewImageStudPic">&times;</div>
            </div>
        </div>
    </div>

    <div id="SHSoverlayForm138">
        <div id="SHSModalViewImageForm138">
            <div id="SHSModalViewImageForm138SubContainer">
                <img id="SHSimageToDisplayForm138">
                <button id="SHScloseModalViewImageForm138">&times;</button>
            </div>
        </div>
    </div>

    <div id="SHSoverlayPSA">
        <div id="SHSModalViewImagePSA">
            <div id="SHSModalViewImagePSASubContainer">
                <img id="SHSimageToDisplayPSA">
                <button id="SHScloseModalViewImagePSA">&times;</button>
            </div>
        </div>
    </div>

    <div id="SHSoverlayGoodMoral">
        <div id="SHSModalViewImageGoodMoral">
            <div id="SHSModalViewImageGoodMoralSubContainer">
                <img id="SHSimageToDisplayGoodMoral">
                <button id="SHScloseModalViewImageGoodMoral">&times;</button>
            </div>
        </div>
    </div>

    <div id="SHSoverlayCertCompl">
        <div id="SHSModalViewImageCertCompl">
            <div id="SHSModalViewImageCertComplSubContainer">
                <img id="SHSimageToDisplayCertCompl">
                <button id="SHScloseModalViewImageCertCompl">&times;</button>
            </div>
        </div>
    </div>

    <!--pop up for Tesda images -->
    <div id="ToverlayIdPic">
        <div id="TModalViewImageIdPic">
            <div id="TModalViewImageIdPicSubContainer">
                <img id="TimageToDisplayIdPic">
                <div id="TcloseModalViewImageIdPic">&times;</div>
            </div>
        </div>
    </div>

    <div id="ToverlayTransRec">
        <div id="TModalViewImageTransRec">
            <div id="TModalViewImageTransRecSubContainer">
                <img id="TimageToDisplayTransRec">
                <button id="TcloseModalViewImageTransRec">&times;</button>
            </div>
        </div>
    </div>

    <div id="ToverlayPSA">
        <div id="TModalViewImagePSA">
            <div id="TModalViewImagePSASubContainer">
                <img id="TimageToDisplayPSA">
                <button id="TcloseModalViewImagePSA">&times;</button>
            </div>
        </div>
    </div>

    <div id="ToverlayGoodMoral">
        <div id="TModalViewImageGoodMoral">
            <div id="TModalViewImageGoodMoralSubContainer">
                <img id="TimageToDisplayGoodMoral">
                <button id="TcloseModalViewImageGoodMoral">&times;</button>
            </div>
        </div>
    </div>

      <div id="Kinderbackground">
            <div class="Kindertitle">
                <h3>G1 - G10 Enrollment Form</h3>
            </div>

            <form id="enrollmentForm" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">

                <div class="KEnrollmentContainer">
                        <div class="FirstReq">
                            <div class="FirstReqPart1">
                                <div class="FirstReqPart1Cont">
                                    <label id="KEnrollmentDateLabel" for="KEnrollmentDate">Date:</label>
                                    <input type="text" name="KEnrollmentDate" id="KEnrollmentDate">
                                    <label id="KSchoolYearLabel" for="KSchoolYear">School Year:</label>
                                    <input type="text" name="KSchoolYear" id="KSchoolYear" value="<?php echo $SchoolYear; ?>">
                                </div>
                            </div>
                            <div class="FirstReqPart2">
                                <div class="FirstReqPart2Cont"> 
                                    <label for="KLrn">LRN:</label>
                                    <input type="text" name="KLrn" id="KLrn">
                                    <label for="KStatus">Status:</label>
                                    <select name="KStatus" id="KStatus">
                                        <option value="New">New</option>
                                        <option value="Transferee">Transferee</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="FirstReqPart3">
                            <div class="FirstReqPart3Cont">
                                <label for="KIncomingLevel">Incoming Level</label>
                                <select name="KIncomingLevel" id="KIncomingLevel">
                                    <option value="Grade 1">Grade 1</option>
                                    <option value="Grade 2">Grade 2</option>
                                    <option value="Grade 3">Grade 3</option>
                                    <option value="Grade 4">Grade 4</option>
                                    <option value="Grade 5">Grade 5</option>
                                    <option value="Grade 6">Grade 6</option>
                                    <option value="Grade 7">Grade 7</option>
                                    <option value="Grade 8">Grade 8</option>
                                    <option value="Grade 9">Grade 9</option>
                                    <option value="Grade 10">Grade 10</option>
                                </select>
                            </div>
                        </div>
               
                    <div class="kline"></div>

                    <div class="KphotoRequirements">
                        <!-------------------------------KStudent Picture ---------------------------------------->
                        <div class="KstudentPicture">
                            <span id="KstudPicSpan">Student`s Picture</span>
                            <div class="Kbutton">
                                <button type="button" id="KstudPic">Upload</button>
                                <input id="inputKstudPic" type="file" name="KstudentPicture" style="display:none" ;>
                            </div>
                        </div>

                        <div id="FileNameofStudPicContainer">
                            <span id="FileNameofStudPic"></span>
                            <button id="StudPicviewImage" type="button">View</button>
                        </div>
                        <!-------------------------------KForm 138 ---------------------------------------->
                        <div class="KForm138">
                            <span id="KForm138Span">Form 138 (Report Card)</span>
                            <div class="Kbutton">
                                <button type="button" id="KstudForm138">Upload</button>
                                <input id="inputKstudForm138" type="file" name="KForm138" style="display:none" ;>
                            </div>
                        </div>
                        <div id="FileNameofForm138Container">
                            <span id="FileNameofForm138"></span>
                            <button id="Form138viewImage" type="button">View</button>
                        </div>
                        <!-------------------------------KPSA ---------------------------------------->
                        <div class="KPSA">
                            <span id="KPSASpan">PSA Birth Certificate</span>
                            <div class="Kbutton">
                                <button type="button" id="KstudPSA">Upload</button>
                                <input id="inputKstudPSA" type="file" name="KPSA" style="display:none" ;>
                            </div>
                        </div>
                        <div id="FileNameofPSAContainer">
                            <span id="FileNameofPSA"></span>
                            <button id="PSAviewImage" type="button">View</button>
                        </div>
                        <!-------------------------------KGood Moral ---------------------------------------->
                        <div class="KGoodMoral">
                            <span id="KGoodMoralSpan">Certificate of Good Moral Character</span>
                            <div class="Kbutton">
                                <button type="button" id="KstudGoodMoral">Upload</button>
                                <input id="inputKGoodMoral" type="file" name="KGoodMoral" style="display:none">
                            </div>
                        </div>
                        <div id="FileNameofGoodMoralContainer">
                            <span id="FileNameofGoodMoral"></span>
                            <button id="GoodMoralviewImage" type="button">View</button>
                        </div>

                        <div id="KNote">
                            <span id="NoteTitle">NOTE:</span>
                            <span id="NoteMessage">Forward an Original Copy to the Finance Office</span>
                        </div>

                    </div>
                    <div class="kline"></div>

                    <div class="studentInformationTitle">
                        <span>Student`s Information</span>
                        <span class="KStudentInfosub">(Put N/A If Not Applicable)</span>
                    </div>

                    <div class="KstudentInformation">
                        <div class="ThirdReq">
                            <div class="ThirdReqPart1">
                                <div class="ThirdReqPart1Cont">
                                    <label for="KFirstName">First Name</label>
                                    <input type="text" name="KFirstName" id="KFirstName">
                                    <label for="KMiddleName">Middle Name</label>
                                    <input type="text" name="KMiddleName" id="KMiddleName">
                                    <label for="KLastName">Last Name</label>
                                    <input type="text" name="KLastName" id="KLastName">
                                    <label for="KGender">Gender</label>
                                    <select name="KGender" id="KGender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <label for="KBirthPlace">Birth Place</label>
                                    <input type="text" name="KBirthPlace" id="KBirthPlace">
                                </div>
                            </div>

                            <div class="ThirdReqPart2">
                                <div class="ThirdReqPart2Cont">
                                    <label for="KBirthDay">Birthday</label>
                                    <input type="date" name="KBirthDay" id="KBirthDay">
                                    <label for="KReligion">Religion</label>
                                    <input type="text" name="KReligion" id="KReligion">
                                    <label for="KContactNumber">Contact Number</label>
                                    <input type="text" name="KContactNumber" id="KContactNumber">
                                    <label for="KHomeAddress">Home Address</label>
                                    <input type="text" name="KHomeAddress" id="KHomeAddress">
                                    <label for="KLastSchool">Last School Attended</label>
                                    <input type="text" name="KLastSchool" id="KLastSchool">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="kline"></div>

                    <div class="PortalAccountInformationTitle">
                        <span>Portal Account Information</span>
                    </div>

                    <div class="PortalAccountInformation">
                        <div class="FourthReq">
                            <div class="FourthReqPart1">
                                <div class="FourthReqPart1Cont">
                                    <label for="KEmailAddress">Email Address</label>
                                    <input type="text" name="KEmailAddress" id="KEmailAddress">
                                </div>
                            </div>
                            <div class="FourthReqPart2">
                                <div class="FourthReqPart2Cont">
                                    <label for="KPassword">Password</label>
                                    <input type="password" name="KPassword" id="KPassword">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="kline"></div>

                    <div class="studentInformationTitle">
                        <span>Parents`s Information</span>
                        <span class="KStudentInfosub">(Put N/A If Not Applicable)</span>
                    </div>

                    <div class="ParentsInformation">
                        <div class="FifthReq">
                            <div class="FifthReqPart1">
                                <div class="FifthReqPart1Cont">
                                    <label for="KFathersName">Father`s Full Name</label>
                                    <input type="text" name="KFathersName" id="KFathersName">
                                    <label for="KFathersOccupation">Father`s Occupation</label>
                                    <input type="text" name="KFathersOcupation" id="KFathersOcupation">
                                </div>
                            </div>

                            <div class="FifthReqPart2">
                                <div class="FifthReqPart2Cont">
                                    <label for="KMothersName">Mother`s Full Name</label>
                                    <input type="text" name="KMothersName" id="KMothersName">
                                    <label for="KMothersOcupation">Mother`s Occupation</label>
                                    <input type="text" name="KMothersOcupation" id="KMothersOcupation">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="kline"></div>

                    <div class="studentInformationTitle">
                        <span>In Case Of Emergency</span>
                    </div>
                    <div class="EmergencyInformation">
                        <div class="SixthReq">
                            <div class="SixthReqPart1">
                                <div class="SixthReqPart1Cont">
                                    <label for="KEmergPerson">Name of Person</label>
                                    <input type="text" name="KEmergPerson" id="KEmergPerson">
                                </div>
                            </div>
                            <div class="SixthReqPart2">
                                <div class="SixthReqPart2Cont">
                                    <label for="KEmergNumber">Contact Number</label>
                                    <input type="text" name="KEmergNumber" id="KEmergNumber">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="kline"></div>

                    <div id="KNote2">
                        <span id="NoteTitle2">NOTE:</span>
                        <span id="NoteMessage2">For your enrollment to be considered official, kindly pay a
                            minimum
                            down
                            payment
                            of &#8369;1000 to the Finance </span>
                    </div>

                    <div class="submitKenrollForm">
                        <button id="SubmitG1toG10Enrollment" type="submit" name="submitEnrollG1toG10">Submit</button>
                    </div>
                    <div class="ExtraSpaceBelow"></div>
                </div>
            </form>
        </div>

        <!-------------------------------Enrollment For SHS ---------------------------------------->
        <div id="SHSbackground">
            <div class="SHStitle">
                <h3>SHS Enrollment Form</h3>
            </div>

            <form id="SHSenrollmentForm" method="POST" enctype="multipart/form-data"
                onsubmit="return SHSvalidateForm()">

                <div class="SHSEnrollmentContainer">
                    <div class="SHSFirstReq">
                        <div class="SHSFirstReqPart1">
                            <div class="SHSFirstReqPart1Cont">
                                <label id="SHSEnrollmentDateLabel" for="SHSEnrollmentDate">Date:</label>
                                <input type="text" name="SHSEnrollmentDate" id="SHSEnrollmentDate">
                                <label id="SHSSchoolYearLabel" for="SHSSchoolYear">School Year:</label>
                                <input type="text" name="SHSSchoolYear" id="SHSSchoolYear" value="<?php echo $SchoolYear; ?>">
                            </div>
                        </div>
                        <div class="SHSFirstReqPart2">
                            <div class="SHSFirstReqPart2Cont">
                                <label for="SHSLrn">LRN:</label>
                                <input type="text" name="SHSLrn" id="SHSLrn">
                                <label for="SHSStatus">Status:</label>
                                <select name="SHSStatus" id="SHSStatus">
                                    <option value="New">New</option>
                                    <option value="Transferee">Transferee</option>
                                </select>
                            </div>
                        </div>

                        <div class="SHSFirstReqPart3">
                            <div class="SHSFirstReqPart3Cont">
                                <label for="SHSIncomingLevel">Incoming Level</label>
                                <select name="SHSIncomingLevel" id="SHSIncomingLevel">
                                    <option value="Grade 11">Grade 11</option>
                                    <option value="Grade 12">Grade 12</option>
                                </select>
                                <label for="SHSStrand">Strand</label>
                                <select name="SHSStrand" id="SHSStrand">
                                    <option value="ABM">ABM</option>
                                    <option value="GAS">GAS</option>
                                    <option value="HUMSS">HUMSS</option>
                                    <option value="STEM">STEM</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="SHSline"></div>

                    <div class="SHSphotoRequirements">
                        <!-------------------------------SHSStudent Picture ---------------------------------------->
                        <div class="SHSstudentPicture">
                            <span id="SHSstudPicSpan">Student`s Picture</span>
                            <div class="SHSbutton">
                                <button type="button" id="SHSstudPic">Upload</button>
                                <input id="inputSHSstudPic" type="file" name="SHSstudentPicture" style="display:none" ;>
                            </div>
                        </div>

                        <div id="SHSFileNameofStudPicContainer">
                            <span id="SHSFileNameofStudPic"></span>
                            <button id="SHSStudPicviewImage" type="button">View</button>
                        </div>
                        <!-------------------------------SHSForm 138 ---------------------------------------->
                        <div class="SHSForm138">
                            <span id="SHSForm138Span">Form 138 (Report Card)</span>
                            <div class="SHSbutton">
                                <button type="button" id="SHSstudForm138">Upload</button>
                                <input id="inputSHSstudForm138" type="file" name="SHSForm138" style="display:none" ;>
                            </div>
                        </div>
                        <div id="SHSFileNameofForm138Container">
                            <span id="SHSFileNameofForm138"></span>
                            <button id="SHSForm138viewImage" type="button">View</button>
                        </div>
                        <!-------------------------------SHSPSA ---------------------------------------->
                        <div class="SHSPSA">
                            <span id="SHSPSASpan">PSA Birth Certificate</span>
                            <div class="SHSbutton">
                                <button type="button" id="SHSstudPSA">Upload</button>
                                <input id="inputSHSstudPSA" type="file" name="SHSPSA" style="display:none" ;>
                            </div>
                        </div>
                        <div id="SHSFileNameofPSAContainer">
                            <span id="SHSFileNameofPSA"></span>
                            <button id="SHSPSAviewImage" type="button">View</button>
                        </div>
                        <!-------------------------------SHSGood Moral ---------------------------------------->
                        <div class="SHSGoodMoral">
                            <span id="SHSGoodMoralSpan">Certificate of Good Moral Character</span>
                            <div class="SHSbutton">
                                <button type="button" id="SHSstudGoodMoral">Upload</button>
                                <input id="inputSHSGoodMoral" type="file" name="SHSGoodMoral" style="display:none">
                            </div>
                        </div>
                        <div id="SHSFileNameofGoodMoralContainer">
                            <span id="SHSFileNameofGoodMoral"></span>
                            <button id="SHSGoodMoralviewImage" type="button">View</button>
                        </div>
                        <!-------------------------------SHS Cert of Completion ---------------------------------------->
                        <div class="SHSCertCompl">
                            <span id="SHSCertComplSpan">Certificate of Completion</span>
                            <div class="SHSbutton">
                                <button type="button" id="SHSstudCertCompl">Upload</button>
                                <input id="inputSHSCertCompl" type="file" name="SHSCertCompl" style="display:none">
                            </div>
                        </div>
                        <div id="SHSFileNameofCertComplContainer">
                            <span id="SHSFileNameofCertCompl"></span>
                            <button id="SHSCertComplviewImage" type="button">View</button>
                        </div>
                        <div id="SHSNote">
                            <span id="SHSNoteTitle">NOTE:</span>
                            <span id="SHSNoteMessage">Forward an Original Copy to the Finance Office</span>
                        </div>

                    </div>
                    <div class="SHSline"></div>

                    <div class="SHSstudentInformationTitle">
                        <span>Student`s Information</span>
                        <span class="SHSStudentInfosub">(Put N/A If Not Applicable)</span>
                    </div>

                    <div class="SHSstudentInformation">
                        <div class="SHSThirdReq">
                            <div class="SHSThirdReqPart1">
                                <div class="SHSThirdReqPart1Cont">
                                    <label for="SHSFirstName">First Name</label>
                                    <input type="text" name="SHSFirstName" id="SHSFirstName">
                                    <label for="SHSMiddleName">Middle Name</label>
                                    <input type="text" name="SHSMiddleName" id="SHSMiddleName">
                                    <label for="SHSLastName">Last Name</label>
                                    <input type="text" name="SHSLastName" id="SHSLastName">
                                    <label for="SHSGender">Gender</label>
                                    <select name="SHSGender" id="SHSGender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <label for="SHSBirthPlace">Birth Place</label>
                                    <input type="text" name="SHSBirthPlace" id="SHSBirthPlace">
                                </div>
                            </div>

                            <div class="SHSThirdReqPart2">
                                <div class="SHSThirdReqPart2Cont">
                                    <label for="SHSBirthDay">Birthday</label>
                                    <input type="date" name="SHSBirthDay" id="SHSBirthDay">
                                    <label for="SHSReligion">Religion</label>
                                    <input type="text" name="SHSReligion" id="SHSReligion">
                                    <label for="SHSContactNumber">Contact Number</label>
                                    <input type="text" name="SHSContactNumber" id="SHSContactNumber">
                                    <label for="SHSHomeAddress">Home Address</label>
                                    <input type="text" name="SHSHomeAddress" id="SHSHomeAddress">
                                    <label for="SHSLastSchool">Last School Attended</label>
                                    <input type="text" name="SHSLastSchool" id="SHSLastSchool">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="SHSline"></div>

                    <div class="SHSPortalAccountInformationTitle">
                        <span>Portal Account Information</span>
                    </div>

                    <div class="SHSPortalAccountInformation">
                        <div class="SHSFourthReq">
                            <div class="SHSFourthReqPart1">
                                <div class="SHSFourthReqPart1Cont">
                                    <label for="SHSEmailAddress">Email Address</label>
                                    <input type="text" name="SHSEmailAddress" id="SHSEmailAddress">
                                </div>
                            </div>
                            <div class="SHSFourthReqPart2">
                                <div class="SHSFourthReqPart2Cont">
                                    <label for="SHSPassword">Password</label>
                                    <input type="password" name="SHSPassword" id="SHSPassword">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="SHSline"></div>

                    <div class="SHSstudentInformationTitle">
                        <span>Parents`s Information</span>
                        <span class="SHSStudentInfosub">(Put N/A If Not Applicable)</span>
                    </div>

                    <div class="SHSParentsInformation">
                        <div class="SHSFifthReq">
                            <div class="SHSFifthReqPart1">
                                <div class="SHSFifthReqPart1Cont">
                                    <label for="SHSFathersName">Father`s Full Name</label>
                                    <input type="text" name="SHSFathersName" id="SHSFathersName">
                                    <label for="SHSFathersOccupation">Father`s Occupation</label>
                                    <input type="text" name="SHSFathersOcupation" id="SHSFathersOcupation">
                                </div>
                            </div>

                            <div class="SHSFifthReqPart2">
                                <div class="SHSFifthReqPart2Cont">
                                    <label for="SHSMothersName">Mother`s Full Name</label>
                                    <input type="text" name="SHSMothersName" id="SHSMothersName">
                                    <label for="SHSMothersOcupation">Mother`s Occupation</label>
                                    <input type="text" name="SHSMothersOcupation" id="SHSMothersOcupation">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="SHSline"></div>

                    <div class="SHSstudentInformationTitle">
                        <span>In Case Of Emergency</span>
                    </div>
                    <div class="SHSEmergencyInformation">
                        <div class="SHSSixthReq">
                            <div class="SHSSixthReqPart1">
                                <div class="SHSSixthReqPart1Cont">
                                    <label for="SHSEmergPerson">Name of Person</label>
                                    <input type="text" name="SHSEmergPerson" id="SHSEmergPerson">
                                </div>
                            </div>
                            <div class="SHSSixthReqPart2">
                                <div class="SHSSixthReqPart2Cont">
                                    <label for="SHSEmergNumber">Contact Number</label>
                                    <input type="text" name="SHSEmergNumber" id="SHSEmergNumber">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="SHSline"></div>

                    <div id="SHSNote2">
                        <span id="SHSNoteTitle2">NOTE:</span>
                        <span id="SHSNoteMessage2">For your enrollment to be considered official, Kindly pay a
                            minimum
                            down
                            payment
                            of &#8369;1000 to the Finance </span>
                    </div>

                    <div class="submitSHSenrollForm">
                        <button id="SubmitG1toG10EnrollmentSHS" type="submit"
                            name="SHSsubmitEnrollG1toG10">Submit</button>
                    </div>
                    <div class="ExtraSpaceBelow"></div>
                </div>
            </form>
        </div>

        <!-------------------------------Enrollment For Tesda ---------------------------------------->
        <div id="Tesdabackground">
            <div class="Ttitle">
                <h3>Tesda Enrollment Form</h3>
            </div>

            <form id="TenrollmentForm" method="POST" enctype="multipart/form-data" onsubmit="return TvalidateForm()">

                <div class="TEnrollmentContainer">
                    <div class="TFirstReq">
                        <div class="TFirstReqPart1">
                            <div class="TFirstReqPart1Cont">
                                <label id="TEnrollmentDateLabel" for="TEnrollmentDate">Date:</label>
                                <input type="text" name="TEnrollmentDate" id="TEnrollmentDate">
                                <label id="TSchoolYearLabel" for="TSchoolYear">School Year:</label>
                                <input type="text" name="TSchoolYear" id="TSchoolYear" value="<?php echo $SchoolYear; ?>">
                            </div>
                        </div>
                        <div class="TFirstReqPart2">
                            <div class="TFirstReqPart2Cont">
                                <label for="TEducAttain">Educational Attainment</label>
                                <select name="TEducAttain" id="TEducAttain">
                                    <option value="High School Graduate">High School Graduate</option>
                                    <option value="College Level/Graduate">College Level/Graduate</option>
                                </select>
                                <label for="TNameofCourse">Name of Course</label>
                                <select name="TNameofCourse" id="TNameofCourse">
                                    <option value="Bread and Pastry Production NC II">Bread and Pastry
                                        Production NC
                                        II
                                    </option>
                                    <option value="Cookery NC II">Cookery NC II</option>
                                    <option value="Housekeeping NC II">Housekeeping NC II</option>
                                    <option value="Trainers Methodology II">Trainers Methodology II</option>
                                    <option value="Electrical Installation and Maintenance NC II">Electrical
                                        Installation and Maintenance NC II</option>
                                    <option value="Food and Beverage services NC II">Food and Beverage services
                                        NC
                                        II
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="FirstReqPart3">
                        <div class="FirstReqPart3Cont">
                            <label for="TStatus">Status</label>
                            <select name="TStatus" id="TStatus">
                                <option value="New">New</option>
                            </select>
                        </div>
                    </div>

                    <div class="Tline"></div>

                    <div class="TphotoRequirements">
                        <!-------------------------------TStudent Picture ---------------------------------------->
                        <div class="TIdPic">
                            <span id="TIdPicSpan">ID Picture</span>
                            <div class="Tbutton">
                                <button type="button" id="TIdPic">Upload</button>
                                <input id="inputTIdPic" type="file" name="TIdPic" style="display:none" ;>
                            </div>
                        </div>

                        <div id="TFileNameofIdPicContainer">
                            <span id="TFileNameofIdPic"></span>
                            <button id="TIdPicviewImage" type="button">View</button>
                        </div>
                        <!-------------------------------TForm 138 ---------------------------------------->
                        <div class="TTransRec">
                            <span id="TTransRecSpan">Transcript of Record</span>
                            <div class="Tbutton">
                                <button type="button" id="TstudTransRec">Upload</button>
                                <input id="inputTstudTransRec" type="file" name="TTransRec" style="display:none" ;>
                            </div>
                        </div>
                        <div id="TFileNameofTransRecContainer">
                            <span id="TFileNameofTransRec"></span>
                            <button id="TTransRecviewImage" type="button">View</button>
                        </div>
                        <!-------------------------------TPSA ---------------------------------------->
                        <div class="TPSA">
                            <span id="TPSASpan">PSA Birth Certificate</span>
                            <div class="Tbutton">
                                <button type="button" id="TstudPSA">Upload</button>
                                <input id="inputTstudPSA" type="file" name="TPSA" style="display:none" ;>
                            </div>
                        </div>
                        <div id="TFileNameofPSAContainer">
                            <span id="TFileNameofPSA"></span>
                            <button id="TPSAviewImage" type="button">View</button>
                        </div>
                        <!-------------------------------TGood Moral ---------------------------------------->
                        <div class="TGoodMoral">
                            <span id="TGoodMoralSpan">Certificate of Good Moral Character</span>
                            <div class="Tbutton">
                                <button type="button" id="TstudGoodMoral">Upload</button>
                                <input id="inputTGoodMoral" type="file" name="TGoodMoral" style="display:none">
                            </div>
                        </div>
                        <div id="TFileNameofGoodMoralContainer">
                            <span id="TFileNameofGoodMoral"></span>
                            <button id="TGoodMoralviewImage" type="button">View</button>
                        </div>

                    </div>
                    <div class="Tline"></div>

                    <div class="TstudentInformationTitle">
                        <span>Student`s Information</span>
                        <span class="TStudentInfosub">(Put N/A If Not Applicable)</span>
                    </div>

                    <div class="TstudentInformation">
                        <div class="TThirdReq">
                            <div class="TThirdReqPart1">
                                <div class="TThirdReqPart1Cont">
                                    <label for="TFirstName">First Name</label>
                                    <input type="text" name="TFirstName" id="TFirstName">
                                    <label for="TMiddleName">Middle Name</label>
                                    <input type="text" name="TMiddleName" id="TMiddleName">
                                    <label for="TLastName">Last Name</label>
                                    <input type="text" name="TLastName" id="TLastName">
                                    <label for="TGender">Gender</label>
                                    <select name="TGender" id="TGender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <label for="TBirthPlace">Birth Place</label>
                                    <input type="text" name="TBirthPlace" id="TBirthPlace">
                                    <label for="TCivilStat">Civil Status</label>
                                    <select name="TCivilStat" id="TCivilStat">
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Widow/er">Widow/er</option>
                                        <option value="Solo Parent">Solo Parent</option>
                                    </select>
                                </div>
                            </div>

                            <div class="TThirdReqPart2">
                                <div class="TThirdReqPart2Cont">
                                    <label for="TBirthDay">Birthday</label>
                                    <input type="date" name="TBirthDay" id="TBirthDay">
                                    <label for="TReligion">Religion</label>
                                    <input type="text" name="TReligion" id="TReligion">
                                    <label for="TContactNumber">Contact Number</label>
                                    <input type="text" name="TContactNumber" id="TContactNumber">
                                    <label for="THomeAddress">Home Address</label>
                                    <input type="text" name="THomeAddress" id="THomeAddress">
                                    <label for="TLastSchool">Last School Attended</label>
                                    <input type="text" name="TLastSchool" id="TLastSchool">
                                    <label for="TEmploymentStat">Employment Status</label>
                                    <select name="TEmploymentStat" id="TEmploymentStat">
                                        <option value="Employed">Employed</option>
                                        <option value="Unemployed">Unemployed</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="Tline"></div>

                    <div class="TPortalAccountInformationTitle">
                        <span><strong>Portal Account Information</strong></span>
                    </div>

                    <div class="TPortalAccountInformation">
                        <div class="TFourthReq">
                            <div class="TFourthReqPart1">
                                <div class="TFourthReqPart1Cont">
                                    <label for="TEmailAddress">Email Address</label>
                                    <input type="text" name="TEmailAddress" id="TEmailAddress">
                                </div>
                            </div>
                            <div class="TFourthReqPart2">
                                <div class="TFourthReqPart2Cont">
                                    <label for="TPassword">Password</label>
                                    <input type="password" name="TPassword" id="TPassword">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="Tline"></div>

                    <div class="TstudentInformationTitle">
                        <span>Parents`s Information</span>
                        <span class="TStudentInfosub">(Put N/A If Not Applicable)</span>
                    </div>

                    <div class="TParentsInformation">
                        <div class="TFifthReq">
                            <div class="TFifthReqPart1">
                                <div class="TFifthReqPart1Cont">
                                    <label for="TFathersName">Father`s Full Name</label>
                                    <input type="text" name="TFathersName" id="TFathersName">
                                    <label for="TFathersOccupation">Father`s Occupation</label>
                                    <input type="text" name="TFathersOcupation" id="TFathersOcupation">
                                </div>
                            </div>

                            <div class="TFifthReqPart2">
                                <div class="TFifthReqPart2Cont">
                                    <label for="TMothersName">Mother`s Full Name</label>
                                    <input type="text" name="TMothersName" id="TMothersName">
                                    <label for="TMothersOcupation">Mother`s Occupation</label>
                                    <input type="text" name="TMothersOcupation" id="TMothersOcupation">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="Tline"></div>

                    <div class="TstudentInformationTitle">
                        <span>In Case Of Emergency</span>
                    </div>
                    <div class="TEmergencyInformation">
                        <div class="TSixthReq">
                            <div class="TSixthReqPart1">
                                <div class="TSixthReqPart1Cont">
                                    <label for="TEmergPerson">Name of Person</label>
                                    <input type="text" name="TEmergPerson" id="TEmergPerson">
                                </div>
                            </div>
                            <div class="TSixthReqPart2">
                                <div class="TSixthReqPart2Cont">
                                    <label for="TEmergNumber">Contact Number</label>
                                    <input type="text" name="TEmergNumber" id="TEmergNumber">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="Tline"></div>

                    <div id="TNote2">
                        <span id="TNoteTitle2">NOTE:</span>
                        <span id="TNoteMessage2">For your enrollment to be considered official, Tindly pay a
                            minimum
                            down
                            payment
                            of &#8369;1000 to the Finance </span>
                    </div>

                    <div class="submitTenrollForm">
                        <button id="SubmitG1toG10EnrollmentT" type="submit" name="TsubmitEnrollG1toG10">Submit</button>
                    </div>

                    <div class="ExtraSpaceBelow"></div>
                </div>
            </form>
        </div>
        
</body>
</html>