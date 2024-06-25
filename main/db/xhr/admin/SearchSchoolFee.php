<?php
include('connect2db.php');
$SecCounter = 1;

if (isset($_POST['queryInfo'])) {
    $query = $_POST['queryInfo'];

    $sql = "SELECT schoolfees.*, gradelevel.*
    FROM schoolfees
    LEFT JOIN gradelevel ON schoolfees.Gradelevel_ID = gradelevel.Gradelevel_ID
    WHERE schoolfees.SchoolFee_Name LIKE '%" . $query . "%' OR gradelevel.GradeLevel LIKE '%" . $query . "%'";
    $Secdisplay = mysqli_query($connect2db, $sql);
    ?>
    
    <table class="Sectable">
        <tr class="trFirstSec">
            <td></td>
            <td>School Fee</td>
            <td>School Fee Price</td>
            <td>Grade Level</td>
            <td>Actions</td>
        </tr>

        <?php

        if (mysqli_num_rows($Secdisplay) > 0) {
            while ($Secgetrow = mysqli_fetch_assoc($Secdisplay)) {
                $SchoolFeeName = $Secgetrow['SchoolFee_Name'];
                $SchoolFee_Price = $Secgetrow['SchoolFee_Price'];
                $GradeLevel = $Secgetrow['GradeLevel'];

                ?>
                <tr>
                    <td>
                        <?php echo $SecCounter++; ?>
                    </td>
                    <td>
                        <?php echo $SchoolFeeName; ?>
                    </td>
                    <td>
                        <?php echo $SchoolFee_Price; ?>
                    </td>
                    <td>
                        <?php echo $GradeLevel; ?>
                    </td>
                    <td>
                        <button class="EditSec" dataSYid="<?php ?>"><img src="images/edit.svg" alt=""></button>
                        <button class="DeleteSec" dataSYid="<?php ?>"><img src="images/trash-2 (3).svg" alt=""></button>
                    </td>
                </tr>
                <?php
            }

        }
}
?>