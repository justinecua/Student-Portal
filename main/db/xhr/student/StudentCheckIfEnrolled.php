<?php

include('connect2db.php');
if (isset($_POST['CheckStudentID'])) {
    $CheckStudentID = $_POST['CheckStudentID'];

    $runsql2 = mysqli_query($connect2db, "SELECT * FROM student
    WHERE student.Student_ID ='$CheckStudentID'");

    $row2 = mysqli_fetch_assoc($runsql2);
    $UserEnrollStat = $row2["Enrollment_Status"];

    if ($UserEnrollStat == "Pending") {
        echo '
        <style>
        .bar {
            min-height: 1.3rem;
            border-radius: 10px;
            width: calc(50%);
            background-image: repeating-linear-gradient(45deg,
                    transparent,
                    transparent 20px,
                    #4959A6 20px,
                    #4959A6 50px);
            animation: slide 30s linear infinite;
            will-change: background-position;
        }
    
        @keyframes slide {
            from {
                background-position: 0px 0px;
            }
    
            to {
                background-position: calc(90rem + 60px) 0px;
            }
        }

        .PaymentMain {
            width: 100%;
            height: 100%;
            border-radius: 25px;
            box-shadow: 0px 10px 13px -6px rgb(120, 139, 159);
            top: 0;
            left: 0;
            z-index: 2;
            overflow-x: hidden;
            overflow-y: auto;
        }
        
        #BarNoteDetails {
            margin-top: 2%;
            padding: 1rem;
            background-color: #eceef7;
            border-radius: 10px;
            box-shadow: 0px 10px 13px -6px rgb(198, 210, 224);
            display: flex;
        }

        #PaymentHeader {
            margin-top: 2%;
            width: 100%;
            height: 18%;
            border-radius: 25px;
            box-shadow: 0px 10px 13px -6px rgb(120, 139, 159);
            top: 0;
            left: 0;
            z-index: 2;
        }

        .PaymentContMain {
            width: 100%;
            height: 120%;
            padding: 2rem;
            
        }
        </style>
                            <div class="PaymentContHeader">
                                <h3>Enrollment Status</h3>
                                <div class="progress-container">
                                    <div class="bar"></div>
                                </div>
                                <div class="barDetails">
                                    <span id="ProgressTitle">Progress</span>
                                    <span id="ProgressPercent">50%</span>
                                </div>
                            </div>
                       
        
        ';
    } else if ($UserEnrollStat == "In Progress") {
        echo '
        <style>
        .bar {
            min-height: 1.3rem;
            border-radius: 10px;
            width: calc(75%);
            background-image: repeating-linear-gradient(45deg,
                    transparent,
                    transparent 20px,
                    #4959A6 20px,
                    #4959A6 50px);
            animation: slide 30s linear infinite;
            will-change: background-position;
        }
    
        @keyframes slide {
            from {
                background-position: 0px 0px;
            }
    
            to {
                background-position: calc(90rem + 60px) 0px;
            }
        }

        .PaymentMain {
            margin-top: 2%;
            width: 100%;
            border-radius: 25px;
            box-shadow: 0px 10px 13px -6px rgb(198, 210, 224);
            top: 0;
            left: 0;
            z-index: 2;
            display: none;
        }

        #BarNoteDetails {
            margin-top: 2%;
            padding: 1rem;
            background-color: #eceef7;
            border-radius: 10px;
            box-shadow: 0px 10px 13px -6px rgb(198, 210, 224);
            display: flex;
        }
        #PaymentHeader {
            margin-top: 2%;
            width: 100%;
            height: 18%;
            border-radius: 25px;
            box-shadow: 0px 10px 13px -6px rgb(120, 139, 159);
            top: 0;
            left: 0;
            z-index: 2;            
        }

        .PaymentContMain {
            width: 100%;
            height: 120%;
            padding: 2rem;
            
        }
        </style>
                       
                            <div class="PaymentContHeader">
                                <h3>Enrollment Status</h3>
                                <div class="progress-container">
                                    <div class="bar"></div>
                                </div>
                                <div class="barDetails">
                                    <span id="ProgressTitle">Progress</span>
                                    <span id="ProgressPercent">75%</span>
                                </div>

                            </div>
                       
                            <div id="BarNoteDetails">
                                <span id="ProgressNote">Payment has been sent! Your Payment Form is currently under review by the schools cashier. Please wait for a while.</span>
                            </div>
        
        ';
    } else if ($UserEnrollStat == "Not Enrolled") {

        echo '
        <style>
        .bar {
            min-height: 1.3rem;
            border-radius: 10px;
            width: calc(25%);
            background-image: repeating-linear-gradient(45deg,
                    transparent,
                    transparent 20px,
                    #4959A6 20px,
                    #4959A6 50px);
            animation: slide 30s linear infinite;
            will-change: background-position;
        }
    
        @keyframes slide {
            from {
                background-position: 0px 0px;
            }
    
            to {
                background-position: calc(90rem + 60px) 0px;
            }
        }

        .PaymentMain {
            margin-top: 2%;
            width: 100%;
            border-radius: 25px;
            box-shadow: 0px 10px 13px -6px rgb(198, 210, 224);
            top: 0;
            left: 0;
            z-index: 2;
            display: none;
        }

        #BarNoteDetails {
            margin-top: 2%;
            padding: 1rem;
            background-color: #eceef7;
            border-radius: 10px;
            box-shadow: 0px 10px 13px -6px rgb(198, 210, 224);
            display: flex;
        }
        
        #PaymentHeader {
            margin-top: 2%;
            width: 100%;
            height: 18%;
            border-radius: 25px;
            box-shadow: 0px 10px 13px -6px rgb(120, 139, 159);
            top: 0;
            left: 0;
            z-index: 2;
        }

        .PaymentContMain {
            width: 100%;
            height: 120%;
            padding: 2rem;
            
        }
        </style>
                       
                            <div class="PaymentContHeader">
                                <h3>Enrollment Status</h3>
                                <div class="progress-container">
                                    <div class="bar"></div>
                                </div>
                                <div class="barDetails">
                                    <span id="ProgressTitle">Progress</span>
                                    <span id="ProgressPercent">25%</span>
                                </div>
                            </div>
                       
                            <div id="BarNoteDetails">
                                <span id="ProgressNote">Thank you for your submission. Your Enrollment Form is currently under review by the schools administration. Please wait for a while.</span>
                            </div>
        
        ';
    } else if ($UserEnrollStat == "Enrolled") {

        include('connect2db.php');

        $CheckStudentID = $_POST['CheckStudentID'];
        $TotalBalance = 0;
        $TotalPaid = 0;
        $Payments = array();

        $runsql3 = mysqli_query($connect2db, "SELECT student.*, payments.*
        FROM student
        LEFT JOIN payments ON payments.Student_ID = student.Student_ID
        WHERE student.Student_ID ='$CheckStudentID' AND payments.payment_stat = 'Approved'");

        while ($row3 = mysqli_fetch_assoc($runsql3)) {
            $MoneyPaid = $row3['payment_amount'];
            $Payments[] = $MoneyPaid;

        }
        $TotalPaid = array_sum($Payments);

        $runsqlCheckSection = mysqli_query($connect2db, "SELECT * FROM accounts WHERE Student_ID = '$CheckStudentID'");
        $row5 = mysqli_fetch_assoc($runsqlCheckSection);
        $Section = $row5['SectionID'];

        if ($Section < 1) {
            echo ' <div id="BarNoteDetails2">
            <span id="ProgressNote2">Congratulations! You are now officially enrolled. Your current balance will be calculated automatically
             once you are assigned to a section.</span>
            </div>';

            echo '
            <style>
            .bar {
                min-height: 1.3rem;
                border-radius: 10px;
                width: calc(75%);
                background-image: repeating-linear-gradient(45deg,
                        transparent,
                        transparent 20px,
                        #4959A6 20px,
                        #4959A6 50px);
                animation: slide 30s linear infinite;
                will-change: background-position;
              
            }
        
            @keyframes slide {
                from {
                    background-position: 0px 0px;
                }
        
                to {
                    background-position: calc(90rem + 60px) 0px;
                }
            }
    
            .PaymentMain {
                margin-top: 1%;
                width: 100%;
                border-radius: 25px;
                box-shadow: 0px 10px 13px -6px rgb(198, 210, 224);
                top: 0;
                left: 0;
                z-index: 2;
                display: flex;
                height: 100%;
            }
    
            #BarNoteDetails2 {
                padding: 1rem;
                background-color: #eceef7;
                border-radius: 10px;
                box-shadow: 0px 10px 13px -6px rgb(198, 210, 224);
                display: flex;
            }
    
            #PaymentHeader {
                margin-top: 2%;
                width: 100%;
                height: 5%;
                border-radius: 25px;
                box-shadow: 0px 10px 13px -6px rgb(120, 139, 159);
                top: 0;
                left: 0;
                z-index: 2; 
            }
    
            .PaymentContMain {
                width: 100%;
                height: 100%;
                padding: 2rem;
            }
    
            #ProgressNote{
             display: none;   
            }
    
            #ProgressNote2 {
                color: #4959A6;
                font-size: 0.9rem;
                font-weight: 600;
            }
            </style>
        
            ';

        } else if ($Section > 1) {
            $runsql4 = mysqli_query($connect2db, "SELECT schoolfees.*, gradelevel.*, accounts.*, section.*
        FROM schoolfees
        LEFT JOIN gradelevel ON schoolfees.Gradelevel_ID = gradelevel.Gradelevel_ID
        LEFT JOIN section ON section.Gradelevel_ID = gradelevel.Gradelevel_ID
        LEFT JOIN accounts ON accounts.SectionID = section.SectionID
        WHERE accounts.Student_ID = '$CheckStudentID'");

            while ($row4 = mysqli_fetch_assoc($runsql4)) {
                $SchoolFee_Price = $row4["SchoolFee_Price"];
                $SchoolFees[] = $SchoolFee_Price;
            }

            $TotalBalance = array_sum($SchoolFees);
            $CurrentBalance = $TotalBalance - $TotalPaid;

            echo '<div class="PaymentTop">';
            echo '<div class="PaymentDivBal"><div class="BalTop">₱' . number_format($TotalBalance, 2) . ' </div>' . ' <div class="BalBottom"> Total Balance</div> </div>';
            echo '<div class="PaymentDivBal"><div class="BalTop">₱' . number_format($CurrentBalance, 2) . ' </div>' . ' <div class="BalBottom">Current Balance</div> </div>';
            echo '<div class="PaymentDivBal"><div class="BalTop">₱' . number_format($TotalPaid, 2) . ' </div>' . ' <div class="BalBottom">Total Paid</div> </div>';
            echo '</div> ';

            echo '
        
        
        <style>
        .bar {
            min-height: 1.3rem;
            border-radius: 10px;
            width: calc(75%);
            background-image: repeating-linear-gradient(45deg,
                    transparent,
                    transparent 20px,
                    #4959A6 20px,
                    #4959A6 50px);
            animation: slide 30s linear infinite;
            will-change: background-position;
            display: none;
        }
    
        @keyframes slide {
            from {
                background-position: 0px 0px;
            }
    
            to {
                background-position: calc(90rem + 60px) 0px;
            }
        }

        .PaymentMain {
            margin-top: 1%;
            width: 100%;
            border-radius: 25px;
            box-shadow: 0px 10px 13px -6px rgb(198, 210, 224);
            top: 0;
            left: 0;
            z-index: 2;
            display: flex;
            height: 100%;
            border: 1px solid #e3e3e3;
        }

        #BarNoteDetails2 {
            padding: 1rem;
            background-color: #eceef7;
            border-radius: 10px;
            box-shadow: 0px 10px 13px -6px rgb(198, 210, 224);
            display: none;   
        }

        #PaymentHeader {
            margin-top: 2%;
            width: 100%;
            height: 15%;
            border-radius: 25px;
            top: 0;
            left: 0;
            z-index: 2; 
        }

        .PaymentContMain {
            width: 100%;
            height: 100%;
            padding: 2rem;
        }

        #ProgressNote{
         display: none;   
        }

        #ProgressNote2 {
            display: none;  
            color: #4959A6;
            font-size: 0.9rem;
            font-weight: 600;
        }
        </style>
    
        ';
        }
    }

}
?>