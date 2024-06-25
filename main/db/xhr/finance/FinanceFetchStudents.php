<?php
include('connect2db.php');

echo '
<style>
    .StatusCircleDiv {
        width: 100%;
        display: flex;
        justify-content: end;
    }

    .StatusCircle {
        border-radius: 50%;
        font-size: 0.7rem;
        font-weight: bold;
        width: 0.8rem;
        height: 0.8rem;
    }

    .Enrolled {
        background-color: #6DD19C;
    }

    .Pending {
        background-color: #f9ed35;
    }

    .InProgress {
        background-color: #4959A6;
    }

    .NotEnrolled {
        background-color: red;
    }
</style>
';

$sql = "SELECT * FROM student";
$result = mysqli_query($connect2db, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $FName = $row['FirstName'];
        $MName = $row['MiddleName'];
        $LName = $row['LastName'];
        $profpic = $row['Student_PicturePath'];
        $FullName = $FName . " " . $MName . " " . $LName;
        $Email = $row['EmailAddress'];
        $FinStudent_ID = $row['Student_ID'];
        $Enrollment_Status = $row['Enrollment_Status'];

        $statusClass = 'NotEnrolled';
        if ($Enrollment_Status == "Enrolled") {
            $statusClass = 'Enrolled';
        }
        else if ($Enrollment_Status == "Pending") {
            $statusClass = 'Pending';
        }
        else if ($Enrollment_Status == "In Progress") {
            $statusClass = 'InProgress';
        }


        echo '<div class="Results" FinStudent_ID="' . $FinStudent_ID . '">
            <div class="ResultsImagesDiv"><img class="ResultsImages" src="' . $profpic . '"/></div>
            <div class="ResultsName">' . $FullName . '</div>
            <div class="StatusCircleDiv">
                <div class="StatusCircle ' . $statusClass . '"></div>
            </div>
        </div>';
    }
} else {
    echo '<div class="NoResult">No accounts found </div>';
}
?>
