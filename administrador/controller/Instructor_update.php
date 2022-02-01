<?php
    include("../../connect/conectar.php");
    //Datos del Instructor 
    $nombre = $_POST['nombre'];
    $apellido_p = $_POST['apellido_p'];
    $apellido_m = $_POST['apellido_m'];
    $curp = $_POST['curp'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $old_curp = $_POST['old_curp'];
       
    $sqlInstructor="UPDATE instructor 
                    SET curp ='$curp', 
                        nombre = '$nombre', 
                        apellido_p = '$apellido_p', 
                        apellido_m = '$apellido_m', 
                        telefono = '$telefono', 
                        correo_electronico = '$email'
                    WHERE curp = '$old_curp'";      

    if (mysqli_query($conexion,$sqlInstructor)){
        $messaget = "REGISTRO ACTUALIZADO CORRECTAMENTE";
        echo "<script type='text/javascript'>
                alert('$messaget');
                window.location.href = '../tabla_instructor.php';
            </script>";
    }else{
        $messagec = "NO SE ACTUALIZÓ EL INSTRUCTOR";
        echo "<script type='text/javascript'>
                alert('$messagec');
                window.location.href = '../editar_instructor.php;
            </script>";
    }
?>