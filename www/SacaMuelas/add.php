<?php

require_once "autoloader.php";

$paci = new clinic("data.csv");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = null;
}

if (count($_POST) > 0) {
    $paci->insert($_POST);
    header("location: index.php");
}


?>
<html>
<head>
    <title>Add patient</title>
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
        input[type="amount"],
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
    <h1>Add patient</h1>
    <form id="form_x" class="class_x" method="post">
        <label for="id">ID: </label>
        <input type="text" name="id">
        
        <label for="patient">Patient: </label>
        <input type="text" name="patient">
        
        <label for="date">Date: </label>
        <input type="date" name="date">
        
        <label for="amount">Amount: </label>
        <input type="number" name="amount">
        <br>
        <br>
        <label for="debt">Debt: </label>
        <select id="debt" name="debt">
            <option value="True">Yes</option>
            <option value="False">No</option>
        </select>
        
        <input id="submit" type="submit" value="Aceptar">
    </form>
</body>
</html>
