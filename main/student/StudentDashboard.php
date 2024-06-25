<?php
include('loader.php');
include('connect2db.php');
session_start();

$user_id = "";
$userFname = "";
$CheckHour = "";
$BankAccountName = "Christian Horizon School Inc";

$dbStudid = $_SESSION["dbid"];
$runsql = mysqli_query($connect2db, "SELECT * FROM student WHERE Student_ID='$dbStudid'");
if ($_SESSION["dbid"]) {
    $user_id = $_SESSION["dbid"];

    $runsql = mysqli_query($connect2db, "SELECT accounts.*, student.* 
    FROM accounts
    LEFT JOIN student ON accounts.Student_ID = student.Student_ID
    WHERE Account_ID = '$user_id'");

    $row = mysqli_fetch_assoc($runsql);
    $Enrollment_ID = $row["Student_ID"];
    $UserEnrollDate = $row["Enrollment_Date"];
    $UserEnrollStat = $row["Enrollment_Status"];
    $UserSY = $row["School_year"];
    $UserStat = $row["Status"];
    $UserLRN = $row["LRN"];
    $UserIncLevel = $row["Incoming_Level"];
    $UserStudPicSize = $row["Student_PicturePath"];
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
    $UserFathersName = $row["Fathers_Full_Name"];
    $UserFOccupation = $row["Fathers_Occupation"];
    $UserMothersName = $row["Mothers_Full_Name"];
    $UserMOccupation = $row["Mothers_Occupation"];
    $UserEmergCont = $row["Emergency_ContactPerson"];
    $UserEmergNum = $row["Emergency_ContactNumber"];

    $UserSection = $row["SectionID"];
    $UserFullName = ucfirst($UserFName) . " " . ucfirst($UserLName);
}

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
    
    <div class="Main">
        <!----------------------------- Left Main ------------------------->
        <div class="LeftMain">
            <div class="LeftMainCont">
                <div class="LeftMainContHeader">
                    <img src="images/CHS Logo1.png">
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
                    <div class="SearchDiv">
                        <img src="images/search (2).svg">
                        <input class="SearchSubject" type="text" placeholder="What do you have in mind?">

                        <div class="DateDiv">
                            <span>
                                <?php echo $currentDate; ?>
                            </span>

                            <div class="SearchDivRight">
                                <img src="images/bell-notification (1).png" alt="">
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
                                            <span class="Quote">"Your work is going to fill a large part of your life,
                                                and
                                                the
                                                only way to be truly satisfied is to do what you believe is great work.
                                                The
                                                only way to do great work is to love what you do. Don`t settle." -Steve
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
                                // Fetch Subjects of Student
                                
                                $runsql2 = mysqli_query($connect2db, "SELECT subjects.*, section.*, teachers.* 
                                FROM subjects
                                LEFT JOIN section ON subjects.SectionID = section.SectionID
                                LEFT JOIN teachers ON subjects.Teacher_ID = teachers.TeacherID
                                WHERE subjects.SectionID = '$UserSection'");

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
                                ?>
                            </div>
                        </div>
                    </div>

                    <div id="AnnouncementArea"></div>
                    <div id="ClassmatesArea"></div>
                    <div id="GradesArea"></div>
                    <div id="ScheduleArea"></div>
                    <!------------- Payment Area---------->
                    <div id="PaymentsArea">
                        <div id="PaymentHeader">

                        </div>
                        <div class="PaymentMain">
                            <div class="PaymentContMain">
                                <div class="BarNoteDetails">
                                    <span id="ProgressNote">Note: Please pay a minimum of &#8369;1000 to the Finance to
                                        be
                                        officially enrolled or
                                        Select a payment method below
                                    </span>
                                </div>

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
                                            <span>Scan QR Code to pay</span>
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
        <div class="RightMain">
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
                            <img class="StudProfile" src="<?php echo $UserStudPicSize; ?>" alt="">
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
                                <?php echo $UserIncLevel; ?>
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