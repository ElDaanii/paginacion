
<?php

require_once "autoloader.php";

$connection = new Connection();
$conn = $connection->getConn();

for ($i = 0; $i < 50; $i++) { 

    $comp = ["Amazon", "Aliexpres", "Mercadona", "Consun", "UPS", "Correos", "Inditex"];

    $id = $i;
    $company = $comp[array_rand($comp)];
    $investment = random_int(12, 14514);

    $date = '2022-05-30';

    $active = random_int(0, 1);

    $sql = "INSERT INTO investment (id, company, investment, date, active) 
    VALUES ('$id', '$company', '$investment', '$date', '$active')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Registro insertado correctamente <br>";
    } else {
        echo "Error al insertar el registro: " . $conn->error . "<br>";
    }
}
