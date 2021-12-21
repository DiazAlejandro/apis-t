<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "base_apist";

    $conexion = mysqli_connect($host,$user,$pass,$db)
                or die('Error en la conexión servidor');
?>