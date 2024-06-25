<?php
include('connect2db.php');

$SubjId = null;

if (isset($_POST['SubjId'], $_POST['SchoolYear'])) {
    $SubjId = $_POST['SubjId'];
    $SchoolYear = $_POST['SchoolYear'];

    $students = ShowStudent($connect2db, $SubjId, $SchoolYear);
}

function ShowStudent($connect2db, $SubjId, $SchoolYear)
{
    if ($SubjId != null && $SchoolYear != null) {
        $runsql = mysqli_query($connect2db, "SELECT subjects.*, accounts.*
            FROM subjects
            LEFT JOIN accounts ON subjects.SectionID = accounts.SectionID
            WHERE subjects.Subject_ID = '$SubjId' AND subjects.SchoolYear_ID = '$SchoolYear'");

        $row = mysqli_fetch_assoc($runsql);
        if ($row !== null) {
            $SectionID = $row["SectionID"];

            $runsql2 = mysqli_query($connect2db, "SELECT accounts.*, student.*
                FROM accounts
                LEFT JOIN student ON accounts.Student_ID = student.Student_ID
                WHERE accounts.SectionID = '$SectionID'");

            $StudentsArr = array();

            while ($row2 = mysqli_fetch_assoc($runsql2)) {
                $AccountID = $row2["Account_ID"];
                $FirstName = $row2["FirstName"];
                $LastName = $row2["LastName"];
                $Profile = $row2["Student_PicturePath"];

                $StudentsArr[] = [
                    'AccID' => $AccountID,
                    'StudFName' => $FirstName,
                    'StudLName' => $LastName,
                    'StudProfile' => $Profile
                ];
            }

            return $StudentsArr;
        }
    }

    //return empty array if theres no data
    return [];

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


?>
<?php
$GradingPeriodList = ShowGradingPeriod($connect2db);
$StudentList = ShowStudent($connect2db, $SubjId, $SchoolYear); // stored a function in a variable;
$GradesList = ShowGrades($connect2db);
$StudentCounter = 1;
?>

<table class="Sectable">
<tr class="trFirstSec">
        <td></td>
        <td>No.</td>
        <td>Picture</td>
        <td>Name</td>
        <?php
        foreach ($GradingPeriodList as $GradeP) {
            echo '
        <td GradePeriodID="' . $GradeP['GradePeriodID'] . '"> ' . $GradeP['GradePeriod'] . '</td>
        ';
        }
        ?>
        <td>Final</td>
    </tr>

    <?php

    if (is_array($StudentList)) {
        foreach ($StudentList as $Student) {
            ?>
                <tr>
                    <td>
                        <input class="GradeCheckbox" type="checkbox" AccStudID="<?php echo $Student['AccID']; ?>">
                    </td>
                    <td>
                        <?php echo $StudentCounter++; ?>
                    </td>
                    <td>
                        <img src="<?php echo $Student['StudProfile'] ?>" alt="Student Profile Image">
                    </td>
                    <td>
                        <?php echo $Student['StudFName'] . ' ' . $Student['StudLName'] ?>
                    </td>
    
                    <?php
                    $TotalPercentage = 0;
                    $NumGradingPeriods = count($GradingPeriodList);
                    foreach ($GradingPeriodList as $GradeP) {
                        $matchingGrade = null;
                        foreach ($GradesList as $grade) {
                            if ($Student['AccID'] == $grade['gAccID'] && $GradeP['GradePeriodID'] == $grade['gGradePeriodId'] && $SubjId == $grade['gSubjID']) {
                                $matchingGrade = $grade['grades'];
                                $TotalPercentage += $matchingGrade; // Accumulate grades for each grading period
                            }
                        }
                    
                        echo '<td class="StudentGrade">
                            <input class="GradeInput" type="text" GradePeriodID="' . $GradeP['GradePeriodID'] . '" value="' . $matchingGrade . '">
                            <span class="HiddenContent">' . $matchingGrade . '</span>
                        </td>';
                    }
                    
                    echo '<td>';
                    if ($TotalPercentage !== 0) {
                        echo $FinalGradePercentage = ($TotalPercentage / $NumGradingPeriods) . '%';
                    } else {
                        echo '&nbsp;';
                    }
                    echo '</td>';
                    ?>
                </tr>
                <?php
        }
    } else {
        echo '<tr><td colspan="10">Select School Year</td></tr>';
    }
    ?>
</table>