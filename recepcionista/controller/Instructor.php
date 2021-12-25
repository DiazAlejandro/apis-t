<?php
    include("../../connect/conectar.php");
    //Datos del Instructor 
    $nombre = $_POST['nombre'];
    $apellido_p = $_POST['apellido_p'];
    $apellido_m = $_POST['apellido_m'];
    $curp = $_POST['curp'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
       
    $sqlInstructor = "INSERT INTO instructor (curp, nombre, apellido_p, apellido_m, telefono, correo_electronico) 
                    VALUES ('$curp', '$nombre', '$apellido_m', '$apellido_p', '$telefono', '$email')";

    if (mysqli_query($conexion,$sqlInstructor)){
        $messaget = "REGISTRO AGREGADO CORRECTAMENTE";
        echo "<script type='text/javascript'>
                alert('$messaget');
                window.location.href = '../tabla_instructor.php';
            </script>";
    }else{
        $messagec = "NO SE AGREGÓ EL INSTRUCTOR";
        echo "<script type='text/javascript'>
                alert('$messagec');
                window.location.href = '../registro_instructor.php';
            </script>";
    }
?>