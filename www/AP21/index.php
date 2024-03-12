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

                $resultados_por_pagina = 15;

                $pagina_actual = (isset($_GET['page']) && ($_GET['page'])) ? $_GET['page'] : 1;
                $inicio = ($pagina_actual - 1) * $resultados_por_pagina;

                $dibujar = "SELECT * FROM investment LIMIT $inicio, $resultados_por_pagina";
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

                    for($i=0;$i<$resultados_por_pagina ;$i++){
                        $result->data_seek($i);
                        $value=$result->fetch_array(MYSQLI_ASSOC);
                        
                    echo '<tr>';
                    foreach($value as $element) {
                        echo '<td>' . $element . '</td>';
                    }
                    echo '<td><a href="delete.php?id=' . $value['id'] . '"><img src="img/del_icon.png" width="25"></td>';
                    echo '<td><a href="edit.php?id=' . $value['id'] . '"><img src="img/edit_icon.png" width="25"></td>';
                    echo '</tr>';
                }

                echo '</table>';

                $total_registros_query = "SELECT COUNT(*) AS total FROM investment";
                $total_registros_resultado = mysqli_query($conn, $total_registros_query);
                $total_registros_fila = mysqli_fetch_assoc($total_registros_resultado);
                $total_registros = $total_registros_fila['total'];
                $total_paginas = ceil($total_registros / $resultados_por_pagina);

                echo '<div class="pagination">';
                for ($pagina = 1; $pagina <= $total_paginas; $pagina++) {
                    echo '<a href="?page=' . $pagina . '">' . $pagina . '</a> ';
                }
                echo '</div>';
            ?>
        </tbody>
    </table>
</body>

</html>