<?php
require_once "autoloader.php";

$connection = new Connection();
$conn = $connection->getConn();

$paci = ($_GET['id']);

$sql = "DELETE FROM investment WHERE id = '$paci'";
    
if ($conn->query($sql) === TRUE) {
    header("location: index.php");
} else {
    echo "Error al eliminar dato: " . $conn->error;
}




