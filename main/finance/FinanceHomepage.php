<?php


$UpdateMessage = false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Christian Horizon School Inc</title>
    <link rel="icon" type="image/x-icon" href="/images/CHS Logo1.png">
    <link rel="stylesheet" href="FinanceHomepage.css">
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

    <!--  Enrollment More Info-->
    <div id="ENoverlay">
        <div class="ENoverlayContainer">
            <div class="ENOverlayContents">
                <div class="ENOverlayheader"><button id="ENcloseoverlayContainer">&times;</button></div>
                <div id="ENUserIdDiv" name="ENUserId"></div>
            </div>
        </div>
    </div>

    <!--  Payment More Info-->
    <div id="PMoverlay">
        <div class="PMoverlayContainer">
            <div class="PMOverlayContents">
                <div class="PMOverlayheader"><button id="PMcloseoverlayContainer">&times;</button></div>
                <div id="PMUserIdDiv" name="PMUserId"></div>
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
                <div class="ECDisplayMessageDiv"><span id="ECDisplayMessage"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Payment Confirmation Overlay-->
    <div id="Paymoverlay">
        <div class="PayminputsArea">
            <div class="PaymCloseContainer">
                <div class="PaymOverlayheader"><button type="button" class="PaymCloseAddSubj">&times;</button></div>
            </div>
            <div id="Payminputs">
                <h3>Confirm Payment?</h3>
                <span>Are you sure you want to confirm this student`s payment transaction?</span>
                <div class="DelOptions">
                    <button id="ConfirmPayment" name="YesDel" type="submit">Confirm</button>
                    <button class="CancelPayment" name="NoDel" type="submit">Cancel</button>
                </div>
                <div class="PaymDisplayMessageDiv"><span id="PaymDisplayMessage"></span>
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
    <div class="AllDiv">
        <?php include 'FinanceNavbar.php' ?>

        <div id="EnrollmentArea">
            <div class="SubjectContents">
                <div class="SubjectContentCont">

                    <div class="SubjectMainCont">
                        <div class="LeftSubjCont">
                            <div class="LeftSubjContHeader">
                                <h3>Enrollments</h3>
                                <div id="input-container">
                                    <img src="images/search (2).svg">
                                    <input class="SearchSubject" type="text" placeholder="Search a student">

                                <!--
                                    <div class="ByMainContSubj">
                                        <div class="FilterByContSubj">
                                            <select id="FilterEnrollments">
                                                <option value="">School Year</option>
                                                <option value="Elementary">Elementary</option>
                                                <option value="HighSchool">HighSchool</option>
                                            </select>
                                        </div>

                                        <div class="FilterByContSubj">
                                            <select id="FilterEnrollments">
                                                <option value="">Filter By</option>
                                                <option value="Elementary">Elementary</option>
                                                <option value="HighSchool">HighSchool</option>
                                                <option value="Tesda">Tesda</option>
                                            </select>
                                        </div>

                                        <div class="SortByContSubj">
                                            <select id="SortBySubj">
                                                <option value="">Sort By</option>
                                                <option value="A-Z">A-Z</option>
                                                <option value="Z-A">Z-A</option>
                                            </select>
                                        </div>
                                    </div>
                                      -->
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
                </div>
                <!--
                    <div class="ResultSUbjCont">

                    </div>
                    -->
            </div>
        </div>

        <!---------------- Dashboard Area ------------->
        <!--
        <div id="DashboardArea">
            <div class="SubjectContents">
                <div class="SubjectContentCont">

                    <div id="input-container2">
                        <img src="images/search (2).svg">
                        <input id="SearchStudPay" class="SearchSubject" type="text" placeholder="Search a student">
                    </div>
                    
                    <div class="DAMain">
                        <div class="DALeft">
                        <h4>List Of Students</h4>
                            <div id="search-results">
                               
                            </div>
                        </div>
                    
                        <div class="DARight">
                            <div class="DARightTop">
                                <h4>Add Payment</h4>
                              
                                <div class="DARight2">
                                    <input type="hidden" name="FStudent_ID" id="FStudent_ID">
                                    <button onclick="AddPaymentF2F()" id="SubmitPayment" name="SubmitF2f" type="submit">Submit</button>
                                    <button id="PrintReceipt">Print</button>
                                </div>
                            </div>
                          
                            <div id="PaymentContent">
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
                                    
                                    <div class="PaymentInfoHeader">
                                        <h3>Receipt</h3>
                                    </div>
                                    <div id="PaymentInfo">
                                        <div class="ReceiptDiv"><label for="">Amount Given:</label><input type="text" name="PaymentAmount" id="PaymentAmount"></div>
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
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    -->
        <!--Payments Tab -->

        <div id="PaymentArea">

            <div class="SubjectContents">
                <div class="SubjectContentCont">

                    <div class="SubjectMainCont">
                        <div class="LeftSubjCont">
                            <div class="LeftSubjContHeader">
                                <h3>Payment Transactions</h3>
                                <div id="input-container">
                                    <img src="images/search (2).svg">
                                    <input class="SearchSubject" type="text" placeholder="Search a student">


                                </div>
                            </div>
                            <div id="ShowPaymentContent">
                            </div>
                        </div>

                    </div>
                    <div class="STPageContainerDiv">
                        <div class="PageContSubj">

                        </div>
                        <div class="PageContTeachers">

                        </div>

                    </div>
                </div>
                <!--
                    <div class="ResultSUbjCont">

                    </div>
                    -->

            </div>
        </div>
    </div>
    <script>
        <?php if ($UpdateMessage) { ?>
            window.addEventListener('DOMContentLoaded', () => {
                const Kpopup = document.querySelector('.Kpopup');
                Kpopup.style.display = 'block';
                Kindergarten.style.display = "flex";

                setTimeout(() => {
                    Kpopup.style.display = 'none';
                }, 6000);
            });
        <?php } ?>
    </script>
    <script src="FinanceHomepage.js"></script>
</body>

</html>