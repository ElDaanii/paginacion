<?php

class Registro {
    public function registroUsuario($usser) {
        if (isset($_POST["usuario"]) && isset($_POST["contraseña"])){
            $conn = mysqli_connect("db","root","test","login_demo");

            $usuario = $_POST["usuario"];
            $contrasena = $_POST["contraseña"];
     

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $consulta = "SELECT * FROM users WHERE userName = '$usuario'";
            $resultado = mysqli_query($conn, $consulta);

            if (mysqli_num_rows($resultado) > 0) {
                echo "El usuario ya está registrado";
            } else {
                $insertar = "INSERT INTO users (userName, userPassword, securePassword) VALUES ('$usuario', '$contrasena', '$contrasena')";
                if (mysqli_query($conn, $insertar)) {
                    echo "Registro exitoso";
                } else {
                    echo "Error al conectar con la base de datos: " . mysqli_error($conn);
                }
            }

            mysqli_close($conn);
        } else {
            echo "Error al conectar con la base de datos";
        }
    }
}


