<?php
require_once "autoloader.php";
$pati = new patient ('dataPatient.csv');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/diente.jpg" type="image/x-icon">
    <title>Patient information</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <table class="redTable">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Address</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="5">
                </td>
            </tr>
        </tfoot>
        <tbody>
            <?= $pati->drawListPatient() ?>
        </tbody>
    </table>

</body>

</html>
