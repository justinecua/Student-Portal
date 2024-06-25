<?php

include('connect2db.php');
session_start();

$user_id = "";
$CheckHour = "";
$BankAccountName = "Christian Horizon School Inc";

$dbStudid = $_SESSION["dbStudid"];

$runsql2 = mysqli_query($connect2db, "SELECT student.*, accounts.*, section.*, gradelevel.*, groupchats.*
FROM student
LEFT JOIN accounts ON student.Student_ID = accounts.Student_ID
LEFT JOIN section ON accounts.SectionID = section.SectionID
LEFT JOIN gradelevel ON section.Gradelevel_ID =  gradelevel.Gradelevel_ID
LEFT JOIN groupchats ON accounts.SectionID = groupchats.SectionID
WHERE student.Student_ID = '$dbStudid'");

$row = mysqli_fetch_assoc($runsql2);
$UserAccount_ID = $row["Account_ID"];
$UserEnrollStat = $row["Enrollment_Status"];
$Enrollment_ID = $row["Student_ID"];
$UserEnrollDate = $row["Enrollment_Date"];
$UserEnrollStat = $row["Enrollment_Status"];
$UserSY = $row["School_year"];
$UserStat = $row["Status"];
$UserLRN = $row["LRN"];
$UserIncLevel = $row["Incoming_Level"];
$UserProfile = $row["Student_PicturePath"];
$UserFName = $row["FirstName"];
$UserMName = $row["MiddleName"];
$UserLName = $row["LastName"];
$UserGender = $row["Gender"];
$UserBPlace = $row["BirthPlace"];
$UserBirthday = $row["Birthday"];
$UserReligion = $row["Religion"];
$UserContNum = $row["ContactNumber"];
$UserHomeAddress = $row["HomeAddress"];
$UserLastSchool = $row["Last_School_Attended"];
$UserEmailad = $row["EmailAddress"];
$UserPassword = $row["Password"];
$UserFathersName = $row["Fathers_Full_Name"];
$UserFOccupation = $row["Fathers_Occupation"];
$UserMothersName = $row["Mothers_Full_Name"];
$UserMOccupation = $row["Mothers_Occupation"];
$UserEmergCont = $row["Emergency_ContactPerson"];
$UserEmergNum = $row["Emergency_ContactNumber"];
$UserSection = $row["SectionID"];
$GradeLevel = $row["GradeLevel"];
$SectionID = $row["SectionID"];
$SectionName = $row["SectionName"];
$groupchat_ID = $row["groupchat_ID"];

$GradeSec = $GradeLevel . " - " . $SectionName;
$ID_Number = $row["ID_Number"];
$UserFullName = $UserFName . " " . $UserLName;
$UserFullNamewM = $UserFName . " " . $UserMName . " " . $UserLName;

function FetchSubjectsNotEnrolled()
{
    echo'

    <style>

    .DSubjectsCont {
        height: 75%;
        width: 100%;
        display: flex;
    }
    </style>

    <div class="ErrorImage">
    <img src="images/page-not-found-1.png" alt="">
    <span> Oops! No subjects found </span>
    </div>
';
}

function FetchSubjects()
{
    $dbStudid = $_SESSION["dbStudid"];
    include('connect2db.php');
    $runsql2 = mysqli_query($connect2db, "SELECT student.*, accounts.*, subjects.*, section.*, teachers.* 
           FROM subjects
           LEFT JOIN accounts ON subjects.SectionID = accounts.SectionID
           LEFT JOIN section ON subjects.SectionID = section.SectionID
           LEFT JOIN teachers ON subjects.Teacher_ID = teachers.TeacherID
           LEFT JOIN student ON student.Student_ID = accounts.Account_ID
           WHERE accounts.Student_ID = '$dbStudid'");

    $SubCounter = 1;
    while ($row2 = mysqli_fetch_assoc($runsql2)) {
        $SubjectName = $row2['Subject_Name'];
        $TeacherPhoto = $row2['ProfilePath'];
        $TeacherfName = $row2['FirstName'];
        $TeacherlName = $row2['LastName'];
        $TeacherFullName = $TeacherfName . " " . $TeacherlName;
        ?>
                <div class="SubjectDiv">
                    <div class="SubjectDivHeader <?php echo 'SubjectHeader_' . $SubCounter; ?>">
                        <span>
                            <?php echo $SubjectName; ?>
                        </span>
                    </div>
                    <div class="TeacherProfDiv">
                        <img src="<?php echo $TeacherPhoto; ?>" alt="">
                    </div>
                    <div class="SubjectDivBottom">
                        <span>
                            <?php echo $TeacherFullName; ?>
                        </span>
                    </div>
                </div>
                <?php
                $SubCounter++;
    }
}



date_default_timezone_set('Asia/Manila');
$currentDate = date('l, F j, Y');
$currentDate2 = date('F j, Y');
$currentHour = date('H');
$coverPhoto = "";

if ($currentHour >= 5 && $currentHour < 12) {
    $CheckHour = "Good morning $UserFName";
    $coverPhoto = "images/wallpaperflare.com_wallpaper (3).jpg";
} elseif ($currentHour >= 12 && $currentHour < 17) {
    $CheckHour = "Good afternoon $UserFName";
    $coverPhoto = "images/wallpaperflare.com_wallpaper (5).jpg";
} else {
    $CheckHour = "Good evening $UserFName";
    $coverPhoto = "images/wallpaperflare.com_wallpaper (1).jpg";
}


$sql = mysqli_query($connect2db, "SELECT * FROM schoolyear WHERE SchoolYearStatus = 'Selected'");

while ($getrow = mysqli_fetch_assoc($sql)) {
    $SchoolYear_ID = $getrow["SchoolYear_ID"];
    $SchoolYear = $getrow["SchoolYear"];

}

function FetchClassmates($connect2db, $SectionID, $dbStudid)
{

    $runsql2 = mysqli_query($connect2db, "SELECT accounts.*, student.*, section.*, gradelevel.*
        FROM accounts
        LEFT JOIN student ON accounts.Student_ID = student.Student_ID
        LEFT JOIN section ON accounts.SectionID = section.SectionID
        LEFT JOIN gradelevel ON section.SectionID = gradelevel.Gradelevel_ID 
        WHERE accounts.Student_ID != '$dbStudid' AND accounts.SectionID='$SectionID'");

    $ClassmatesArr = array();

    while ($row2 = mysqli_fetch_assoc($runsql2)) {
        $AccountID = $row2["Account_ID"];
        $FirstName = $row2["FirstName"];
        $LastName = $row2["LastName"];
        $Profile = $row2["Student_PicturePath"];
        $Last_School_Attended = $row2["Last_School_Attended"];
        $HomeAddress = $row2['HomeAddress'];

        $ClassmatesArr[] = [
            'CLAccID' => $AccountID,
            'CLStudFName' => $FirstName,
            'CLStudLName' => $LastName,
            'CLStudProfile' => $Profile,
            'CLlastSchool' => $Last_School_Attended,
            'CLHomeAddress' => $HomeAddress
        ];
    }

    return $ClassmatesArr;

}

$runsql4 = mysqli_query($connect2db, "SELECT COUNT(*) as ClassmatesCount, accounts.*, student.*, section.*, gradelevel.*
FROM accounts
LEFT JOIN student ON accounts.Student_ID = student.Student_ID
LEFT JOIN section ON accounts.SectionID = section.SectionID
LEFT JOIN gradelevel ON section.SectionID = gradelevel.Gradelevel_ID 
WHERE accounts.Student_ID != '$dbStudid' AND accounts.SectionID='$SectionID'");

while ($row4 = mysqli_fetch_assoc($runsql4)) {
$ClassmatesCount = $row4['ClassmatesCount'];

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Christian Horizon School Inc</title>
    <link rel="icon" type="image/x-icon" href="/images/CHS Logo1.png">
    <link rel="stylesheet" href="StudentDashboard.css">
</head>

<body>
    <div id="pleaseWaitCont">
        <div class="PleaseWait">
            <div id="loader"></div>
            <div id="loader2"></div>
        </div>
    </div>
    
    <div id="fadeBox"></div>
    <div id="loaderContainer" class="fade-out">
        <div class="loaderSecCont">
            <div id="loader"></div>
            <div id="loader2"></div>
        </div>
    </div>

    <div id="overlayReceipt">
        <div id="ReceiptCont">
            <div class="ReceiptBox">
                <div class="ReceiptHeader">
                    <div class="LogoReceipt">
                        <img src="images/CHS Logo2.png">
                    </div>
                    <div class="ReceiptTitle">
                        <h3>Christian Horizon School Inc</h3>
                        <span>Purok Mabinati-on, Ubaldo D. Laya <br> Iligan City, Philippines</span>
                    </div>
                </div>

                <div class="ReceiptMainCont">
                    <div id="ReceiptDetails">
                    </div>
                </div>
                <div class="ReceiptSignature">
                    <div class="RSCont">

                        <div class="CashierSignature"></div>
                        <div class="CashierName">Ember Willis</div>
                        <div class="CashierLabel">CASHIER</div>
                    </div>
                </div>
                <div class="ReceiptFooter">
                    <div class="RFDesign">
                        <span>Registrar / Cashier Office: 228-0316 / 223-0200</span>
                    </div>
                </div>
                <div class="ReceiptButtons">
                    <div class="RBContButtons">
                        <button id="CloseReceipt">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="overlayReceipt2">
        <div id="ReceiptCont2">
            <div class="ReceiptBox">
                <div class="ReceiptHeader">
                    <div class="LogoReceipt">
                        <img src="images/CHS Logo2.png">
                    </div>
                    <div class="ReceiptTitle">
                        <h3>Christian Horizon School Inc</h3>
                        <span>Purok Mabinati-on, Ubaldo D. Laya <br> Iligan City, Philippines</span>
                    </div>
                </div>

                <div class="ReceiptMainCont">
                    <div id="ReceiptDetails2">

                    </div>
                </div>
                <div class="ReceiptSignature">
                    <div class="RSCont">
                        <div class="CashierSignature"></div>
                        <div class="CashierName">Ember Willis</div>
                        <div class="CashierLabel">CASHIER</div>
                    </div>
                </div>
                <div class="ReceiptFooter">
                    <div class="RFDesign">
                        <span>Registrar / Cashier Office: 228-0316 / 223-0200</span>
                    </div>
                </div>
                <div class="ReceiptButtons">
                    <div class="RBContButtons">
                        <button id="CloseReceipt2">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!---- Assessment Form --->
    <div id="overlayAssess">
        <div id="AssessCont">
            <div class="AssessBox">
                
                <div class="AssessHeader">
                    <div class="AssessTitle">
                        <div class="LogoAssess">
                            <img src="images/CHS Logo2.png">
                        </div>
                        <h3>Christian Horizon School Inc</h3>
                        <span>Purok Mabinati-on, Ubaldo D. Laya <br> Iligan City, Philippines</span>
                    </div>
                </div>

                <h4>ASSESSMENT FORM</h4>

                <div class="AssessMid">
                    <div class="AssessMidLeftP">
                        <div class="AssessMidLeft">
                            <label for="">ID No: </label>
                            <span><?php echo $ID_Number; ?></span>
                        </div>
                        <div class="AssessMidLeft">
                            <label for="">Name: </label>
                            <span><?php echo $UserFullNamewM; ?></span>
                        </div>
                        <div class="AssessMidLeft">
                            <label for="">Grade & Section: </label>
                            <span> <?php echo $GradeSec; ?></span>
                        </div>
                    </div>

                    <div class="AssessMidRightP">
                        <div class="AssessMidRightP2">
                            <div class="AssessMidRight">
                                <label for="">Date: </label>
                                <span> <?php echo $currentDate2; ?></span>
                            </div>
                            <div class="AssessMidRight">
                                <label for="">Gender: </label>
                                <span> <?php echo $UserGender; ?></span>
                            </div>
                            <div class="AssessMidRight">
                                <label for="">LRN: </label>
                                <span> <?php echo $UserLRN; ?></span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="AssessContent">
                    <table class="AssessmentTable">
                        <tr class="AssessTr">
                            <th>Subject Code</th>
                            <th>Subject Title</th>
                            <th>Day</th>
                            <th>Time</th>
                            <th>Teacher</th>
                        </tr>
                       <?php
                               
                        $runsql3 = mysqli_query($connect2db, "SELECT student.*, accounts.*, subjects.*, section.*, gradelevel.*, strand.*, teachers.*
                        FROM subjects
                        LEFT JOIN accounts ON subjects.SectionID = accounts.SectionID
                        LEFT JOIN section ON subjects.SectionID = section.SectionID
                        LEFT JOIN gradelevel ON subjects.GradeLevel_ID = gradelevel.Gradelevel_ID
                        LEFT JOIN strand ON subjects.Strand_ID = strand.Strand_ID
                        LEFT JOIN student ON student.Student_ID = accounts.Account_ID
                        LEFT JOIN teachers ON subjects.Teacher_ID = teachers.TeacherID
                        WHERE accounts.Student_ID = '$dbStudid'");
                        
                            while ($row2 = mysqli_fetch_assoc($runsql3)) {
                                $Subject_ID = $row2["Subject_ID"];
                                $Subject_Code = $row2["Subject_Code"];
                                $Subject_Name = $row2["Subject_Name"];
                                $Subject_Description = $row2["Subject_Description"];
                                $StartTime = $row2["StartTime"];
                                $EndTime = $row2["EndTime"];
                                $TFirstName = $row2["FirstName"];
                                $TLastName =  $row["LastName"];
                                $TechFullName = $TFirstName . " " . $TLastName;
                                ?>
                             <tr>
                            <td><?php echo $Subject_Code; ?></td>
                            <td><?php echo $Subject_Name; ?></td>
                            <td>Monday - Friday</td>
                            <td><?php echo $StartTime . " - " . $EndTime; ?></td>
                            <td><?php echo $TechFullName; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                      
                    </table>
                </div>

                <div class="AssessmentFees">
                    <div class="AFDiv">

                        <div class="AFDivHeader">
                            <span>School Fees Details</span>
                        </div>
                        
                        <div class="AFDivContent">
                            
                        <?php
                            $runsql7 = mysqli_query($connect2db, "SELECT schoolfees.*, gradelevel.*, accounts.*, section.*
                            FROM schoolfees
                            LEFT JOIN gradelevel ON schoolfees.Gradelevel_ID = gradelevel.Gradelevel_ID
                            LEFT JOIN section ON section.Gradelevel_ID = gradelevel.Gradelevel_ID
                            LEFT JOIN accounts ON accounts.SectionID = section.SectionID
                            WHERE accounts.Student_ID = '$dbStudid'");
                            
                            $ASchoolFees = [];

                                while ($row7 = mysqli_fetch_assoc($runsql7)) {
                                   $SchoolFee_ID = $row7["SchoolFee_ID"];
                                   $SchoolFee_Name = $row7["SchoolFee_Name"];
                                   $SchoolFee_Price = $row7["SchoolFee_Price"];
                                   $ASchoolFees[] = $SchoolFee_Price;
                                ?>

                            <div class="AFDivMain">
                                <div class="AFDivContentLeft"><span><?php echo $SchoolFee_Name ?> </span></div>
                                <div class="AFDivContentRight"><span><?php echo $SchoolFee_Price;?> </span></div>
                                </div>
                                <?php
                            }

                            if (!empty($ASchoolFees)) {
                                $AssessTotalBalance = array_sum($ASchoolFees);
                            } else {
                                $AssessTotalBalance = 0; // Set a default value if the array is empty
                            }
                            ?>
                        </div>
                    </div>
                    <div class="TotalAssessFees">
                        <div class="TAFLeft">
                            <span>TOTAL AMOUNT DUE:</span>
                        </div>

                        <div class="TAFRight">
                            <span>₱<?php echo number_format($AssessTotalBalance, 2) ?></span>
                        </div>
                    </div>
                </div>
                
                <div class="AssessExtraDiv"></div>
                
                <div class="AssessOptions">
                    <button id="AsessPrint">Print</button>
                    <button id="AsessClose" onclick="CloseAssessment()">Close</button>
                </div>
                
            </div>
        </div>
    </div>
    
    <!-- Group Chat Overlay-->
    <div id="GroupChatBox">
        <div class="GCMainCont">
            <div class="GCHeader">
                <div class="GCHLeft">
                        <img src="images/wallpaperflare.com_wallpaper (3).jpg" alt="">
                        <input type="hidden" id="GroupChatID" value="<?php echo $groupchat_ID;?>">
                </div>
                <div class="GCHMid">
                    <h4><?php echo $GradeSec; ?></h4>
                </div>
                <div class="GCHRight">
                    <div id="GCHRightDiv">
                        <img src="images/arrow-shrink-diagonal-1.png" alt="">
                    </div>

                    <div id="GCHRightDiv2">
                        <img src="images/delete-1 (1).png" alt="">
                    </div>
                </div>
            </div>
            <span id="MessageConfirmation"></span>
            <div id="GCContentBox">
                <div class="GCMainContentDiv">
                   
                </div>
            </div>

            <div class="GCBottom">
                <div class="GCBLeft">
                    <div class="GCBRightDiv">
                            <img src="images/gallery.png" alt="">
                    </div>
                </div>

                <div class="GCBMid">
                    <input id="MessageContext" type="text" placeholder="Say something">
                </div>

                <div class="GCBRight">
                    <div class="GCBRightDiv">
                        <img id="SendMessage"src="images/icons8-sent-48.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <div id="fadeBox"></div>
    <div class="Main">

        <!----------------------------- Left Main ------------------------->
        <div class="LeftMain">
            <div class="LeftMainCont">
                <div class="LeftMainContHeader">
                    <img src="images/CHS Logo2.png">
                    <span>CHSI</span>
                </div>
                <div class="LMCCenterCont">
                    <ul>
                        <li id="DashboardTab" onclick="changeToDashboard()"><img id="dashboardImage"
                                src="images/layout-dashboardw.png">Dashboard</li>
                        <li id="AnnouncementTab" onclick="changeToAnnouncements()"><img id="AnnouncementImage"
                                src="images/advertising-megaphone.png">Profile
                        </li>
                        <li id="ClassmatesTab" onclick="changeToClassmates()"><img id="ClassmatesImage"
                                src="images/user-friends-4.png">Classmates
                        </li>
                        <li id="GradesTab" onclick="changeToGrades()"><img id="GradesImage"
                                src="images/graduation-hat.png">Grades
                        </li>
                        <li id="ScheduleTab" onclick="changeToSchedule()"><img id="ScheduleImage"
                                src="images/calendar-school.png">Schedule
                        </li>
                        <li id="PaymentsTab" onclick="changeToPayments()"><img id="PaymentImage"
                                src="images/currency-sign-peso-badge.png">Payments
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!----------------------------- Center Main ------------------------->

        <div class="CenterMain">
            <div class="CenterMainCont">
                <div class="CenterMainHeader">
                    <div class="NotifContainer">
                        <div class="NotifOverlay">
                            <div class="NotifHeader">
                                <h3>Notifications</h3>
                                <span id="MarkNotifAsRead">Mark all as read</span>
                            </div>
                            <div class="NotifBottom">
                                <div class="Notifications">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="SearchDiv">
                        <img src="images/search (2).svg">
                        <input class="SearchSubject" type="text" placeholder="What do you have in mind?">

                        <div class="DateDiv">
                            <span>
                                <?php echo $currentDate; ?>
                            </span>

                            <div class="NotifDivRight" onclick="Notif(this, event)">
                                <span id="notification-count"></span>
                                <img src="images/bell-notification (1).png">
                            </div>

                            <a href="logout.php">
                                <div class="SearchDivRight2">
                                    <img class="Logout" src="images/logout-1.png">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="CenterMainContBottom">
                    <div id="DashboardArea">
                        <div class="DashboardTop">
                            <div class="WelcomeDiv">
                                <div class="WelcomeMessages">
                                    <div class="WelcomeMessages2">
                                        <span class="WelcomeMessage">
                                            <?php echo $CheckHour; ?>
                                        </span>
                                        <div class="QuoteDiv">
                                            <span class="Quote">"Your work is going to fill a large part of your
                                                life,
                                                and
                                                the
                                                only way to be truly satisfied is to do what you believe is great
                                                work.
                                                The
                                                only way to do great work is to love what you do. Don`t settle."
                                                -Steve
                                                Jobs
                                            </span>
                                        </div>
                                    </div>
                                    <!--
                                    <div class="WelcomeAvatar">
                                        <img src="images/office-desk.png" alt="">
                                    </div>

                                    -->
                                </div>
                            </div>
                            <img class="WelcomeDivImage" src="<?php echo $coverPhoto; ?>" alt="">
                        </div>
                        <div class="DashboardBottom">
                            <div class="DSubjects">
                                <h3>Subjects</h3>
                            </div>

                            <div class="DSubjectsCont">
                                <?php
                                if ($UserEnrollStat == "Not Enrolled" || $UserEnrollStat == "Pending" || $UserEnrollStat == "In Progress") {
                                    FetchSubjectsNotEnrolled();

                                } else if ($UserEnrollStat == "Enrolled") {
                                    FetchSubjects();
                                }

                                ?>
                                <input type="hidden" id="CheckEnrollStat" value="<?php echo $UserEnrollStat ?>">
                            </div>
                        </div>
                    </div>

                    <div id="ProfileArea">
                        <div class="ProfileMainCont">
                            <div class="ProfHeader">
                                <div class="ProfHeaderTop">
                                    <img src="images/23985226_6898072.jpg" alt="">
                                </div>
                                <div class="ProfHeaderBottom">
                                    <div class="PHLeft">
                                        <img class="StudProfile" src="<?php echo $UserProfile; ?>" alt="">
                                    </div>

                                    <div class="PHMid">
                                        <div class="PHMidTop">
                                           <span> <?php echo $UserFullName; ?> </span>
                                        </div>
                                       
                                        <div class="PHMidBottom">
                                            <div class="PHMidBottom1">
                                                <span><?php echo $ID_Number; ?></span>
                                                <input type="hidden" name="UserStudentID" id="UserStudentID" value="<?php echo $dbStudid;?>">
                                                <input type="hidden" name="UserStudentID" id="UserAccountID" value="<?php echo $UserAccount_ID;?>">
                                            </div>
                                            <div class="PHMidBottom2">
                                                <span><?php echo $UserEmailad; ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="PHRight">
                                        <div class="PHRight1">
                                            <button id="ChangeProf">Change Profile</button>
                                            <button id="EditProf" onclick="EditUserProf()">Edit</button>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>

                            <div class="ProfContent">
                                <div class="ProfContentMain">
                                    
                                    <div class="ProfContentMain2">
                                        <div class="ProfContentHeader">
                                            <h4>Personal Information</h4>
                                        </div>
                                        <div class="ProfContentInputs">
                                            <div class="PCInput">
                                                <label for="PCFName">First Name</label>
                                                <input id="PFFName" type="text" value="<?php echo $UserFName; ?>">
                                            </div>

                                            <div class="PCInput">
                                                <label for="PCFName">Middle Name</label>
                                                <input id="PFMName" type="text" value="<?php echo $UserMName; ?>">
                                            </div>

                                            <div class="PCInput">
                                                <label for="PCFName">Last Name</label>
                                                <input id="PFLName" type="text" value="<?php echo $UserLName; ?>">
                                            </div>
                                            
                                            <div class="PCInput">
                                                <label for="PCFName">Gender</label>
                                                <input id="PFGender" type="text" value="<?php echo $UserGender; ?>">
                                            </div>
                                            
                                            <div class="PCInput">
                                                <label for="PCFName">Birthday</label>
                                                <input id="PFBirthday" type="text" value="<?php echo $UserBirthday; ?>">
                                            </div>

                                            <div class="PCInput">
                                                <label for="PCFName">Birth Place</label>
                                                <input id="PFBplace" type="text" value="<?php echo $UserBPlace; ?>">
                                            </div>

                                            <div class="PCInput">
                                                <label for="PCFName">Religion</label>
                                                <input id="PFReligion" type="text" value="<?php echo $UserReligion; ?>">
                                            </div>

                                            <div class="PCInput">
                                                <label for="PCFName">Home Address</label>
                                                <input id="PFHomeAd" type="text" value="<?php echo $UserHomeAddress; ?>">
                                            </div>

                                            <div class="PCInput">
                                                <label for="PCFName">Last School</label>
                                                <input id="PFLastSchool" type="text" value="<?php echo $UserLastSchool; ?>">
                                            </div>

                                            <div class="PCInput">
                                                <label for="PCFName">Contact Number</label>
                                                <input id="PFContNum" type="text" value="<?php echo $UserContNum; ?>">
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="ProfContentMain3">
                                        <div class="ProfContentHeader">
                                            <h4>Account Information</h4>
                                        </div>
                                        <div class="ProfContentInputs">
                                            <div class="PCInput">
                                                <label for="PCFName">Email Address</label>
                                                <input id="PFEmail" type="text" value="<?php echo $UserEmailad; ?>">
                                            </div>

                                            <div class="PCInput">
                                                <label for="PCFName">Password</label>
                                                <input id="PFPassword" type="password" value="<?php echo $UserPassword; ?>">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="ProfContentMain4">
                                        <div class="ProfContentHeader">
                                            <h4>Parent`s Information</h4>
                                        </div>
                                        <div class="ProfContentInputs">
                                            <div class="PCInput">
                                                <label for="PCFName">Father`s Name</label>
                                                <input id="PFFathersName" type="text" value="<?php echo $UserFathersName; ?>">
                                            </div>

                                            <div class="PCInput">
                                                <label for="PCFName">Father`s Occupation</label>
                                                <input id="PFFathOccu" type="text" value="<?php echo $UserFOccupation; ?>">
                                            </div>

                                            <div class="PCInput">
                                                <label for="PCFName">Mother`s Name</label>
                                                <input id="PFMothersName" type="text" value="<?php echo $UserMothersName; ?>">
                                            </div>

                                            <div class="PCInput">
                                                <label for="PCFName">Mother`s Occupation</label>
                                                <input id="PFMothOccu" type="text" value="<?php echo $UserMOccupation; ?>">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="ProfContentMain5">
                                        <div class="ProfContentHeader">
                                            <h4>Emergency Information</h4>
                                        </div>
                                        <div class="ProfContentInputs">
                                            <div class="PCInput">
                                                <label for="PCFName">Emergency Contact Person</label>
                                                <input id="PFEmergPers" type="text" value="<?php echo $UserEmergCont; ?>">
                                            </div>

                                            <div class="PCInput">
                                                <label for="PCFName">Emergency Contact Number</label>
                                                <input id="PFEmergCont" type="text" value="<?php echo $UserEmergNum; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="EditProfSave">
                                    <button id= "ProfileSave">Save</button>
                                    <button id= "ProfileClose" onclick="CloseUserProf()">Close</button>
                            </div>

                        </div>
                    </div>
                    <div id="ClassmatesArea">
                        <div class="ClassmatesMainCont">
                            <div class="ClassMContHeader">
                                <h4>Meet Your Classmates <?php echo "(" . $ClassmatesCount . ")" ; ?></h4>

                                <div id="toggleGroupChat">
                                    <img src="images/chat-two-bubbles-oval.png" alt=""><span>Group Chat</span>
                                </div>
                               
                            </div>

                            <div class="ClassMCont">
                                <?php
                                $ClassmateList = FetchClassmates($connect2db, $SectionID, $dbStudid);

                                if (!empty($ClassmateList)) {
                                    foreach ($ClassmateList as $Classmates) {
                                        ?>
                                        <div class="CMInput">
                                            <div class="CMInputLeft">
                                                <img class="ClassmateProfile" src="<?php echo $Classmates['CLStudProfile']; ?>" alt="">
                                            </div>

                                            <div class="CMInputRight">
                                                <div class="CMInputRightTop">
                                                    <span><?php echo $Classmates['CLStudFName'] . " " . $Classmates['CLStudLName']; ?></span>
                                                </div>

                                                <div class="CMInputRightBottom">
                                                    <span>
                                                        <?php 
                                                        $CLAddress = $Classmates['CLHomeAddress'];

                                                        if (strlen($CLAddress) > 32) {
                                                            echo substr($CLAddress, 0, 32) . "...";
                                                        } else {
                                                            echo $CLAddress;
                                                        }
                                                        ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                } else {
                                    echo '
                                        <style>
                                            .ClassMCont {
                                                height: 80%;
                                                width: 100%;
                                                display: flex;
                                            }
                                        </style>
                                        <div class="ErrorImage">
                                            <img src="images/page-not-found-1.png" alt="">
                                            <span> Oops! No classmates found </span>
                                        </div>
                                    ';
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div id="GradesArea">
                        <div class="GAMainCont">
                            <div class="GAHeader">
                                <div class="ReceiptHeader2">
                                    <div class="ReceiptTitle2">
                                        <div class="LogoReceipt2">
                                                <img src="images/CHS Logo2.png">
                                        </div>
                                        
                                        <h3>Christian Horizon School Inc</h3>
                                        <span>Purok Mabinati-on, Ubaldo D. Laya <br> Iligan City, Philippines</span>
                                    </div>
                                </div>
                            </div>

                            <div class="GAContent">
                                <div class="GAContentHeader1">
                                    <h3>Report Card</h3>
                                </div>
                                <div class="GAContentHeader">
                                <div class="GAContentHeaderLeft">
                                        <div class="LeftCont">
                                            <label for="">ID No: </label>
                                            <span><?php echo $ID_Number; ?></span>
                                        </div>
                                        <div class="LeftCont">
                                            <label for="">Name: </label>
                                            <span><?php echo $UserFullNamewM; ?></span>
                                        </div>
                                        <div class="LeftCont">
                                            <label for="">Grade & Section: </label>
                                            <span> <?php echo $GradeSec; ?></span>
                                        </div>
                                    </div>

                                    <div class="GAContentHeaderRight">
                                        <div class="RightCont">
                                            <label for="">Date: </label>
                                            <span> <?php echo $currentDate2; ?></span>
                                        </div>
                                        <div class="RightCont">
                                            <label for="">Gender: </label>
                                            <span> <?php echo $UserGender; ?></span>
                                        </div>
                                        <div class="RightCont">
                                            <label for="">LRN: </label>
                                            <span> <?php echo $UserLRN; ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="GAContentBottom">
                                    <div class="GAContentBottomHeder">
                                        <div class="SchoolYearGrade">
                                            <select id="SelectSubjects">
                                                <option value="<?php echo $SchoolYear_ID; ?>"></option>
                                               
                                            </select>
                                        </div>
                                    </div>

                                    <div id="GAContentBottomMain">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="ScheduleArea">
                        <div class="SAMainCont">
                            <div class="SchedulesMContHeader">
                                <h4>Class Schedule</h4>
                            </div>

                            <div class="ScheduleMCont">
                                <?php
                               
                               $runsql3 = "SELECT student.*, accounts.*, subjects.*, section.*, gradelevel.*, strand.*
                               FROM subjects
                               LEFT JOIN accounts ON subjects.SectionID = accounts.SectionID
                               LEFT JOIN section ON subjects.SectionID = section.SectionID
                               LEFT JOIN gradelevel ON subjects.GradeLevel_ID = gradelevel.Gradelevel_ID
                               LEFT JOIN strand ON subjects.Strand_ID = strand.Strand_ID
                               LEFT JOIN student ON student.Student_ID = accounts.Account_ID
                               WHERE accounts.Student_ID = '$dbStudid'";
                                
                                $result1 = mysqli_query($connect2db, $runsql3);

                                    if(mysqli_num_rows ($result1)> 0){
                                        while ($row2 = mysqli_fetch_assoc($result1)) {
                                            $Subject_ID = $row2["Subject_ID"];
                                            $Subject_Code = $row2["Subject_Code"];
                                            $Subject_Name = $row2["Subject_Name"];
                                            $Subject_Description = $row2["Subject_Description"];
                                            $StartTime = $row2["StartTime"];
                                            $EndTime = $row2["EndTime"];
                                    
                                            echo '
                                            <div class="SchedDiv">
                                                <div class="SchedLeft">
                                                    <div class="SchedLeftTop">
                                                        <h4>Mon - Fri</h4>
                                                    </div>
    
                                                    <div class="SchedLeftBottom">
                                                        <span>'.$StartTime . ' - '. $EndTime .'</span>
                                                    </div>
                                                </div>
                                                <div class="SchedRight">
                                                    <div class="SchedRightTop">
                                                        <h4>'.$Subject_Name .'</h4>
                                                    </div>
    
                                                    <div class="SchedRightBottom">
                                                        <span>'.$Subject_Description .'</span>
                                                    </div>
                                                </div>
                                            </div>
                                            '; 
                                        }
                                    }
                                    else {
                                        echo '
                                            <style>
                                                .ClassMCont {
                                                    height: 80%;
                                                    width: 100%;
                                                    display: flex;
                                                }
                                            </style>
                                            <div class="ErrorImage">
                                                <img src="images/page-not-found-1.png" alt="">
                                                <span> Oops! No Class Schedule found </span>
                                            </div>
                                        ';
                                    }
                                  
                                ?>
                           
                            </div>
                        </div>
                    </div>
                    <input id="CheckStudentID" type="hidden" value="<?php echo $dbStudid; ?>">

                    <!------------- Payment Area---------->
                    <div id="PaymentsArea">
                        <div id="PaymentHeader">

                        </div>
                        <div class="PaymentMain">
                            <div id="BarNoteDetails">
                                <span id="ProgressNote">Note: Please pay a minimum of &#8369;1000 to the Finance to
                                    be
                                    officially enrolled or
                                    Select a payment method below
                                </span>
                            </div>

                            <div class="PaymentContMain">
                                <div class="PCPaymentMethodCont">
                                    <div class="PCPaymentMethodLeft">
                                        <label for="PCPaymentMethod">Payment Method:</label>
                                    </div>
                                    <div class="PCPaymentMethodRight">
                                        <div id="MethodImages"><img src="images/gcash1.jpg" alt=""></div>
                                        <input type="hidden" value="Gcash" id="PCPaymentMethod">
                                    </div>
                                </div>
                                <div class="QRCodeDiv">
                                    <div class="QRLeftSide">
                                        <img src="images/qr.jpg" alt="">

                                    </div>
                                    <div class="QRRightSide">
                                        <div class="ScanMe">
                                            <div class="PaymentBelow">
                                                <span>Scan QR Code to pay</span>
                                                <button onclick="ShowAssessment()" id="ViewAssessment">Assessment Form</button>
                                               
                                            </div>
                                        </div>

                                        <div class="BankInfo">
                                            <h3>School`s Bank Information</h3>
                                            <span class="BankAcc">Account Name: <strong>Christian Horizon School Inc
                                                </strong></span>
                                            <span class="BankAccNum">Account Number: <strong>00123456789</strong></span>
                                        </div>

                                    </div>
                                </div>
                                <h4 class="PaymentTitle">Payment Information</h4>
                                <div class="PCPaymentInputs">
                                    <div>
                                        <label for="PCSendersName">Sender`s Name:</label>
                                        <input type="text" id="PCSendersName" name="PCSendersName">
                                    </div>
                                    <div>
                                        <label for="PCReceiversName">Receiver`s Name:</label>
                                        <input type="text" id="PCReceiversName" value="<?php echo $BankAccountName ?>">
                                    </div>
                                    <div>
                                        <label for="PCPaymentAmount">Amount:</label>
                                        <input type="number" id="PCPaymentAmount">
                                    </div>
                                    <div>
                                        <label for="PCPaymentDate">Payment Date:</label>
                                        <input type="text" id="PCPaymentDate">
                                    </div>
                                    <div>
                                        <label for="PCPScreenshot">Proof of Payment (Screenshot):</label>
                                        <input type="file" id="PCPScreenshot">
                                    </div>
                                    <div>
                                        <label for="PCRefNum">Reference Number:</label>
                                        <input type="text" id="PCRefNum">
                                    </div>
                                </div>

                                <div class="SubmitPaymentDiv">
                                    <button type="submit" id="SubmitPayment">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!----------------------------- Right Main ------------------------->
        <div class=" RightMain">
            <div class="RightMainCont">
                <div class="RightMainContHeader">
                    <span>Profile</span>
                    <div class="EditProfRight">
                        <img src="images/pen.png" alt="">
                    </div>
                </div>

                <div class="RightMainContBottom">
                    <div class="StudProfileDiv">
                        <div class="StudProfBorder">
                            <img class="StudProfile" src="<?php echo $UserProfile; ?>" alt="">
                            <img class="StudProfileBorder" src="images/borderProfile.png" alt="">
                        </div>
                    </div>

                    <div class="StudNameDiv">
                        <div class="StudFullName">
                            <span>
                                <?php echo $UserFullName; ?>
                            </span>
                        </div>
                        <div class="StudFullTitle">
                            <span>
                                <?php echo $GradeSec; ?>
                            </span>
                        </div>
                    </div>

                    <div class="Seperator"></div>

                </div>
            </div>
        </div>
    </div>

    <script src="StudentDashboard.js"></script>
</body>

</html>