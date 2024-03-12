<?php
require_once "autoloader.php";

$paci = new patient('dataPatient.csv');

if (isset($_GET['id'])) {
    $paci->delete($_GET['id']);
} else {
    $paci->delete(null);
}

header("location: indexPatient.php");
