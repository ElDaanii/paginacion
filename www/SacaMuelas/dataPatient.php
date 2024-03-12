<?php
require_once "autoloader.php";



for ($i = 0; $i < 100; $i++) { 
    $data[$i]["Id"] = $i;
    $data[$i]["Patients"] =  "Patient" . rand(1,50);
    $data[$i]["Adress"] = "Adress " . rand(1,500);  
}

$gestor = fopen("dataPatient.csv", "w");
foreach($data as $fila){
    fputcsv($gestor, $fila);
}

fclose($gestor);
header("location: indexPatient.php");

?>
