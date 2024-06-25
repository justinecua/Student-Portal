<?php
include('connect2db.php');

$CheckStudentID = null;
$SubjSYID = null;

if (isset($_POST['CheckStudentID'], $_POST['SubjSYID'])) {
    $CheckStudentID = $_POST['CheckStudentID'];
    $SubjSYID = $_POST['SubjSYID'];

    $students = FetchSubjects($connect2db, $CheckStudentID, $SubjSYID);
}

function FetchSubjects($connect2db, $CheckStudentID, $SubjSYID)
{

    $SubjArr = array();

    $runsql3 = mysqli_query($connect2db, "SELECT student.*, accounts.*, subjects.*, section.*, gradelevel.*, strand.*
    FROM subjects
    LEFT JOIN accounts ON subjects.SectionID = accounts.SectionID
    LEFT JOIN section ON subjects.SectionID = section.SectionID
    LEFT JOIN gradelevel ON subjects.GradeLevel_ID = gradelevel.Gradelevel_ID
    LEFT JOIN strand ON subjects.Strand_ID = strand.Strand_ID
    LEFT JOIN student ON student.Student_ID = accounts.Account_ID
    WHERE accounts.Student_ID = '$CheckStudentID' AND subjects.SchoolYear_ID = '$SubjSYID'");

    while ($row2 = mysqli_fetch_assoc($runsql3)) {
        $Subject_ID = $row2["Subject_ID"];
        $Subject_Code = $row2["Subject_Code"];
        $Subject_Name = $row2["Subject_Name"];
        $SectionID = $row2["SectionID"];
        $SectionName = $row2["SectionName"];
        $GradeLevel_ID = $row2["GradeLevel_ID"];
        $GradeLevel = $row2["GradeLevel"];
        $Strand_ID = $row2["Strand_ID"];
        $Account_ID = $row2["Account_ID"];
        $Student_ID = $row2["Student_ID"];
        $SchoolYear_ID  = $row2["SchoolYear_ID"];

        $SubjArr[] = [
            'SubjID' => $Subject_ID,
            'SubjCode' => $Subject_Code,
            'SubjName' => $Subject_Name,
            'SubjAccID' => $Account_ID,
            'SubjStudID' => $Student_ID,
            'SubjSYID' => $SchoolYear_ID
        ];
    }

    return $SubjArr;
}


function ShowGradingPeriod($connect2db)
{
    $GradePerArr = array();
    $runsql3 = mysqli_query($connect2db, "SELECT * FROM gradingperiod");

    while ($row2 = mysqli_fetch_assoc($runsql3)) {
        $GPId = $row2["GradingPeriod_ID"];
        $GradingPeriod = $row2["GradingType"];

        $GradePerArr[] = [
            'GradePeriodID' => $GPId,
            'GradePeriod' => $GradingPeriod,
        ];
    }
    return $GradePerArr;
}

function ShowGrades($connect2db)
{
    $GradesArr = array();
    $runsql4 = mysqli_query($connect2db, "SELECT * FROM grades");

    while ($row3 = mysqli_fetch_assoc($runsql4)) {
        $gradeID = $row3["gradeID"];
        $grades = $row3["grades"];
        $Subject_ID = $row3['Subject_ID'];
        $Account_ID = $row3['Account_ID'];
        $GGradingPeriod_ID = $row3['GradingPeriod_ID'];

        $GradesArr[] = [
            'gradeID' => $gradeID,
            'grades' => $grades,
            'gSubjID' => $Subject_ID,
            'gAccID' => $Account_ID,
            'gGradePeriodId' => $GGradingPeriod_ID
        ];
    }
    return $GradesArr;
}

$GradingPeriodList = ShowGradingPeriod($connect2db);
$SubjectList = FetchSubjects($connect2db, $CheckStudentID, $SubjSYID);
$GradesList = ShowGrades($connect2db);

?>

<table class="Sectable">
    <tr class="trFirstSec">
        <th>Subject</th>
        <th>Code</th>
        <?php
        foreach ($GradingPeriodList as $GradeP) {
            echo '<th GradePeriodID="' . $GradeP['GradePeriodID'] . '"> ' . $GradeP['GradePeriod'] . '</th>';
        }
        ?>
        <th>Finals</th>
    </tr>

    <?php
    if (is_array($SubjectList)) {
        foreach ($SubjectList as $Subjects) {
            ?>
            <tr>
                <td>
                    <?php echo $Subjects['SubjName']; ?>
                </td>
                <td>
                   <?php echo $Subjects['SubjCode']; ?>
                </td>
                <?php
                $TotalPercentage = 0;
                $NumGradingPeriods = count($GradingPeriodList);

                foreach ($GradingPeriodList as $GradeP) {
                    $matchingGrade = null;

                    foreach ($GradesList as $grade) {
                        if ($Subjects['SubjAccID'] == $grade['gAccID'] && $Subjects['SubjID'] == $grade['gSubjID'] && $GradeP['GradePeriodID'] == $grade['gGradePeriodId']) {
                            $matchingGrade = $grade['grades'];
                            $TotalPercentage += $matchingGrade;
                        }
                    }

                    if ($matchingGrade == null) {
                        $matchingGrade = '&nbsp;';
                    }
                    ?>
                    <td class="StudentGrade">
                        <?php echo $matchingGrade; ?>
                    </td>
                <?php } ?>

                <td>
                    <?php
                    if ($TotalPercentage !== 0) {
                        echo $FinalGradePercentage = ($TotalPercentage / $NumGradingPeriods) . '%';
                    } else {
                        echo '&nbsp;';
                    }
                    ?>
                </td>
            </tr>
            <?php
        }
    }
    ?>

</table>