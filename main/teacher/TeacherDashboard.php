<?php

include('connect2db.php');
session_start();

$user_id = "";
$CheckHour = "";
$BankAccountName = "Christian Horizon School Inc";

$TeacherID = $_SESSION["TeacherID"];
$runsql2 = mysqli_query($connect2db, "SELECT * FROM accounts WHERE Account_ID = '$TeacherID'");

$row = mysqli_fetch_assoc($runsql2);
$DBTeacherID = $row["TeacherID"];
$ID_Number = $row["ID_Number"];

//--------------------------------------------

$runsql = mysqli_query($connect2db, "SELECT teachers.*, subjects.*, section.*, gradelevel.*
FROM teachers
LEFT JOIN subjects ON teachers.TeacherID = subjects.Teacher_ID
LEFT JOIN section ON teachers.TeacherID = section.Teacher_ID
LEFT JOIN gradelevel ON section.Gradelevel_ID =  gradelevel.Gradelevel_ID
WHERE TeacherID='$DBTeacherID'");

$row = mysqli_fetch_assoc($runsql);
$ProfilePath = $row["ProfilePath"];
$UserFName = $row["FirstName"];
$LastName = $row["LastName"];
$UserFullName = $UserFName . " " . $LastName;
$SectionName = $row["SectionName"];
$GradeLevel = $row["GradeLevel"];
$Advisory = $GradeLevel . " " . $SectionName;
$TeacherRole = "";

if ($SectionName == null) {
    $TeacherRole = "Teacher";
} else {
    $TeacherRole = "Adviser: " . $Advisory;

}


//--------------------------------------------

date_default_timezone_set('Asia/Manila');
$currentDate = date('l, F j, Y');
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

//--------------------------------------------


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Christian Horizon School Inc</title>
    <link rel="icon" type="image/x-icon" href="/images/CHS Logo1.png">
    <link rel="stylesheet" href="TeacherDashboard.css">
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
                       <!-- <li id="AnnouncementTab" onclick="changeToAnnouncements()"><img id="AnnouncementImage"
                                src="images/advertising-megaphone.png">Profile
                        </li>
                        <li id="ClassmatesTab" onclick="changeToClassmates()"><img id="ClassmatesImage"
                                src="images/user-friends-4.png">Subjects
                        </li>

                        -->
                        <li id="GradesTab" onclick="changeToGrades()"><img id="GradesImage"
                                src="images/graduation-hat.png">Grades
                        </li>

                        <!--
                        <li id="ScheduleTab" onclick="changeToSchedule()"><img id="ScheduleImage"
                                src="images/calendar-school.png">Schedule
                        </li>
                        -->
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

                        <div class="DateDiv">
                            <span>
                                <?php echo $currentDate; ?>
                            </span>


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
                                <h3>Assigned Subjects</h3>
                            </div>

                            <div class="DSubjectsCont">

                                <?php

                                $runsql4 = mysqli_query($connect2db, "SELECT * FROM accounts WHERE Account_ID = '$TeacherID'");
                                $row4 = mysqli_fetch_assoc($runsql4);
                                $DBTeacherID = $row4["TeacherID"];

                                //--------------------------------------------
                                
                                $runsql5 = mysqli_query($connect2db, "SELECT teachers.TeacherID, subjects.*, section.*, gradelevel.*
                                FROM subjects
                                LEFT JOIN teachers ON subjects.Teacher_ID = teachers.TeacherID
                                LEFT JOIN section ON subjects.SectionID = section.SectionID
                                LEFT JOIN gradelevel ON subjects.Gradelevel_ID =  gradelevel.Gradelevel_ID
                                LEFT JOIN strand ON subjects.Strand_ID =  strand.Strand_ID
                                WHERE subjects.Teacher_ID='$DBTeacherID'");

                                while ($row6 = mysqli_fetch_assoc($runsql5)) {
                                    $SubjectName = $row6['Subject_Name'];
                                    $SectionName = $row6["SectionName"];
                                    $GradeLevel = $row6["GradeLevel"];

                                    $SubjTeacher = $GradeLevel . " - " . $SectionName;

                                    echo '<div class="SubjectDiv"><div class="SubjectDivTop"> <span>' . $SubjectName . '</span></div> 
                                    <div class="SubjectDivBottom"><span> ' . $SubjTeacher . '</span> </div> </div>';
                                }

                                ?>
                                <input type="hidden" id="CheckEnrollStat" value="<?php echo $UserEnrollStat ?>">
                            </div>
                        </div>
                    </div>

                    <div id="AnnouncementArea"></div>
                    <div id="ClassmatesArea"></div>
                    <div id="GradesArea">
                        <div class="GAMainCont">
                            <div class="GATitle">
                                <h3>Add Grades</h3>
                            </div>
                            <div class="GAHeader">
                                <div class="GAHeaderLeft">
                                    <div class="FilterByContSubj">
                                        <select id="SelectSubjects">

                                        </select>
                                    </div>
                                    <div class="FilterByContSY">

                                        <select id="SelectSchoolYear">

                                        </select>
                                    </div>
                                </div>

                                <div class="GAHeaderRight">
                                    <button id="AddStudentGrade"><img src="images/plus-circle.svg"> Grade</button>
                                </div>
                            </div>
                            <div class="Seperator2"></div>

                            <div class="GAContent">
                                <div id="StudListDiv"></div>
                                <div id="BarNoteDetails">
                                    <span id="ProgressNote">
                                    </span>
                                </div>
                            </div>
                            
                            <div class="AddGradeCont">
                                <button id="AddGradeSave" onclick="AddStudGrades()">Save</button>
                                <button id="AddGradeCancel">Cancel</button>
                            </div>
                        </div>
                    </div>
                    <div id="ScheduleArea"></div>
                    <input id="CheckStudentID" type="hidden" value="<?php echo $dbStudid; ?>">

                    <!------------- Payment Area---------->


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
                            <img class="StudProfile" src="<?php echo $ProfilePath; ?>" alt="">
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
                                <?php echo $TeacherRole; ?>
                            </span>
                        </div>
                    </div>

                    <div class="Seperator"></div>

                </div>
            </div>
        </div>
    </div>

    <script src="TeacherDashboard.js"></script>
</body>

</html>