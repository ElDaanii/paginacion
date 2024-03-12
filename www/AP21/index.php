<?php

require_once "autoloader.php";

$connection = new Connection();
$conn = $connection->getConn();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
    <table class="redTable">
        <thead>
            <tr>
                <td colspan="7">
                    <div> <a href="añadir.php"><img src="img/add.png" width="40" height="40" ></td>
                </td>
            </tr>
        </thead>
        <tbody>
            <?php
                $dibujar = 'SELECT * From investment';
                $result = mysqli_query($conn, $dibujar);

                echo '<table class="table table-striped">';
                echo '<tr>
                        <th>Id</th>
                        <th>Company</th>
                        <th>Investment</th>
                        <th>Date</th>
                        <th>Active</th>
                        <th colspan="2">Actions</th>
                    </tr>';     
                
                    $pagAct = (isset($_GET["page"])) ? $_GET["page"]: 1;
                    
                    for($i=0;$i<6;$i++){
                        $result->data_seek($i);
                        $value=$result->fetch_array(MYSQLI_ASSOC);
                    
                        echo '<tr>';
                        foreach($value as $element){
                            echo '<td>' . $element . '</td>';
                        }
                        echo '<td><a href="delete.php?id=' . $value['id'] . '"><img src="img/del_icon.png" width="25"></td>';
                        echo '<td><a href="edit.php?"><img src="img/edit_icon.png" width="25"></td>';
        
                        echo '</tr>';
                    }

            ?>
        </tbody>
    </table>
</body>

</html>