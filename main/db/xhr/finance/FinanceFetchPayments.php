<?php
include('connect2db.php');

$Secquery = "SELECT student.*, payments.*, accounts.*
FROM payments
LEFT JOIN student ON payments.Student_ID = student.Student_ID
LEFT JOIN accounts ON student.Student_Id = accounts.Student_ID
WHERE payment_stat = 'Pending'";

$fetchEnrollees = mysqli_query($connect2db, $Secquery);
$EnrollCounter = 1;
?>
<!DOCTYPE html>
<html lang="en">

<body>
    <table class="Fetchpayments">
        <div class="actionsBox3">
            <div class="StudEnrollActions">
                <div class="ConfirmPayment"><img src="images/edit.svg">Confirm</div>
                <div class="DeclinePayment"><img src="images/trash-2.svg">Decline</div>
            </div>
        </div>
        <tr class="trFetchPayments">
            <td></td>
            <td>Date</td>
            <td>Profile</td>
            <td>Name</td>
            <td>Ref No.</td>
            <td>Method</td>
            <td>Sender`s Name</td>
            <td>Amount Given</td>
            <td>Status</td>
            <td>Actions</td>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($fetchEnrollees)) {
            $G1Enrollment_ID = $row["Student_ID"];
            $payment_id = $row["payment_id"];
            $paymentDate = $row["paymentDate"];
            $payment_stat = $row["payment_stat"];
            $G1UserSY = $row["School_year"];
            $G1UserStat = $row["Status"];
            $G1UserLRN = $row["LRN"];
            $G1UserIncLevel = $row["Incoming_Level"];
            $G1UserStudPicSize = $row["Student_PicturePath"];
            $G1UserFName = $row["FirstName"];
            $G1UserMName = $row["MiddleName"];
            $G1UserLName = $row["LastName"];
            $G1UserGender = $row["Gender"];
            $G1UserBPlace = $row["BirthPlace"];
            $G1UserBirthday = $row["Birthday"];
            $G1UserReligion = $row["Religion"];
            $G1UserContNum = $row["ContactNumber"];
            $G1UserHomeAddress = $row["HomeAddress"];
            $G1UserLastSchool = $row["Last_School_Attended"];
            $G1UserEmailad = $row["EmailAddress"];
            $G1UserFathersName = $row["Fathers_Full_Name"];
            $G1UserFOccupation = $row["Fathers_Occupation"];
            $G1UserMothersName = $row["Mothers_Full_Name"];
            $G1UserMOccupation = $row["Mothers_Occupation"];
            $G1UserEmergCont = $row["Emergency_ContactPerson"];
            $G1UserEmergNum = $row["Emergency_ContactNumber"];
            $Course = $row['Course'];
            $PaymentAmount = $row["payment_amount"];
            $payment_method = $row["payment_method"];
            $payment_refNum = $row["payment_refNum"];
            $ID_Number = $row["ID_Number"];
            $SendersName = $row["SendersName"];

            $G1UserFullName = ucfirst($G1UserFName) . " " . ucfirst($G1UserMName) . " " . ucfirst($G1UserLName);

            ?>

            <tr>
                <td>
                    <?php echo $EnrollCounter++; ?>
                </td>
                <td>
                    <?php echo $paymentDate; ?>
                </td>
                <td>
                    <div class="StudentProfile"><img src="<?php echo $G1UserStudPicSize ?>"></div>
                </td>
                <td>
                    <?php echo $G1UserFullName; ?>
                </td>
                <td>
                    <?php echo $payment_refNum; ?>
                </td>
                <td>
                    <?php echo $payment_method; ?>
                </td>
                <td>
                    <?php echo $SendersName; ?>
                </td>
                <td>
                    <?php echo $PaymentAmount; ?>
                </td>
                <td>
                    <div class="StatusFalse">
                        <span>
                            <?php echo $payment_stat; ?>
                        </span>
                    </div>
                </td>

                <td>
                    <button class="PaymentInfoStud" PaymUserId="<?php echo $G1Enrollment_ID; ?>"
                        PaymentID="<?php echo $payment_id; ?>">More Info</button>
                    <div class="MoreActStudBtn" StudentUserID="<?php echo $G1Enrollment_ID; ?>"
                        PaymentID="<?php echo $payment_id; ?>" onclick="MoreActStudEnroll2(this, event)"><img
                            src="images/more-vertical.svg"> </div>
                </td>

            </tr>

            </tr>
        <?php } ?>

    </table>
</body>

</html>