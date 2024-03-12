<?php

require_once "autoloader.php";

$paci = new clinic("data.csv");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = null;
}

$client = $paci->getClient($id);


if (count($_POST) > 0) {
    $paci->update($_POST);
    header("location: index.php");
}

?>


<html>
<head>
    <title>Datos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        form {
            border: 2px solid #ccc;
            width: 400px;
            padding: 20px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            font-size: 20px;
            color: #555;
        }
        input[type="text"],
        input[type="date"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        select {
            cursor: pointer;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            font-size: 20px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Modificar datos</h1>
    <form id="form_x" class="class_x" method="post">
        <label for="id" >ID: </label>
        <input type="text" name="id" value="<?php echo $client->getId(); ?>" readonly>
        
        <label for="patients" >Patients: </label>
        <input type="text" name="patients" value="<?php echo $client->getPatients(); ?>">
        
        <label for="date">Date: </label>
        <input type="date" name="date" value="<?php echo $client->getDate(); ?>">
        
        <label for="amount">Amount: </label>
        <input type="number" name="amount" value="<?php echo $client->getAmount(); ?>">
        
        <label for="debt">Debt: </label>
        <select id="checkbox" name="debt" value="<?php echo $client->getDebt(); ?>">
            <option value="True">Yes</option>
            <option value="False">No</option>
        </select>
        
        <input id="submit" type="submit" value="Aceptar" />
    </form>
</body>
</html>
