<?php
include("../../connect/conectar.php");
//Datos del Instructor 
//Datos del usuario 
$curp = $_POST['curp'];
$nombre = $_POST['nombre'];
$apellido_p = $_POST['apellido_p'];
$apellido_m = $_POST['apellido_m'];
$fecha_nac = $_POST['fecha_nac'];
$genero = $_POST['genero'];
$medio = $_POST['medio'];
$edad = $_POST['edad'];
$telefono = $_POST['telefono'];
$calle = $_POST['calle'];
$colonia = $_POST['colonia'];
$municipio = $_POST['municipio'];
$cp = $_POST['cp'];
$estatus = "ACTIVO";
$email = $_POST['email'];
$pass = $_POST['pass'];
$rol_id = "3";
$tutor_curp = "";

$old_curp = $_POST['old_curp'];
$old_email = $_POST['old_email'];



$seguro_med = $_POST['seguro_med'];
$servicio = $_POST['servicio'];
$num_seguridad = $_POST['num_seguridad'];
$estado = $_POST['estado'];
$enfermedad = $_POST['enfermedad'];
$covid = $_POST['covid'];
$alergias = $_POST['alergias'];
$prescripcion = $_POST['prescripcion'];
$observaciones = $_POST['observaciones'];

$sqlUsuario = "UPDATE usuario 
                    SET email ='$email', 
                    pass = SHA1('$pass')
                    WHERE email = '$old_email'";

if (mysqli_query($conexion, $sqlUsuario)) {

   
    $sqlAlumno = "UPDATE alumno 
        SET curp = '$curp',
        nombre = '$nombre', 
        apellido_p = '$apellido_p', 
        apellido_m = '$apellido_m', 
        fecha_nac = '$fecha_nac', 
        sexo = '$genero', 
        edad = '$edad', 
        telefono = '$telefono',
        medio = '$medio', 
        calle = '$calle', 
        colonia = '$colonia', 
        municipio = '$municipio', 
        cp = '$cp', 
        estatus = '$estatus', 
        email = '$email'
        WHERE curp = '$old_curp'";

    if (mysqli_query($conexion, $sqlAlumno)) {
        $sqlEstadoSalud = "UPDATE estado_salud 
        SET seguro_med = '$seguro_med',
        servicio = '$servicio', 
        num_seguridad = '$num_seguridad', 
        estado = '$estado', 
        enfermedad = '$enfermedad', 
        covid = '$covid', 
        alergias = '$alergias', 
        prescripcion ='$prescripcion', 
        observaciones = '$observaciones', 
        alumno_curp = '$curp'
        WHERE alumno_curp = '$old_curp'";


        if (mysqli_query($conexion, $sqlEstadoSalud)) {
            $messaget = "SE GUARDARON LOS CAMBIOS CORRECTAMENTE";
            echo "<script type='text/javascript'>
                    alert('$messaget');
                    window.location.href = '../tabla_alumno.php';
                </script>";
        } else {
            $messagec = "ERROR DATOS DE ESTADO DE SALUD";
            echo "<script type='text/javascript'>
            alert('$messagec');
            window.location.href = '../tabla_alumno.php';
        </script>";
        }
    }else {
        $messagec = "ERROR DATOS DEL ALUMNO";
        echo "<script type='text/javascript'>
        alert('$messagec');
        window.location.href = '../tabla_alumno.php';
    </script>";
    }
}else {
    $messagec = "ERROR DEL USAURIO";
    echo "<script type='text/javascript'>
    alert('$messagec');
    window.location.href = '../tabla_alumno.php';
</script>";
}
