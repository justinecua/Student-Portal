<?php
include('../../connect/connect2db.php');

if (isset($_POST['SubjectID'])) {
    $SubjectID = $_POST['SubjectID'];

    $NewSubjectName = $_POST['ESubjectName'];
    $NewSubjectType = $_POST['ESubjectType'];
    $NewTeacherName = $_POST['ETeacherName'];

    $updateQuery = "UPDATE subjects SET Subject_Name = ?, Subject_Type = ?, TeacherName = ? WHERE Subject_ID = ?";
    $stmt = mysqli_prepare($connect2db, $updateQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssi", $NewSubjectName, $NewSubjectType, $NewTeacherName, $SubjectID);

        if (mysqli_stmt_execute($stmt)) {
            echo "Data updated successfully!";
        } else {
            echo "Failed to update data.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Failed to prepare the update statement.";
    }
} else {
    echo "Invalid or missing POST data.";
}
?>
