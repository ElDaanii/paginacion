<?php
require_once 'Registro.php'; 

$registro = new Registro();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $registro->registroUsuario($_POST);
}

?>


<html>
    <form method="POST">
    <label for="usuario">Usuario</label><br>
    <input type="text" id="usuario" name="usuario" required><br>

    <label for="contraseña">Contraseña</label><br>
    <input type="password" id="contraseña" name="contraseña" required><br>
    <br>
    <input type="submit" value="Registrar">
    </form>
</html>