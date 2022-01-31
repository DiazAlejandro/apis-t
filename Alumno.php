<?php
    include("connect/conectar.php");
    //Datos del usuario 
    $curp = $_POST['curp'];
    $nombre = $_POST['nombre'];
    $apellido_p = $_POST['apellido_p'];
    $apellido_m = $_POST['apellido_m'];
    $fecha_nac = $_POST['fecha_nac'];
    $genero = $_POST['genero'];
    $medio = $_POST['medioE'];
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

    $seguro_med = $_POST['seguro_med'];
    $servicio = $_POST['servicio'];
    $num_seguridad = $_POST['num_seguridad'];
    $estado = $_POST['estado'];
    $enfermedad = $_POST['enfermedad'];
    $covid = $_POST['covid'];
    $alergias = $_POST['alergias'];
    $prescripcion = $_POST['prescripcion'];
    $observaciones = $_POST['observaciones'];
    

    $sqlUsuario = "INSERT INTO usuario(email, pass, rol_id)
                    VALUES('$email',SHA1('$pass'),'$rol_id')";
    $executeSQLDireccion = mysqli_query($conexion,$sqlUsuario);


    if ($executeSQLDireccion == 1){
        $sqlAlumno = "INSERT INTO `alumno` (`curp`, `nombre`, `apellido_p`, `apellido_m`, `fecha_nac`, `sexo`, `edad`, `telefono`, `medio`, `calle`, `colonia`, `municipio`, `cp`, `estatus`, `email`) 
                        VALUES ('$curp', '$nombre', '$apellido_p', '$apellido_m', '$fecha_nac', '$genero', '$edad', '$telefono', '$medio', '$calle', '$colonia', '$municipio', '$cp', '$estatus', '$email')";
        $executeSQLAlumno = mysqli_query($conexion,$sqlAlumno);
        if ($executeSQLAlumno == 1){
            $sqlEstadoSalud = "INSERT INTO estado_salud (seguro_med, servicio, num_seguridad, estado, enfermedad, covid, alergias, prescripcion, observaciones, alumno_curp )
                                                VALUES('$seguro_med','$servicio','$num_seguridad','$estado','$enfermedad','$covid','$alergias','$prescripcion','$observaciones','$curp')";
            $executeSQLEstadoSalud = mysqli_query($conexion,$sqlEstadoSalud);  
            if ($executeSQLEstadoSalud == 1){
                $messaget = "REGISTRO AGREGADO CORRECTAMENTE";
                echo "<script type='text/javascript'>
                        alert('$messaget');
                        window.location.href = '../apis-t/login.php';
                    </script>";
            }else{
                $messagec = "NO SE AGREGÓ EL ALUMNO";
                echo "<script type='text/javascript'>
                        alert('$messagec');
                        window.location.href = '../registro.php';
                    </script>";
            }                              
        }else{ 
                       
        }
    }else{
        echo "<script type='text/javascript'>$('#registroFallido').modal('show'); </script>"; 
    }
?>