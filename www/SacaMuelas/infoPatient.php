<?php

require_once "autoloader.php";

$paci = new patient("dataPatient.csv");

if (isset($_GET['name'])) {
    $paci->showPatient($_GET['name']);
} else {
    $paci->showPatient(null);
}

header("location: indexPatient.php");
