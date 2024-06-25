<?php
include('connect2db.php');
session_start();

$TeacherID = $_SESSION["TeacherID"];
function ShowSubjects($connect2db, $TeacherID)
{
    $runsql7 = mysqli_query($connect2db, "SELECT * FROM accounts WHERE Account_ID = '$TeacherID'");
    $row7 = mysqli_fetch_assoc($runsql7);
    $DBTeacherID = $row7["TeacherID"];

    $subjArr = array();

    $runsql9 = mysqli_query($connect2db, "SELECT teachers.TeacherID, subjects.*, section.*, gradelevel.*, strand.*
    FROM subjects
    LEFT JOIN teachers ON subjects.Teacher_ID = teachers.TeacherID
    LEFT JOIN section ON subjects.SectionID = section.SectionID
    LEFT JOIN gradelevel ON subjects.Gradelevel_ID =  gradelevel.Gradelevel_ID
    LEFT JOIN strand ON subjects.Strand_ID =  strand.Strand_ID
    WHERE subjects.Teacher_ID='$DBTeacherID'");

    while ($row8 = mysqli_fetch_assoc($runsql9)) {
        $Subject_ID = $row8["Subject_ID"];
        $SubjectName = $row8['Subject_Name'];
        $SectionName = $row8["SectionName"];
        $GradeLevel = $row8["GradeLevel"];
        $StrandName = $row8["StrandName"];

        $subjArr[] = [
            'SubjID' => $Subject_ID,
            'SubjName' => $SubjectName,
            'SubjSection' => $SectionName,
            'SubjGrade' => $GradeLevel,
            'SubjStrand' => $StrandName
        ];
    }
    return $subjArr;
}

$SubjList = ShowSubjects($connect2db, $TeacherID); //stored a function in a variable;
echo '<option value="">Select Subject</option>';

foreach ($SubjList as $Subjects) {
    echo '<option value="' . $Subjects['SubjID'] . '"> ' . $Subjects['SubjName'] . ' 
    (' . $Subjects['SubjGrade'] . ' - ' . $Subjects['SubjSection'] . ' ' . $Subjects['SubjStrand'] . ')</option>';
}

?>