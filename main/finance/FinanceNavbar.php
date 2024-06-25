<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <header>
        <div id="NavbarMain">
            <div class="TopNavbar">
                <div class="logoSchool">
                    <img src="images/CHS Logo1.png">
                    <span>Christian Horizon School Inc</span>
                </div>

                <div class="rightNavSection">
                    <ul>
                      
                        <li id="EnrollmentTab" onclick="changeTabToEnrollment()">Enrollments</li>
                        <li id="PaymentTab" onclick="changeTabToPayments()">Payments</li>
                        <a href="logout.php"><li id="Logout">Logout</li></a>
                    </ul>
                </div>
            </div>

            <div id="profcontainer" onclick="clickAvatar()">

            </div>
        </div>
    </header>

    <style>
        #NavbarMain {
            position: fixed;
            width: 100vw;
            z-index: 3;
        }

        .TopNavbar {
            width: 100%;
            height: 3.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid black;
            background-color: #201e1f;
            z-index: 5;
        }

        .logoSchool {
            display: flex;
            align-items: center;
            margin-left: 2%;
            width: 30%;
        }

        .logoSchool span {
            margin-left: 2%;
            color: white;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .logoSchool>img {
            width: 35px;
            height: 35px;
        }
    </style>
    
</body>

</html>