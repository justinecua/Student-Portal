<?php
session_start();
include("../../connect/connect2db.php");

if (isset($_POST["SchoolID"]) && isset($_POST["LogPass"])) {
    $SchoolID = $_POST["SchoolID"];
    $LogPass = $_POST["LogPass"];

    if ($SchoolID && $LogPass) {
        $query = "SELECT * FROM accounts WHERE ID_Number = ?";
        $stmt = mysqli_prepare($connect2db, $query);
        mysqli_stmt_bind_param($stmt, "s", $SchoolID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $dbid = $row["Account_ID"];
            $dbpassword = $row["Password"];
            $dbAccType = $row["AccountType_ID"];

            if ($dbAccType == "1" && $LogPass == $dbpassword) {
                $_SESSION["dbid"] = $dbid;
                echo "Success Admin";
            } else if ($dbAccType == "3" && $LogPass == $dbpassword) {
                $_SESSION["dbid"] = $dbid;
                echo "Good Day Finance";

            } else if ($dbAccType == "4" && $LogPass == $dbpassword) {
                $_SESSION["TeacherID"] = $dbid;
                echo "Welcome Teacher";

            } else if ($dbAccType == "2" && $LogPass == $dbpassword) {
                $_SESSION["dbid"] = $dbid;
                echo "Welcome";
            } else {
                echo "Invalid Password";
            }
        } else {
            $dbpassword2 = "";

            $query = "SELECT * FROM student WHERE EmailAddress = ?";
            $stmt = mysqli_prepare($connect2db, $query);
            mysqli_stmt_bind_param($stmt, "s", $SchoolID);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $dbStudid = $row["Student_ID"];
                $dbpassword2 = $row["Password"];

                if ($LogPass == $dbpassword2) {
                    $_SESSION["dbStudid"] = $dbStudid;
                    echo "Welcome2";
                } else {
                    echo "Invalid Password";
                }
            } else {
                echo "Invalid Password";
            }
        }
    } else {
        echo "Invalid input";
    }
}
?>