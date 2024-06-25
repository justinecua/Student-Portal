<?php
session_start();
$user_id = "";
$userFname = "";

if (isset($_SESSION["dbid"])) {
    include("connect2db.php");
    $id = $_SESSION["dbid"];

    $getdata = mysqli_query($connect2db, "SELECT * FROM accounts WHERE Account_ID = '$id'");
    $row = mysqli_fetch_assoc($getdata);

    $user_id = $row["Account_ID"];
    $userFname = $row["FirstName"];

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHS Student Portal</title>
    <link rel="stylesheet" href="Adminavatar.css">
</head>

<body>

    <div class="container">
        <div id="welcomeContainer">
            <span id="welcomeMessage">
                <?php echo 'Welcome Back! ' . ucfirst($userFname) ?>
            </span>
        </div>

        <div class="navbar">
            <div class="logoSchool">
                <img src="images/XAILogoT.png"><span>Xavier Academy</span>
            </div>

            <div id="profcontainer" onclick="clickAvatar()">
                <img src="" alt="">
            </div>

        </div>
        <div id="Nav">
            <div id="NavContainer">
                <div id="RegisterStudents"></div>
                <div id="ViewStudents"></div>
                <div id="PendingEnrollments"></div>
                <div id="Settings"></div>
                <div id="Logout"></div>
            </div>
        </div>

        <div class="RegiStudContainer">
            <div class="RegiStudContainer2">
                <h3>Register Student</h3>
                <label>First Name</label>
                <input type="text">
                <label>Middle Name</label>
                <input type="text">
                <label>Last Name</label>
                <input type="text">
                <label>School ID</label>
                <input type="text">
                <label>Age</label>
                <input type="text">
                <label>Year Level</label>
                <input type="text">
                <label>Password</label>
                <input type="text">
                <label> Account Type</label>
                <input type="text">
                <button>Add Student</button>
            </div>
        </div>
    </div>
    <script src="Adminavatar.js"></script>
</body>

</html>