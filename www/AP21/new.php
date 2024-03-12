<?php
require_once "autoloader.php";

$connection = new Connection();
$conn = $connection->getConn();

if (count($_POST) > 0){
    $id = $_POST["id"];
    $company = $_POST["company"];
    $investment = $_POST["investment"];
    $date = $_POST["date"];
    $active = $_POST["active"];

    $sql = "INSERT INTO investment (id, company, investment, date, active) 
    VALUES ('$id', '$company', '$investment', '$date', '$active')";

    if (mysqli_query($conn, $sql)) {
        header("location: index.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Inserción de Datos</title>
</head>
<body>
    <h2>Formulario de Inserción de Datos</h2>
        <form method="POST">
            <label for="id">ID:</label><br>
            <input type="text" id="id" name="id" required><br>
            
            <label for="company">Company:</label><br>
            <input type="text" id="company" name="company" required><br>
            
            <label for="investment">Investment:</label><br>
            <input type="text" id="investment" name="investment" required><br>
            
            <label for="date">Date:</label><br>
            <input type="date" id="date" name="date" required><br>
            
            <label for="active">Active:</label><br>
            <select id="active" name="active" required>
                <option value="1">True</option>
                <option value="0">False</option>
            </select><br><br>
            
            <input type="submit" value="Submit">
        </form>
    </body>
</html>
