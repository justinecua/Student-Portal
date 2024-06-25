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
    <link rel="stylesheet" href="avatar.css">
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
                <img src="images/CHS Logo.jpg">
            </div>
            <div class="profcontainer">
                <img src="" alt="">
            </div>
        </div>
    </div>

    <script src="avatar.js"></script>
</body>

</html>