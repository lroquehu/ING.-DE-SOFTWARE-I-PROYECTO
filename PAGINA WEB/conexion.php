<?php
    $host = "localhost";
    $usuario = "root"; 
    $contraseña = "";
    $nombreBaseDeDatos = "escuela_canto";
    
    $conn = new mysqli($host, $usuario, $contraseña, $nombreBaseDeDatos);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    $conn->set_charset("utf8");
?>