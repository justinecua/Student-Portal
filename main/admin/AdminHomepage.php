<?php
$DisplayMessage = "";

include ('../db/connect/connect2db.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Christian Horizon School Inc</title>
    <link rel="icon" type="image/x-icon" href="../../images/CHS Logo1.png">
    <link rel="stylesheet" href="AdminHomepage.css">
    
</head>

<body>
    <!--  Enrollment More Info-->
    <div id="ENoverlay">
        <div class="ENoverlayContainer">
            <div class="ENOverlayContents">
                <div class="ENOverlayheader"><button id="ENcloseoverlayContainer">&times;</button></div>
                <div id="ENUserIdDiv" name="ENUserId"></div>
            </div>
        </div>
    </div>

    <div id="overlay">
        <div class="inputsArea">
            <div class="CloseContainer">
                <div class="Overlayheader"><button type="button" id="CloseAddSubj">&times;</button></div>
            </div>
            <div id="inputs">
                <h4>Add Subject</h4>
                <label for="SubjectCode">Subject Code</label>
                <input type="text" name="SubjectCode" id="SubjectCode">
                <label for="SubjectName">Subject Name</label>
                <input type="text" name="SubjectName" id="SubjectName">
                <label for="SubjectDescription">Description</label>
                <input type="text" name="SubjectDescription" id="SubjectDescription">
                <label for="StartTime">Start Time</label>
                <input type="time" name="StartTime" id="StartTime">
                <label for="EndTime">End Time</label>
                <input type="time" name="EndTime" id="EndTime">
                <label for="SubjectSection">Section</label>
                <select name="SubjectSection" id="SubjectSection">
                </select>
                <input type="hidden" name="SubjectGradeLevel" id="SubjectGradeLevel">
                </input>
                <label for="SubjectTeacher">Subject Teacher</label>
                <select name="SubjectTeacher" id="SubjectTeacher">
                </select>
                <label for="CurrSchoolYear">School Year</label>
                <input type="text" name="CurrSchoolYear" class="CurrSchoolYear">
                <input type="hidden" name="CurrSchoolYearID" class="CurrSchoolYearID">
                <button id="SubmitSubjectBtn" name="SubmitSubjectBtn" type="submit"> Add Subject</button>
                <div class="DisplayMessage"><span id="DisplayMessageSpan"></span></div>
            </div>
        </div>
    </div>

    <!-- Teacher Overlay-->
    <div id="TFoverlay">
        <div class="TFinputsArea">
            <div class="TFCloseContainer">
                <div class="TFOverlayheader"><button type="button" id="TFCloseSchoolYear">&times;</button></div>
            </div>
            <div id="TFinputs">
                <h4>Add Teacher </h4>
                <input type="file" name="TFProfilePic" id="TFProfilePic">
                <label for="TFFirstName">First Name</label>
                <input type="text" name="TFFirstName" id="TFFirstName">
                <label for="TFMiddleName">Middle Name</label>
                <input type="text" name="TFMiddleName" id="TFMiddleName">
                <label for="TFLastName">Last Name</label>
                <input type="text" name="TFLastName" id="TFLastName">
                <label for="TFAge">Age</label>
                <input type="text" name="TFAge" id="TFAge">
                <label for="TFBirthday">Birthday</label>
                <input type="date" name="TFBirthday" id="TFBirthday">
                <label for="TFContNum">Contact Number</label>
                <input type="text" name="TFContNum" id="TFContNum">
                <label for="TFHomeAd">Home Address</label>
                <input type="text" name="TFHomeAd" id="TFHomeAd">
                <label for="TFEmailAd">Email Address</label>
                <input type="text" name="TFEmailAd" id="TFEmailAd">
                <label for="TFPassword">Password</label>
                <input type="password" name="TFPassword" id="TFPassword">

                <button id="TFAddTeacher" name="TFAddTeacher" type="submit">Add Teacher</button>
                <div class="TFDisplayMessage"><span id="TFDisplayMessage"></span></div>
            </div>
        </div>
    </div>


    <div id="Eoverlay">
        <div class="EinputsArea">
            <div class="ECloseContainer">
                <div class="EOverlayheader"><button type="button" id="ECloseAddSubj">&times;</button></div>
            </div>
            <div id="Einputs">

                <h4>Edit Subject</h4>
                <label for="ESubjectName">Subject</label>
                <input type="text" name="ESubjectName" id="ESubjectName">
                <label for="ESubjectType">Subject For</label>
                <input type="text" name="ESubjectType" id="ESubjectType">
                <label for="ETeacherName">Teacher Name</label>
                <input type="text" name="ETeacherName" id="ETeacherName">
                <input type="hidden" name="SubjectID">
                <button id="EAddSubject" name="EAddSubject" type="submit">Submit</button>
                <div class="EDisplayMessage"><span id="EEDisplayMessage"></span></div>

            </div>
        </div>
    </div>

    <div id="Doverlay">
        <div class="DinputsArea">
            <div class="DCloseContainer">
                <div class="DOverlayheader"><button type="button" id="DCloseAddSubj">&times;</button></div>
            </div>
            <div id="Dinputs">
                <span>Are you sure you want to delete this Subject?</span>
                <div class="DelOptions">
                    <button id="YesDel" name="YesDel" type="submit">Yes</button>
                    <button id="NoDel" name="NoDel" type="submit">No</button>
                </div>
                <div class="DisplayMessageDel"><span id="DisplayMessageDel"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Enroll Confirmation Overlay-->
    <div id="ECoverlay">
        <div class="ECinputsArea">
            <div class="ECCloseContainer">
                <div class="ECOverlayheader"><button type="button" class="ECCloseAddSubj">&times;</button></div>
            </div>
            <div id="ECinputs">
                <h3>Confirm Enrollment?</h3>
                <span>Are you sure you want to confirm this student`s enrollment?</span>
                <div class="DelOptions">
                    <button id="ConfirmStudEnroll" name="YesDel" type="submit">Confirm</button>
                    <button class="CancelStudEnroll" name="NoDel" type="submit">Cancel</button>
                </div>
                <div class="ECDisplayMessage"><span id="ECDisplayMessagee"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Enroll Decline Overlay-->
    <div id="EDoverlay">
        <div class="EDinputsArea">
            <div class="EDCloseContainer">
                <div class="EDOverlayheader"><button type="button" class="EDCloseAddSubj">&times;</button></div>
            </div>
            <div id="EDinputs">
                <h3>Decline Enrollment?</h3>
                <span>Are you sure you want to decline this student`s enrollment?</span>
                <div class="DelOptions">
                    <button id="DeclinetudEnroll" name="YesDel" type="submit">Decline</button>
                    <button class="CancelStudEnroll" name="NoDel" type="submit">Cancel</button>
                </div>
                <div class="EDDisplayMessage"><span id="EDDisplayMessagee"></span>
                </div>
            </div>
        </div>
    </div>


    <!-- School Fee Overlays-->
    <div id="SFoverlay">
        <div class="SFinputsArea">
            <div class="SFCloseContainer">
                <div class="SFOverlayheader"><button type="button" id="SFCloseSchoolFee">&times;</button></div>
            </div>
            <div id="SFinputs">
                <h4>Add School Fee</h4>
                <label for="SFName">School Fee Name</label>
                <input type="text" name="SFName" id="SFName">
                <label for="SFPrice">School Fee Price</label>
                <input type="text" name="SFPrice" id="SFPrice">
                <label for="SFType">Grade Level</label>
                <select name="SFType" id="SFType">
                </select>
                <button id="SubmitSFBtn" name="SubmitSFBtn" type="submit"> Add School Fee</button>
                <div class="SFDisplayMessage"><span id="SFDisplayMessageSpan"></span></div>

            </div>
        </div>
    </div>

    <div id="SFEoverlay">
        <div class="SFEinputsArea">
            <div class="SFECloseContainer">
                <div class="SFEOverlayheader"><button type="button" id="SFEClose">&times;</button></div>
            </div>
            <div id="SFEinputs">
                <h4>Edit School Fee</h4>
                <label for="SFEName">School Fee Name</label>
                <input type="text" name="SFEName" id="SFEName">
                <label for="SFEPrice">School Fee Price</label>
                <input type="text" name="SFEPrice" id="SFEPrice">
                <label for="SFEType">School Fee Type</label>
                <select name="SFEType" id="SFEType">
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
                    <option value="Grade 9">Grade 11</option>
                    <option value="Grade 10">Grade 12</option>
                    <option value="Grade 1 - Grade 6">Grade 1 - Grade 6</option>
                    <option value="Grade 1 - Grade 10">Grade 1 - Grade 10</option>
                    <option value="Grade 1 - Grade 12">Grade 1 - Grade 12</option>
                    <option value="Grade 4 - Grade 10">Grade 4 - Grade 10</option>
                    <option value="Grade 7 - Grade 10">Grade 7 - Grade 10</option>
                    <option value="Grade 11 - Grade 12">Grade 11 - Grade 12</option>
                </select>

                <button id="SubmitSFEBtn" name="SubmitSFEBtn" type="submit"> Submit</button>
                <div class="SFEDisplayMessage"><span id="SFEDisplayMessageSpan"></span></div>
            </div>
        </div>
    </div>

    <div id="SFDeloverlay">
        <div class="SFDelinputsArea">
            <div class="SFDelCloseContainer">
                <div class="SFDelOverlayheader"><button type="button" id="SFDelClose">&times;</button></div>
            </div>
            <div id="SFDelinputs">
                <span>Are you sure you want to delete this?</span>
                <div class="SFDelOptions">
                    <button id="SFYesDel" name="SFYesDel" type="submit">Yes</button>
                    <button id="SFNoDel" name="SFNoDel" type="submit">No</button>
                </div>
                <div class="SFDelDisplayMessage"><span id="SFDelDisplayMessageSpan"></span></div>
            </div>
        </div>
    </div>

    <!-- School Year Overlay-->
    <div id="SYoverlay">
        <div class="SYinputsArea">
            <div class="SYCloseContainer">
                <div class="SYOverlayheader"><button type="button" id="SYCloseSchoolYear">&times;</button></div>
            </div>
            <div id="SYinputs">
                <h4>Add School Year </h4>
                <label for="SYSchoolYear">School Year</label>
                <input type="text" name="SYSchoolYearName" id="SYSchoolYearName">
                <button id="SYAddSchoolYear" name="SYAddSchoolYear" type="submit">Add</button>
                <div class="SYDisplayMessage"><span id="SYDisplayMessage"></span></div>
            </div>
        </div>
    </div>

    <!--Strand Overlay-->
    <div id="Stroverlay">
        <div class="StrinputsArea">
            <div class="StrCloseContainer">
                <div class="StrOverlayheader"><button type="button" id="StrCloseStrand">&times;</button></div>
            </div>
            <div id="Strinputs">
                <h4>Add Strand</h4>
                <label for="StrStrand">Strand</label>
                <input type="text" name="StrStrand" id="StrStrand">
                <label for="StrDesc">Strand Description</label>
                <input type="text" name="StrDesc" id="StrDesc">
                <label for="CurrSchoolYear">School Year</label>
                <input type="text" name="CurrSchoolYear" class="CurrSchoolYear">
                <input type="hidden" name="CurrSchoolYearID" class="CurrSchoolYearID">
                <button id="StrAddStrand" name="StrAddStrand" type="submit">Add</button>
                <div class="StrDisplayMessage"><span id="StrDisplayMessage"></span></div>
            </div>
        </div>
    </div>

    <!--Course Overlay-->
    <div id="Crsoverlay">
        <div class="CrsinputsArea">
            <div class="CrsCloseContainer">
                <div class="CrsOverlayheader"><button type="button" id="CrsCloseCourse">&times;</button></div>
            </div>
            <div id="Crsinputs">
                <h4>Add Course</h4>
                <label for="CrsCourse">Course Name</label>
                <input type="text" name="CrsCourse" id="CrsCourse">
                <label for="CrsDesc">Course Description</label>
                <input type="text" name="CrsDesc" id="CrsDesc">
                <label for="CrsDuration">Course Duration</label>
                <input type="text" name="CrsDuration" id="CrsDuration">
                <button id="CrsAddCourse" name="CrsAddCourse" type="submit">Add</button>
                <div class="CrsDisplayMessage"><span id="CrsDisplayMessage"></span></div>
            </div>
        </div>
    </div>


    <!-- Grading Period Overlay-->
    <div id="GLoverlay">
        <div class="GLinputsArea">
            <div class="GLCloseContainer">
                <div class="GLOverlayheader"><button type="button" id="GLCloseGradingPeriod">&times;</button></div>
            </div>
            <div id="GLinputs">
                <h4>Add Grading Level </h4>
                <label for="GLGradingLevel">Grading Level</label>
                <input type="text" name="GLGradingLevel" id="GLGradingLevel">
                <label for="CurrSchoolYear">School Year</label>
                <input type="text" name="CurrSchoolYear" class="CurrSchoolYear">
                <input type="hidden" name="CurrSchoolYearID" class="CurrSchoolYearID">
                <button id="GLAddGradeLevel" name="GLAddGradeLevel" type="submit">Add</button>
                <div class="GLDisplayMessage"><span id="GLDisplayMessage"></span></div>
            </div>
        </div>
    </div>

    <!-- Section Overlay-->
    <div id="Secoverlay">
        <div class="SecinputsArea">
            <div class="SecCloseContainer">
                <div class="SecOverlayheader"><button type="button" id="SecCloseSection">&times;</button></div>
            </div>
            <div id="Secinputs">
                <h4>Add Section </h4>
                <label for="SecSection">Section Name</label>
                <input type="text" name="SecSection" id="SecSection">
                <label for="SecGradeLevel">Grade Level</label>
                <select name="SecGradeLevel" id="SecGradeLevel">
                </select>
                <label for="SecStrand">Strand</label>
                <select name="SecStrand" id="SecStrand">
                </select>
                <label for="SecAdviser">Adviser</label>
                <select name="SecAdviser" id="SecAdviser">
                </select>
                <label for="CurrSchoolYear">School Year</label>
                <input type="text" name="CurrSchoolYear" class="CurrSchoolYear">
                <input type="hidden" name="CurrSchoolYearID" class="CurrSchoolYearID">
                <button id="SecAddSection" onclick="CheckGradeLvlAndStrand()" name="SecAddSection"
                    type="submit">Add</button>
                <div class="SecDisplayMessage"><span id="SecDisplayMessage"></span></div>
                <div class="SecDispErrMess"><span id="SecDispErrMess"></span></div>
            </div>
        </div>
    </div>

    <div id="SYDeloverlay">
        <div class="SYDelinputsArea">
            <div class="SYDelCloseContainer">
                <div class="SYDelOverlayheader"><button type="button" id="SYDelCloseSchoolYear">&times;</button></div>
            </div>
            <div id="SYDelinputs">
                <h4>Add School Year </h4>
                <label for="SYDelSchoolYear">School Year</label>
                <input type="text" name="SYDelSchoolYearName" id="SYDelSchoolYearName">
                <button id="SYDelAddSchoolYear" name="SYDelAddSchoolYear" type="submit">Add</button>
                <div class="SYDelDisplayMessage"><span id="SYDisplayMessage"></span></div>
            </div>
        </div>
    </div>


    <!-- Grading Period Overlay-->
    <div id="GPoverlay">
        <div class="GPinputsArea">
             <div class="GPCloseContainer">
                <div class="GPOverlayheader"><button type="button" id="GPCloseSchoolYear">&times;</button></div>
            </div>
            <div id="GPinputs">
                <h4>Add Grading Period </h4>
                <label for="GPSchoolYear">Grading Period</label>
                <input type="text" name="GPGradingPeriodName" id="GPGradingPeriodName">
                <button id="GPAddSchoolYear" name="GPAddSchoolYear" type="submit">Add</button>
                <div class="GPDisplayMessage"><span id="GPDisplayMessage"></span></div>
            </div>
        </div>
    </div>

    <!-- Cover Photos Overlay-->
    <div id="CPoverlay">
        <div class="CPContainer">

            <div id="CPContent">
                <div class="CPPrevContainer">

                    <div id="CPMAddPhotos">
                        <div id="CPMAddPhotosDiv">
                            <input id="CPMAddPhotosInput" type="file" multiple style="display:none" ;>
                            <img class="CP_AddPhoto" src="../../images/add-circle (1).png" alt="">
                            <span>Click to Add Photos</span>
                        </div>

                        <div id="CP_LoadingBar">
                            <div class="LB_ImageCont">
                                <img class="LB_Image" src="../../../../../images/circle-9360.gif" alt="">
                                <span class="LB_Span">Uploading files</span>
                                <span class="LB_Span">Please wait for a while</span>
                            </div>
                        </div>
                    </div>

                    <h4 id="PreviewText"></h4>
                    <div id="CPMPreviewCont">
                    </div>
                </div>

                <div class="CPButtons">
                    <button id="SaveCoverPhoto">Save</button>
                    <button id="CancelCoverPhoto">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Events Overlay-->
    <div id="EventsOverlay">
        <div class="EvContainer">
            <div class="EvMainCont">
                <div class="EVC_Top">
                    <h3>Add Event</h3>
                </div>
                <div class="EVC_Bottom">
                    <div class="EVCB_1">
                        <label for="">Title</label>
                        <input type="text" placeholder="Input title of the event" >
                        <label for="">Caption</label>
                        <input type="text" placeholder="Input a short description about the event">
                        
                            <div class="EVCB1_Tags">
                                <div class="EVCB1T_Top">
                                    <label id="EVCB1T_label" for="">Tags</label>
                                    <button id="EVCB1T_btn"><img src="">Add</button>
                                </div>
                                <input id="EVCB1T_Bottom" placeholder="Input tag about the event " type="text">
                                <div id="TagsContainer"></div>
                            </div>

                        <label for="">Context</label>
                            <textarea id="w3review" rows="20" placeholder="Input main description about the event"></textarea>

                        <div class="EventsPhotosCont">
                            <div class="EPC_Top">
                                <label id="EPC_label" for="">Cover Photo</label>
                                <button id="AddCPhotoEvent"><img src="">Add</button>
                                <input id="EPC_Input" type="file" style="display:none" ;>
                            </div>

                            <div id="EPC_Bottom">
                                <img id="EventCPContainer">
                            </div>
                            
                        </div>
                        
                        <!--
                        <div class="EventsPhotosCont">
                            <label for="">Additional Photos</label>
                            <input type="hidden" multiple>
                        </div>

                        -->
                    </div>
                </div>
            </div>
            <div class="EVCB_2">
                <button id ="PostEventBtn">Post</button>
                <button id ="CancelPost">Cancel</button>
            </div>
        </div>
    </div>

    
    <div id="fadeBox"><span id="ContentBox"></span></div>
    <div class="AllDiv">
        <div class="TopNavbar">
            <div class="logoSchool">
                <img src="../../images/CHS Logo1.png">
                <span>Christian Horizon School Inc</span>
                <div id="queryInfo">

                </div>
            </div>
        </div>

        <div class="rightNavSection">
            <div class="navcont">
                <ul>
                    <div class="navtoppart">
                        <li id="HomeTab"><img src="../../images/home.svg">Dashboard</li>
                        <li id="AccountsTab"><img src="../../images/users (1).svg">Accounts
                        </li>
                        <li id="EnrollmentTab" onclick="changeTabToEnrollment()"><img
                                src="../../images/enrollment.png">Enrollments
                        </li>
                        <li id="EventsTab"><img src="../../images/photo&events.png">Photos & Events</li>
                        <li id="GradeLevelTab" onclick="changeTabToGradeLevel()"><img
                                src="../../images/category_white_24dp.svg">Grade
                            Level
                        </li>
                        <li id="StrandTab" onclick="changeTabToStrands()"><img src="../../images/school_white_24dp.svg">Strand
                            &
                            Courses
                        </li>
                        <li id="SchoolFeesTab" onclick="changeTabToSchoolFees()"><img
                                src="../../images/dollar-sign.svg">School
                            Fees
                        </li>

                        <li id="SchoolYearTab" onclick="changeTabToSchoolYear()"><img src="../../images/schoolYear.png">School Year
                        </li>
                        <li id="SectionTab" onclick="changeTabToSection()"><img src="../../images/section.png">Section
                        </li>
                        <li id="SubjectsTab" onclick="changeTabToSubjects()"><img src="../../images/book.svg">Subjects</li>

                        <li id="TeachersTab" onclick="changeTabToTeachers()"><img
                                src="../../images/supervised_user_circle_white_24dp.svg">Teachers
                        </li>
                        
                        <li id="PaymentsTab" onclick="changeTabToPayment()"><img src="../../images/credit-card.svg">Payments
                        </li>

                    </div>
                </ul>
                <div class="navbottompart">
                    <a href="../db/xhr/home/logout.php">
                        <div id="Logout"><img src="../../images/log-out.svg">Logout</div>
                    </a>
                </div>
            </div>
        </div>
        <div class="MainDiv">
            <div id="HomeArea">
                <div class="SubjectContents">
                    <div class="SubjectContentCont">
                        <div class="SubjContHeader">
                            
                        </div>
                        <div class="SubjectMainCont">
                            
                        </div>
                        <div class="STPageContainerDiv">
                        
                        </div>
                    </div>
                </div>
            </div>

            <div id="SubjectArea">
                <div class="SubjectContents">
                    <div class="SubjectContentCont">
                        <div class="SubjContHeader">
                            <div class="leftsideOptions">
                                <div class="DisplayCurrSchoolYear">

                                </div>
                            </div>
                            <div class="rightsideOptions">
                                <button id="AddSubject"><img src="../../images/plus-circle.svg">Subject</button>
                            </div>
                        </div>
                        <div class="SubjectMainCont">
                            <div class="LeftSubjCont">
                                <div class="LeftSubjContHeader">
                                    <h3>List of Subjects</h3>
                                    <div id="input-container">
                                        <img src="../../images/search (2).svg">
                                        <input id="SearchSubject" type="text" placeholder="Search a subject">

                                    </div>
                                </div>
                                <div id="LeftSubjContent">
                                </div>
                            </div>

                        </div>
                        <div class="STPageContainerDiv">
                            <div class="PageContSubj">

                            </div>
                            <div class="PageContTeachers">

                            </div>

                        </div>
                        <div class="AssignTeachCont">
                            <button id="AssignTeachSave" onclick="getCheckedCheckboxes()">Save</button>
                            <button id="AssignTeachCancel">Cancel</button>
                        </div>

                    </div>
                    <!--
                    <div class="ResultSUbjCont">

                    </div>
                    -->
                </div>
            </div>

            <div id="SchoolFeesArea">
                <div class="SubjectContents">
                    <div class="SubjectContentCont">
                        <div class="SubjContHeader">
                            <div class="leftsideOptions">
                                <div class="DisplayCurrSchoolYear">
                                </div>
                            </div>
                            <div class="rightsideOptions">
                                <button id="SFAdd"><img src="../../images/user-plus.svg">School Fees</button>
                            </div>
                        </div>
                        <div class="LeftSubjCont">
                            <div class="LeftSFContHeader">
                                <h3>List of School Fees</h3>
                                <div id="input-container">
                                    <img src="../../images/search (2).svg">
                                    <input id="SearchSchoolFees" type="text" placeholder="Search a School Fee">

                                    
                                </div>
                            </div>
                            <div id="SchoolFeesContents">
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div id="EnrollmentArea">
                <div class="SubjectContents">
                    <div class="SubjectContentCont">
                        <div class="SubjContHeader">
                            <div class="leftsideOptions">
                                <div class="DisplayCurrSchoolYear">
                                </div>
                            </div>
                        </div>
                        <div class="SubjectMainCont">
                            <div class="LeftSubjCont">
                                <div class="LeftSubjContHeader">
                                    <h3>Enrollments</h3>
                                    <div id="input-container">
                                        <img src="../../images/search (2).svg">
                                        <input id="SearchEnrollees" type="text" placeholder="Search a student">

                                        <div class="ByMainContSubj">
                                            <div class="FilterByContSubj">
                                                <select id="FilterEnrollments">
                                                    <option value="">Filter By</option>
                                                    <option value="Elementary">Elementary</option>
                                                    <option value="HighSchool">HighSchool</option>
                                                    <option value="Tesda">Tesda</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="ShowEnrollmentsContent">
                                </div>
                            </div>

                        </div>
                        <div class="STPageContainerDiv">
                            <div class="PageContSubj">

                            </div>
                            <div class="PageContTeachers">

                            </div>

                        </div>
                        <div class="AssignTeachCont">
                            <button id="AssignTeachSave" onclick="getCheckedCheckboxes()">Save</button>
                            <button id="AssignTeachCancel">Cancel</button>
                        </div>

                    </div>
                    <!--
                    <div class="ResultSUbjCont">

                    </div>
                    -->
                </div>
            </div>

            <div id="EventsArea">
                <div class="EventsContents">
                    <div class="EventsAreaBG">
                        <div class="EventsAreaBG2">

                            <div class="CoverPhotosMain">
                                <div class="CoverPhotosHeader">
                                    <div class="CPHLeft">
                                            <h3>Cover Photos</h3>
                                    </div>
                                    <div class="CPHRight">
                                        <div class="CPMBtns">
                                            <button id="AddCPBtn"><img src="">Photos</button>
                                        </div>
                                    </div>
                                </div>

                                <div id="CPMBottom">
                                    <div class="CPMBottom-Cont">
                                        <img id="EmptyData" src="https://ik.imagekit.io/5c2ivhy36/Downloading-2--Streamline-Brooklyn.png" alt="">
                                    </div>
                                </div>
                            </div>
                        
                            <div id="EventsMain">
                                <div class="EventsHeader">
                                    <div class="CPHLeft">
                                        <h3>School Events</h3>
                                    </div>
                                    <div class="CPHRight">
                                        <div class="ByMainContSubj2">
                                            <div class="FilterByContSubj">
                                                <select id="FilterEnrollments">
                                                    <option value="">SY 2023-2024</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="CPMBtns">
                                            <button id="UploadEventsBtn"><img src="../../images/plus-circle.svg">Events</button>
                                        </div>
                                    </div>
                                </div>

                                <div id="Events_Bottom">
                                   
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>

            <div id="SchoolYearArea">
                <div class="SubjectMainCont">
                    <div class="LeftSubjCont">
                        <div class="LeftSubjContHeader">
                            <div class="SYMainCont">
                                <div class="SYContainer">
                                    <div class="SYTopCont">
                                        <h3>List of School Year</h3>
                                        <button id="AddSchoolYear"><img src="../../images/plus-circle.svg">School
                                            Year</button>
                                    </div>
                                    <div id="SYBottomCont">
                                    </div>
                                </div>
                                <div class="SYContainer">
                                    <div class="SYTopCont">
                                        <h3>List of Grading Periods</h3>
                                        <button id="AddGradingPeriod"><img src="../../images/plus-circle.svg">Grading
                                            Period</button>
                                    </div>
                                   
                                    <div id="GPBottomCont">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="PaymentsArea">
                <div class="SubjectContents">
                    <div class="SubjectContentCont">
                        <div class="SubjContHeader">
                            <div class="leftsideOptions">
                                <div class="DisplayCurrSchoolYear">

                                </div>
                            </div>

                        </div>
                        <div class="SubjectMainCont">
                            <div class="LeftSubjCont">
                                <div class="LeftSubjContHeader">
                                    <h3>Payment Transactions</h3>
                                    <div id="input-container">
                                        <img src="../../images/search (2).svg">
                                        <input id="SearchPayments" type="text" placeholder="Search a student">

                                    </div>
                                </div>
                                <div id="ShowPaymentTable">
                                

                                </div>
                            </div>

                        </div>
                      
                    </div>
                    <!--
                    <div class="ResultSUbjCont">

                    </div>
                    -->
                </div>
            </div>
            <div id="AccountsArea">
                <div class="SubjectContents">
                    <div class="SubjectContentCont">
                        <div class="SubjContHeader">
                            <div class="leftsideOptions">
                                <div class="DisplayCurrSchoolYear">

                                </div>
                            </div>
                            <div class="rightsideOptions">
                                <button id="AsgnStudSect" onclick="toggleCheckboxVisibility(this)"><img
                                        src="../../images/plus-circle.svg">Assign</button>
                            </div>
                        </div>
                        <div class="SubjectMainCont">
                            <div class="LeftSubjCont">
                                <div class="LeftSubjContHeader">
                                    <h3>Enrolled Students</h3>
                                    <div id="input-container">
                                        <img src="../../images/search (2).svg">
                                        <input id="SearchAccount" type="text" placeholder="Search an account">

                                        <div class="ByMainContSubj">
                                            <div id="AssgnStudSectCont">
                                                <select id="EnrolledStudSec"></select>
                                            </div>
                                            <div class="FilterByContSubj">
                                                <select id="FilterEnrolledGradeLevel">
                                                
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="EnrolledStudContent">
                                
                                </div>
                            </div>
                        </div>
                        <div class="STPageContainerDiv">
                            <div class="PageContSubj">

                            </div>
                            <div class="PageContTeachers">

                            </div>

                        </div>
                        <div class="AssignTeachCont">
                            <div id="AssgnStudSecGuide"><span>Choose Student and Grade Level</span></div>
                            <button id="AsgnSecStudSave" onclick="CheckBoxStudEnroll()">Save</button>
                            <button id="AsgnSecStudCancel">Cancel</button>
                        </div>

                    </div>
                    <!--
                    <div class="ResultSUbjCont">

                    </div>
                    -->
                </div>
            </div>
            <div id="GradeLevelArea">
                <div class="GradeLevelContents">
                    <div class="SubjectContentCont">
                        <div class="SubjContHeader">
                            <div class="leftsideOptions">
                                <div class="DisplayCurrSchoolYear">
                                </div>
                            </div>
                            <div class="rightsideOptions">
                                <button id="AddGradeLevel"><img src="../../images/plus-circle.svg">Grade
                                    Level</button>
                            </div>
                        </div>
                        <div class="SubjectMainCont">
                            <div class="LeftGradeCont">
                                <div class="LeftGradeContHeader">
                                    <h3>List of Grade Level</h3>
                                    
                                </div>
                                <div id="LeftGradeContent">

                                </div>
                            </div>


                        </div>
                        <div class="STPageContainerDiv">
                            <div class="PageContSubj">

                            </div>
                            <div class="PageContTeachers">

                            </div>

                        </div>
                        <div class="AssignTeachCont">
                            <button id="AssignTeachSave" onclick="getCheckedCheckboxes()">Save</button>
                            <button id="AssignTeachCancel">Cancel</button>
                        </div>

                    </div>
                    <!--
                    <div class="ResultSUbjCont">

                    </div>
                    -->
                </div>
            </div>
            <div id="TeachersArea">
                <div class="SubjectContents">
                    <div class="SubjectContentCont">
                        <div class="SubjContHeader">
                            <div class="leftsideOptions">
                                <div class="DisplayCurrSchoolYear">

                                </div>
                            </div>
                            <div class="rightsideOptions">
                                <button id="AddTeacher"><img src="../../images/user-plus.svg">Teacher</button>
                            </div>
                        </div>
                        <div class="SubjectMainCont">
                            <div class="LeftSubjCont">
                                <div class="LeftTeacherContHeader">
                                    <h3>List of Teachers</h3>
                                    <div id="input-container">
                                        <img src="../../images/search (2).svg">
                                        <input id="SearchTeacher" type="text" placeholder="Search a teacher">
                                    </div>
                                </div>
                                <div id="RightSubjContent">
                                </div>
                            </div>
                        </div>
                        <div class="STPageContainerDiv">
                            <div class="PageContSubj">

                            </div>
                            <div class="PageContTeachers">

                            </div>

                        </div>
                        <div class="AssignTeachCont">
                            <button id="AssignTeachSave" onclick="getCheckedCheckboxes()">Save</button>
                            <button id="AssignTeachCancel">Cancel</button>
                        </div>

                    </div>
                    <!--
                    <div class="ResultSUbjCont">

                    </div>
                    -->
                </div>

            </div>
            <div id="SectionArea">
                <div class="SubjectContents">
                    <div class="SubjectContentCont">
                        <div class="SubjContHeader">
                            <div class="leftsideOptions">
                                <div class="DisplayCurrSchoolYear">
                                </div>
                            </div>
                            <div class="rightsideOptions">
                                <button id="AddSection"><img src="../../images/user-plus.svg">Section</button>
                            </div>
                        </div>
                        <div class="LeftSubjCont">
                            <div class="LeftSectionContHeader">
                                <h3>List of Sections</h3>
                                <div id="input-container">
                                    <img src="../../images/search (2).svg">
                                    <input id="SearchSection" type="text" placeholder="Search a Section">

                                </div>
                            </div>
                            <div id="LeftSectionContent">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="StrandsArea">
                <div class="GradeLevelContents">

                    <div class="SubjContHeader">
                        <div class="leftsideOptions">
                            <div class="DisplayCurrSchoolYear">
                            </div>
                        </div>
                    </div>
                    <div class="SYMainCont">
                        <div class="SYContainer">
                            <div class="LeftGradeContHeader">
                                <div class="SYTopCont">
                                    <h3>List of Strands</h3>
                                    <button id="AddStrand"><img src="../../images/plus-circle.svg">Strand</button>
                                </div>
                                
                            </div>
                            <div id="LeftStrandsContent">

                            </div>
                        </div>

                        <div class="GradingPContainer">
                            <div class="LeftGradeContHeader">
                                <div class="SYTopCont">
                                    <h3>List of TESDA Courses</h3>
                                    <button id="AddCourse"><img src="../../images/user-plus.svg">Course</button>
                                </div>

                            </div>
                            <div id="LeftCoursesContent">
                            </div>
                        </div>
                    </div>
                    <div class="STPageContainerDiv">
                        <div class="PageContSubj">

                        </div>
                        <div class="PageContTeachers">

                        </div>

                    </div>
                    <div class="AssignTeachCont">
                        <button id="AssignTeachSave" onclick="getCheckedCheckboxes()">Save</button>
                        <button id="AssignTeachCancel">Cancel</button>
                    </div>


                    <!--
                    <div class="ResultSUbjCont">

                    </div>
                    -->
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="./AdminHomepage.js"></script>
</body>

</html>