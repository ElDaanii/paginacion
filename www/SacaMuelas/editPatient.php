<?php

require_once "autoloader.php";

$paci = new patient("dataPatient.csv");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = null;
}
$client = $paci->getClient($id);


if (count($_POST) > 0) {
    $paci->update($_POST);
    header("location: indexPatient.php");
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
        
        <label for="name" >name: </label>
        <input type="text" name="name" value="<?php echo $client->getName(); ?>">
        
        <label for="address">address: </label>
        <input type="text" name="address" value="<?php echo $client->getAddress(); ?>">
        
        <input id="submit" type="submit" value="Aceptar" />
    </form>
</body>
</html>