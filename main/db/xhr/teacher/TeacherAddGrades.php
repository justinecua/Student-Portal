<?php
include('connect2db.php');

// Retrieve JSON data 
$jsonData = isset($_POST['data']) ? $_POST['data'] : '';

if (!empty($jsonData)) {
    $dataArray = json_decode($jsonData, true);

    $successFlag = true;
    foreach ($dataArray as $account) {
        $accID = $account['AccID'];
        $subjID = $account['SubjID'];
        $schoolYearID = $account['SchoolYearID'];

        foreach ($account['GradePeriodID'] as $gradePeriodID => $gradeData) {
            $gradeInput = $gradeData['GradeInput'];

            $checkIfExistsQuery = "SELECT * FROM grades 
                                      WHERE Account_ID = '$accID' 
                                      AND Subject_ID = '$subjID' 
                                        AND GradingPeriod_ID = '$gradePeriodID' 
                                        AND SchoolYear_ID = '$schoolYearID'";

            $result = $connect2db->query($checkIfExistsQuery);

            if ($result && $result->num_rows > 0) {
                $updateQuery = "UPDATE grades 
                                SET grades = '$gradeInput' 
                                WHERE Account_ID = '$accID' 
                                      AND Subject_ID = '$subjID' 
                                        AND GradingPeriod_ID = '$gradePeriodID' 
                                        AND SchoolYear_ID = '$schoolYearID'";

                if ($connect2db->query($updateQuery) !== TRUE) {
                    $successFlag = false;
                    echo 'Error updating data: ' . $connect2db->error;
                }
            } else {

                $insertQuery = "INSERT INTO grades
                                VALUES ('', '$gradeInput', '$subjID', '$accID', '$gradePeriodID', '$schoolYearID')";

                if ($connect2db->query($insertQuery) !== TRUE) {
                    $successFlag = false;
                    echo 'Error inserting data: ' . $connect2db->error;
                }
            }
        }
    }
    if ($successFlag) {
        echo 'Grades added successfully!';
    }
} else {
    echo 'Error: No data received!';
}

?>
