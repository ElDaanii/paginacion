<?php
require_once "autoloader.php";
$pati = new statistic();
$bills = $pati->moneyBills(); 
$paid = $pati->paidVisits(); 
$unpa = $pati->unpaidVisits(); 
$percent = $pati->totalBalance($paid, $unpa, $bills); 
$numPa = $pati->NumberPaidVisits(); 
$numUn = $pati->NumberUnpaidVisits(); 
$numPatients = $pati->NumberPatients(); 
$numPatientsPaid = $pati->NumberPatientsPaid(); 
$numPatientsUnpaid = $pati->NumberPatientsUnpaid(); 



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/diente.jpg" type="image/x-icon">
    <title>SacaMuelas</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <table class="redTable">
        <thead>
            <tr>
                <th>Total Bill Spend</th>
                <th>Total Paid Visits(€)</th>
                <th>Total Unpaid Visits(€)</th>
                <th>Total Balance</th>
                <th>NºPaid Visits</th>
                <th>NºUnpaid Visits</th>
                <th>Total Patients</th>
                <th>Nº Patients Paid Visits</th>
                <th>Nº Patients Unpaid Visits</th>

            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="9">
                </td>
            </tr>
        </tfoot>
        <tbody>
            <?= $pati->drawList($bills, $paid, $unpa, $percent, $numPa, $numUn, $numPatients, $numPatientsPaid, $numPatientsUnpaid) ?>
        </tbody>
    </table>

</body>

</html>
