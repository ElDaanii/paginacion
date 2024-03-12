<?php
require_once "autoloader.php";

$paci = new clinic('data.csv');

if (isset($_GET['id'])) {
    $paci->delete($_GET['id']);
} else {
    $paci->delete(null);
}

header("location: index.php");


