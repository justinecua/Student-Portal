<?php
include 'connect2db.php';

function executeQuery($connect2db, $query, $tableName)
{
    $startTime = microtime(true);
    $result = $connect2db->query($query);
    $endTime = microtime(true);
    $executionTime = $endTime - $startTime;

    $formattedTime = number_format($executionTime, 5);

   
    echo "$tableName: $formattedTime sec<br>";
    return $result;
}

$queries = [
    "SELECT * FROM accounts" => "Accounts",
    "SELECT * FROM student" => "Student",
    "SELECT * FROM teachers" => "Teacher",
    "SELECT * FROM strand" => "Strand",
    "SELECT * FROM schoolyear" => "Schoolyear",
    "SELECT * FROM subjects" => "Subjects",
    "SELECT * FROM gradelevel" => "GradeLevel",
    "SELECT * FROM payments" => "Payment"
];

echo " <h4>Current Queries</h4>";
echo"<br>";
// Execute each query in a while loop
foreach ($queries as $query => $tableName) {
    executeQuery($connect2db, $query, $tableName);
}
?>
